<!DOCTYPE html>
<html>
<head>
<style>
  
.tdth {
  border: 0px solid #dddddd;
  text-align: center;
  padding: 8px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.align{
  text-align: center;
}

.font
{
  font-family: arial, sans-serif;
  text-align: center;
  font-size: 13pt;
  font-style: bold;
}

.size{
  font-size:11pt;
}

</style>
</head>
<body>

<?php
$bln = array(
      '01' => 'Januari',
      '02' => 'Februari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Agustus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember'
    );


 ?>


 
  <td  class="tdth" >
       
      </td>
      
  <td class="text-center">  
  {{-- <img src="{{asset('img/logo.png')}}" align="left" width="100" height="90"> <img src="{{asset('img/logo1.png')}}" align="right" width="100" height="90"> --}}
 
  <p align="center"><b>
    <font size="5">MY SHOP</font> <br>
    <font size="3">Jalan R.E. Martadinata No. 1 Telp. (0511) 3365592 Banjarmasin 70111 </font><br>
<BR>
   

  </b></p>
                     
      </td>
      <td class="tdth"></td>
    </tr>
    <tr>
    <hr width="100%" noshade="1">
    </tr>
   
    <table border="0" width="100%" class="size">
  <tbody>
  
    {{-- <tr style="background-color: white">
      <td class="tdth" style="text-align: left" width="3">Filter</td>
      <td class="tdth" style="text-align: left" width="330">:</td>
      <td class="tdth" style="text-align: left" width="1" >-</td>
    </tr> --}}

  
</table>

    

    <!-- <tr style="background-color: white">
      <td class="tdth">Halaman</td>
      <td class="tdth">:</td>
      <td class="tdth">1</td>
      <td class="tdth"></td>
      <td class="tdth"></td>
      <td class="tdth"></td>
    </tr>

    <tr>
      <td class="tdth">Filter</td>
      <td class="tdth">:</td>
      <td class="tdth"></td>
      <td class="tdth"></td>
      <td class="tdth"></td>
      <td class="tdth"></td>
    </tr> -->
 
   


<p align="center"><b>
<font size="4">LAPORAN PRODUK </font><br>
</p></b>
<br>
<table class="size">
  <tr>
  <th>No</th>
            <th  style="text-align: center;">Nama Produk</th>
            <th  style="text-align: center;">Kode Produk</th>
            <th  style="text-align: center;">Harga</th>
           
  </tr>
  <?php $no=1 ?>
          @foreach ($products as $data)
          <tr>
            <td>{{ $no++}}</td>
            <td>{{ $data->nama_produk}}</td>
            <td>{{ $data->kode_produk}}</td>
            <td>{{ $data->harga}}</td>
            
  </tr>
  @endforeach
</table>
<br><br>



<div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Banjarmasin, <?php echo date('d').' '.$bln[date('m')].' '.date('Y') ?><br>
    Mengetahui,<br>
    Owner
    <br><br><br><br>
    <u>Aulia Mayrina Rahmi</u><br>
   
  </h5>

</div> 

<!-- <table width="100%">
  <tbody>
    <tr>
      <td class="tdth" width="50%"></td>
      <td class="align tdth">
        <font size="2pt">Banjarmasin,&nbsp;&nbsp;&nbsp;&nbsp;{{ Carbon\Carbon::parse()->translatedFormat('F Y') }}<br><br>
          <b>KEPALA KEJAKSAAN TINGGI KALIMANTAN SELATAN</b></u>
          <br><br><br><br><br>
          <b><u>ARIE ARIFIN, SH., MH</b></u><br>Jaksa Utama Madya NIP. 19601201 198503 1 004
        </font>
      </td>
    </tr>
  </tbody>
</table> -->
</body>
<script>
  window.addEventListener("load", window.print());
</script>
</html>