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
 <a  href="utama.php">Home</a> 

   <a href="distributor.php">Distributor</a>
   
   <a href="buku.php">Buku</a>
   <a  class="active" href="pasok.php">Pasok</a>
   <a href="kasir.php">Kasir</a>
   <a href="penjualan.php">Penjualan</a>
   <a href="laporan.php">Laporan</a>
  <a href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
</div>
<div id="kotak" style="margin-bottom:10%;">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center;">
  <h1 style="color:#4FB6F0;">Form Detail Pasok</h1>
  <form action="updatepasok_detail.php" method="post">
  <?php 
  include "koneksi.php";
  $IdPasok=$_GET['IdPasok'];
  $sql="SELECT
  `tbpasok`.*, `tbdistributor`.`NamaDistributor`, `tbbuku`.`JudulBuku`
FROM
  `tbbuku` INNER JOIN
  `tbpasok` ON `tbbuku`.`IdBuku` = `tbpasok`.`IdBuku` INNER JOIN
  `tbdistributor` ON `tbdistributor`.`IdDistributor` = `tbpasok`.`IdDistributor`";
  $sql.=" where IdPasok='$IdPasok'";
  $query=mysql_query($sql);
  $data=mysql_fetch_array($query);
  ?>
 <table align="center"  width="60%" >
 <tr>
 <td><input type="hidden" name="JumlahPasok" value="<?php echo $data['Jumlah']?>">
 </td>
 </tr>
 <tr>
 <td><input type="hidden" name="IdPasok" value="<?php echo $data['IdPasok']?>">
 </td>
 </tr>
 <tr>
 <td align="right" width="45%">Distributor : </td>
 <td align="left" ><select name="Distributor">
<?php echo "<option value='$data[IdDistributor]'>$data[NamaDistributor]</option>"; ?>
   
        </select>
        	</td>
 	</tr>
    <tr>
    <td align="right">Buku :</td>
    <td align="left" ><select name="Buku">
<?php echo "<option value='$data[IdBuku]'>$data[JudulBuku]</option>"?>  
  
    	</select></td>
    </tr>
    <tr>
    <td align="right">Jumlah Untuk Stok :</td>
    <td align="left" ><input type="number" name="Jumlah" value="<?php echo $data['Jumlah']?>" readonly></td>
    </tr> 
    <tr>
    <td align="right">Tgl Keluar :</td>
    <td align="left" ><input type="date" name="TglKeluar" value="<?php echo date('Y-m-d') ?>" required></td>
    </tr>
  <tr>
    <td></td>
    <td align="left" ><input class="btn-default" style="font-size:17px;margin-right:5px;" type="submit" value="Simpan"><input class="btn-default" style="font-size:17px;" type="reset" value="Batal"></td></tr>
    
 	</table>
     </form>

	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
