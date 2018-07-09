
@extends('layouts.header')

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
                                    <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Data Pelamar BPR MAA
                                </h3>
                            </div>
                           
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table2">
                                        <a href="/pelamar" style="margin-left:15px;"><button type="button" class="btn btn-responsive button-alignment btn-info">Tambah Data Pelamar</button></a>
                                    <thead>
                                            
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat,Tanggal Lahir</th>
                                            <th>Posisi</th>
                                            <th>Tanggal Masuk Lamaran</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($view as $views)
                                        <tr>
                                            <td>{{$no++}}</td> 
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->tempat_lahir}},{{$views->tanggal_lahir}}</td>
                                            <td>{{$views->nama_lowongan}}</td>
                                            <td>{{$views->tgl_masuk_lamaran}}</td>
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