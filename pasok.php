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
<div id="kotak">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center;">
  <h1 style="color:#4FB6F0;">Form Pasok</h1>
  <form action="tambahpasok.php" method="post">
 <table align="center"  width="70%" >
 <tr>
 <td align="right" width="45%">Distributor : </td>
 <td align="left" ><select name="Distributor">
 		<?php 
		include "koneksi.php";
		$sql="select * from tbdistributor";
		$query=mysql_query($sql);
		while ($data=mysql_fetch_array($query)){
			
			?>
        <option value="<?php echo $data['IdDistributor']?>"><?php echo $data['NamaDistributor']?></option>
        <?php }?>
        </select>
        	</td>
 	</tr>
    <tr>
    <td align="right">Buku :</td>
    <td align="left" ><select name="Buku">
    <?php include "koneksi.php";
	$sql="select * from tbbuku";
	$query=mysql_query($sql);
	while($data=mysql_fetch_array($query)){
	 ?>
     <option value="<?php echo $data['IdBuku']?>"><?php echo $data['JudulBuku'] ?></option>
     <?php } ?>
    	</select></td>
    </tr>
    <tr>
    <td align="right">Jumlah :</td>
    <td align="left" ><input type="number" name="Jumlah" required></td>
    </tr> 
     <tr>
    <td align="right">Tgl Masuk :</td>
    <td align="left" ><input type="date" name="TglMasuk" value="<?php echo date('Y-m-d')?>" required></td>
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
	<th>Distributor</th>
	<th>Judul</th>
	<th>Jumlah</th>
	<th>Tgl Masuk</th>
	<th>Tgl Keluar</th>
	<th>Action</th>
    </thead>
    
<tbody>
<?php 
	include "koneksi.php";
	$sql='SELECT
  `tbpasok`.*, `tbdistributor`.`NamaDistributor`, `tbbuku`.`JudulBuku`
FROM
  `tbbuku` INNER JOIN
  `tbpasok` ON `tbbuku`.`IdBuku` = `tbpasok`.`IdBuku` INNER JOIN
  `tbdistributor` ON `tbdistributor`.`IdDistributor` = `tbpasok`.`IdDistributor`;';
	$query=mysql_query($sql);
	$no=1;
	while ($data=mysql_fetch_array($query)){
	?>
<tr>
<td align="center"><?php echo $no ?></td>
<td align="center"><?php echo $data['NamaDistributor'] ?></td>
<td align="center"><?php echo $data['JudulBuku']?></td>
<td align="center"><?php echo $data['Jumlah']?></td>
<td align="center"><?php echo $data['TglMasuk']?></td>
<td align="center"><?php echo $data['TglKeluar']?></td>
<td align="center"><a href="pasok_detail.php?<?php echo 'IdPasok='. $data['IdPasok']?>" class="btn-blue">Detail</a>
<a href="pasok_edit.php?<?php echo 'IdPasok='. $data['IdPasok']?>" class="btn-warning">Edit</a>
<a onClick="return confirm('Apakah anda ingin menghapus data ini?')" href="hapuspasok.php?<?php echo 'IdPasok='.$data['IdPasok']?>" class="btn-danger">Hapus</a> </td>
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
