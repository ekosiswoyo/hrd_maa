<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Pelamar;
use App\Models\Pengalaman;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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
            $validator = Validator::make(
                Input::all(),
                array(
                    "nik"                 => "required|unique:pelamar,nik",
                    "nama"              => "required"
                )
            );

            if($validator->passes()){
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
                $tgl_lamaran = $request->input('tgl_lamaran');
                $tgl_kerja = $request->input('tgl_kerja');
                
  
  
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
                    'pend_terakhir' => $pend,
                    'tgl_masuk_lamaran' => $tgl_lamaran,
                    'tgl_masuk_kerja' => $tgl_kerja
  
                ]);
            
                $pelamar->save();
                

      $pengalaman = $request->pengalaman;
      foreach ($users as $key => $value) {
        $userteam = new UserTeam();
        $userteam->id_team = $control->id;
        $userteam->id_user = $value;
        $userteam->status_user = 'User';
        $userteam->save();
      
     }
                Session::flash('success_massage','Berhasil disimpan.');
                return redirect('/pelamar');
    
            }else{
                Session::flash('errors','NIK pelamar sudah terdaftar.');
                return Redirect::to('/pelamar')
                    ->withErrors($validator)
                    ->withInput();
            }
    }

    public function view(){
        $view = DB::table('pelamar')
                ->join('lowongan', 'pelamar.id_lowongan', '=', 'lowongan.id')
                ->orderBy('pelamar.tgl_masuk_lamaran','desc')->get();
        $no = 1;
        return view('data_pelamar', compact('view','no'));
      }
}
