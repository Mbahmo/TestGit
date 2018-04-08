<?php 
session_start();
$IdKasir=$_SESSION['IdKasir'];
if($IdKasir==''){
echo "<script>
alert('Anda tidak bisa mengakses halaman ini ! Silahkan login terlebih dahulu!');
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
  <h1 style="color:#4FB6F0;">Form Update Buku</h1>
  <?php 
  include "koneksi.php";
  $IdBuku=$_GET['IdBuku'];
  $sql="select * from tbbuku where IdBuku='$IdBuku'";
  $query=mysql_query($sql);
  $data=mysql_fetch_array($query);
  ?>
  <form action="updatebuku.php" method="post">
 <table align="center" width="60%" >
 <tr>
 <td align="left" ><input type="hidden" name="IdBuku" value="<?php echo $data['IdBuku']?>"></td>
 	</tr>
 <tr>
 <td align="right">Judul Buku : </td>
 <td align="left" ><input type="text" name="Judul" value="<?php echo $data['JudulBuku'] ?>" required></td>
 	</tr>
    <tr>
    <td align="right">ISBN :</td>
    <td align="left" ><input type="text" name="ISBN" value="<?php echo $data['NoISBN']?>" required></td>
    </tr>
    <tr>
    <td align="right">Penulis :</td>
    <td align="left" ><input type="text" name="Penulis" value="<?php echo $data['Penulis']?>" required></td>
    </tr> 
     <tr>
    <td align="right">Penerbit :</td>
    <td align="left" ><input type="text" name="Penerbit" value="<?php echo $data['Penerbit']?>" required></td>
    </tr> 
    <tr>
    <td align="right">Tahun Terbit :</td>
    <td align="left" ><input type="number" name="Tahun" value="<?php echo $data['TahunTerbit']?>" max="9999" required></td>
    </tr> 
    <tr>
    <td align="right">Stok :</td>
    <td align="left" ><input type="number" name="Stok" value="<?php echo $data['Stok']?>" readonly></td>
    </tr>
    <tr>
    <td align="right">Harga Pokok :</td>
    <td align="left" ><input type="number" name="HargaPokok" value="<?php echo $data['HargaPokok']?>" required></td>
    </tr> 
    <tr>
    <td align="right">Harga Jual :</td>
    <td align="left" ><input type="number" name="HargaJual" value="<?php echo $data['HargaJual']?>" required></td>
    </tr>
    <tr>
    <td align="right">PPN :</td>
    <td align="left" ><input type="number" name="PPN" value="<?php echo $data['PPN']?>" required> %</td>
    </tr>
     <tr>
    <td align="right">Diskon :</td>
    <td align="left" ><input type="number" name="Diskon" value="<?php echo $data['Diskon']?>" required> %</td>
    </tr>
    <tr>
    <td></td>
    <td align="left" ><input class="btn-default" style="font-size:17px;margin-right:5px;" type="submit" value="Simpan"><input class="btn-default" style="font-size:17px;" type="reset" value="Batal"></td></tr>
    
 	</table>
     </form>
  <div id="bingkai">
</div>
	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
