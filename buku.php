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
location.href='login.php';
</script>";
}
?>
<html>
<head>
<link rel="icon" href="image/logo.png">
<link rel="stylesheet" href="styles/styles.css">
<title>Sistem Jual Buku</title>
<style>
.konten input[type=text],input[type=number]{

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
 <a  href="utama.php">Home</a> 

   <a href="distributor.php">Distributor</a>
   
   <a class="active" href="buku.php">Buku</a>
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
  <h1 style="color:#4FB6F0;">Form Buku</h1>
  <form action="tambahbuku.php" method="post">
 <table align="center" width="60%" >
 <tr>
 <td align="right">Judul Buku : </td>
 <td align="left" ><input type="text" name="Judul" required></td>
 	</tr>
    <tr>
    <td align="right">ISBN :</td>
    <td align="left" ><input type="text" name="ISBN" required></td>
    </tr>
    <tr>
    <td align="right">Penulis :</td>
    <td align="left" ><input type="text" name="Penulis" required></td>
    </tr> 
     <tr>
    <td align="right">Penerbit :</td>
    <td align="left" ><input type="text" name="Penerbit" required></td>
    </tr> 
    <tr>
    <td align="right">Tahun Terbit :</td>
    <td align="left" ><input type="number" name="Tahun" max="9999" required></td>
    </tr> 
    <tr>
    <td align="right">Stok :</td>
    <td align="left" ><input type="number" name="Stok" value="0" readonly></td>
    </tr>
    <tr>
    <td align="right">Harga Pokok :</td>
    <td align="left" ><input type="number" name="HargaPokok" required></td>
    </tr> 
    <tr>
    <td align="right">Harga Jual :</td>
    <td align="left" ><input type="number" name="HargaJual" required></td>
    </tr>
    <tr>
    <td align="right">PPN :</td>
    <td align="left" ><input type="number" name="PPN" required> %</td>
    </tr>
     <tr>
    <td align="right">Diskon :</td>
    <td align="left" ><input type="number" name="Diskon" required> %</td>
    </tr>
    <tr>
    <td></td>
    <td align="left" ><input class="btn-default" style="font-size:17px;margin-right:5px;" type="submit" value="Simpan"><input class="btn-default" style="font-size:17px;" type="reset" value="Batal"></td></tr>
    
 	</table>
     </form>
  <div id="bingkai">
<table width="90%" border="1px solid" class="table1" align="center"> 
<thead >
	<th>No ISBN</th>
	<th>Judul Buku</th>
	<th>Penulis</th>
	<th>Penerbit</th>
	<th>Stok</th>
	<th>Action</th>
    </thead>
    
<tbody>
<?php 
	include "koneksi.php";
	$sql='select * from tbbuku';
	$query=mysql_query($sql);
	while ($data=mysql_fetch_array($query)){
	?>
<tr>
<td align="center"><?php echo $data['NoISBN'] ?></td>
<td align="center"><?php echo $data['JudulBuku'] ?></td>
<td align="center"><?php echo $data['Penulis']?></td>
<td align="center"><?php echo $data['Penerbit']?></td>
<td align="center"><?php echo $data['Stok']?></td>
<td align="center"><a href="buku_edit.php?<?php echo 'IdBuku='. $data['IdBuku']?>" class="btn-warning">Edit</a>
<a onClick="return confirm('Apakah anda ingin menghapus data ini?')" href="hapusbuku.php?<?php echo 'IdBuku='.$data['IdBuku']?>" class="btn-danger">Hapus</a> </td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
