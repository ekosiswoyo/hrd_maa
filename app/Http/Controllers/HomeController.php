<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\fptk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fptk = DB::table('fptk')->where('status','=',0)->get();
        $proses = DB::table('fptk')->where('status','=',1)->get();
        $selesai = DB::table('fptk')->where('status','=',2)->get();
        $pelamar = DB::table('pelamar')->where('status_akhir','=',0)->get();
        $pelamarproses = DB::table('pelamar')->where('status_akhir','=',1)->get();
        $pelamarselesai = DB::table('pelamar')->where('status_akhir','=',2)->get();

        return view('index',compact('fptk','proses','selesai','pelamar','pelamarproses','pelamarselesai'));
    }
}
