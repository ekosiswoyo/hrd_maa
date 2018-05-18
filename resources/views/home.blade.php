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
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="input-text-1">Divisi/Department</label>
                                    <input type="text" class="form-control" id="input-text-1" value="{{ Auth::user()->bagian ? Auth::user()->bagian->nama_bagian : '' }}" disabled></div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="input-text-2">Nama Jabatan/Grade</label>
                                    <input type="text" class="form-control" id="input-text-2" value="{{ Auth::user()->jabatan ? Auth::user()->jabatan->nama_jabatan : '' }}" disabled></div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="input-text-3">Jumlah SDM</label>
                                    <input type="email" class="form-control" id="input-text-3" placeholder="Jumlah SDM yang dibutuhkan"></div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="input-text-4">Lokasi Kerja</label>
                                    <input type="email" class="form-control" id="input-text-4" placeholder="Masukkan Lokasi Kerja"></div>
                            </div>
                            <div class="form-group">
                                    <label class="col-md-4 control-label" for="keperluan">Kepeluan</label>
                                    <div class="col-md-4">
                                      <select id="keperluan" name="keperluan" class="form-control">
                                        <option value="penggantian">Penggantian</option>
                                        <option value="penambahan">Penambahan</option>
                                      </select>
                                    </div>
                                  </div>
                                  
                                  <!-- Textarea -->
                                  <div class="form-group">
                                    <label class="col-md-4 control-label" for="alasan">Alasan Penambahan</label>
                                    <div class="col-md-4">                     
                                      <textarea class="form-control" id="alasan" name="alasan">Alasan Penambahan</textarea>
                                    </div>
                                  </div>
                        
                        
                        </div>
            </section>
        </aside>

        @endsection