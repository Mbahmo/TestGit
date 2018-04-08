<?php 
session_start();
$IdKasir=$_SESSION['IdKasir'];
$Level=$_SESSION['Level'];
if($IdKasir==''){
echo "<script>
alert('Anda tidak bisa mengakses halaman ini ! Silahkan login terlebih dahulu!');
location.href='login.php';
</script>";
if($Level=='Kasir'){
echo "<script>
alert('Anda tidak mempunyai hak akses untuk halaman ini !');
location.href='utama.php';
</script>";
}
}
?>
<html>
<head>
<link rel="icon" href="image/logo.png">
<link rel="stylesheet" href="styles/styles.css">
<title>Sistem Jual Buku</title>
<style>
.konten input[type=text],[type=number],select,[type=password]{

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

   <a  href="distributor.php">Distributor</a>
   
   <a href="buku.php">Buku</a>
   <a href="pasok.php">Pasok</a>
   <a class="active" href="kasir.php">Kasir</a>
   <a href="penjualan.php">Penjualan</a>
   <a href="laporan.php">Laporan</a>
  <a href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
</div>
<div id="kotak">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center;">
  <h1 style="color:#4FB6F0;">Form Kasir</h1>
  <form action="tambahkasir.php" method="post" enctype="multipart/form-data">
 <table  align="center" width="70%" >
<tr>
 <td width="46%" align="right">Username : </td>
 <td align="left" ><input type="text" name="Username" required></td>
 	</tr>
    <tr>
 <td align="right">Password : </td>
 <td align="left" ><input type="password" name="Password" required></td>
 	</tr>
 <tr>
 <td align="right">Nama Lengkap : </td>
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
    <td align="right">Level :</td>
    <td align="left" >
    <select name="Level">
    <option value="Admin">Admin</option>
    <option value="Kasir">Kasir</option>
    </select></td>
    </tr>
    <tr>
    <td align="right">Foto :</td>
    <td align="left" ><input type="file" name="Foto" required></td>
    </tr>
    <tr>
    <td></td>
    <td align="left" ><input class="btn-default" style="font-size:17px;margin-right:5px;" type="submit" value="Simpan"><input class="btn-default" style="font-size:17px;" type="reset" value="Batal"></td></tr>
    
 	</table>
     </form>
  <div id="bingkai">
<table width="90%" border="1px solid" class="table1" align="center" style="margin-bottom:50px;"> 
<thead >
	<th>No</th>
	<th>Username</th>
	<th>Nama Kasir</th>
	<th>Alamat</th>
	<th>No Telp</th>
    <th>Level</th>
	<th width="10%">Foto</th>
	<th width="23%">Action</th>
    </thead>
    
<tbody>
<?php 
	include "koneksi.php";
	$sql='select * from tbkasir';
	$query=mysql_query($sql);
	$no=1;
	while ($data=mysql_fetch_array($query)){
	?>
<tr>
<td align="center"><?php echo $no; ?></td>
<td align="center"><?php echo $data['Username'] ?></td>
<td align="center"><?php echo $data['NamaLengkap'] ?></td>
<td align="center"><?php echo $data['Alamat']?></td>
<td align="center"><?php echo $data['Telp']?></td>
<td align="center"><?php echo $data['Level']?></td>
<td align="center"><img style="width:100%;" src="foto/kasir/<?php echo $data['Foto']?>" onerror="this.src='foto/kasir/noImage.jpg';"></td>
<td align="center"><a href="kasir_gantipassword.php?<?php echo 'IdKasir='. $data['IdKasir']?>" class="btn-blue">Ganti Password</a> <a href="kasir_edit.php?<?php echo 'IdKasir='. $data['IdKasir']?>" class="btn-warning">Edit</a>
<?php
if($data['Status']=='Aktif'){
 ?>
<a onClick="return confirm('Apakah anda yakin?')" href="offkasir.php?<?php echo 'IdKasir='.$data['IdKasir']?>" class="btn-danger">Off</a> </td>
<?php }
else { ?>
<a onClick="return confirm('Apakah anda yakin?')" href="onkasir.php?<?php echo 'IdKasir='.$data['IdKasir']?>" class="btn-danger">Ready</a> </td>
<?php } ?>
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
