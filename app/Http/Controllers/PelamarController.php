<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Pelamar;
use App\Models\Pengalaman;
use App\Models\UploadFile;
use App\Models\Activity;
use Carbon\Carbon;
use Charts;

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

               
                  return redirect()->route('file', [$idnik]);
    
    }
  
    public function storefile(Request $request,$idnik)
    {

        $cv = $idnik.'.'.date('dmYHis').'.'.$request->cv->getClientOriginalName();
        $foto = $idnik.'.'.date('dmYHis').'.'.$request->foto->getClientOriginalName();
        $ktp = $idnik.'.'.date('dmYHis').'.'.$request->ktp->getClientOriginalName();
        $kk= $idnik.'.'.date('dmYHis').'.'.$request->kk->getClientOriginalName();
        $ijazah = $idnik.'.'.date('dmYHis').'.'.$request->ijazah->getClientOriginalName();
        $srt = $idnik.'.'.date('dmYHis').'.'.$request->srt->getClientOriginalName();
        
        
        $filenamecv = $request->cv->storeAs('public/lampiran', $cv);
        $filenamefoto = $request->foto->storeAs('public/lampiran', $foto);
        $filenamektp = $request->ktp->storeAs('public/lampiran', $ktp);      
        $filenamekk = $request->kk->storeAs('public/lampiran', $kk);
        $filenameijazah = $request->ijazah->storeAs('public/lampiran', $ijazah);
        $filenamesrt = $request->srt->storeAs('public/lampiran', $srt);

        UploadFile::create([
            'nik' => $idnik,
            'cv' => $cv,
            'foto' => $foto,
            'ktp' => $ktp,
            'kk' => $kk,
            'ijazah' => $ijazah,
            'srt_pengalaman' => $srt
        ]);
        
               
                return redirect('/data_pelamar');
    
    }

    public function view(){
        $view = DB::table('pelamar')
                ->join('lowongan', 'pelamar.id_lowongan', '=', 'lowongan.id')
                ->where('pelamar.status_akhir','0')
                ->orderBy('pelamar.tgl_masuk_lamaran','desc')->get();
        $status = DB::table('pelamar')
                ->join('lowongan', 'pelamar.id_lowongan', '=', 'lowongan.id')
                ->where('pelamar.status_akhir','1')
                ->orderBy('pelamar.tgl_masuk_lamaran','desc')->get();
        $no = 1;
        return view('data_pelamar', compact('view','status','no'));
    }

    public function ubahpelamar($idnik)
    {
      $pelamar = DB::table('pelamar')
      ->join('lowongan', 'pelamar.id_lowongan', '=', 'lowongan.id')
      ->where('pelamar.nik','=',$idnik)->first();
      // $fptk = fptk::find($id);
      return view ('ubah-pelamar', compact('pelamar'));
    }

    public function ubahpengalaman($idnik)
    {

        
      $pengalaman = DB::table('pengalaman_kerja')
      ->where('pengalaman_kerja.nik','=',$idnik)->get();
    //   $abc = $pengalaman->id;
    $id = $idnik;

      $no = 0;
      $no++;
      // $fptk = fptk::find($id);
      return view ('ubah-pengalaman', compact('abc','pengalaman','no','id'));
    }


    public function updatepelamar(Request $request,$idnik)
  {
    DB::table('pelamar')->where('pelamar.nik','=',$idnik)->update([
        
        'nama' => $request->nama,
        'tempat_lahir' => $request->tmp_lahir,
        'tanggal_lahir' => $request->tgl_lahir,
        'jns_kel' => $request->jns_kel,
        'stat_pernikahan' => $request->stat_nikah,
        'id_lowongan' => $request->posisi,
        'alamat_ktp' => $request->alamat_ktp,
        'alamat_domisili' => $request->alamat_domisili,
        'telp' => $request->telp,
        'hp' => $request->hp,
        'pend_terakhir' => $request->pend,
        'tgl_masuk_lamaran' => $request->tgl_lamaran
        ]);

    // $pelamar = DB::table('pelamar')
    // ->where('pelamar.nik','=',$idnik)->first();

    // $pelamar->nama = $request->nama;
    // $pelamar->tempat_lahir = $request->tmp_lahir;
    // $pelamar->tanggal_lahir = $request->tgl_lahir;
    // $pelamar->jns_kel = $request->jns_kel;
    // $pelamar->stat_pernikahan = $request->stat_nikah;
    // $pelamar->id_lowongan = $request->posisi;

    // $pelamar->alamat_ktp = $request->alamat_ktp;
    // $pelamar->alamat_domisili = $request->alamat_domisili;
    // $pelamar->telp = $request->telp;
    // $pelamar->hp = ;
    // $pelamar->pend_terakhir = $request->pend;
    // $pelamar->tgl_masuk_lamaran = $request->tgl_lamaran;

    // $pelamar->save();

    Session::flash('success_massage','Data Pelamar, berhasil di edit');
    return redirect()->route('pengalaman', [$idnik]);
  }


  public function updatepengalaman(Request $request)
  {
    // $nik = $pelamar->nik;
    $id = $request->input('id');
    $nama_perusahaan = $request->input('nama_perusahaan');
    $posisi = $request->input('posisi');
    $jangka = $request->input('jangka');
    for ($i=0; $i<count($request->jangka); $i++) {

        DB::table('pengalaman_kerja')
            ->where('id',$request->id[$i])
            ->update([
                'nm_perusahaan' => $request->nama_perusahaan[$i],
                'posisi' => $request->posisi[$i],
                'jangka_kerja' => $request->jangka[$i],
 
        ]);

    } 
   
    // foreach ($jangka as $key => $value) {
    //     // $pengalaman = new Pengalaman();
    //     // DB::table('pengalaman_kerja')->where('pengalaman_kerja.nik','=',$idnik)->update([
    //     //     'nm_perusahaan' => $nama_perusahaan,
    //     //     'posisi' => $posisi,
    //     //     'jangka_kerja' => $jangka
    //     // ]);
    //     // $pengalaman = DB::table('pengalaman_kerja')
    //     // ->whereIn('pengalaman_kerja.id','=',$id)->get();

    //     // $pengalaman->nm_perusahaan = $nama_perusahaan[$key];
    //     // $pengalaman->posisi = $posisi[$key];
    //     // $pengalaman->jangka_kerja = $value;
    //     // $pengalaman->save();

    //     DB::table('pengalaman_kerja')->whereIn('id', $id)->update(array(
    //         'nm_perusahaan' => $nama_perusahaan[$key],
    //         'posisi' => $posisi[$key],
    //         'jangka_kerja' => $value
    //     ));
    //   }

    Session::flash('success_massage','Data Pelamar, berhasil di edit');
    return redirect('/data_pelamar');
}

public function ubahfile($idnik)
    {
      $file = DB::table('upload_file')
      ->where('nik','=',$idnik)->first();
    //   $abc = $pengalaman->id;
    $id = $idnik;

      $no = 0;
      $no++;
      // $fptk = fptk::find($id);
      return view ('ubah-file', compact('abc','file','no','id'));
    }

    public function updatefile(Request $request)
  {
    $id = $request->input('id');

    $cv = $id.'.'.date('dmYHis').'.'.$request->cv->getClientOriginalName();
        $foto = $id.'.'.date('dmYHis').'.'.$request->foto->getClientOriginalName();
        $ktp = $id.'.'.date('dmYHis').'.'.$request->ktp->getClientOriginalName();
        $kk= $id.'.'.date('dmYHis').'.'.$request->kk->getClientOriginalName();
        $ijazah = $id.'.'.date('dmYHis').'.'.$request->ijazah->getClientOriginalName();
        $srt = $id.'.'.date('dmYHis').'.'.$request->srt->getClientOriginalName();
        
        
        $filenamecv = $request->cv->storeAs('public/lampiran', $cv);
        $filenamefoto = $request->foto->storeAs('public/lampiran', $foto);
        $filenamektp = $request->ktp->storeAs('public/lampiran', $ktp);      
        $filenamekk = $request->kk->storeAs('public/lampiran', $kk);
        $filenameijazah = $request->ijazah->storeAs('public/lampiran', $ijazah);
        $filenamesrt = $request->srt->storeAs('public/lampiran', $srt);

        DB::table('upload_file')
        ->where('nik',$request->id)
        ->update([
            'cv' => $cv,
            'foto' => $foto,
            'ktp' => $ktp,
            'kk' => $kk,
            'ijazah' => $ijazah,
            'srt_pengalaman' => $srt
    ]);

    Session::flash('success_massage','Data Pelamar, berhasil di edit');
    return redirect('/data_pelamar');
}

public function proses(Request $request,$idnik)
{
  $file = DB::table('pelamar')
  ->where('nik','=',$idnik)->update(['status_akhir' => '1'
  ]); 
  $carbon = Carbon::today();
  $format = $carbon->format('Y-m-d H:i:s');

  $activity = new Activity();
       $activity->nik = $idnik;
       $activity->id_seleksi = '1';
       $activity->tgl_panggilan = $format;
       $activity->save();

  Session::flash('success_massage','Data FPTK, berhasil di edit');
  return redirect('/data_pelamar');
}
public function unproses(Request $request,$idnik)
{
  $file = DB::table('pelamar')
  ->where('nik','=',$idnik)->update(['status_akhir' => '0'
  ]);  

  Session::flash('success_massage','Data FPTK, berhasil di edit');
  return redirect('/data_pelamar');
}
public function prosesseleksi()
    {
        $no = 0;
        $no++;
        $pelamar = DB::table('activity')
                ->join('pelamar','activity.nik','=','pelamar.nik')
                ->join('jns_tes','activity.id_seleksi','=','jns_tes.id')
                ->join('lowongan','pelamar.id_lowongan','=','lowongan.id')
                ->get();

        return view('prosesseleksi',compact('pelamar','no'));
    }
public function proseleksi($id)
    {
        $no = 0;
        $no++;
        $pelamar = DB::table('activity')
        ->join('pelamar','activity.nik','=','pelamar.nik')
        ->join('jns_tes','activity.id_seleksi','=','jns_tes.id')
        ->join('lowongan','pelamar.id_lowongan','=','lowongan.id')
        ->where('activity.id_seleksi','=',$id)
        ->get();

        return view('proseleksi', compact('pelamar','no'));
    }
    public function pass(Request $request,$id)
    {
      $fptk = fptk::find($id);
    
      $fptk->status = '1';
      $fptk->save();
  
      Session::flash('success_massage','Data FPTK, berhasil di edit');
      return redirect('/home_fptk');
    }
}