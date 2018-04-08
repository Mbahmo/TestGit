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
.konten input[type=text],[type=number],select{

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
$Level=$data['Level'];
	?>
  <h1 style="color:#4FB6F0;">Form Update Kasir</h1>
  <form action="updatekasir_edit.php" method="post" enctype="multipart/form-data">
 <table align="center" width="50%" >
 <tr>
 <td></td>
 <td>
 <input type="hidden" name="IdKasir" value="<?php echo $data['IdKasir']?>">
 </td></tr>
 <tr>
  <td align="right" width="47%">Nama Lengkap : </td>
 <td align="left" ><input type="text" name="Nama" value="<?php echo $data['NamaLengkap']?>" required></td>
 	</tr>
    <tr>
    <td align="right">Alamat :</td>
    <td align="left" ><input type="text" name="Alamat" value="<?php echo $data['Alamat']?>" required></td>
    </tr>
    <tr>
    <td align="right">No Telp :</td>
    <td align="left" ><input type="number" name="Telp" value="<?php echo $data['Telp'] ?>" required></td>
    </tr>
    <tr>
    <td align="right">Level :</td>
    <td align="left" >
    <select name="Level">
    <option value="Admin" <?php if($Level=='Admin'){ echo 'selected';} ?>>Admin</option>
    <option value="Kasir" <?php if ($Level=='Kasir'){ echo 'selected';} ?>>Kasir</option>
    </select></td>
    </tr>
    <tr>
    <td align="right">Foto :</td>
    <td align="left" ><input type="file" name="Foto"></td>
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
