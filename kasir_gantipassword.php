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
.konten input[type=text],input[type=password]{

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

   <a   href="distributor.php">Distributor</a>
   
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
<?php 
include "koneksi.php";
$Id=$_GET['IdKasir'];
$sql="select * from tbkasir where IdKasir='$Id'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
	?>
  <h1 style="color:#4FB6F0;">Form Ganti Password</h1>
  <form action="updatekasir_gantipassword.php" method="post">
 <table align="center" width="50%" >
 <tr>
 <td>
 <input type="hidden" name="IdKasir" value="<?php echo $data['IdKasir'] ?>">
 </td></tr>
 <tr>
 <td align="right">Username : </td>
 <td align="left" ><input type="text" name="Username" value="<?php echo $data['Username']?>" readonly></td>
 	</tr>
    <tr>
    <td align="right">Password Lama :</td>
    <td align="left" ><input type="password" name="PasswordLama" required></td>
    </tr>
    <tr>
    <td align="right">Password Baru :</td>
    <td align="left" ><input type="password" name="PasswordBaru" required></td>
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
