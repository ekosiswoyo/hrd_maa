 {{--  {{dd($pelamar)}}  --}}
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
                    <div class="dropdown">
                            <button onclick="myFunction()" style="float:right;margin-left:33px" class="dropbtn">Pilih Jenis Tes</button>
                              <div id="myDropdown" class="dropdown-content">
                                @foreach (App\Models\Seleksi::get() as $nama)
                                <a href="/proses/seleksi/{{$nama->id}}">{{$nama->nama_tes}}</a>
                                @endforeach

                              </div>
                            
                            </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable" style="overflow:auto;">
                                <div class="panel-heading" style="background-color: #418bca;border-color: #418bca;">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA PELAMAR PROSES SELEKSI                                   </h3>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table3">
                                      
                                            <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Posisi</th>
                                                        <th>Jenis Tes</th>
                                                        <th>Keterangan</th></th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody>@foreach ($proses as $views)
                                                    <tr> 
                                                        <td>{{$no++}}</td> 
                                                        <td>{{$views->nik}}</td>
                                                        <td>{{$views->nama}}</td>
                                                        <td>{{$views->nama_lowongan}}</td>
                                                        <td>{{$views->nama_tes}}</td>
                                                        <td>Belum Tes</td>
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
            <section class="content">
                   
                <!-- row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success filterable" style="overflow:auto;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA PELAMAR LOLOS SELEKSI
                                </h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table2">
                                  
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Jenis Tes</th>
                                            <th>Hasil</th></th>
                                            <th>Keterangan</th>
                                            <th>Lulus</th>
                                            {{--  <th>Tidak Lulus</th>  --}}
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($hasil as $views)
                                        <tr> 
                                            <td>{{$no++}}</td> 
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->nama_lowongan}}</td>
                                            <td>{{$views->nama_tes}}</td>
                                            <td>{{$views->hasil == '1' ? 'Lulus' : 'Tidak Lulus' }}</td>
                                            <td>{{$views->keterangan}}</td>
                                            <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-id="{{$views->id_ac}}" data-nik="{{$views->nik}}" data-href="#full-width" href="#full-width">Hasil</a></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
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
                                    <h4 class="modal-title">Full Width</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="{{url('proses/seleksi/update')}}" method="POST" id="contactForm">
                                        <input type="hidden" name="id" id="id" class="modal_hiddenid" value="">
                                        <input type="hidden" name="nik" id="nik" class="modal_hiddennik" value="">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                                <label for="keperluan">Hasil</label><br>

                                                <label class="radio-inline" for="keperluan-0">
                                                    <input type="radio" onclick="document.getElementById('selectbasic').disabled = false;" name="hasil" id="hasil-0" value="1" required>
                                                    Lulus
                                                </label> 
                                                <label class="radio-inline" for="hasil-1">
                                                    <input type="radio" name="hasil" id="hasil-1" value="0"  onclick="document.getElementById('selectbasic').disabled = true;" >
                                                    Tidak Lulus
                                                </label>
                                            </div>
                                        <div class="form-group ui-draggable-handle" style="position: static;"><label for="jabatan">Keterangan</label>
                                            <input type="text" class="form-control ket" id="ket" name="ket" value="">
                                        </div>
                                        <label for="jabatan">Seleksi Selanjutnya</label>
                                            <select id="selectbasic" name="selectbasic" class="form-control">
                                                @foreach (App\Models\Seleksi::get() as $nama)
                                                <option value="{{$nama->id}}">{{$nama->nama_tes}}</option>
                                                @endforeach
                                              </select>
                                        <label>Tanggal Tes</label>
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
            <section class="content">
                    <!-- row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable" style="overflow:auto;">
                                <div class="panel-heading" style="background-color: #418bca;border-color: #418bca;">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA PELAMAR TIDAK LOLOS SELEKSI                                    </h3>
                                </div>
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table3">
                                      
                                            <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Posisi</th>
                                                        <th>Jenis Tes</th>
                                                        <th>Hasil</th></th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody>@foreach ($pelamar as $views)
                                                    <tr> 
                                                        <td>{{$no++}}</td> 
                                                        <td>{{$views->nik}}</td>
                                                        <td>{{$views->nama}}</td>
                                                        <td>{{$views->nama_lowongan}}</td>
                                                        <td>{{$views->nama_tes}}</td>
                                                        <td>{{$views->hasil == '1' ? 'Lulus' : 'Tidak Lulus' }}</td>
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
<script>
        $(document).ready(function(){
            $(document).on('click','.openModal',function(){
                $('.modal_hiddenid').val($(this).data('id'))
                $('.modal_hiddennik').val($(this).data('nik'))



            });
          })

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