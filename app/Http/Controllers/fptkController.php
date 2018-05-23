<?php

namespace App\Http\Controllers;
use Auth;
use Alert;

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
    $jabatan = $id;
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
        'id_user' => $jabatan,
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
    // $fptk->id_bagian = $request->input('bagian');
    // $fptk->id_user = $id;
    // $fptk->jml_sdm = $request->input('jml_sdm');
    // $fptk->id_cabang = $request->input('cabang');
    // $fptk->keperluan = $request->input('keperluan');
    // $fptk->ket_keperluan = $request->input('ket_keperluan');
    // $fptk->status_karyawan = $request->input('stat_kar');
    // $fptk->jns_kel = $request->input('jns_kel');
    // $fptk->stat_pernikahan = $request->input('stat_nikah');
    // $fptk->pend = $request->input('pendidikan');
    // $fptk->pengalaman_kerja = $request->input('pengalaman');
    // $fptk->min_pengalaman = $request->input('min_pengalaman');
    // $fptk->syarat_wajib = $request->input('syarat_wajib');
    // $fptk->syarat_dukung = $request->input('syarat_pendukung');
    // $fptk->uraian_tugas = $request->input('tanggung_jawab');
    // $fptk->karakteristik = $request->input('karakteristik');
    // $fptk->save();

    // dd($request);
   
    // $this->validate($request, [
    //   'bagian'  => 'required',
    //   'jabatan' => 'required',
    //   'jml_sdm' => 'required',
    //   'cabang' => 'required',
    //   'keperluan' => 'required',
    //   'ket_keperluan' => 'required',
    //   'stat_kar' => 'required',
    //   'jns_kel' => 'required',
    //   'stat_nikah' => 'required',
    //   'pendidikan' => 'required',
    //   'pengalaman' => 'required',
    //   'min_pengalaman' => 'required',
    //   'syarat_wajib' => 'required',
    //   'syarat_pendukung' => 'required',
    //   'tanggung_jawab' => 'required',
    //   'karakteristik' => 'required',
    // ]);



    


  }
}
