
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
                                <form action="/data-fptk/proses/" method="POST">
                                    {{csrf_field()}}
                                    <button type="submit" style="margin-bottom: 10px" class="btn btn-primary delete_all" >Proses Data yang di Pilih</button>

                                <table class="table table-striped table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Jabatan/Grade</th>
                                            <th>Divisi</th>
                                            <th>Keperluan</th>
                                            <th>Jumlah SDM</th>
                                            <th>Tanggal ACC</th>
                                            <th>Status ACC</th>
                                            <th>Keterangan</th>
                                            <th>ACC</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                            <th>Cetak</th>
                                            {{-- <th>Proses</th> --}}
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($statusawal as $views)
                                        <tr> 
                                            <td><input type="checkbox" name="check[]" class="sub_chk" value="{{$views->id}}"></td>
                                            <td>{{$views->grade}}</td>
                                            <td>{{$views->nama_bagian}}</td>
                                            <td>{{$views->keperluan}}</td>
                                            <td>{{$views->jml_sdm}}</td>
                                            <td>{{$views->tgl_acc}}</td>
                                            <td>{{$views->status_acc == '1' ? 'ACC' : 'Tidak ACC' }}</td>
                                            <td>{{$views->keterangan_acc}}</td>
                                            <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-id="{{$views->id}}" data-nik="{{$views->id}}" data-href="#full-width" href="#full-width">Hasil</a></td>
                                            <td><a href="/data-fptk/{{$views->id}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                            <td><button type="button" onClick="deleteData({{$views->id}})"  data-id=" {{$views->id}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
                                            <td><a href="/printfptk/{{$views->id}}"><button type="button" class="btn btn-responsive button-alignment btn-info">Cetak</button></a></td>
                                            {{-- <td><form method="post" > {{csrf_field()}}<a href="/data-fptk/{{$views->id}}/proses"><button type="button" class="btn btn-responsive button-alignment btn-danger">Proses</button></a></form></td> --}}
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
                                    <h4 class="modal-title">Hasil FPTK</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="{{url('fptk/proses/update')}}" method="POST" id="contactForm">
                                        <input type="hidden" name="id" id="id" class="modal_hiddenid" value="">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                                <label for="keperluan">Hasil</label><br>

                                                <label class="radio-inline" for="keperluan-0">
                                                    <input type="radio" onclick="document.getElementById('selectbasic').disabled = false;" name="hasil" id="hasil-0" value="1" required>
                                                    ACC
                                                </label> 
                                                <label class="radio-inline" for="hasil-1">
                                                    <input type="radio" name="hasil" id="hasil-1" value="0"  onclick="document.getElementById('selectbasic').disabled = true;" >
                                                    Tidak ACC
                                                </label>
                                            </div>
                                        <div class="form-group ui-draggable-handle" style="position: static;"><label for="jabatan">Keterangan</label>
                                            <input type="text" class="form-control ket" id="ket" name="ket" value="">
                                        </div>
                                        <label>Tanggal ACC</label>
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
                
                
                <!-- /.modal ends here -->
            </section>
            <section class="content">
                    <!-- row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable" style="overflow:auto;">
                                <div class="panel-heading" style="background-color: #418bca;border-color: #418bca;">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA FPTK DALAM PROSES
                                    </h3>
                                </div>
                                <div class="panel-body table-responsive">
                                        <form action="/data-fptk/selesai/" method="POST">
                                            {{csrf_field()}}
                                            <button type="submit" style="margin-bottom: 10px" class="btn btn-primary delete_all" >Proses Data yang di Pilih</button>
                                    <table class="table table-striped table-bordered" id="table3">
                                      
                                        <thead>
                                            <tr>
                                                <th>#</th>
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
                                                <td><input type="checkbox" name="selesai[]" class="sub_chk" value="{{$views->id}}"></td>
                                                <td>{{$views->grade}}</td>
                                                <td>{{$views->nama_bagian}}</td>
                                                <td>{{$views->keperluan}}</td>
                                                <td>{{$views->jml_sdm}}</td>
                                                <td><a href="/data-fptk/{{$views->id}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                                <td><button type="button" onClick="deleteData({{$views->id}})"  data-id="{{$views->id}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
                                                <td><a href="/printfptk/{{$views->id}}"><button type="button" class="btn btn-responsive button-alignment btn-info">Cetak</button></a></td>
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

            <section class="content">
                    <!-- row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable" style="overflow:auto;">
                                <div class="panel-heading" style="background-color: #418bca;border-color: #418bca;">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA FPTK SUDAH SELESAI
                                    </h3>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table4">
                                      
                                        <thead>
                                            <tr>
                                                <th>Nama Jabatan/Grade</th>
                                                <th>Divisi</th>
                                                <th>Keperluan</th>
                                                <th>Jumlah SDM</th>
                                                <th>Ubah</th>
                                                <th>Hapus</th>
                                                <th>Cetak</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>@foreach ($akhir as $views)
                                            <tr> 
                                                <td>{{$views->grade}}</td>
                                                <td>{{$views->nama_bagian}}</td>
                                                <td>{{$views->keperluan}}</td>
                                                <td>{{$views->jml_sdm}}</td>
                                                <td><a href="/data-fptk/{{$views->id}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                                <td><button type="button" onClick="deleteData({{$views->id}})"  data-id="{{$views->id}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
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
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.openModal',function(){
            $('.modal_hiddenid').val($(this).data('id'))



        });
      })
    {{-- $(document).ready(function(){
        $(document).on('click','.sub_chk',function(){
            $('.sub_chk').val($(this).data('id'))



        });
      }) --}}
    function deleteData(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: 'Apakah anda yakin?',
            text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!'
        },function () {
            $.ajax({
                url : "{{ url('data-fptk/deleteData') }}" + '/' + id,
                type : "POST",
                data : {'_method' : 'DELETE', '_token' : csrf_token},
                success : function(data) {
                    swal({
                        title: 'Success!',
                        text: data.message,
                        type: 'success',
                        timer: '1500'
                    })
                    window.location.reload()
                },
                error : function () {
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
        });
      }
</script>

@endsection