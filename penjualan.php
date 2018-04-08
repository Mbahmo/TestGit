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
.konten input[type=text],[type=password],[type=number],select{

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
<?php if($Level!='Kasir') { ?>
   <a  href="distributor.php">Distributor</a>
   
   <a href="buku.php">Buku</a>
   <a href="pasok.php">Pasok</a>
   <a  href="kasir.php">Kasir</a>
   <?php } ?>
   <a class="active" href="penjualan.php">Penjualan</a>
   <a href="laporan.php">Laporan</a>
  <a href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar?')">Logout</a>
</div>
<div id="kotak">
<center>
   <img src="image/garisbuku.png" class="logo"></center>
<div  class="konten" style="text-align:center; margin-bottom:10%;">
  <h1 style="color:#4FB6F0;">Form Penjualan</h1>
  <form action="tambahpenjualan.php" method="post">
 <table  align="center" width="80%">
<tr>

 <td align="right" width="42%">Pilih Buku : </td>
 <td align="left" ><select name="Buku">
 <?php include "koneksi.php";
 $sql="select * from tbbuku where stok>0";
 $query=mysql_query($sql); 
 while($data=mysql_fetch_array($query)){
	 ?>
 <option value="<?php echo $data['IdBuku'] ?>"><?php echo $data['JudulBuku'] ?></option>
 <?php }?>
 	</select>
</td>
 	</tr>
    <tr>
    <td align="right">Jumlah :</td>
    <td align="left" ><input type="number" name="Jumlah" required></td>
    </tr>
    <tr>
   
    <tr>
    <td></td>
    <td align="left" ><input class="btn-default" style="font-size:17px;margin-right:5px;" type="submit" value="Simpan"><input class="btn-default" style="font-size:17px;" type="reset" value="Batal"></td></tr>
    
 	</table>
     </form>
     <?php 
	 include "koneksi.php";
	 $sql="select tbpenjualan.*,tbbuku.* from tbpenjualan
	inner join tbbuku on tbpenjualan.idbuku=tbbuku.idbuku where Status='Belum Tercetak' and IdKasir='$IdKasir'";
	$query=mysql_query($sql);
	$hasil=mysql_num_rows($query);
	if($hasil!=0){
	 ?>
   <div id="bingkai">
<table width="90%" border="1px solid" class="table1" align="center" style="margin-bottom:50px;"> 
<thead >
	<th>No</th>
	<th>Judul Buku</th>	
    <th>Harga Jual</th> 
    <th>Diskon</th>
    <th>PPN</th>
    <th>Jumlah</th>
    <th>Total Bayar</th>
    <th>Action</th>

    </thead>
     <h1 style="color:#4FB6F0;">Detail Penjualan</h1>
<tbody>
<?php 
	include "koneksi.php";
	$sql="select tbpenjualan.*,tbbuku.* from tbpenjualan
	inner join tbbuku on tbpenjualan.idbuku=tbbuku.idbuku where Status='Belum Tercetak' and IdKasir='$IdKasir'";
	$query=mysql_query($sql);
	$total=0;
	$no=1;
	$NoTransaksi=0;
	while ($data=mysql_fetch_array($query)){
	?>
<tr>
<td align="center"><?php echo $no; ?></td>
<td align="center"><?php echo $data['JudulBuku'] ?></td>
<td align="center"><?php echo $data['HargaJual'] ?></td>
<td align="center"><?php echo $data['Diskon'] ?>%</td>
<td align="center"><?php echo $data['PPN'] ?>%</td>
<td align="center"><?php echo $data['Jumlah'] ?></td>
<td align="center"><?php echo 'Rp.'.number_format($data['TotalBayar'],'0',',','.') ?></td>
<td align="center"><a onClick="return confirm('Apakah anda yakin ingin menghapus transaksi ini?');" href="hapuspenjualan.php?<?php echo 'IdPenjualan='.$data['IdPenjualan'].'&IdBuku='.$data['IdBuku'];?>" class="btn-danger">Hapus</a></td>
</tr>
<?php $no++;
$total=$total+$data['TotalBayar'];
$NoTransaksi=$data['NoTransaksi'];
} 

?>
<tr>
<td colspan="6" align="right" style="font-size:18px">Total Bayar : &nbsp;</td>
<td align="center"><?php echo 'Rp.'.number_format($total,'0',',','.'); ?></td>
<td align="center">
<?php if($NoTransaksi=="") {?>
<a href="tambahpenjualan_setnotransaksi.php" class="btn-blue">Checkout</a><?php }?>
<?php if($NoTransaksi!=""){?>
<a  href="cetakpenjualan.php?<?php echo 'NoTransaksi='.$NoTransaksi?>" class="btn-blue">Cetak Nota</a><?php } ?></td>
</tr>
</tbody>
</table>
</div>
<?php } ?>
</div>
	</div>
	</div>
<div class="footer">&copy; Anthony Lee - Jual Buku 2018</div>
</body>
</html>
