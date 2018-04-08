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
<html>
<head>
<link rel="icon" href="image/logo.png">
<link rel="stylesheet" href="styles/styles.css">
<title>Sistem Jual Buku</title>
<style>
.konten input[type=text],[type=password]{

  font-size: 12px;
  border: 1px solid #ccc; 
  width:10%;  
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
  <?php if($Level!='Kasir'){ ?>
   <a  href="distributor.php">Distributor</a>

   <a href="buku.php">Buku</a>
   <a href="pasok.php">Pasok</a>
   <a  href="kasir.php">Kasir</a>
   <?php } ?>
   <a  href="penjualan.php">Penjualan</a>
   <a class="active" href="laporan.php">Laporan</a>
  <a href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
</div>
<div id="kotak">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center; margin-bottom:10%;">
  <h1 style="color:#4FB6F0;">Form Cetak</h1>
  <form action="cetaklaporan.php" method="post">
 <table  align="center" width="80%">
  <tr>
    <td align="right">Pilih Bulan :</td>
    <td align="left" >
    <select name="Bulan">
    <option value="01">Januari</option>
    <option value="02">Februari</option>
    <option value="03">Maret</option>
    <option value="04">April</option>
    <option value="05">Mei</option>
    <option value="06">Juni</option>
    <option value="07">Juli</option>
    <option value="08">Agustus</option>
    <option value="09">September</option>
    <option value="10">Oktober</option>
    <option value="11">November</option>
    <option value="12">Desember</option>
    </select>
    </td>
    </tr>
    <tr>
    <td align="right">Pilih Tahun :</td>
    <td><input type="number" name="Tahun" max="2200"></td>
    	</tr>
<tr>

 <td align="right" width="49%">Pilih User : </td>
 <td align="left" ><select name="User">
 <option value="Semua">Semua</option>
 <?php include "koneksi.php";
 $sql="select tbkasir.Username,tbpenjualan.* from tbpenjualan inner join tbkasir on tbpenjualan.IdKasir=tbkasir.IdKasir group by tbpenjualan.idkasir";
 $query=mysql_query($sql); 
 while($data=mysql_fetch_array($query)){
	 ?>
 <option value="<?php echo $data['IdKasir'] ?>"><?php echo $data['Username'] ?></option>
 <?php }?>
 	</select>
</td>
 	</tr>
   
    <tr>
   
    <tr>
    <td></td>
    <td align="left" ><input class="btn-blue" style="font-size:17px;margin-right:5px;" type="submit" value="Cetak"></td></tr>
    
 	</table>
     </form>

</div>
	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
