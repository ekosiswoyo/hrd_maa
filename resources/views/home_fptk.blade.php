{{dd($view)}}
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
                                    <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Re-order Columns
                                </h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table2">
                                    @foreach ($view as $views)
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama yang Mengajukan</th>
                                            <th>Jumlah SDM</th>
                                            <th>Keperluan</th>
                                            <th>Cetak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$views->id}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td></td>
                                            <td>
                                                JacobThornton
                                            </td>
                                            <td>
                                                JacobThornton@test.com
                                            </td>
                                        </tr>
                                        
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