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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Form Wizards</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Forms</a>
                    </li>
                    <li class="active">Data Pelamar</li>
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
                                <form id="commentForm" method="post" action="#">
                                    <div id="rootwizard">
                                        <ul>
                                            <li>
                                                <a href="{{ url('pelamar') }}" >Data Pribadi</a>
                                            </li>
                                        </a>
                                            <li class="active">
                                                <a href="#tab3" data-toggle="tab">Data Pekerjaan</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('pelamar') }}" >Pengalaman Kerja</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('pelamar') }}">Upload File</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                           
                                            <div class="tab-pane" id="tab2">
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group">
                                                    <label>Posisi</label>
                                                    <select name="posisi" class="form-control" required>
                                                        @foreach (App\Models\Lowongan::get() as $nama_lowongan)
                                                        <option value="{{$nama_lowongan->id}}">{{$nama_lowongan->nama_lowongan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Masuk Lamaran</label>
                                                    <div class="input-group">
                                                        
                                                        <input type="text" class="form-control" name="tgl_lamaran" id="tgl_lamaran" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                        <label>Tanggal Masuk Kerja</label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" class="form-control" name="tgl_kerja" id="tgl_kerja" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
                                                        </div>
                                                        <!-- /.input group -->
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="control-label">First name *</label>
                                                    <input id="name" name="fname" placeholder="Enter your First name" type="text" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label for="surname" class="control-label">Last name *</label>
                                                    <input id="surname" name="lname" type="text" placeholder=" Enter your Last name" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Gender</label>
                                                    <select class="form-control" name="gender" id="gender" title="Select an account type...">
                                                        <option>Select</option>
                                                        <option>MALE</option>
                                                        <option>FEMALE</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input id="address" name="address" type="text" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="age" class="control-label">Age *</label>
                                                    <input id="age" name="age" type="text" maxlength="3" class="form-control required number" min="17" data-bv-greaterthan-inclusive="false" data-bv-greaterthan-message="The input must be greater than or equal to 18" max="100" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="The input must be less than 100">
                                                </div>
                                            </div>
                                            <div class="tab-pane active" id="tab3">
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
                                                         </div>
                                                <div class="form-group">
                                                    <label>Home number *</label>
                                                    <input type="text" class="form-control" id="phone1" name="phone1" placeholder="(999)999-9999">
                                                </div>
                                                <div class="form-group">
                                                    <label>Personal number *</label>
                                                    <input type="text" class="form-control" id="phone2" name="phone2" placeholder="(999)999-9999">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alternate number *</label>
                                                    <input type="text" class="form-control" id="phone3" name="phone3" placeholder="(999)999-9999">
                                                </div>
                                                <h2 class="hidden">&nbsp;</h2>
                                                <div class="form-group">
                                                    <span>Terms and Conditions *</span>
                                                    <label>
                                                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="custom-checkbox"> I agree with the Terms and Conditions.
                                                    </label>
                                                </div>
                                            </div>
                                            <ul class="pager wizard">
                                                <li class="previous">
                                                    <a href="#">Previous</a>
                                                </li>
                                                <li class="next">
                                                    <a href="#">Next</a>
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