 {{-- {{dd($reportall)}}  --}}
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
       
   <div class="panel-heading">
        <img src="../public/img/logo.png" alt="logo">
        {{-- <p align="right">{{$xyz->id}}</p> --}}
       
</div>

<div class="panel-body">
     <h3 align="center">  SEMUA LAPORAN PROGRESS FPTK </h3>
     <h5 align="center"  style="line-height:1px;">  PERIODE : {{$tglawal}} Sampai {{$tglakhir}}</h5>
        <table style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No.Fptk</th>
                    <th>Nama Tes</th>
                    <th>Jumlah Peserta</th>
                    <th>Hasil</th>
                    <th>Tanggal ACC FPTK</th>
                </tr>
            </thead>
           
            <tbody>
                @foreach ($reportall as $views)
                <tr> 
                    <td>{{++$noreportall}}</td>
                    <td>{{$views->id_fptk}} - {{$views->grade}} {{$views->jabatan}}</td>
                    <td>{{$views->nama_tes}}</td>
                    <td>{{$views->jumlahfptk}}</td>
                    @if($views->hasil == '0')
                    <td>Tidak Lulus</td>
                    @elseif($views->hasil == '1')
                    <td>Lulus</td>
                    @else
                    <td>{{$views->hasil}}</td>
                    @endif
                    <td>{{$views->tgl_acc}}</td>
                </tr>
                @endforeach

            </tbody>
           
                
        </table>
</div>
<div class="panel-body">
        <h3 align="center">  SEMUA LAPORAN PROGRESS FPTK YANG LULUS </h3>
        <h5 align="center"   style="line-height:1px;">  PERIODE : {{$tglawal}} Sampai {{$tglakhir}}</h5>
           <table style="width:100%">
               <thead>
                   <tr>
                        <th>No</th>
                        <th>No.Fptk</th>
                        <th>Nama Tes</th>
                        <th>Jumlah Peserta</th>
                        <th>Hasil</th>
                        <th>Tanggal ACC FPTK</th>
                   </tr>
               </thead>
              
               <tbody>
                   @foreach ($report as $views)
                   <tr> 
                        <td>{{++$noreport}}</td>
                        <td>{{$views->id_fptk}} - {{$views->grade}} {{$views->jabatan}}</td>
                        <td>{{$views->nama_tes}}</td>
                        <td>{{$views->jumlahfptk}}</td>
                        @if($views->hasil == '0')
                        <td>Tidak Lulus</td>
                        @elseif($views->hasil == '1')
                        <td>Lulus</td>
                        @else
                        <td>{{$views->hasil}}</td>
                        @endif
                        <td>{{$views->tgl_acc}}</td>
                   </tr>
                   @endforeach
               </tbody>
              
                   
           </table>
   </div>
   <div class="panel-body">
        <h3 align="center">  SEMUA LAPORAN PROGRESS FPTK YANG TIDAK LULUS </h3>
        <h5 align="center"   style="line-height:1px;">  PERIODE : {{$tglawal}} Sampai {{$tglakhir}}</h5>
           <table style="width:100%">
               <thead>
                   <tr>
                        <th>No</th>
                        <th>No.Fptk</th>
                        <th>Nama Tes</th>
                        <th>Jumlah Peserta</th>
                        <th>Hasil</th>
                        <th>Tanggal ACC FPTK</th>
                   </tr>
               </thead>
              
               <tbody>
                   @foreach ($reportnon as $views)
                  
                   <tr> 
                        <td>{{++$noreportnon}}</td>
                        <td>{{$views->id_fptk}} - {{$views->grade}} {{$views->jabatan}}</td>
                        <td>{{$views->nama_tes}}</td>
                        <td>{{$views->jumlahfptk}}</td>
                        @if($views->hasil == '0')
                        <td>Tidak Lulus</td>
                        @elseif($views->hasil == '1')
                        <td>Lulus</td>
                        @else
                        <td>{{$views->hasil}}</td>
                        @endif
                        <td>{{$views->tgl_acc}}</td>
                   </tr>
                   @endforeach
               </tbody>
              
                   
           </table>
   </div>
</div>
</body>
</html>