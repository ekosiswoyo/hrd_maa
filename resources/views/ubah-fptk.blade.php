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
                                <form action="" method="post" role="form">
                                        {{csrf_field()}}
                                 <div class="form-group ui-draggable-handle" style="position: static;"><label for="bagian">Divisi/Department</label> 
                                    <input type="text" class="form-control" id="bagian" name="bagian" value="{{ $fptk->id_cabang}}">
                                 </div> 
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jabatan">Nama Jabatan/Grade</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $fptk->grade}}">
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Jumlah SDM</label>
                                    <input type="text" class="form-control" id="jml_sdm" name="jml_sdm" placeholder="Jumlah SDM yang dibutuhkan" value="{{ $fptk->jml_sdm}}">
                                </div>
                                {{-- <div class="form-group">
                                    <label>Lokasi Kerja</label>
                                    <select name="cabang" class="form-control" required>
                                        <option value="" required>-- Pilih Lokasi Kerja --</option>
                                        @foreach (App\Models\Cabang::get() as $nama_cabang)
                                        <option value="{{$nama_cabang->id_cabang}}">{{$nama_cabang->nama_cabang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label><br>
                                    <label class="radio-inline" for="keperluan-0">
                                        <input type="radio" name="keperluan" id="keperluan-0" class="flat-red" value="penambahan" required>
                                        Penambahan
                                    </label> 
                                    <label class="radio-inline" for="keperluan-1">
                                        <input type="radio" name="keperluan" id="keperluan-1" class="flat-red" value="penggantian">
                                        Penggantian
                                    </label>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Masukkan keterangan Keperluan</label>
                                    <textarea class="form-control" id="textarea" name="ket_keperluan" placeholder="Keterangan Keperluan" required></textarea>
                                </div>
                                <div class="form-group">
                                        <label for="stat_kar">Status karyawan</label><br>
                                    <label class="radio-inline" for="stat_kar-0">
                                        <input type="radio" name="stat_kar" id="stat_kar-0" class="flat-red" value="kontrak" required>
                                        Kontrak
                                    </label> 
                                    <label class="radio-inline" for="stat_kar-1">
                                        <input type="radio" name="stat_kar" id="stat_kar-1" class="flat-red" value="tetap">
                                        Tetap
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="jns_kel">Jenis Kelamin</label><br>
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
                                    <label for="stat_nikah">Status Pernikahan</label><br>
                                <label class="radio-inline" for="stat_nikah-0">
                                    <input type="radio" name="stat_nikah" id="stat_nikah-0" class="flat-red" value="lajang" required>
                                    Lajang
                                </label> 
                                <label class="radio-inline" for="stat_nikah-1">
                                    <input type="radio" name="stat_nikah" id="stat_nikah-1" class="flat-red" value="menikah">
                                    Menikah
                                </label>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label><br>
                                <label class="radio-inline" for="pendidikan-0">
                                    <input type="radio" name="pendidikan" id="pendidikan-0" class="flat-red" value="D1" required>
                                    D1
                                </label> 
                                <label class="radio-inline" for="pendidikan-1">
                                    <input type="radio" name="pendidikan" id="pendidikan-1" class="flat-red" value="D3">
                                    D3
                                </label>
                                <label class="radio-inline" for="pendidikan-2">
                                    <input type="radio" name="pendidikan" id="pendidikan-2" class="flat-red" value="S1" >
                                    S1
                                </label> 
                                <label class="radio-inline" for="pendidikan-3">
                                    <input type="radio" name="pendidikan" id="pendidikan-3" class="flat-red" value="S2">
                                    S2
                                </label>
                                </div>
                                <div class="form-group">
                                    <label for="pengalaman">Pengalaman Kerja</label><br>
                                    <label>
                                        <input type="checkbox" name="pengalaman" value="Pengalaman Kerja" id="pengalamankerja" class="flat-red"/>
                                        Pengalaman Kerja
                                    </label>
                                    <label>
                                        <input type="checkbox" name="pengalaman" id="freshgraduate" value="Fresh Graduate" class="flat-red" />
                                        Fresh Graduate
                                    </label>
                                </div>
                                
                                <label for="pengalaman">Minimal Pengalaman Kerja</label>
                                <div class="form-group input-group">
                                    <input type="text" name ="min_pengalaman" class="form-control" required>
                                    <span class="input-group-addon">Tahun</span>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Persyaratan Pekerjaan/Wajib</label>
                                    <textarea class="form-control" id="textarea" name="syarat_wajib" placeholder="Persyaratan Pekerjaan" required></textarea>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Syarat Pendukung</label>
                                    <textarea class="form-control" id="textarea" name="syarat_pendukung" placeholder="Syarat Pendukung" required></textarea>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Uraian Tugas / Tanggung Jawab</label>
                                    <textarea class="form-control" id="textarea" name="tanggung_jawab" placeholder="Uraian Tugas / Tanggung Jawab" required></textarea>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Karakteristrik Pekerjaan</label>
                                    <textarea class="form-control" id="textarea" name="karakteristik" placeholder="Karakteristrik Pekerjaan" required></textarea>
                                </div> --}}
                                <button type="submit" class="btn btn-responsive button-alignment btn-danger" style="margin-bottom:7px;">Simpan</button>
                                
                               
                                    
                            
                            </form>
                            </div>
                           
                        
                        
                        </div>
            </section>
        </aside>

        @endsection