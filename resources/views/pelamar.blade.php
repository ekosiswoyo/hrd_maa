
@extends('layouts.header')

@section('content')

        {{--  <aside class="right-side">
                @if (Session::has('success_massage'))
                <div class="alert alert-success alert-dismissable margin5" style="margin-top: 5px;margin-left: 5px;margin-right:  5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Berhasil:</strong> Data pelamar berhasil ditambahkan.
                </div>
                @elseif (Session::has('errors'))
                <div class="alert alert-success alert-dismissable margin5" style="margin-top: 5px;margin-left: 5px;margin-right:  5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Errors:</strong> NIK Pelamar sudah terdaftar.
                </div>
                @endif
                
            <section class="content-header">
                <h1>Formulir Input Data Pelamar</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                    </li>
                    <li class="active">Formulir Input Data Pelamar</li>
                </ol>
            </section>
            <section class="content">
                    <div class="row">
                            <div class="col-md-12" style="display: block;">
                                <form action="" method="post" role="form">
                                        {{csrf_field()}}
                                 <div class="form-group ui-draggable-handle" style="position: static;"><label for="nik">NIK</label> 
                                    <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  id="nik" name="nik" placeholder="NIK" required>
                                 </div> 
                                 <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama">Nama </label> 
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                                 </div> 
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="tmp_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir" required>
                                </div>
                                <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                        </div>
                                        <!-- /.input group -->
                                </div>
                                        

                                <div class="form-group">
                                    <label for="jns_kel">Jenis Kelamin</label><br>
                                        <label class="radio-inline" for="jns_kel-0">
                                            <input type="radio" name="jns_kel" id="jns_kel-0" class="flat-red" value="laki-laki" >
                                                Laki-Laki
                                            </label> 
                                        <label class="radio-inline" for="jns_kel-1">
                                            <input type="radio" name="jns_kel" id="jns_kel-1" class="flat-red" value="perempuan">
                                                Perempuan
                                        </label>
                                </div>
                                <div class="form-group">
                                    <label for="stat_nikah">Status Pernikahan</label><br>
                                    <label class="radio-inline" for="stat_nikah-0">
                                        <input type="radio" name="stat_nikah" id="stat_nikah-0" class="flat-red" value="lajang" >
                                        Lajang
                                    </label> 
                                    <label class="radio-inline" for="stat_nikah-1">
                                        <input type="radio" name="stat_nikah" id="stat_nikah-1" class="flat-red" value="menikah">
                                        Menikah
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Posisi</label>
                                    <select name="posisi" class="form-control" required>
                                        @foreach (App\Models\Lowongan::get() as $nama_lowongan)
                                        <option value="{{$nama_lowongan->id}}">{{$nama_lowongan->nama_lowongan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="alamat">Alamat KTP</label>
                                    <textarea class="form-control" id="textarea" name="alamat_ktp" placeholder="Alamat KTP"></textarea>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="alamat">Alamat Domisili</label>
                                    <textarea class="form-control" id="textarea" name="alamat_domisili" placeholder="Alamat Domisili"></textarea>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="telp">No Telp</label> 
                                    <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  id="telp" name="telp" placeholder="No Telp" required>
                                 </div> 
                                 <div class="form-group ui-draggable-handle" style="position: static;"><label for="hp">No Hp</label> 
                                    <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  id="hp" name="hp" placeholder="No HP" required>
                                 </div> 
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="tmp_lahir">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="pend" name="pend" placeholder="Pendidikan Terakhir" required>
                                </div>
                                <div class="form-group">
                                        <label>Tanggal Masuk Lamaran</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="text" class="form-control" name="tgl_lamaran" id="tgl_lamaran" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                        </div>
                                        <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                        <label>Tanggal Masuk Kerja</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="text" class="form-control" name="tgl_kerja" id="tgl_kerja" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                        </div>
                                        <!-- /.input group -->
                                </div>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="livicon" data-name="briefcase" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                            Pengalaman Kerja
                                        </h3>
                                        <span class="pull-right clickable">
                                            <i class="glyphicon glyphicon-chevron-up"></i>
                                        </span>
                                    </div>
                                    @for($i=0;$i<3;$i++)
                                    <div class="panel-body"><div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <h4 class="panel-title">Pengalaman Kerja</h4>
                                                    </a>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama_perusahaan">Nama Perusahaan</label>
                                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan[]" placeholder="Nama Perusahaan" required>
                                                    </div>
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="posisi">Posisi</label>
                                                        <input type="text" class="form-control" id="posisi" name="posisi[]" placeholder="Posisi" required>
                                                    </div>
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama_perusahaan">Lama Bekerja</label>
                                                        <input type="text" class="form-control" id="jangka" name="jangka[]" placeholder="Lama Bekerja" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <h4 class="panel-title">
                                                        Pengalaman Kerja 2
                                                            </h4>
                                                            
                                                    </a>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama_perusahaan">Nama Perusahaan</label>
                                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
                                                    </div>
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="posisi">Posisi</label>
                                                        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi" required>
                                                    </div>
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama_perusahaan">Lama Bekerja</label>
                                                        <input type="text" class="form-control" id="jangka" name="jangka" placeholder="Lama Bekerja" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <h4 class="panel-title"> Pengalaman Kerja 3</h4>
                                                    </a>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama_perusahaan">Nama Perusahaan</label>
                                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
                                                    </div>
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="posisi">Posisi</label>
                                                        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi" required>
                                                    </div>
                                                    <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama_perusahaan">Lama Bekerja</label>
                                                        <input type="text" class="form-control" id="jangka" name="jangka" placeholder="Lama Bekerja" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  --}}
                                    {{--  </div>
                                    
                                        <!-- nav-tabs-custom -->
                                    </div>
                                    @endfor  --}}
                                {{--  </div>
                                <button class="btn btn-raised btn-info " data-toggle="modal" data-target="#ajax-modal">3D Expand Up</button>
                                    
                                <button type="submit" class="btn btn-responsive button-alignment btn-danger" style="margin-bottom:7px;">Simpan</button>
                                
                            </form>
                            </div>
                           
                        
                        
                        </div>
            </section>
        </aside>  --}} 

        <aside class="right-side">
                @if (Session::has('success_massage'))
                <div class="alert alert-success alert-dismissable margin5" style="margin-top: 5px;margin-left: 5px;margin-right:  5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Berhasil:</strong> Data pelamar berhasil ditambahkan.
                </div>
                @elseif (Session::has('errors'))
                <div class="alert alert-success alert-dismissable margin5" style="margin-top: 5px;margin-left: 5px;margin-right:  5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>NIK Pelamar sudah terdaftar.</strong>
                </div>
                @endif
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Form Wizards</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="/index">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Halaman Utama
                        </a>
                    </li>
                    <li>
                        <a href="/data_pelamar">Data Pelamar</a>
                    </li>
                    <li class="active">Tambah Data Pelamar</li>
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
                                <form id="commentForm" method="post" action="" role="form">
                                        {{csrf_field()}}
                                    <div id="rootwizard">
                                        <ul>
                                            <li>
                                                <a href="#tab1" data-toggle="tab">Data Pribadi</a>
                                            </li>
                                            
                                            <li>
                                                <a href="#tab3" data-toggle="tab">Pengalaman Kerja</a>
                                            </li>
                                            <li>
                                                <a href="#tab4" data-toggle="tab">Upload File</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="tab1">
                                                <h2 class="hidden">&nbsp;</h2>
                                                <input id="idpelamar" name="idpelamar" type="hidden" value="{{$abc}}">
                                                <div class="form-group">
                                                    <label for="nik" class="control-label">NIK</label>
                                                    <input id="nik" name="nik" type="text" placeholder="Masukan NIK" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label">Nama</label>
                                                    <input id="nama" name="nama" placeholder="Masukan Nama" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tmp_lahir" class="control-label">Tempat Lahir</label>
                                                    <input id="tmp_lahir" name="tmp_lahir" placeholder="Masukan Tempat Lahir" type="text" class="form-control" required> 
                                                </div>

                                                <div class="form-group">
                                                    <label for="tgl_lahir" class="control-label">Tanggal Lahir</label>
                                                        <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" data-mask="9999-99-99" placeholder="YYYY-MM-DD" required>
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label" for="jns_kel">Jenis Kelamin</label><br>
                                                        <label class="radio-inline" for="jns_kel-0">
                                                            <input type="radio" name="jns_kel" id="jns_kel-0" class="flat-red" value="laki-laki" required>
                                                                Laki-Laki
                                                            </label> 
                                                        <label class="radio-inline" for="jns_kel-1">
                                                            <input type="radio" name="jns_kel" id="jns_kel-1" class="flat-red" value="perempuan">
                                                                Perempuan
                                                        </label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="stat_nikah">Status Pernikahan</label><br>
                                                    <label class="radio-inline" for="stat_nikah-0">
                                                        <input type="radio" name="stat_nikah" id="stat_nikah-0" class="flat-red" value="lajang" required>
                                                        Lajang
                                                    </label> 
                                                    <label class="radio-inline" for="stat_nikah-1">
                                                        <input type="radio" name="stat_nikah" id="stat_nikah-1" class="flat-red" value="menikah">
                                                        Menikah
                                                    </label>
                                                </div>

                                                <div class="form-group" style="position: static;"><label for="alamat"  class="control-label">Alamat KTP</label>
                                                    <textarea class="form-control" id="textarea" name="alamat_ktp" placeholder="Alamat KTP" required></textarea>
                                                </div>
                                                <div class="form-group" style="position: static;"><label for="alamat" class="control-label">Alamat Domisili</label>
                                                    <textarea class="form-control" id="textarea" name="alamat_domisili" placeholder="Alamat Domisili" required></textarea>
                                                </div>
                                                <div class="form-group" style="position: static;"><label for="telp" class="control-label">No Telp</label> 
                                                    <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  id="telp" name="telp" placeholder="No Telp" required>
                                                 </div> 
                                                 <div class="form-group" style="position: static;"><label for="hp" class="control-label">No Hp</label> 
                                                    <input type="text" class="form-control" onkeypress="return isNumberKey(event)"  id="hp" name="hp" placeholder="No HP" required>
                                                 </div> 
                                                <div class="form-group" style="position: static;"><label for="tmp_lahir" class="control-label">Pendidikan Terakhir</label>
                                                    <input type="text" class="form-control" id="pend" name="pend" placeholder="Pendidikan Terakhir" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Posisi</label>
                                                    <select name="posisi" class="form-control" required>
                                                        @foreach (App\Models\Lowongan::get() as $nama_lowongan)
                                                        <option value="{{$nama_lowongan->id}}">{{$nama_lowongan->nama_lowongan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group" style="position: static;"><label for="tgl_lamaran" class="control-label">Tanggal Masuk Lamaran</label>
                                                    <input type="text" class="form-control" name="tgl_lamaran" id="tgl_lamaran" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                                </div>

                                            </div>
                                            {{--  <div class="tab-pane" id="tab2">
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group">
                                                    <label class="control-label">Posisi</label>
                                                    <select name="posisi" class="form-control" title="Pilih Posisi Pekerjaan" required>
                                                        @foreach (App\Models\Lowongan::get() as $nama_lowongan)
                                                        <option value="{{$nama_lowongan->id}}">{{$nama_lowongan->nama_lowongan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label">Tanggal Masuk Lamaran</label>
                                                        <input type="text" class="form-control" name="tgl_lamaran" id="tgl_lamaran" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                                   
                                                </div>
                                                <div class="form-group">
                                                        <label class="control-label">Tanggal Masuk Kerja</label>
                                                            <input type="text" class="form-control" name="tgl_kerja" id="tgl_kerja" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                                
                                                </div>
                                            </div>  --}}
                                            {{--  <div class="tab-pane" id="tab3">
                                                    <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">
                                                                    <i class="livicon" data-name="briefcase" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                                    Pengalaman Kerja
                                                                </h3>
                                                                <span class="pull-right clickable">
                                                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                                                </span>
                                                            </div>
                                                           
                                                            @for($i=0;$i<3;$i++)
                                                            <div class="panel-body"><div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                <h4 class="panel-title">Pengalaman Kerja</h4>
                                                                            </a>
                                                                    </div>
                                                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                        <div class="panel-body">
                                                                            <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama_perusahaan">Nama Perusahaan</label>
                                                                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan[]" placeholder="Nama Perusahaan" required>
                                                                            </div>
                                                                            <div class="form-group ui-draggable-handle" style="position: static;"><label for="posisi">Posisi</label>
                                                                                <input type="text" class="form-control" id="posisi" name="posisi[]" placeholder="Posisi" required>
                                                                            </div>
                                                                            <div class="form-group ui-draggable-handle" style="position: static;"><label for="nama_perusahaan">Lama Bekerja</label>
                                                                                <input type="text" class="form-control" id="jangka" name="jangka[]" placeholder="Lama Bekerja" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 </div>
                                                            
                                                            </div>
                                                            @endfor  
                                                            <button type="submit" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Finish</button>

                                                         </div>
                                               
                                            </div>  --}}
                                            {{-- <div class="tab-pane" id="tab4">
                                                <h2 class="hidden">&nbsp;</h2>
                                                <label>Silahkan upload file pendukung</label>
                                                
                                                <div class="form-group">
                                                    <label class="control-label">CV</label>                                                    
                                                        
                                                            <input type="file" id="cv" name="cv">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">FOTO</label>                                                    
                                                        
                                                            <input type="file" id="foto" name="foto">
                                                        
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">KTP</label>                                                    
                                                        
                                                            <input type="file" id="ktp" name="ktp">
                                                        
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">KK</label>                                                  
                                                        
                                                            <input type="file" id="kk" name="kk">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">IJAZAH</label>                                                   
                                                        
                                                            <input type="file" id="ijazah" name="ijazah">
                                                </div>
                                                
                                            </div> --}}
                                            <ul class="pager wizard">
                                                <li class="previous">
                                                    <a href="#">Previous</a>
                                                </li>
                                                <li class="next">
                                                    <button type="submit" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Next</button>
                                                    {{-- <button type="submit" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Next</button> --}}
                                                </li>
                                                {{--  <li class="next finish">
                                                    <button type="submit" style="float:right;color: #3c8dbc !important;display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px">Finish</button>

                                                </li>  --}}
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div id="myModal" class="modal fade" role="dialog">
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
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        </aside>
        @endsection
        <SCRIPT language=Javascript>
            <!--
            function isNumberKey(evt)
            {
               var charCode = (evt.which) ? evt.which : event.keyCode
               if (charCode > 31 && (charCode < 48 || charCode > 57))
                  return false;
      
               return true;
            }
            //-->
         </SCRIPT>
         <script src="{{ asset('js/pages/form_wizard.js')}}" type="text/javascript"></script>