{{--  {{dd($abc)}}  --}}
<!DOCTYPE html>
<html>
<head>
    <title>FPTK </title>
    <link href=" {{ asset ('public /css/
bootstrap.min.css') }} "rel="stylesheet">
<style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;    
        }
        th.a{
            text-align: center;
        }
        </style>
</head>
<body>
<div class="panel panel - default">
        @foreach ($abc as $xyz)
   <div class="panel-heading">
        <img src="../public/img/logo.png" alt="logo">
        <p align="right">{{$xyz->id}}</p>
        <h3 align="center">  FORMULIR PERMINTAAN TENAGA KERJA (FPTK) </h3>
</div>

<div class="panel-body">
        <table style="width:100%">
                <tr>
                    <th class="a" width="10px">No</th>
                    <th class="a" width="180px">Subject</th> 
                    <th class="a" width="350px">Keterangan</th>
                </tr>
                
                <tr>
                    <td>{{++$no}}</td>
                    <td>Divisi/Department/Cabang</td>
                    <td>{{ $xyz->nama_bagian}} / {{$xyz->nama_cabang}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Nama Jabatan/Grade</td>
                    <td>{{$xyz->grade}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Jumlah SDM yang diminta</td>
                    <td>{{$xyz->jml_sdm}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Lokasi Kerja</td>
                    <td>{{$xyz->nama_cabang}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Keperluan</td>
                    <td>{{$xyz->keperluan}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Keterangan Keperluan</td>
                    <td>{{$xyz->ket_keperluan}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Status Karyawan</td>
                    <td>{{$xyz->status_karyawan}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Jenis Kelamin</td>
                    <td>{{$xyz->jns_kel}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Status Pernikahan</td>
                    <td>{{$xyz->stat_pernikahan}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Pendidikan</td>
                    <td>{{$xyz->pend}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Pengalaman Kerja</td>
                    <td>{{$xyz->pengalaman_kerja}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Minimal Pengalaman Kerja</td>
                    <td>{{$xyz->min_pengalaman}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Syarat Wajib</td>
                    <td>{{$xyz->syarat_wajib}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Syarat Pendukung</td>
                    <td>{{$xyz->syarat_dukung}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Uraian Tugas & Tanggung Jawab</td>
                    <td>{{$xyz->uraian_tugas}}</td>
                </tr>
                <tr>
                    <td>{{++$no}}</td>
                    <td>Karakteristik Pekerjaan</td>
                    <td>{{$xyz->karakteristik}}</td>
                </tr>
                <tr>
                    <td colspan="3">Gambarkan struktur organisasi secara lengkap di unit kerja termasuk atasan dan bawahan sesuai dengan posisi yang diminta : <br><br><br><br><br><br><br></td>
                    
                </tr>
                <tr>
                    <td style="border:0px;" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang mengajukan<br><br><br><br></td>
                    <td style="border:0px;">Mengetahui&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyetujui, <br><br><br><br></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:0px;">User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kabag/Kadiv/Kacab</td>
                    <td style="border:0px;">Dir.OPR&Kepatuhan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dir.Bisnis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dir.Utama</td>
                </tr>
                <tr>
                    <td style="border:0px;" colspan="2">tgl:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tgl:</td>
                    <td style="border:0px;">tgl:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tgl:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tgl:</td>
                </tr>
                <tr>
                    <td style="border:0px;" colspan="2">a. Terpenuhi Tanggal</td>
                    <td style="border:0px;">:</td>
                </tr>
                <tr>
                    <td style="border:0px;" colspan="2">b. Nama</td>
                    <td style="border:0px;">:</td>
                </tr>
                <tr>
                    <td style="border:0px;" colspan="2">c. Diserahkan ke</td>
                    <td style="border:0px;">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; tgl:</td>
                </tr>
                @endforeach
                
        </table>
</div>
</div>
</body>
</html>