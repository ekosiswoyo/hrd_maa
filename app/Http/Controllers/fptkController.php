<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\fptk;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

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
    


    $fptk = new fptk([
        'id_bagian' => $bagian,
        'grade' => $jabatan,
        'jml_sdm' => $jml_sdm,
        'id_cabang' => $cabang,
        'keperluan' => $keperluan,
        'ket_keperluan' => $ket_keperluan,
        'status_karyawan' => $stat_kar,
        'jns_kel' => $jns_kel,
        'stat_pernikahan' => $stat_nikah,
        'pend' => $pendidikan,
        'pengalaman_kerja' => $pengalaman,
        'min_pengalaman' => $min_pengalaman,
        'syarat_wajib' => $syarat_wajib,
        'syarat_dukung' => $syarat_pendukung,
        'uraian_tugas' => $tanggung_jawab,
        'karakteristik' => $karakteristik

    ]);
    $fptk->save();
   
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
    return view('home_fptk', compact('statusawal','statusakhir'));
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
  
}


