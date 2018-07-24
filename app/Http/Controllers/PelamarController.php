<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Pelamar;
use App\Models\Pengalaman;
use App\Models\UploadFile;
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
    public function indexs($idnik){

        $pelamar = DB::table('pelamar')
        ->where('pelamar.nik','=',$idnik)->first();

        return view('pelamar-pengalaman',compact('pelamar'));
    }
    public function indexss($idnik){

        $pelamar = DB::table('pelamar')
        ->where('pelamar.nik','=',$idnik)->first();

        return view('pelamar-file',compact('pelamar'));
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
                $posisi = $request->input('posisi');
                $tgl_lamaran = $request->input('tgl_lamaran');
                $tgl_kerja = $request->input('tgl_kerja');
                $stat_nikah =$request->input('stat_nikah');
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
                    'alamat_ktp' => $alamat_ktp,
                    'alamat_domisili' => $alamat_domisili,
                    'telp' => $telp,
                    'hp' => $hp,
                    'pend_terakhir' => $pend,
                    'id_lowongan'=>$posisi,
                    'tgl_masuk_lamaran'=>$tgl_lamaran,
                    'tgl_masuk_kerja'=>$tgl_kerja,
  
                ]);
               
                $pelamar->save();

                $idnik=$pelamar->nik;
               
                // foreach ($jangka as $key => $value) {
                //     $pengalaman = new Pengalaman();
                    
                //     $pengalaman->nik = $pelamar->nik;
                //     $pengalaman->nm_perusahaan = $nama_perusahaan[$key];
                //     $pengalaman->posisi = $posisi[$key];
                //     $pengalaman->jangka_kerja = $value;
                //     $pengalaman->save();
                //   }

                  
                  
        
                return redirect()->route('pengalaman', [$idnik]);

    
            }else{
                Session::flash('errors','NIK pelamar sudah terdaftar.');
                return Redirect::to('/pelamar')
                    ->withErrors($validator)
                    ->withInput();
            }
    }

    public function storepengalaman(Request $request,$idnik)
    {
            
              
        $pelamar = DB::table('pelamar')
        ->where('pelamar.nik','=',$idnik)->first();

                $nik = $pelamar->nik;
               
                $nama_perusahaan = $request->input('nama_perusahaan');
                $posisi = $request->input('posisi');
                $jangka = $request->input('jangka');
  
  
               
               
               
                foreach ($jangka as $key => $value) {
                    $pengalaman = new Pengalaman();
                    
                    $pengalaman->nik = $nik;
                    $pengalaman->nm_perusahaan = $nama_perusahaan[$key];
                    $pengalaman->posisi = $posisi[$key];
                    $pengalaman->jangka_kerja = $value;
                    $pengalaman->save();
                  }

                  
                  
        
               
                return redirect('/pelamar');
    
    }
    public function uploadSubmit(InformasiRequest $request)
    {
  
        $informasi = new Informasi;
            $informasi->tanggal = $request->tanggal;
            $informasi->jenis_id = $request->jenis_informasi;
            $informasi->nomor = $request->nomor;
            $informasi->perihal = $request->perihal;
            $informasi->save();
        // $informasi = Informasi::create($request->all());
  
        // foreach ($request->lampiran as $file) {
  
            $ubah_nama = $informasi->id.'.'.date('dmYHis').'.'.$request->lampiran->getClientOriginalName();
  
            $filename = $request->lampiran->storeAs('public/lampiran', $ubah_nama);
            InformasiFile::create([
                'informasi_id' => $informasi->id,
                'filename' => $ubah_nama
            ]);
        // }
        Session::flash('success_massage','Informasi'.$request->jenis_informasi.', berhasil ditambahkan');
        return redirect()->route('uploadForm');
    }
  
    public function storefile(Request $request,$idnik)
    {
        $cv = $idnik.'.'.date('dmYHis').'.'.$request->cv->getClientOriginalName();
        $foto = $idnik.'.'.date('dmYHis').'.'.$request->foto->getClientOriginalName();
        $ktp = $idnik.'.'.date('dmYHis').'.'.$request->ktp->getClientOriginalName();
        $kk= $idnik.'.'.date('dmYHis').'.'.$request->kk->getClientOriginalName();
        $ijazah = $idnik.'.'.date('dmYHis').'.'.$request->ijazah->getClientOriginalName();

        $filenamecv = $request->cv->storeAs('public/lampiran', $cv);
        $filenamefoto = $request->foto->storeAs('public/lampiran', $foto);
        $filenamektp = $request->ktp->storeAs('public/lampiran', $ktp);      
        $filenamekk = $request->kk->storeAs('public/lampiran', $kk);
        $filenameijazah = $request->ijazah->storeAs('public/lampiran', $ijazah);

        UploadFile::create([
            'nik' => $idnik,
            'cv' => $cv,
            'foto' => $foto,
            'ktp' => $ktp,
            'kk' => $kk,
            'ijazah' => $ijazah
        ]);
        
               
                return redirect('/pelamar');
    
    }

    public function view(){
        $view = DB::table('pelamar')
                ->join('lowongan', 'pelamar.id_lowongan', '=', 'lowongan.id')
                ->orderBy('pelamar.tgl_masuk_lamaran','desc')->get();
        $no = 1;
        return view('data_pelamar', compact('view','no'));
      }
}
