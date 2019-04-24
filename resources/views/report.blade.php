{{-- {{dd($report)}} --}}
{{-- {{dd($seleksi)}} --}}
{{-- {{dd($pelamar)}} --}}
@extends('layouts.header')
@section('css')
<link href="css/app.css" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
    <link href="vendors/pickadate/css/default.css" rel="stylesheet" type="text/css">
    <link href="vendors/pickadate/css/default.date.css" rel="stylesheet" type="text/css">
    <link href="vendors/pickadate/css/default.time.css" rel="stylesheet" type="text/css">
    <link href="vendors/flatpickr-calendar/css/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
 <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Laporan eRecruitment</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/index">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Halaman Utama
                        </a>
                    </li>
                    <li class="active">Laporan eRecruitment</li>
                </ol>
            </section>
            <!--section ends-->
            
            <section class="content">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Periode Laporan
                                        </h3>
                                        <span class="pull-right clickable">
                                            <i class="glyphicon glyphicon-chevron-up"></i>
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="box-body">
                                            <!-- Date dd/mm/yyyy -->
                                            <form action="/report" method="POST" style="background: #ffffff;" id="contact">
                                                {{ csrf_field() }}
                                            <div class="form-group">
                                                <br><label>
                                                    Tanggal Awal :
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="tglawal" id="tglawal" data-mask="9999-99-99" placeholder="YYYY-MM-DD" required>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- phone mask -->
                                            <div class="form-group">
                                                <label>
                                                        Tanggal Akhir :
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="tglakhir" id="tglakhir" data-mask="9999-99-99" placeholder="YYYY-MM-DD" required>
                                                </div> 
                                            </div>
                                            <!-- /.input group -->
                                            <!-- /.form group -->
                                            <!-- phone mask -->
                                            
                                            <!-- /.form group -->
                                            <!-- IP mask -->
                                            <div class="form-group">
                                            
                                                <div class="input-group">
                                                        <button type="submit" class="btn btn-responsive button-alignment btn-primary" style="margin-bottom:7px;">Cetak Laporan</button>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            </form>
                                            <!-- /.form group -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <i class="livicon" data-name="bell" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Laporan
                                            </h3>
                                            <span class="pull-right clickable">
                                                <i class="glyphicon glyphicon-chevron-up"></i>
                                            </span>
                                        </div>
                                        <div class="panel-body">
                                            <div class="box-body">
                                                @foreach ($report as $item)
                                                <div class="todolist_list showactions">
                                                        <div class="col-md-6 col-sm-8 col-xs-6 nopadmar custom_textbox1">
                                                            <div class="todotext todoitem">{{$item->nama_tes}}</div>
                                                            <span class="label label-default">Total Peserta : {{$item->jumlahfptk}}</span>
                                                        </div>
                                                        <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                                            
                                                        </div>
                                                    </div>
                                                @endforeach
                                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
            </section>
            
        
               
            <!-- content -->

          
                 
            <!-- content -->
        </aside>
@endsection