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
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
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
                                        {{-- @foreach (App\Models\Cabang::get() as $nama_cabang)
                                        <option value="{{$nama_cabang->id}}">{{$nama_cabang->nama}}</option>
                                        @endforeach --}}
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
                                        <input type="text" class="form-control" name="phone" data-mask="(999)9999-9999" placeholder="(999)9990-9999">
                                    </div>
                                    <br>
                                <label>No Hp</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="phone" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input type="text" class="form-control" name="hp" data-mask="(999)999-9999" placeholder="(999)999-9999">
                                    </div>
                                <br>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="tmp_lahir">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="pend" name="pend" placeholder="Pendidikan Terakhir" required>
                                </div>
                                <div class="form-group">
                                        <label>Pengalaman</label>
                                        <select name="posisi" class="form-control" required>
                                            {{-- @foreach (App\Models\Cabang::get() as $nama_cabang)
                                            <option value="{{$nama_cabang->id}}">{{$nama_cabang->nama}}</option>
                                            @endforeach --}}
                                        </select>
                                </div>

                                <label>Tanggal Masuk Lamaran</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                    </div>
                                    <input type="text" class="form-control" id="rangepicker5" name="tgl_lamaran" required />
                                </div>
                                <br>
                                <label>Tanggal Masuk Kerja</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                    </div>
                                    <input type="text" class="form-control" id="rangepicker6" name="tgl_kerja"  />
                                </div>
                                <br>
                                <button type="submit" class="btn btn-responsive button-alignment btn-danger" style="margin-bottom:7px;">Simpan</button>
                                 
                               
                                    
                            
                            </form>
                            </div>
                           
                        
                        
                        </div>
            </section>
        </aside>

        @endsection
        