{{--  {{dd($pengalaman)}}  --}}
@extends('layouts.header')

@section('content')

    

        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                    <!--section starts-->
                    <h1>Detail Pengalaman Kerja</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="/index">
                                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Halaman Utama
                            </a>
                        </li>
                        <li>
                            <a href="/data_pelamar">Data Pelamar</a>
                        </li>
                        <li class="active">Detail Pengalaman Kerja</li>
                    </ol>
                </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Data Pelamar
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form id="commentForm" method="post" action="/pengalamankerja">
                                        {{csrf_field()}}
                                    <div id="rootwizard">
                                        <ul>
                                            <li>
                                                <a href="{{ url('pelamar') }}" >Data Pribadi</a>
                                            </li>
                                            
                                            <li style="">
                                                <a href="#tab3" style="background-color:#337ab7;color:#fff !important;" data-toggle="tab">Pengalaman Kerja</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab">Upload File</a>
                                            </li>
                                           
                                        </ul>
                                        <div class="tab-content">
                                           
                                           
                                            <div class="tab-pane active" id="tab3">
                                                     <section class="content">
                    <!-- row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable" style="overflow:auto;">
                                <div class="panel-heading" style="background-color: #418bca;border-color: #418bca;">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="tasks" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> DATA PENGALAMAN KERJA</h3>
                                </div>
                                <div class="panel-body table-responsive">
                                       
                                    <table class="table table-striped table-bordered" id="table6">
                                      
                                        <thead>
                                            <tr>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Nama Perusahan</th>
                                                        <th>Posisi</th>
                                                        <th>Jangka Kerja</th> 
                                            </tr>
                                        </thead>
                                       
                                        <tbody>@foreach ($pelamar as $views)
                                            <tr>
                                                <td>{{$views->nik}}</td>
                                                <td>{{$views->nama}}</td>
                                                <td>{{$views->nm_perusahaan}}</td>
                                                <td>{{$views->posisi}}</td>
                                                 <td>{{$views->jangka_kerja}}</td> 
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
                                               
                                            </div>
                                            <ul class="pager wizard">
                                                <li class="previous">
                                                    <a href="{{ URL::previous() }}">Previous</a>
                                                </li>
                                                <li class="next">
                                                        <a href="/file/{{$id}}/detail" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Next</a>
                                                        
                                                    {{--  <button type="submit" id="hapus" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Next</button>  --}}
                                                </li>
                                                <li class="next finish" style="display:none;">
                                                    <a href="javascript:;">Finish</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        </aside>
        @endsection
        @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $(".add-more").click(function(){ 
                    var html = $(".copy").html();
                    $(".after-add-more").after(html);
                });
                $("body").on("click",".remove",function(){ 
                    $(this).parents(".form-group").remove();
                });
                
              });

              $("#hapus").click(function() {
            $("#copy").remove();
            })
  
              function isNumberKey(evt)
              {
                 var charCode = (evt.which) ? evt.which : event.keyCode
                 if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
        
                 return true;
              }
              //-->
        </script>
        @endsection
        