{{-- {{dd($pelamar)}} --}}
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
                        <a href="/index">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Halaman Utama
                        </a>
                    </li>
                    <li class="active">Data FPTK PELAMAR BPR MAA</li>
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
                                    <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> {{$nama->idfptk}} - {{$nama->grade}} {{$nama->jabatan}}
                                </h3>
                            </div>
                            <div class="panel-body table-responsive">
                                   {{--  <form action="/pelamar/updateall"  style="background: #ffffff;" method="POST"  id="contact">
                                        {{csrf_field()}}
                                         <div class="modal fade in" id="width" tabindex="-1" role="dialog" aria-hidden="false"> --}}
                       {{--  <div class="modal-dialog modal-lg">
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
                                                        </div><label>Gelombang</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="gel" id="gel" placeholder="Gelombang">
                                            </div>
                                                          <div class="form-group"  style="background: #ffffff;">
                                                                <label>Jenis Tes</label>
                                                                <select name="test" class="form-control" title="Jenis Tes" required>
                                                                    
                                                                    @foreach ($tes as $test)
                                                                    <option value="{{$test->id}}">{{$test->nama_tes}}</option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                        <label>Tanggal Tes Panggilan</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="tgl_tes" id="tgl_tes" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                            </div>
                                                        
                                           
                                                   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                                <button type="submit" id="submitContact" form="contact" class="btn btn-primary">Save changes</button>
                                            </div>
                            </div>
                        </div> --}}

                    </div>
                    
                                        {{-- <button type="submit" style="margin-bottom: 10px" class="btn btn-primary delete_all" >Proses Data yang di Pilih</button> --}}
                                       {{--  <a href="/pelamar" style="margin-left:15px;"><button type="button" style="margin-bottom: 10px;" class="btn btn-responsive button-alignment btn-info">Tambah Data Pelamar</button></a> --}}
                                       <a class="btn btn-raised btn-info btn-large openModal" style="margin-left:15px;" data-toggle="modal" data-fptk="{{$nama->idfptk}}" data-href="#fullwidth" href="#fullwidth">Diterima Kerja</a>
                                <table class="table table-striped table-bordered" id="table2">
                                       

                                    <thead>
                                        <tr>
                                            {{-- <th>#</th> --}}
                                            <th>ID.FPTK</th>
                                            <th>ID. Pelamar</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>

                                            <th>Pendidikan Terakhir Pelamar</th>
                                             <th>Pendidikan Terakhir FPTK</th>
                                             <th>Detail Pelamar</th>
                                             <th>Detail FPTK</th>

                                            {{-- <th>Detail</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th> --}}
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($pelamar as $views)
                                        <tr> 
                                            
                                            
                                            {{-- <td><input type="checkbox" name="select[]" value="{{$views->nik}}"></td> --}}
                                            <td>{{$views->idfptk}}</td>
                                            <td>{{$views->idpelamar}}</td>
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->grade}} {{$views->jabatan}}</td>
                                            <td>{{$views->pend_terakhir}}</td>
                                            <td>{{$views->pend}}</td>
                                            <td><a href="/pelamar/{{$views->nik}}/detail"><button type="button" class="btn btn-responsive button-alignment btn-warning">Detail</button></a></td>
                                                 <td><a href="/data-fptk/{{$views->idfptk}}/detail"><button type="button" class="btn btn-responsive button-alignment btn-primary">Detail FPTK</button></a></td>
                                            {{-- <td><a href="/pelamar/{{$views->nik}}/detail"><button type="button" class="btn btn-responsive button-alignment btn-warning">Detail</button></a></td>
 --}}                                            {{-- <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-id="{{$views->nik}}" data-nik="{{$views->nik}}" data-href="#full-width" href="#full-width">Proses FPTK</a></td> --}}
                                            {{-- <td><a href="/pelamar/{{$views->nik}}/proses"><button type="button" class="btn btn-responsive button-alignment btn-warning">Proses</button></a></td> --}}
                                          {{--   <td><a href="/pelamar/{{$views->nik}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                            <td><button type="button" onClick="deleteData({{$views->nik}})"  data-id=" {{$views->nik}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td> --}}
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
                
                 <div class="modal fade in" id="fullwidth" tabindex="-1" role="dialog" aria-hidden="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Diterima Kerja</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{url('pelamar/{id}/kerjafptk')}}" method="POST" id="contactForm">
                                            <input type="hidden" name="fptk" id="fptk" class="modal_hiddenfptk" value="">
    
                                            {{ csrf_field() }}
                                             <label>Pilih Pelamar</label>
                                                <select name="pelamar" class="form-control" title="Pilih FPTK" required>
                                                    
                                                    @foreach ($pelamar as $fptks)
                                                    <option value="{{$fptks->nik}}">{{$fptks->nik}} - {{$fptks->nama}}</option>
                                                    @endforeach
                                                </select>

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
            
        </aside>

       
@endsection

@section('script')
<script>
      $(document).ready(function(){
        $(document).on('click','.openModal',function(){
            $('.modal_hiddenid').val($(this).data('id'))



        });
         $(document).on('click','.openModal',function(){
                $('.modal_hiddenfptk').val($(this).data('fptk'))



            });
      })
       
</script>
@endsection