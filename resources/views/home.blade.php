@extends('layouts.header')

@section('content')

        <aside class="right-side">
            <section class="content-header">
                <h1>Formulir Permintaan Tenaga Kerja (FPTK)</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                    </li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                    <div class="row">
                            <div class="col-md-12" style="display: block;">
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="bagian">Divisi/Department</label>
                                    <input type="text" class="form-control" id="bagian" name="bagian" value="{{ Auth::user()->bagian ? Auth::user()->bagian->nama_bagian : '' }}" disabled></div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jabatan">Nama Jabatan/Grade</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ Auth::user()->jabatan ? Auth::user()->jabatan->nama_jabatan : '' }}" disabled></div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Jumlah SDM</label>
                                    <input type="email" class="form-control" id="jml_sdm" name="jml_sdm" placeholder="Jumlah SDM yang dibutuhkan"></div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="lokasi">Lokasi Kerja</label>
                                    <input type="email" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi Kerja"></div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label><br>
                                    <label class="radio-inline" for="keperluan-0">
                                        <input type="radio" name="keperluan" id="keperluan-0" value="penambahan" checked="checked">
                                        Penambahan
                                    </label> 
                                    <label class="radio-inline" for="keperluan-1">
                                        <input type="radio" name="keperluan" id="keperluan-1" value="penggantian">
                                        Penggantian
                                    </label>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Masukkan keterangan Keperluan</label>
                                    <textarea class="form-control" id="textarea" name="ket_keperluan" placeholder="Keterangan Keperluan"></textarea></div>
                                <div class="form-group">
                                        <label for="stat_kar">Status karyawan</label><br>
                                    <label class="radio-inline" for="stat_kar-0">
                                        <input type="radio" name="stat_kar" id="stat_kar-0" value="kontrak" checked="checked">
                                        Kontrak
                                    </label> 
                                    <label class="radio-inline" for="stat_kar-1">
                                        <input type="radio" name="stat_kar" id="stat_kar-1" value="tetap">
                                        Tetap
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="jns_kel">Jenis Kelamin</label><br>
                                <label class="radio-inline" for="jns_kel-0">
                                    <input type="radio" name="jns_kel" id="jns_kel-0" value="laki-laki" checked="checked">
                                    Laki-Laki
                                </label> 
                                <label class="radio-inline" for="jns_kel-1">
                                    <input type="radio" name="jns_kel" id="jns_kel-1" value="perempuan">
                                    Perempuan
                                </label>
                                </div>
                                    
                            </div>
                           
                        
                        
                        </div>
            </section>
        </aside>

        @endsection