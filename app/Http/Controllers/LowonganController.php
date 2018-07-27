<?php

namespace App\Http\Controllers;
use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\lowongan;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $view = DB::table('lowongan')->get();
    $no = 1;
    return view('lowongan', compact('view','no'));
    }
    public function view()
    {
      return view('/lowonganbaru');
    }
  
    public function store(Request $request)
    {
        
        $nama = $request->input('nama');
  
        foreach ($nama as $key => $value) {
            $lowongan = new Lowongan();
            
            $lowongan->nama_lowongan = $value;
            $lowongan->save();
          }

      Session::flash('success_massage','Berhasil disimpan.');
      return redirect('/lowongan');
    }

    public function ubah($id)
    {
        $lowongan = lowongan::find($id);

      // $fptk = fptk::find($id);
      return view ('ubah-lowongan', compact('lowongan'));
    }

    public function update(Request $request,$id)
    {
    $lowongan = lowongan::find($id);
  
    $lowongan->nama_lowongan = $request->nama;
    $lowongan->save();


    Session::flash('success_massage','Data Pelamar, berhasil di edit');
    return redirect('/lowongan');
    }

    public function destroy($id)
    {
        $lowongan = lowongan::findOrFail($id);

        lowongan::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
        
    }
}
