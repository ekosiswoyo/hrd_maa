<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Pelamar;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        return view('/pelamar');
    }
    public function store(Request $request)
    {
  
      $id = Auth::user()->id;
     
      $nik = $request->input('nik');
      $nama = $request->input('nama');
      $tmp_lahir = $request->input('tmp_lahir');
      $tgl_lahir = $request->input('tgl_lahir');
      $jns_kel = $request->input('jns_kel');
      $stat_nikah = $request->input('stat_nikah');
      $posisi = $request->input('posisi');
      $alamat_ktp = $request->input('alamat_ktp');
      $alamat_domisili = $request->input('alamat_domisili');
      $telp = $request->input('telp');
      $hp = $request->input('hp');
      $pend = $request->input('pend');
      
  
  
      $pelamar = new Pelamar([
          'nik' => $nik,
          'nama' => $nama,
          'tempat_lahir' => $tmp_lahir,
          'tanggal_lahir' => $tgl_lahir,
          'jns_kel' => $jns_kel,
          'stat_pernikahan' => $stat_nikah,
          'id_lowongan' => $posisi,
          'alamat_ktp' => $alamat_ktp,
          'alamat_domisili' => $alamat_domisili,
          'telp' => $telp,
          'hp' => $hp,
          'pend_terakhir' => $pend
  
      ]);
      $pelamar->save();
     
      Session::flash('success_massage','Berhasil disimpan.');
      return redirect('/pelamar');
    }
}
