
@extends('layouts.header')

@section('content')
 <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Data FPTK</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Data FPTK</a>
                    </li>
                    <li class="active">Data Formulir Permintaan Tenaga Kerja</li>
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
                                    <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA FPTK BELUM DI PROSES
                                </h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table2">
                                  
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jabatan/Grade</th>
                                            <th>Divisi</th>
                                            <th>Keperluan</th>
                                            <th>Jumlah SDM</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                            <th>Cetak</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($statusawal as $views)
                                        <tr> 
                                            <td>{{$views->id}}</td>
                                            <td>{{$views->grade}}</td>
                                            <td>{{$views->nama_bagian}}</td>
                                            <td>{{$views->keperluan}}</td>
                                            <td>{{$views->jml_sdm}}</td>
                                            <td><a href="/fptk/{{$views->id}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                            <td><a href="/printfptk/{{$views->id}}"><button type="button" class="btn btn-responsive button-alignment btn-danger">Hapus</button></a></td>
                                            <td><a href="/printfptk/{{$views->id}}"><button type="button" class="btn btn-responsive button-alignment btn-info">Cetak</button></a></td>
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
            <section class="content">
                    <!-- row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable" style="overflow:auto;">
                                <div class="panel-heading" style="background-color: #418bca;border-color: #418bca;">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA FPTK SUDAH DI PROSES
                                    </h3>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table3">
                                      
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Jabatan/Grade</th>
                                                <th>Divisi</th>
                                                <th>Keperluan</th>
                                                <th>Jumlah SDM</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                                <th>Cetak</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>@foreach ($statusakhir as $views)
                                            <tr> 
                                                <td>{{$views->id}}</td>
                                                <td>{{$views->grade}}</td>
                                                <td>{{$views->nama_bagian}}</td>
                                                <td>{{$views->keperluan}}</td>
                                                <td>{{$views->jml_sdm}}</td>
                                                <td><a href="/fptk/{{$views->id}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                                <td><a href="/printfptk/{{$views->id}}"><button type="button" class="btn btn-responsive button-alignment btn-danger">Hapus</button></a></td>
                                                <td><a href="/printfptk/{{$views->id}}"><button type="button" class="btn btn-responsive button-alignment btn-info">Cetak</button></a></td>
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
            <!-- content -->
        </aside>
@endsection