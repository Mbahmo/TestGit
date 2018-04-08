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
if($Level=='Kasir'){
echo "<script>
alert('Anda tidak mempunyai hak akses untuk halaman ini !');
location.href='utama.php';
</script>";
}
//echo $Level;
?>
<html>
<head>
<link rel="icon" href="image/logo.png">
<link rel="stylesheet" href="styles/styles.css">
<title>Sistem Jual Buku</title>
<style>
.konten input[type=text]{

  font-size: 12px;
  border: 1px solid #ccc; 
  width:50%;  
}
.table1,th,td{
border-collapse:collapse;
margin:auto;
}
th {
background-color:#21DFFF;
color:#FFFFFF;
}
th:hover {
background-color:#FFFFFF;
color:#21DFFF;
transition:ease-in-out 0.3s;
}
</style>
</head>
<body>
<div class="topnav">
 <a href="utama.php">Home</a> 

   <a class="active" href="distributor.php">Distributor</a>
   
   <a href="buku.php">Buku</a>
   <a href="pasok.php">Pasok</a>
   <a href="kasir.php">Kasir</a>
   <a href="penjualan.php">Penjualan</a>
   <a href="laporan.php">Laporan</a>
  <a href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
</div>
<div id="kotak">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center;">
  <h1 style="color:#4FB6F0;">Form Distributor</h1>
  <form action="tambahdistributor.php" method="post">
 <table align="center" width="60%" >
 <tr>
 <td align="right">Nama Distributor : </td>
 <td align="left" ><input type="text" name="Nama" required></td>
 	</tr>
    <tr>
    <td align="right">Alamat :</td>
    <td align="left" ><input type="text" name="Alamat" required></td>
    </tr>
    <tr>
    <td align="right">No Telp :</td>
    <td align="left" ><input type="number" name="Telp" required></td>
    </tr>
    <tr>
    <td></td>
    <td align="left" ><input class="btn-default" style="font-size:17px;margin-right:5px;" type="submit" value="Simpan"><input class="btn-default" style="font-size:17px;" type="reset" value="Batal"></td></tr>
    
 	</table>
     </form>
  <div id="bingkai">
<table width="90%" border="1px solid" class="table1" align="center"> 
<thead >
	<th>No</th>
	<th>Nama Distributor</th>
	<th>Alamat</th>
	<th>No Telp</th>
	<th>Action</th>
    </thead>
    
<tbody>
<?php 
	include "koneksi.php";
	$sql='select * from tbdistributor';
	$query=mysql_query($sql);
	$no=1;
	while ($data=mysql_fetch_array($query)){
	?>
<tr>
<td align="center"><?php echo $no; ?></td>
<td align="center"><?php echo $data['NamaDistributor'] ?></td>
<td align="center"><?php echo $data['Alamat']?></td>
<td align="center"><?php echo $data['NoTelp']?></td>
<td align="center"><a href="distributor_edit.php?<?php echo 'IdDistributor='. $data['IdDistributor']?>" class="btn-warning">Edit</a>
<a onClick="return confirm('Apakah anda ingin menghapus data ini?')" href="hapusdistributor.php?<?php echo 'IdDistributor='.$data['IdDistributor']?>" class="btn-danger">Hapus</a> </td>
</tr>
<?php $no++;} ?>
</tbody>
</table>
</div>
	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
