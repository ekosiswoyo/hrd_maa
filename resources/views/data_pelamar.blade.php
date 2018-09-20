
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
                                    <form action="/pelamar/updateall"  style="background: #ffffff;" method="POST"  id="contact">
                                        {{csrf_field()}}
                                         <div class="modal fade in" id="width" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Proses FPTK</h4>
                                            </div>
                                            <div class="modal-body">
                                                    <input type="hidden" name="nikfptk" id="nikfptk" class="modal_nik" value="">

                                                        {{ csrf_field() }}
                                                        <div class="form-group"  style="background: #ffffff;">
                                                                <label>Pilih FPTK</label>
                                                                <select name="fptk" class="form-control" title="Pilih FPTK" required>
                                                                    
                                                                    @foreach ($fptk as $fptks)
                                                                    <option value="{{$fptks->id}}">{{$fptks->id}} - {{$fptks->grade}} {{$fptks->jabatan}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                          <div class="form-group"  style="background: #ffffff;">
                                                                <label>Jenis Tes</label>
                                                                <select name="test" class="form-control" title="Jenis Tes" required>
                                                                    
                                                                    @foreach ($tes as $test)
                                                                    <option value="{{$test->id}}">{{$test->nama_tes}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                                <button type="submit" id="submitContact" form="contact" class="btn btn-primary">Save changes</button>
                                            </div>
                            </div>
                        </div>

                    </div>
                    <a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-href="#width" href="#width">Proses data yang di Pilih</a>
                                        {{-- <button type="submit" style="margin-bottom: 10px" class="btn btn-primary delete_all" >Proses Data yang di Pilih</button> --}}
                                        <a href="/pelamar" style="margin-left:15px;"><button type="button" style="margin-bottom: 10px;" class="btn btn-responsive button-alignment btn-info">Tambah Data Pelamar</button></a>
                                <table class="table table-striped table-bordered" id="table2">
                                       

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat,Tanggal Lahir</th>
                                            <th>Posisi</th>
                                            <th>Tanggal Masuk Lamaran</th>
                                            <th>Pendidikan</th>
                                            <th>Detail</th>
                                            {{-- <th>Proses FPTK</th> --}}
                                            {{-- <th>Proses</th> --}}
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($view as $views)
                                        <tr> 
                                            
                                            
                                            <td><input type="checkbox" name="select[]" value="{{$views->nik}}"></td>
                                            <td>{{$views->idpelamar}}</td>
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->tempat_lahir}},{{$views->tanggal_lahir}}</td>
                                            <td>{{$views->nama_lowongan}}</td>
                                            <td>{{$views->tgl_masuk_lamaran}}</td> 
                                            <td>{{$views->pend_terakhir}}</td>
                                            <td><a href="/pelamar/{{$views->nik}}/detail"><button type="button" class="btn btn-responsive button-alignment btn-warning">Detail</button></a></td>
                                            {{-- <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-id="{{$views->nik}}" data-nik="{{$views->nik}}" data-href="#full-width" href="#full-width">Proses FPTK</a></td> --}}
                                            {{-- <td><a href="/pelamar/{{$views->nik}}/proses"><button type="button" class="btn btn-responsive button-alignment btn-warning">Proses</button></a></td> --}}
                                            <td><a href="/pelamar/{{$views->nik}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                            <td><button type="button" onClick="deleteData({{$views->nik}})"  data-id=" {{$views->nik}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
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
                
                <div class="modal fade in" id="full-width" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Proses FPTK</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="{{url('data_pelamar/proses')}}"  style="background: #ffffff;" method="POST" id="contact">
                                        <input type="hidden" name="id" id="id" class="modal_hiddenid" value="">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                                <label>Pilih FPTK</label>
                                                <select name="fptk" class="form-control" title="Pilih FPTK" required>
                                                    
                                                    @foreach ($fptk as $fptks)
                                                    <option value="{{$fptks->id}}">{{$fptks->id}} - {{$fptks->grade}} {{$fptks->jabatan}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                       
                                  </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                    <button type="submit" id="submitContact" form="contact" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
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
                                        <form action="/pelamar/unproses" method="POST" id="unproses">
                                            {{csrf_field()}}
                                            <div class="modal fade in" id="unproses" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Proses FPTK</h4>
                                            </div>
                                            <div class="modal-body">
                                                    <input type="hidden" name="id" id="id" class="modal_hiddenid" value="">

                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                <label for="keperluan">Keterangan</label><br>

                                                <label class="radio-inline" for="keperluan-0">
                                                    <input type="radio" onclick="document.getElementById('selectbasic').disabled = false;document.getElementById('test').disabled = false;" name="keterangan" id="hasil-0" value="3" required>
                                                    Pindah
                                                </label> 
                                                <label class="radio-inline" for="hasil-1">
                                                    <input type="radio" name="keterangan" id="hasil-1" value="2"  onclick="document.getElementById('selectbasic').disabled = true;document.getElementById('test').disabled = true;" >
                                                    UnProses
                                                </label>
                                            </div>
                                        
                                        <label for="jabatan">Pilih FPTK Baru</label>
                                            <select id="selectbasic" name="selectbasic" class="form-control">
                                                @foreach ($fptk as $nama)
                                                <option value="{{$nama->id}}">{{$nama->id}} - {{$nama->grade}} {{$nama->jabatan}}</option>
                                                @endforeach
                                              </select>

                                              <label>Jenis Tes</label>
                                                                <select name="test" id="test" class="form-control" title="Jenis Tes" required>
                                                                    
                                                                    @foreach ($tes as $test)
                                                                    <option value="{{$test->id}}">{{$test->nama_tes}}</option>
                                                                    @endforeach
                                                                </select>
                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                                <button type="submit" id="submitContact" form="unproses" class="btn btn-primary">Save changes</button>
                                            </div>
                            </div>
                        </div>

                    </div>
                    <a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-href="#unproses" href="#unproses">Proses data yang di Pilih</a>
                                           {{--  <button type="submit" style="margin-bottom: 10px" class="btn btn-primary delete_all" >UnProses Data yang di Pilih</button> --}}
                                    <table class="table table-striped table-bordered" id="table4">
                                      
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Id</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        {{-- <th>Tempat,Tanggal Lahir</th> --}}
                                                        <th>Posisi</th>
                                                        <th>FPTK</th>
                                                        <th>Pendidikan</th>
                                                        {{--  <th>Tanggal Masuk Lamaran</th>  --}}
                                                        <th>Detail</th>
                                                        {{-- <tH>Pindah</th> --}}
                                                        <th>Ubah</th>
                                                        <th>Hapus</th>
                                                        <th>Riwayat</th>
                                                        <th>Diterima</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>@foreach ($status as $views)
                                            <tr>
                                                <td><input type="checkbox" name="check[]" class="sub_chk" value="{{$views->nik}}"></td>
                                                                                            <td>{{$views->idpelamar}}</td>

                                                <td>{{$views->nik}}</td>
                                                <td>{{$views->nama}}</td>
                                                {{-- <td>{{$views->tempat_lahir}},{{$views->tanggal_lahir}}</td> --}}
                                                <td>{{$views->nama_lowongan}}</td>
                                                <td>{{$views->id}} - {{$views->grade}} {{$views->jabatan}}</td>
                                                <td>{{$views->pend_terakhir}}</td>

                                                {{--  <td>{{$views->tgl_masuk_lamaran}}</td>  --}}
                                                <td><a href="/pelamar/{{$views->nik}}/detail"><button type="button" class="btn btn-responsive button-alignment btn-warning">Detail</button></a></td>
                                                {{-- <td><a href="/pelamar/{{$views->nik}}/unproses"><button type="button" class="btn btn-responsive button-alignment btn-warning">UnProses</button></a></td> --}}
                                                {{-- <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-id="{{$views->nik}}" data-nik="{{$views->nik}}" data-href="#fullwidth" href="#fullwidth">Pindah</a></td>  --}}
                                                <td><a href="/pelamar/{{$views->nik}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                                <td><button type="button" onClick="deleteData({{$views->nik}})"  data-id=" {{$views->nik}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
                                                <td><a href="/riwayat/{{$views->nik}}"><button type="button" class="btn btn-responsive button-alignment btn-warning">Riwayat</button></a></td>
                                                {{--  <td><a href="/pelamar/{{$views->nik}}/kerja"><button type="button" class="btn btn-responsive button-alignment btn-primary">Diterima</button></a></td>  --}}
                                                <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-nik="{{$views->nik}}" data-href="#full-width" href="#fullwidth">Diterima</a></td>
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
                    <div class="modal fade in" id="fullwidth" tabindex="-1" role="dialog" aria-hidden="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Diterima Kerja</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{url('pelamar/{id}/kerja')}}" method="POST" id="contactForm">
                                            <input type="hidden" name="nik" id="nik" class="modal_hiddennik" value="">
    
                                            {{ csrf_field() }}
                                            
                                            <label>Tanggal Masuk Kerja</label>
                                            <div class="form-group">
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
            <section class="content">
                    <!-- row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable" style="overflow:auto;">
                                <div class="panel-heading" style="background-color: #418bca;border-color: #418bca;">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA PELAMAR DITERIMA KERJA</h3>
                                </div>
                                <div class="panel-body table-responsive">
                                       
                                    <table class="table table-striped table-bordered" id="table6">
                                      
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tempat,Tanggal Lahir</th>
                                                        <th>Posisi</th>
                                                        <th>Pendidikan</th>
                                                        <th>Tanggal Masuk Lamaran</th> 
                                                        <th>Tanggal di Terima </th>
                                                        <th>Ubah</th>
                                                        <th>Hapus</th>
                                                        <th>Riwayat</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>@foreach ($akhir as $views)
                                            <tr>
                                                                                            <td>{{$views->idpelamar}}</td>

                                                <td>{{$views->nik}}</td>
                                                <td>{{$views->nama}}</td>
                                                <td>{{$views->tempat_lahir}},{{$views->tanggal_lahir}}</td>
                                                <td>{{$views->nama_lowongan}}</td>
                                                <td>{{$views->pend_terakhir}}</td>

                                                 <td>{{$views->tgl_masuk_lamaran}}</td> 
                                                 <td>{{$views->tgl_masuk_kerja}}</td>
                                                <td><a href="/pelamar/{{$views->nik}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                                <td><button type="button" onClick="deleteData({{$views->nik}})"  data-id=" {{$views->nik}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
                                                <td><a href="/riwayat/{{$views->nik}}"><button type="button" class="btn btn-responsive button-alignment btn-warning">Riwayat</button></a></td>
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
              {{--       <div class="modal fade in" id="full-width" tabindex="-1" role="dialog" aria-hidden="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Diterima Kerja</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{url('pelamar/{id}/kerja')}}" method="POST" id="contactForm">
                                            <input type="hidden" name="nik" id="nik" class="modal_hiddennik" value="">
    
                                            {{ csrf_field() }}
                                            
                                            <label>Tanggal Masuk Kerja</label>
                                            <div class="form-group">
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
                        </div> --}}
                   
                    
                    
                    <!-- /.modal ends here -->
                </section>
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