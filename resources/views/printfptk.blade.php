{{--  {{dd($abc)}}  --}}
<!DOCTYPE html>
<html>
<head>
    <title>FPTK </title>
    <link href=" {{ asset ('public /css/
bootstrap.min.css') }} "rel="stylesheet">
</head>
<body>
<div class="panel panel - default">
   <div class="panel-heading">
        <img src="../public/img/logo.png" alt="logo">
        <h3 align="center">  FORMULIR PERMINTAAN TENAGA KERJA (FPTK) </h3>
</div>

<div class="panel-body">
        <table class ="table table-bordered table-hover">
                <tr>
                    <th>No</th>
                    <th>Subject</th> 
                    <th>Keterangan</th>
                </tr>
                @foreach ($abc as $xyz)
                <tr>
                    <td>{{++$no}}</td>
                    <td>Divisi/Department</td>
                    <td>: {{ $xyz->nama_bagian}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Nama</td>
                    <td>: {{$xyz->nama}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Jumlah SDM yang diminta</td>
                    <td>: {{$xyz->jml_sdm}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Lokasi Kerja</td>
                    <td>: {{$xyz->nama_cabang}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Keperluan</td>
                    <td>: {{$xyz->keperluan}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Keterangan Keperluan</td>
                    <td>: {{$xyz->ket_keperluan}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Status Karyawan</td>
                    <td>: {{$xyz->status_karyawan}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Jenis Kelamin</td>
                    <td>: {{$xyz->jns_kel}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Status Pernikahan</td>
                    <td>: {{$xyz->stat_pernikahan}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Pendidikan</td>
                    <td>: {{$xyz->pend}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Pengalaman Kerja</td>
                    <td>: {{$xyz->pengalaman_kerja}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Minimal Pengalaman Kerja</td>
                    <td>: {{$xyz->min_pengalaman}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Syarat Wajib</td>
                    <td>: {{$xyz->syarat_wajib}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Syarat Pendukung</td>
                    <td>: {{$xyz->syarat_dukung}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Uraian Tugas & Tanggung Jawab</td>
                    <td>: {{$xyz->uraian_tugas}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Karakteristik Pekerjaan</td>
                    <td>: {{$xyz->karakteristik}}</td>
                </tr>
                <tr>
                    <td  rowspan="5" colspan="3">Gambarkan struktur organisasi secara lengkap di unit kerja termasuk atasan dan bawahan sesuai dengan posisi yang diminta :</td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="3">Yang Mengajukan</td>
                    <td rowspan="3">Mengetahui      Menyetujui,</td>
                </tr>
                <tr>
                    <td colspan="2">User      Kabag</td>
                    <td>Dir.OPR & Kepatuhan     Dir.Bisnis    Dir.Utama</td>
                </tr>
                <tr>
                    <td colspan="2">tgl:        tgl:</td>
                    <td>tgtl:    tgl:     tgl:</td>
                </tr>
                @endforeach
                
        </table>
</div>
</div>
</body>
</html>