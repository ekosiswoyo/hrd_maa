<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\fptk;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Mail\fptkMail;
use Illuminate\Support\Facades\Mail;

class fptkController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('/fptk');
  }

  public function store(Request $request)
  {

    $id = Auth::user()->id;
   
    $bagian = $request->input('bagian');
    $jabatan = $request->input('jabatan');
    $jml_sdm = $request->input('jml_sdm');
    $cabang = $request->input('cabang');
    $keperluan = $request->input('keperluan');
    $ket_keperluan = $request->input('ket_keperluan');
    $stat_kar = $request->input('stat_kar');
    $jns_kel = $request->input('jns_kel');
    $stat_nikah = $request->input('stat_nikah');
    $pendidikan = $request->input('pendidikan');
    $pengalaman = $request->input('pengalaman');
    $min_pengalaman = $request->input('min_pengalaman');
    $syarat_wajib = $request->input('syarat_wajib');
    $syarat_pendukung = $request->input('syarat_pendukung');
    $tanggung_jawab = $request->input('tanggung_jawab');
    $karakteristik = $request->input('karakteristik');
    


    $fptkMail = new fptk;
    $fptkMail->id_bagian = $bagian;
    $fptkMail->grade = $jabatan;
    $fptkMail->jml_sdm = $jml_sdm;
    $fptkMail->id_cabang = $cabang;
    $fptkMail->keperluan= $keperluan;
    $fptkMail->ket_keperluan = $ket_keperluan;
    $fptkMail->status_karyawan = $stat_kar;
    $fptkMail->jns_kel = $jns_kel;
    $fptkMail->stat_pernikahan = $stat_nikah;
    $fptkMail->pend = $pendidikan;
    $fptkMail->pengalaman_kerja = $pengalaman;
    $fptkMail->min_pengalaman = $min_pengalaman;
    $fptkMail->syarat_wajib = $syarat_wajib;
    $fptkMail->syarat_dukung = $syarat_pendukung;
    $fptkMail->uraian_tugas = $tanggung_jawab;
    $fptkMail->karakteristik = $karakteristik;





    // ([
    //     'id_bagian' => $bagian,
    //     'grade' => $jabatan,
    //     'jml_sdm' => $jml_sdm,
    //     'id_cabang' => $cabang,
    //     'keperluan' => $keperluan,
    //     'ket_keperluan' => $ket_keperluan,
    //     'status_karyawan' => $stat_kar,
    //     'jns_kel' => $jns_kel,
    //     'stat_pernikahan' => $stat_nikah,
    //     'pend' => $pendidikan,
    //     'pengalaman_kerja' => $pengalaman,
    //     'min_pengalaman' => $min_pengalaman,
    //     'syarat_wajib' => $syarat_wajib,
    //     'syarat_dukung' => $syarat_pendukung,
    //     'uraian_tugas' => $tanggung_jawab,
    //     'karakteristik' => $karakteristik

    // ]);
    $fptkMail->save();
    Mail::to('it.bprmaa@gmail.com')->send(new fptkMail($fptkMail));
   
    Session::flash('success_massage','Berhasil disimpan.');
    return redirect('/fptk');
  }

  public function makePDF(){ 
    $no = 0;
    $abc = DB::table('fptk')
          ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
          ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
          ->orderBy('fptk.id','desc')->take(1)->get();
    $pdf = PDF::loadView('printfptk',compact ('abc','no'));
    
            
            return $pdf->download('fptk.pdf');
  }

  public function view(){
    $statusawal = DB::table('fptk')
            ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
            ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
            ->where('fptk.status','=',0)
            ->orderBy('fptk.id','asc')->get();
    $statusakhir = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.status','=',1)
    ->orderBy('fptk.id','asc')->get();
    $akhir = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.status','=',2)
    ->orderBy('fptk.id','asc')->get();
    $users = DB::table('fptk')->where('status','=',0)->count();
    return view('home_fptk', compact('statusawal','statusakhir','users','akhir'));
  }

  public function viewfptk(){
    $id = Auth::user()->id_bagian;

    $statusawal = DB::table('fptk')
            ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
            ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
            ->where('fptk.id_bagian','=',$id)
            ->where('fptk.status','=',0)
            ->orderBy('fptk.id','asc')->get();
    $statusakhir = DB::table('fptk')
            ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
            ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
            ->where('fptk.id_bagian','=',$id)
            ->where('fptk.status','=',1)
            ->orderBy('fptk.id','asc')->get();
    return view('data-fptk', compact('id','statusawal','statusakhir'));
  }



  public function print($id)
    {
      $no = 0;
    $abc = DB::table('fptk')
          ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
          ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
          ->where('fptk.id','=',$id)
          ->orderBy('fptk.id','desc')->get();
    $pdf = PDF::loadView('print',compact ('abc','no'));
    
            
            return $pdf->download('fptk.pdf');
    }

    public function ubahfptk($id)
  {
    $fptk = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.id','=',$id)->first();
    // $fptk = fptk::find($id);
    return view ('ubah-fptk', compact('fptk'));
  }

  public function updatefptk(Request $request,$id)
  {
    $fptk = fptk::find($id);
  
    $fptk->id_cabang = $request->cabang;
    $fptk->grade = $request->jabatan;
    $fptk->jml_sdm = $request->jml_sdm;
    $fptk->keperluan = $request->keperluan;
    $fptk->ket_keperluan = $request->ket_keperluan;
    $fptk->status_karyawan = $request->stat_kar;

    $fptk->jns_kel = $request->jns_kel;
    $fptk->stat_pernikahan = $request->stat_nikah;
    $fptk->pend = $request->pendidikan;
    $fptk->pengalaman_kerja = $request->pengalaman;
    $fptk->min_pengalaman = $request->min_pengalaman;
    $fptk->syarat_wajib = $request->syarat_wajib;

    $fptk->syarat_dukung = $request->syarat_pendukung;
    $fptk->uraian_tugas = $request->tanggung_jawab;
    $fptk->karakteristik = $request->karakteristik;
    $fptk->save();

    Session::flash('success_massage','Data FPTK, berhasil di edit');
    return redirect('/home_fptk');
  }
  
  public function destroy($id)
    {
        $fptk = fptk::findOrFail($id);

        fptk::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
        
    }

    public function proses(Request $request,$id)
  {
    $fptk = fptk::find($id);
  
    $fptk->status = '1';
    $fptk->save();

    Session::flash('success_massage','Data FPTK, berhasil di edit');
    return redirect('/home_fptk');
  }
  public function updateproses(Request $request)
  {
      $id = $request->input("id");
        $carbon = Carbon::today();
      $format = $carbon->format('Y-m-d H:i:s');
          DB::table('fptk')->where('id','=',$id)->update([
              
              'status_acc' => $request->hasil,
              'keterangan_acc' => $request->ket,
              'tgl_acc' => $request->tgl
              ]);

     
    Session::flash('success_massage','Data Pelamar, berhasil di edit');
    return redirect('/home_fptk');
  }

  public function updateall(Request $request)
    {
        $ids = $request->check;
        
        

        for($i = 0; $i <= count($ids); $i++) {

          DB::table('fptk')->whereIn('id', $ids)->update(array(
                    'status' => '1',
                ));
  
  
      }
      return redirect('/home_fptk');

    }

    public function selesaiall(Request $request)
    {
        $ids = $request->selesai;
        
        

        for($i = 0; $i <= count($ids); $i++) {

          DB::table('fptk')->whereIn('id', $ids)->update(array(
                    'status' => '2',
                ));
  
  
      }
      return redirect('/home_fptk');

    }
}


