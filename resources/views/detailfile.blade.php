@extends('layouts.header')

@section('content')

       

        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                    <!--section starts-->
                    <h1>Detail File Pelamar</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="/index">
                                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Halaman Utama
                            </a>
                        </li>
                        <li>
                            <a href="/data_pelamar">Data Pelamar</a>
                        </li>
                        <li class="active">Detail File Pelamar</li>
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
                                <form id="commentForm" method="post" action="/uploadfile" enctype="multipart/form-data" >
                                        {{csrf_field()}}
                                    <div id="rootwizard">
                                        <ul>
                                            <li>
                                                <a href="{{ url('pelamar') }}" >Data Pribadi</a>
                                            </li>
                                            
                                            <li style="">
                                                <a href="#tab3"  >Pengalaman Kerja</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab" style="background-color:#337ab7;color:#fff !important;">Upload File</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            
                                           
                                            <div class="tab-pane active" id="tab4">
                                                <h2 class="hidden">&nbsp;</h2>
                                                
                                                 <i class="fa fa-download"></i>&nbsp CV <a style="color:#3c8dbc !important;" href="{{asset('storage/lampiran/' . $pelamar->cv)}}">{{$pelamar->cv}}</a><br>
                                                 <i class="fa fa-download"></i>&nbsp FOTO <a style="color:#3c8dbc !important;" href="{{asset('storage/lampiran/' . $pelamar->foto)}}">{{$pelamar->foto}}</a><br>
                                                 <i class="fa fa-download"></i>&nbsp KTP <a style="color:#3c8dbc !important;" href="{{asset('storage/lampiran/' . $pelamar->ktp)}}">{{$pelamar->ktp}}</a><br>
                                                 <i class="fa fa-download"></i>&nbsp KK <a style="color:#3c8dbc !important;" href="{{asset('storage/lampiran/' . $pelamar->kk)}}">{{$pelamar->kk}}</a><br>
                                                 <i class="fa fa-download"></i>&nbsp IJAZAH <a style="color:#3c8dbc !important;" href="{{asset('storage/lampiran/' . $pelamar->ijazah)}}">{{$pelamar->ijazah}}</a><br>
                                                 <i class="fa fa-download"></i>&nbsp SURAT PENGALAMAN KERJA <a style="color:#3c8dbc !important;" href="{{asset('storage/lampiran/' . $pelamar->srt_pengalaman)}}">{{$pelamar->srt_pengalaman}}</a><br>
                                                
                                            </div>
                                            <ul class="pager wizard">
                                                <li class="previous">
                                                    <a href="{{ URL::previous() }}">Previous</a>
                                                </li>
                                                <li class="next">
                                                    <a href="/data_pelamar" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Finish</a>
                                                    {{-- <button type="submit" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Next</button> --}}
                                                </li>
                                                {{--  <li class="next finish">
                                                    <button type="submit" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Finish</button>

                                                </li>  --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">User Register</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You Submitted Successfully.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                                                </div>
                                            </div>
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
// Popup window code
    function newPopup(url) {
    popupWindow = window.open(
        url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
      }
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
        