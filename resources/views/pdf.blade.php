<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Cetak Laporan </title>
    <style>
      table{
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:1px solid #000;
      padding: 3px;
      vertical-align: top;
  }

    </style>
</head>
<body>
<div class="container">
<div class="row">
    
    <img src="img/kop 514.jpg" style="float:right" height="70px"><br><br>
    <h3><div style="text-align: left;">SURAT PENAWARAN HARGA</div></h3>
        <div style="text-align: left;">No: 17-STB/SPH/2017</div>
        <div style="text-align: right;">Company   : UNIVERSITAS PADJAJARAN</div>
        <div style="text-align: right;">Address   : Jl. Raya Bandung-Sumedang KM21</div>
        <div style="text-align: right;">Attn      : Unit Layanan Pengadaan Universitas Padjajaran</div>
        <div style="text-align: right;">Subject   : Penawaran Alat dan Bahan Robot</div>
        <div style="text-align: left;">Contact Person:</div>
        <div style="text-align: left;">Dede Suhendi 085294961800</div>
    <table>
        <tr>
            <th><center> No </center></th>
            <th><center> Nama Barang </center></th>
            <th><center> Merk  </center></th>
            <th><center> Kuantitas </center></th>
            <th><center> Harga </center></th>
            <th><center> Total Harga </center></th>
        </tr> 
                @php $no=1; @endphp
                @foreach($gudangs as $data) 
                <tr>
                <td><center>{{$no++}}</center></td>
                <td><center>{{$data->nama_barang}}</center></td>
                <td><center>{{$data->merk}}</center></td>
                <td><center>{{$data->kuantitas}}</center></td>
                <td><center>Rp.{{ number_format($data->harga, 2) }}</center></td>
                <td><center>Rp.{{ number_format($data->total_harga, 2)}}</center></td>
                </tr>
                @endforeach
    </table>
</body>
</html>