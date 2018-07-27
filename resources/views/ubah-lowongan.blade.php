@extends('layouts.header')

@section('content')

      
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Form Data Lowongan</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Forms</a>
                    </li>
                    <li class="active">Data Lowongan</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Data Lowongan
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form id="commentForm" method="post" action="/lowongan/{{$lowongan->id}}">
                                        {{csrf_field()}}
                                   
                                        

                                                    <div class="panel panel-default">
                                                            
                                                            <div class="panel-body"><div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    
                                                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                        <div class="panel-body">
                                                                            <div class="form-group after-add-more">
                                                                                <input type="text" style="position: static;" class="form-control" id="nama" name="nama" placeholder="Nama Lowongan" value="{{$lowongan->nama_lowongan}}">
                                                                                <button type="submit" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Simpan</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                   
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
        
        @endsection
        