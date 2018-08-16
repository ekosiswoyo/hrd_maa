
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
                    <li class="active">Data Lowongan</li>
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
                                    <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Data Lowongan BPR MAA
                                </h3>
                            </div>
                           
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table2">
                                        <a href="/tambahlowongan" style="margin-left:15px;"><button type="button" class="btn btn-responsive button-alignment btn-info">Tambah Data Lowongan</button></a>
                                    <thead>
                                            
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lowongan</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($view as $views)
                                        <tr>
                                            <td>{{$no++}}</td> 
                                            <td>{{$views->nama_lowongan}}</td>
                                            <td><a href="/lowongan/{{$views->id}}/ubah"><button type="button" class="btn btn-responsive button-alignment btn-primary">Ubah</button></a></td>
                                            <td><button type="button" onClick="deleteData({{$views->id}})"  data-id=" {{$views->id}}" class="btn btn-responsive button-alignment btn-danger">Hapus</button></td>
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
<script type="text/javascript">
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
                url : "{{ url('lowongan/deleteData') }}" + '/' + id,
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