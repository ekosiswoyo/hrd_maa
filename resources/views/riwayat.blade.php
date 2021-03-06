 {{-- {{dd($pelamar)}}  --}}
@extends('layouts.header')
@section('css')
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
                <h1>Data Pelamar</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Data FPTK</a>
                    </li>
                    <li class="active">Data Pelamar BPR MAA</li>
                </ol>
            </section>
            <!--section ends-->
            
            <section class="content">
                    
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
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Tanggal Panggilan</th>
                                            <th>Jenis Tes</th>
                                            <th>Hasil</th></th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($pelamar as $views)
                                        <tr> 
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->nama_lowongan}}</td>
                                            <td>{{$views->tgl_panggilan}}</td>
                                            <td>{{$views->nama_tes}}</td>
                                            @if($views->hasil == '0')
                                            <td>Tidak Lulus</td>
                                            @elseif($views->hasil == '1')
                                            <td>Lulus</td>
                                            @else
                                            <td>{{$views->hasil}}</td>
                                            @endif
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