{{--  {{dd($pelamar)}}  --}}
@extends('layouts.header')
@section('css')
{{-- {!! Charts::styles() !!} --}}
<style>
    .dropbtn {
        background-color: #3498DB;
        color: white;
        padding: 7px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }
    
    .dropbtn:hover, .dropbtn:focus {
        background-color: #2980B9;
    }
    
    .dropdown {
        position: relative;
        display: inline-block;
    }
    
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    
    .dropdown a:hover {background-color: #ddd;}
    
    .show {display: block;}
    </style>
@endsection
@section('content')
 <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                    <!--section starts-->
                    <h1>Data Seleksi</h1>
                    <ol class="breadcrumb">
                            <li>
                                    <a href="index.html">
                                        <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Halaman Utama
                                    </a>
                                </li>
                    </ol>
                </section>
        {{--    <section class="content">
                </div>
                             <div class="dropdown">
                            <button onclick="myFunction()" style="float:right;margin-left:33px" class="dropbtn">Pilih Jenis Tes</button>
                              <div id="myDropdown" class="dropdown-content">
                                @foreach ($menu as $nama)
                                <a href="/proses/seleksi/{{$nama->id}}">{{$nama->nama_tes}}</a>
                                @endforeach

                              </div>
                            
                            </div>
                <!-- row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA PELAMAR BPR MAA
                                </h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table2">
                                  
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Jenis Tes</th>
                                            <th>Hasil</th></th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($pelamar as $views)
                                        <tr> 
                                            <td>{{$no++}}</td> 
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->nama_lowongan}}</td>
                                            <td>{{$views->nama_tes}}</td>
                                            <td>{{$views->hasil == '1' ? 'Lulus' : 'Tidak Lulus' }}</td>
                                            <td>{{$views->keterangan}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
               
                
                
                <!-- /.modal ends here -->
            </section> --}}
            <section class="content">
                <div class="row">
                     @foreach ($menu as $nama)
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius">
                           <a href="/proses/seleksi/{{$nama->id}}"> <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 text-right">
                                            <h4 style="color:#fff;">{{$nama->nama_tes}}</h3>
                                            <div class="number" id=""></div>
                                        </div>
                                        <i class="livicon  pull-right" data-name="list-ol" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label" style="color:#fff;">Proses Seleksi</small>
                                            <h4 id="">{{$menu->count()}}</h4>
                                        </div>
                                        
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label" style="color:#fff;">Lolos Seleksi</small>
                                            <h4 id=""></h4>
                                        </div>
                                    </div> --}}
                                </div>
                            </div></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            
        </aside>

       
@endsection
@section('script')
<script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
        
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
        </script>

@endsection
@section('script')
 <script src="path/to/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.1.0/dist/frappe-charts.min.iife.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.6.7/c3.min.js"></script>
@endsection