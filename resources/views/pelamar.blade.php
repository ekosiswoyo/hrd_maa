@extends('layouts.header')

@section('content')

        <aside class="right-side">
                @if (Session::has('success_massage'))
                <div class="alert alert-success alert-dismissable margin5" style="margin-top: 5px;margin-left: 5px;margin-right:  5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Berhasil:</strong> menambahkan data Pelamar.
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
                                <label>Tanggal Lahir</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="text" class="form-control" id="rangepicker4" name="tgl_lahir" required />
                                        </div><br>
                                        

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
                                <label>No Telp</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="phone" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input type="text" class="form-control" name="phone" data-mask="(999)9999-9999" placeholder="(999)9999-9999">
                                    </div>
                                    <br>
                                <label>No Hp</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="phone" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input type="text" class="form-control" name="hp" data-mask="(999)9999-9999" placeholder="(999)9999-9999">
                                    </div>
                                <br>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="tmp_lahir">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="pend" name="pend" placeholder="Pendidikan Terakhir" required>
                                </div>
                                
                                {{--  <label>Tanggal Masuk Lamaran</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                    </div>
                                    <input type="text" class="form-control" id="tgl_lamaran" name="tgl_lamaran" required />
                                </div><br>
                                <label>Tanggal Masuk Kerja</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                    </div>
                                    <input type="text" class="form-control" id="tgl_kerja" name="tgl_kerja" required />
                                </div><br>  --}}
                               
                                <button type="submit" class="btn btn-responsive button-alignment btn-danger" style="margin-bottom:7px;">Simpan</button>
                                 
                                <div class="modal fade slideExpandUp" id="modal-10" role="dialog" aria-labelledby="Modallabel3dsign">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header bg-info ">
                                                <h4 class="modal-title" id="Modallabel3dsign">3D Expand Up</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    This is a modal window. You can do the following things with it:
                                                </p>
                                                <ul>
                                                    <li>
                                                        <strong>Read:</strong> modal windows will probably tell you something important so don't forget to read what they say.
                                                    </li>
                                                    <li>
                                                        <strong>Look:</strong> a modal window enjoys a certain kind of attention; just look at it and appreciate its presence.
                                                    </li>
                                                    <li>
                                                        <strong>Close:</strong> click on the button below to close the modal.
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-info" data-dismiss="modal">Close me! </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                            
                            </form>
                            </div>
                           
                        
                        
                        </div>
            </section>
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