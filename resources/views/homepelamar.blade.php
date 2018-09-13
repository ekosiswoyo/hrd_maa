
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
                        <a href="/index">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Halaman Utama
                        </a>
                    </li>
                    <li class="active">Data Pelamar BPR MAA</li>
                </ol>
            </section>
            <!--section ends-->
            {{--  <section class="content">
                <!-- row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA FPTK DALAM PROSES
                                </h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table4">
                                  
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jabatan/Grade</th>
                                            <th>Divisi</th>
                                            <th>Keperluan</th>
                                            <th>Bagian</th>
                                            {{-- <th>Ubah</th> --}}
                                           {{--  <th>Cetak</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($statusakhir as $views)
                                        <tr> 
                                            <td>{{$views->id}}</td>
                                            <td>{{$views->grade}} {{$views->jabatan}}</td>
                                            <td>{{$views->nama_bagian}}</td>
                                            <td>{{$views->keperluan}}</td>
                                            <td>{{$views->bagian}}</td>
                                            <td><a href="/data-fptk/{{$views->id}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                            <td><button type="button" onClick="deleteData({{$views->id}})"  data-id=" {{$views->id}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
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
            </section> --}}
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
                                            <th>ID. FPTK</th>
                                            <th>Tempat,Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pendidikan</th>
                                            <th>Detail</th>
                                            <th>Riwayat</th>
                                            {{-- <th>Posisi</th> --}}
                                           
                                            {{-- <th>Proses FPTK</th> --}}
                                            {{-- <th>Proses</th> --}}
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($pelamar as $views)
                                        <tr> 
                                            
                                            
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->id_fptk}}</td>
                                            <td>{{$views->tempat_lahir}},{{$views->tanggal_lahir}}</td>
                                            <td>{{$views->jns_kel}}</td>
                                            <td>{{$views->pend}}</td>
                                            <td><a href="/pelamar/{{$views->nik}}/detail"><button type="button" class="btn btn-responsive button-alignment btn-warning">Detail</button></a></td>
                                            <td><a href="/riwayat/{{$views->nik}}"><button type="button" class="btn btn-responsive button-alignment btn-primary">Riwayat</button></a></td>
                                            {{-- <td>{{$views->nama_lowongan}}</td> --}}
                                            
                                            {{-- <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-id="{{$views->nik}}" data-nik="{{$views->nik}}" data-href="#full-width" href="#full-width">Proses FPTK</a></td> --}}
                                            {{-- <td><a href="/pelamar/{{$views->nik}}/proses"><button type="button" class="btn btn-responsive button-alignment btn-warning">Proses</button></a></td> --}}
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
                
                
                
                
                <!-- /.modal ends here -->
            </section>
            
            <!-- content -->
           
            <!-- content -->
        </aside>

       
@endsection

@section('script')
<script>
      $(document).ready(function(){
        $(document).on('click','.openModal',function(){
            $('.modal_hiddenid').val($(this).data('id'))



        });
         $(document).on('click','.openModal',function(){
                $('.modal_hiddennik').val($(this).data('nik'))



            });
      })
       
</script>
@endsection