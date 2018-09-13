@extends('layouts.header')

@section('content')

        <aside class="right-side">
                
                <section class="content-header">
                        <h1>Formulir Permintaan Tenaga Kerja (FPTK)</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="/index">
                                    <i class="livicon" data-name="home" data-size="16" data-color="#000"></i> Halaman Utama
                                </a>
                            </li>
                            <li class="active">Detail FPTK</li>
                        </ol>
                    </section>
            <section class="content">
                    <div class="row">
                            <div class="col-md-12" style="display: block;">
                                <form action="{{url('fptk/proses/update')}}" method="post" role="form" >
                                    <input type="hidden" name="id" id="id" class="modal_hiddenid" value="{{ $fptk->id}}">

                                        {{csrf_field()}}
                               
                                 {{--  <div class="form-group ui-draggable-handle" style="position: static;"><label for="cabang">Lokasi Kerja</label>   --}}
                                    <input type="hidden" class="form-control" id="cabang" name="cabang" value="{{ $fptk->id_cabang}}">
                                 {{--  </div>  --}}
                                  <div class="form-group ui-draggable-handle" style="position: static;"><label for="jabatan">Lokasi Kerja</label>
                                    <input type="text" class="form-control" id="cabang" name="cabang" value="{{ $fptk->nama_cabang}}" readonly>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jabatan">Nama Jabatan/Grade</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $fptk->grade}} {{$views->jabatan}}" readonly>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Bagian</label>
                                    <input type="text" class="form-control" id="jml_sdm" name="jml_sdm" placeholder="Bagian" value="{{ $fptk->bagian}}" readonly>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Keperluan</label>
                                    <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan" value="{{ $fptk->keperluan}}" readonly>
                                </div>
                                
                                
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Masukkan keterangan Keperluan</label>
                                    <textarea class="form-control" id="textarea" name="ket_keperluan" placeholder="Keterangan Keperluan" readonly>{{ $fptk->ket_keperluan}}</textarea>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Status Karyawan</label>
                                    <input type="text" class="form-control" id="stat_kar" name="stat_kar" placeholder="Status Karyawan" value="{{ $fptk->status_karyawan}}" readonly>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jns_kel" name="jns_kel" placeholder="Jenis Kelamin" value="{{ $fptk->jns_kel}}" readonly>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Status Pernikahan</label>
                                    <input type="text" class="form-control" id="stat_nikah" name="stat_nikah" placeholder="Status Pernikahan" value="{{ $fptk->stat_pernikahan}}" readonly>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan" value="{{ $fptk->pend}}" readonly>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="jml_sdm">Pengalaman Kerja</label>
                                    <input type="text" class="form-control" id="pengalaman" name="pengalaman" placeholder="Pendidikan" value="{{ $fptk->pengalaman_kerja}}" readonly>
                                </div>
                               
                                
                                <label for="pengalaman">Minimal Pengalaman Kerja</label>
                                <div class="form-group">
                                    <input type="text" name ="min_pengalaman" class="form-control" value="{{ $fptk->min_pengalaman}} Tahun" readonly>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Persyaratan Pekerjaan/Wajib</label>
                                    <textarea class="form-control" id="textarea" name="syarat_wajib" placeholder="Persyaratan Pekerjaan" readonly>{{ $fptk->syarat_wajib}}</textarea>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Syarat Pendukung</label>
                                    <textarea class="form-control" id="textarea" name="syarat_pendukung" placeholder="Syarat Pendukung" readonly>{{ $fptk->syarat_dukung}}</textarea>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Uraian Tugas / Tanggung Jawab</label>
                                    <textarea class="form-control" id="textarea" name="tanggung_jawab" placeholder="Uraian Tugas / Tanggung Jawab" readonly>{{ $fptk->uraian_tugas}}</textarea>
                                </div>
                                {{-- <div class="form-group ui-draggable-handle" style="position: static;"><label for="ket_keperluan">Karakteristrik Pekerjaan</label>
                                    <textarea class="form-control" id="textarea" name="karakteristik" placeholder="Karakteristrik Pekerjaan" >{{ $fptk->karakteristik}}</textarea>
                                </div> --}}

                                
                               
                                <a href="/home_fptk"><button class="btn btn-responsive button-alignment btn-danger" style="margin-bottom:7px;">Kembali</button></a>
                               
                                    
                            
                            </form>
                            </div>
                           
                        
                        
                        </div>
            </section>
        </aside>

        @endsection