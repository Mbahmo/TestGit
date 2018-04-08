<?php 
error_reporting(0);
?>
<html>
<head>
<link rel="icon" href="image/logo.png">
<link rel="stylesheet" href="styles/styles.css">
<title>Sistem Jual Buku</title>
<style>
.konten input[type=text]{
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: 1px solid #ccc; 
  width:50%;  
}
.table1{
	text-align:center;
border-collapse:collapse;
margin:auto;
border:1px solid  #000;
cursor:default;
}
th{
background-color:#10BAF8;
color:#fff;
}
th:hover{
	background-color:#fff;
color:#10BAF8;
transition:ease-in-out .2s;
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="login.php">Login</a>
</div>
<div id="kotak">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center;">
  <h1 style="color:#4FB6F0;">Daftar Buku</h1>
  <form action="index.php">
 <input type="text" placeholder="Cari Buku Anda Disini..." name="cari">

     <button type="submit" >Cari</button>
     </form>
  <div id="bingkai">
<table width="90%" border="1px solid" class="table1" align="center">
<thead>
	<th>No</th>
	<th>Judul Buku</th>
	<th>Penulis</th>
	<th>Penerbit</th>
	<th>Tahun Terbit</th>
	<th>Stok</th>
    </thead>
    
<tbody>
<?php
include "koneksi.php";
$keyword=$_GET['cari'];
if(!$keyword)
{
	$sql="select * from tbbuku";
	}
	else {
		$sql="select * from tbbuku where JudulBuku like '%$keyword%' or NoISBN like '%$keyword%' or Penulis like '%$keyword%' or Penerbit like '%$keyword%' or TahunTerbit like '%$keyword%' or Stok='%$keyword%' ";
		}
		//echo $sql;
	$query=mysql_query($sql);
	$hasil=mysql_num_rows($query);
$no=1;
if($hasil!=0){
while($data=mysql_fetch_array($query)){
 ?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $data['JudulBuku'] ?></td>
<td><?php echo $data['Penulis']?></td>
<td><?php echo $data['Penerbit']?></td>
<td><?php echo $data['TahunTerbit']?></td>
<td><?php echo $data['Stok']?></td>
</tr>
<?php $no++;} }
else {?>
    <td colspan="6"> Data Tidak Ditemukan !</td>
    <?php } ?>
</tbody>
</table>
</div>
	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
