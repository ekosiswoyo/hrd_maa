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
                    <div class="dropdown">
                            <button onclick="myFunction()" style="float:right;margin-left:33px" class="dropbtn">Pilih Jenis Tes</button>
                              <div id="myDropdown" class="dropdown-content">
                                @foreach (App\Models\Seleksi::get() as $nama)
                                <a href="/proses/seleksi/{{$nama->id}}">{{$nama->nama_tes}}</a>
                                @endforeach

                              </div>
                            
                            </div>
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
                                            <th>Posisi</th>
                                            <th>Jenis Tes</th>
                                            <th>Hasil</th></th>
                                            <th>Keterangan</th>
                                            <th>Lulus</th>
                                            {{--  <th>Tidak Lulus</th>  --}}
                                        </tr>
                                    </thead>
                                   
                                    <tbody>@foreach ($pelamar as $views)
                                        <tr> 
                                            <td>{{$no++}}</td> 
                                            <td>{{$views->nik}}</td>
                                            <td>{{$views->nama}}</td>
                                            <td>{{$views->nama_lowongan}}</td>
                                            <td>{{$views->nama_tes}}</td>
                                            <td>{{$views->hasil}}</td>
                                            <td>{{$views->keterangan}}</td>
                                            <td><a class="btn btn-raised btn-info btn-large" data-toggle="modal" data-href="#full-width" href="#full-width">View Demo</a></td>

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
                                    <p>
                                        This modal will resize itself to the same dimensions as the container class.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin ipsum ac ante fermentum suscipit. In ac augue non purus accumsan lobortis id sed nibh. Nunc egestas hendrerit ipsum, et porttitor augue volutpat non. Aliquam erat volutpat. Vestibulum scelerisque lobortis pulvinar. Aenean hendrerit risus neque, eget tincidunt leo. Vestibulum est tortor, commodo nec cursus nec, vestibulum vel nibh. Morbi elit magna, ornare placerat euismod semper, dignissim vel odio. Phasellus elementum quam eu ipsum euismod pretium.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
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