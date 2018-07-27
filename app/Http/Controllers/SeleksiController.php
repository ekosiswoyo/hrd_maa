<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Seleksi;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $view = DB::table('jns_tes')->get();
    $no = 1;
    return view('seleksi', compact('view','no'));
    }
    public function view()
    {
      return view('/seleksibaru');
    }
  
    public function store(Request $request)
    {
        
        $nama = $request->input('nama');
  
        foreach ($nama as $key => $value) {
            $seleksi = new Seleksi();
            
            $seleksi->nama = $value;
            $seleksi->save();
          }

      Session::flash('success_massage','Berhasil disimpan.');
      return redirect('/seleksi');
    }

    public function ubah($id)
    {
        $seleksi = Seleksi::find($id);

      // $fptk = fptk::find($id);
      return view ('ubah-seleksi', compact('seleksi'));
    }

    public function update(Request $request,$id)
    {
    $seleksi = Seleksi::find($id);
  
    $seleksi->nama = $request->nama;
    $seleksi->save();


    Session::flash('success_massage','Data Pelamar, berhasil di edit');
    return redirect('/seleksi');
    }

    public function destroy($id)
    {
        $seleksi = Seleksi::findOrFail($id);

        seleksi::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
        
    }
}

