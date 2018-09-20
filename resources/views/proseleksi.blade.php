  {{-- {{dd($hasil)}}  --}}
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
                <h1>Data Seleksi</h1>
                <ol class="breadcrumb">
                        <li>
                                <a href="index.html">
                                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Halaman Utama
                                </a>
                            </li>
                    <li class="active">Proses Seleksi</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                    <!-- row-->
                    <div class="dropdown">
                            <button onclick="myFunction()" style="float:right;margin-left:33px" class="dropbtn">Pilih Jenis Tes</button>
                              <div id="myDropdown" class="dropdown-content">
                                @foreach ($menu as $nama)
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
                                    <table class="table table-striped table-bordered" id="table6">
                                      
                                            <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                       
                                                        <th>Posisi</th>
                                                         <th>ID. FPTK</th>
                                                        <th>Jenis Tes</th>
                                                        <th>Keterangan</th></th>
                                                        <th>Tanggal Panggilan</th>
                                                        <th>Hasil</th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody>@foreach ($proses as $views)
                                                    <tr> 
                                                        <td>{{$no++}}</td> 
                                                        <td>{{$views->nik}}</td>
                                                        <td>{{$views->nama}}</td>
                                                       
                                                        <td>{{$views->nama_lowongan}}</td>
                                                         <td>{{$views->id_fptk}}</td>
                                                        <td>{{$views->nama_tes}}</td>
                                                        <td>Belum Tes</td>
                                                        {{date('d-m-Y', strtotime($views->tgl_panggilan))}}
                                                        <td><a class="btn btn-raised btn-info btn-large openModal" data-toggle="modal" data-id="{{$views->id_ac}}" data-nik="{{$views->nik}}" data-fptk="{{$views->id_fptk}}" data-href="#full-width" href="#full-width">Hasil</a></td>

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
                                            <th>ID. FPTK</th>
                                            <th>Jenis Tes</th>
                                            <th>Hasil</th></th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Tes</th>
                                            <th>Tanggal Panggilan Tes Selanjutnya</th>
                                            {{--  <th>Lulus</th>  --}}
                                            {{--  <th>Tidak Lulus</th>  --}}
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($hasil as $views)
                                        <tr> 
                                            <td>{{$no++}}</td> 
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->nama_lowongan}}</td>
                                             <td>{{$views->id_fptk}}</td>
                                            <td>{{$views->nama_tes}}</td>
                                            <td>{{$views->hasil == '1' ? 'Lulus' : 'Tidak Lulus' }}</td>
                                            <td>{{$views->keterangan}}</td>

                                            <td>{{date('d-m-Y', strtotime($views->tanggal))}}</td>
                                            <td>{{date('d-m-Y', strtotime($views->tgl_panggilan))}}</td>

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
                                    <h4 class="modal-title">Hasil Seleksi</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" action="{{url('proses/seleksi/update')}}" method="POST" id="contactForm">
                                        <input type="hidden" name="id" id="id" class="modal_hiddenid" value="">
                                        <input type="hidden" name="nik" id="nik" class="modal_hiddennik" value="">
                                         <input type="hidden" name="fptk" id="fptk" class="modal_hiddenfptk" value="">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Tanggal Tes dilakukan</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="tgl" id="tgl" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                        </div>
                                       
                                                <label for="keperluan">Hasil</label><br>

                                                <label class="radio-inline" for="keperluan-0">
                                                    <input type="radio" onclick="document.getElementById('selectbasic').disabled = false;document.getElementById('tgl_panggilan').disabled = false;" name="hasil" id="hasil-0" value="1" required>
                                                    Lulus
                                                </label> 
                                                <label class="radio-inline" for="hasil-1">
                                                    <input type="radio" name="hasil" id="hasil-1" value="0"  onclick="document.getElementById('selectbasic').disabled = true;document.getElementById('tgl_panggilan').disabled = true;" >
                                                    Tidak Lulus
                                                </label>
                                            </div>
                                        <div class="form-group ui-draggable-handle" style="position: static;"><label for="jabatan">Keterangan</label>
                                            <input type="text" class="form-control ket" id="ket" name="ket" value="">
                                        </div>
                                        <label for="jabatan">Seleksi Selanjutnya</label>
                                            <select id="selectbasic" name="selectbasic" class="form-control">
                                                @foreach ($menu as $nama)
                                                <option value="{{$nama->id}}">{{$nama->nama_tes}}</option>
                                                @endforeach
                                              </select>
                                               <label>Tanggal Panggilan Tes Selanjutnya</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="tgl_panggilan" id="tgl_panggilan" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
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
                                    <table class="table table-striped table-bordered" id="table4">
                                      
                                            <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Posisi</th>
                                                        <th>ID. FPTK</th>
                                                        <th>Jenis Tes</th>
                                                        <th>Hasil</th></th>
                                                        <th>Tanggal Panggilan</th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody>@foreach ($pelamar as $views)
                                                    <tr> 
                                                        <td>{{$no++}}</td> 
                                                        <td>{{$views->nik}}</td>
                                                        <td>{{$views->nama}}</td>
                                                        <td>{{$views->nama_lowongan}}</td>
                                                         <td>{{$views->id_fptk}}</td>
                                                        <td>{{$views->nama_tes}}</td>
                                                        <td>{{$views->hasil == '1' ? 'Lulus' : 'Tidak Lulus' }}</td>
                                                        {{date('d-m-Y', strtotime($views->tgl_panggilan))}}
                                                        
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
                $('.modal_hiddenfptk').val($(this).data('fptk'))




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