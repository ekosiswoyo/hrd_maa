
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
                                            <th>Tempat,Tanggal Lahir</th>
                                            <th>Posisi</th>
                                            <th>Tanggal Masuk Lamaran</th>
                                            <th>Proses</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
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
                                            <td><a href="/pelamar/{{$views->nik}}/proses"><button type="button" class="btn btn-responsive button-alignment btn-warning">Proses</button></a></td>
                                            <td><a href="/pelamar/{{$views->nik}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                            <td><button type="button" onClick="deleteData({{$views->nik}})"  data-id=" {{$views->nik}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
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
                                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA PELAMAR BPR MAA PROSES SELEKSI                                    </h3>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table3">
                                      
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tempat,Tanggal Lahir</th>
                                                        <th>Posisi</th>
                                                        {{--  <th>Tanggal Masuk Lamaran</th>  --}}
                                                        <th>UnProses</th>
                                                        <th>Ubah</th>
                                                        <th>Hapus</th>
                                                        <th>Riwayat</th>
                                                        <th>Diterima</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>@foreach ($status as $views)
                                            <tr>
                                                <td>{{$no++}}</td> 
                                                <td>{{$views->nik}}</td>
                                                <td>{{$views->nama}}</td>
                                                <td>{{$views->tempat_lahir}},{{$views->tanggal_lahir}}</td>
                                                <td>{{$views->nama_lowongan}}</td>
                                                {{--  <td>{{$views->tgl_masuk_lamaran}}</td>  --}}
                                                <td><a href="/pelamar/{{$views->nik}}/unproses"><button type="button" class="btn btn-responsive button-alignment btn-warning">UnProses</button></a></td>
                                                <td><a href="/pelamar/{{$views->nik}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                                <td><button type="button" onClick="deleteData({{$views->nik}})"  data-id=" {{$views->nik}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
                                                <td><a href="/riwayat/{{$views->nik}}"><button type="button" class="btn btn-responsive button-alignment btn-warning">Riwayat</button></a></td>
                                                {{--  <td><a href="/pelamar/{{$views->nik}}/kerja"><button type="button" class="btn btn-responsive button-alignment btn-primary">Diterima</button></a></td>  --}}
                                                <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-nik="{{$views->nik}}" data-href="#full-width" href="#full-width">Diterima</a></td>
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
                    <div class="modal fade in" id="full-width" tabindex="-1" role="dialog" aria-hidden="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Full Width</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{url('pelamar/{id}/kerja')}}" method="POST" id="contactForm">
                                            <input type="hidden" name="nik" id="nik" class="modal_hiddennik" value="">
    
                                            {{ csrf_field() }}
                                            
                                            <label>Tanggal Masuk Kerja</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                                </div>
                                                <input type="text" class="form-control" name="tgl" id="tgl" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                            </div>
                                           
                                      </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                        <button type="submit" id="submitContact" form="contactForm" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    
                    
                    <!-- /.modal ends here -->
                </section>
            <!-- content -->
            
        </aside>

       
@endsection

@section('script')
<script>
        $(document).ready(function(){
            $(document).on('click','.openModal',function(){
                $('.modal_hiddennik').val($(this).data('nik'))



            });
          })
</script>
@endsection