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
 <a href="utama.php">Home</a> 

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
  <h1 style="color:#4FB6F0;">Form Edit Pasok</h1>
  <form action="updatepasok_edit.php" method="post">
  <?php 
  include "koneksi.php";
  $IdPasok=$_GET['IdPasok'];
  $sql="select * from tbpasok";
  $sql.=" where IdPasok='$IdPasok'";
  $query=mysql_query($sql);
  $data=mysql_fetch_array($query);
  ?>
 <table align="center"  width="60%" >
 <tr>
 </tr>
 <tr>
 <td><input type="hidden" name="IdPasok" value="<?php echo $data['IdPasok']?>">
 </td>
 </tr>
 <tr>
 <td align="right" width="45%">Distributor : </td>
 <td align="left" >
 <select name="Distributor">

 <?php include "koneksi.php";
 $sql="select * from tbdistributor";
 $query=mysql_query($sql);
 while($distributor=mysql_fetch_array($query)){?>
<option value="<?php echo $distributor['IdDistributor'];?>"
<?php 
	if($distributor['IdDistributor']==$data['IdDistributor'])
	{
		echo 'selected';
		}
	?>>
	
	<?php echo $distributor['NamaDistributor']?></option>
<?php } ?>
   
        </select>
        	</td>
 	</tr>
    <tr>
    <td align="right">Buku :</td>
    <td align="left" ><select name="Buku">
        <?php 
	include "koneksi.php";
	$sql="select * from tbbuku";
	$query=mysql_query($sql);
	while($buku=mysql_fetch_array($query)){
	?>

<option value="<?php echo $buku['IdBuku'];?>" <?php if ($data['IdBuku']==$buku['IdBuku']){ echo 'selected';}?>>
<?php echo $buku['JudulBuku'];?></option>  
    	<?php }?>
        </select></td>
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
