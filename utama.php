<?php 
session_start();
$IdKasir=$_SESSION['IdKasir'];
$Level=$_SESSION['Level'];
if($IdKasir==''){
echo "<script>
alert('Anda tidak bisa mengakses halaman ini ! Silahkan login terlebih dahulu!');
location.href='login.php';
</script>";

}
?>
<!DOCTYPE html>
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
.table1,th,td{
	text-align:center;
border-collapse:collapse;
margin:auto;
border:1px solid  #D1D1D1;
}
.konten{
font-size:24px;
}
@media screen and (max-width:600px){
.konten{
font-size:20px;
}
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="utama.php">Home</a> 
<?php
if ($Level!='Kasir'){
 ?>
   <a href="distributor.php">Distributor</a>
   
   <a href="buku.php">Buku</a>
   <a href="pasok.php">Pasok</a>
   <a href="kasir.php">Kasir</a>
   <?php } ?>
   <a href="penjualan.php">Penjualan</a>
   <a href="laporan.php">Laporan</a>
  <a href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
</div>
<div id="kotak">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center;">
<?php 
include "koneksi.php";
$sql="select * from tbkasir where IdKasir='$IdKasir'";
$query=mysql_query($sql);
while ($data=mysql_fetch_array($query)){
?>
	
  <h1 style="color:#4FB6F0;">Selamat Datang <?php echo $data['Level'].' '.$data['NamaLengkap'] ?></h1>
  <div class="container1" style="margin-bottom:3%;">
  	<img class="image responsive" onerror="this.src='foto/kasir/noImage.jpg';" style="margin:auto;" width="30%" src="image/<?php if($Level=='Admin'){ echo 'admin.png';}else { echo 'cashier.png';} ?>">
  </div>
<?php }?>
  <div id="bingkai">
</div>
	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
