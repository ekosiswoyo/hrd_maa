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
   public function cetakfptk()
  {
    return view('/cetakfptk');
  }

public function kerjafptk(Request $request,$id)
    {
        $fptk = $request->input("fptk");
        $pelamar = $request->input("pelamar");

        DB::table('activity')
        ->where('id_fptk','=',$fptk)
        ->update([
            'status' =>'1'
        ]);

        DB::table('pelamar')
        ->where('nik','=',$pelamar)
        ->update([
            'status_akhir' =>'2',
            'tgl_masuk_kerja' => $request->tgl
        ]);

        DB::table('fptk_pelamar')
        ->where('nik','=',$pelamar)
        ->where('idfptk','=',$fptk)
        ->update([
            'status' =>'2'
        ]);
        DB::table('fptk_pelamar')
        ->where('nik','!=',$pelamar)
        ->where('idfptk','=',$fptk)
        ->update([
            'status' =>'1'
        ]);
        DB::table('fptk_pelamar')
       ->where('nik','=',$pelamar)
        ->where('idfptk','!=',$fptk)
        ->update([
            'status' =>'1'
        ]);
  
        DB::table('fptk')
        ->where('id', $fptk)
        ->update([
               'status' => '2'
        ]);
        return redirect('/proses');
    }
  public function pelamarfptk($id)
  {
    $pelamar = DB::table('fptk_pelamar')
      ->join('pelamar', 'fptk_pelamar.nik', '=', 'pelamar.nik')
      ->join('fptk','fptk_pelamar.idfptk','=','fptk.id')
      ->where('fptk_pelamar.idfptk','=',$id)->get();
     $nama = DB::table('fptk_pelamar')
      ->join('pelamar', 'fptk_pelamar.nik', '=', 'pelamar.nik')
      ->join('fptk','fptk_pelamar.idfptk','=','fptk.id')
      ->where('fptk_pelamar.idfptk','=',$id)->first();
    return view('pelamarfptk',compact('pelamar','nama'));
  }

  public function store(Request $request)
  {

    $id = Auth::user()->id;
   
    $bagian = $request->input('bagian');
    $jabatan = $request->input('jabatan');
    $grade = $request->input('grade');
    $jml_sdm = $request->input('jml_sdm');
    $divisikerja = $request->input('divisikerja');
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
    


    $fptk = new fptk;
    $fptk->id_bagian = $bagian;
    $fptk->jabatan = $jabatan;
    $fptk->grade = $grade;
    $fptk->bagian = $jml_sdm;
    $fptk->divisi = $divisikerja;
    $fptk->id_cabang = $cabang;
    $fptk->keperluan= $keperluan;
    $fptk->ket_keperluan = $ket_keperluan;
    $fptk->status_karyawan = $stat_kar;
    $fptk->jns_kel = $jns_kel;
    $fptk->stat_pernikahan = $stat_nikah;
    $fptk->pend = $pendidikan;
    $fptk->pengalaman_kerja = $pengalaman;
    $fptk->min_pengalaman = $min_pengalaman;
    $fptk->syarat_wajib = $syarat_wajib;
    $fptk->syarat_dukung = $syarat_pendukung;
    $fptk->uraian_tugas = $tanggung_jawab;





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
    $fptk->save();
    Mail::to('recruit.bprmaa@gmail.com')->send(new fptkMail($fptk));
   
    Session::flash('success_massage','Berhasil disimpan.');
    return redirect('/fptk');
  }

  public function reportpdf(Request $request){
    $tglawal = $request->input('tglawal');
    $tglakhir = $request->input('tglakhir');
    
    $noreportall = 0;
    $reportall = DB::table('activity')
                // ->join('fptk_pelamar','activity.id_fptk','=','fptk_pelamar.idfptk')
                ->join('fptk','activity.id_fptk','=','fptk.id')
                ->join('jns_tes','activity.id_seleksi','=','jns_tes.id')
                ->select('*','activity.id_seleksi','activity.id_fptk',DB::raw('count(*) as jumlahfptk'))
                ->whereBetween('fptk.tgl_acc', [$tglawal, $tglakhir])
                // ->where('activity.hasil','=',1)
                ->groupBy('activity.id_seleksi','activity.id_fptk')
                ->orderBy('activity.id_fptk')
                // ->havingRaw('activity.id_seleksi = 1')
                ->get();
    $noreport = 0;       
    $report = DB::table('activity')
                // ->join('fptk_pelamar','activity.id_fptk','=','fptk_pelamar.idfptk')
                ->join('fptk','activity.id_fptk','=','fptk.id')
                ->join('jns_tes','activity.id_seleksi','=','jns_tes.id')
                ->select('*','activity.id_seleksi','activity.id_fptk',DB::raw('count(*) as jumlahfptk'))
                ->where('activity.hasil','=','1')
                ->whereBetween('fptk.tgl_acc', [$tglawal, $tglakhir])
                ->groupBy('activity.id_seleksi','activity.id_fptk')
                ->orderBy('activity.id_fptk')
                // ->havingRaw('activity.id_seleksi = 1')
                ->get();
    $noreportnon = 0;
    $reportnon = DB::table('activity')
                // ->join('fptk_pelamar','activity.id_fptk','=','fptk_pelamar.idfptk')
                ->join('fptk','activity.id_fptk','=','fptk.id')
                ->join('jns_tes','activity.id_seleksi','=','jns_tes.id')
                ->select('*','activity.id_seleksi','activity.id_fptk',DB::raw('count(*) as jumlahfptk'))
                ->where('activity.hasil','=','0')
                ->whereBetween('fptk.tgl_acc', [$tglawal, $tglakhir])
                ->groupBy('activity.id_seleksi','activity.id_fptk')
                ->orderBy('activity.id_fptk')
                // ->havingRaw('activity.id_seleksi = 1')
                ->get();


    $pdf = PDF::loadView('printreport',compact ('reportall','report','reportnon','noreportall','noreport','noreportnon','tglawal','tglakhir'));
    $pdf->setPaper('A4', 'landscape');
            
    return $pdf->download('reportall.pdf');
  }

  public function makePDF(){ 
    $no = 0;
    $abc = DB::table('fptk')
          ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
          ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
          ->where('fptk.divisi','=','Bisnis')
          ->orderBy('fptk.id','desc')->take(1)->get();
    $pdf = PDF::loadView('printfptk',compact ('abc','no'));
    
            
            return $pdf->download('fptk.pdf');
  }
  public function makePDFnon(){ 
    $no = 0;
    $abc = DB::table('fptk')
          ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
          ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
          ->where('fptk.divisi','=','NonBisnis')
          ->orderBy('fptk.id','desc')->take(1)->get();
    $pdf = PDF::loadView('printfptknon',compact ('abc','no'));
    
            
            return $pdf->download('fptk.pdf');
  }

  public function view(){
    $statusawal = DB::table('fptk')
            ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
            ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
            ->where('fptk.status','=',NULL)
            ->orderBy('fptk.id','desc')->get();
    $statusakhir = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.status','=',1)
    ->orderBy('fptk.id','desc')->get();
     $noacc = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.status','=',0)
    ->orderBy('fptk.id','desc')->get();
    $akhir = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.status','=',2)
    ->orderBy('fptk.id','desc')->get();
    $users = DB::table('fptk')->where('status','=',0)->count();
    return view('home_fptk', compact('statusawal','statusakhir','users','akhir','noacc'));
  }

  public function viewfptk(){
    $id = Auth::user()->id_bagian;

    $statusawal = DB::table('fptk')
            ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
            ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
            ->where('fptk.id_bagian','=',$id)
            ->where('fptk.status','=',NULL)
            ->orderBy('fptk.id','asc')->get();
    $statusakhir = DB::table('fptk')
            ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
            ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
            ->where('fptk.id_bagian','=',$id)
            ->where('fptk.status','=',1)
            ->orderBy('fptk.id','asc')->get();
    $noacc = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.id_bagian','=',$id)
    ->where('fptk.status','=',0)
    ->orderBy('fptk.id','desc')->get();
    return view('data-fptk', compact('id','statusawal','statusakhir','noacc'));
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
  public function detail($id)
  {
    $fptk = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.id','=',$id)->first();
    // $fptk = fptk::find($id);
    return view ('detailfptk', compact('fptk'));
  }
  public function detailproses($id)
  {
    $fptk = DB::table('fptk')
    ->join('bagians', 'fptk.id_bagian', '=', 'bagians.id_bagian')
    ->join('cabangs', 'fptk.id_cabang', '=', 'cabangs.id_cabang')
    ->where('fptk.id','=',$id)->first();
    // $fptk = fptk::find($id);
    return view ('detail-proses', compact('fptk'));
  }


  public function updatefptk(Request $request,$id)
  {
    $fptk = fptk::find($id);
  
    $fptk->id_cabang = $request->cabang;
    $fptk->grade = $request->grade;
    $fptk->jabatan = $request->jabatan;
    $fptk->bagian = $request->jml_sdm;
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

   public function pelamar($id)
  {
    $ids = Auth::user()->id_bagian;
   $pelamar = DB::table('pelamar')
           ->join('fptk','pelamar.id_fptk','=','fptk.id')
           ->where('fptk.id_bagian','=',$ids)
           ->where('fptk.id','=',$id)->get();

        return view('homepelamar',compact('pelamar'));  }

  public function updateproses(Request $request)
  {
      $id = $request->input("id");
      $status = $request->input("hasil");
        $carbon = Carbon::today();
      $format = $carbon->format('Y-m-d H:i:s');
      if($status == "ACC"){
          DB::table('fptk')->where('id','=',$id)->update([
              
              'status_acc' => $status,
              'keterangan_acc' => $request->ket,
              'status' => '1',
              'tgl_acc' => $request->tgl
              ]);
    }elseif ($status == "Tidak ACC") {
     DB::table('fptk')->where('id','=',$id)->update([
              
              'status_acc' => $status,
              'keterangan_acc' => $request->ket,
              'status' => '0',
              'tgl_acc' => $request->tgl
              ]);
    }
     
    Session::flash('success_massage','Data Pelamar, berhasil di edit');
    return redirect('/home_fptk');
  }

  public function updateall(Request $request)
    {
        $ids = $request->check;
         $hasil = $request->input("hasil");
          $ket = $request->input("ket");
         $tgl = $request->input("tgl");


        for($i = 0; $i <= count($ids); $i++) {
 if($hasil == "ACC"){
          DB::table('fptk')->whereIn('id', $ids)->update(array(
                    'status' => '1',
                    'status_acc' => $hasil,
                    'keterangan_acc' => $ket,
                    'tgl_acc' => $tgl
                ));
  }elseif ($hasil == "Tidak ACC") {
      DB::table('fptk')->whereIn('id', $ids)->update(array(
                    'status' => '0',
                    'status_acc' => $hasil,
                    'keterangan_acc' => $ket,
                    'tgl_acc' => $tgl
                ));
  }
  
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


