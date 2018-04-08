<head>
<link rel="stylesheet" href="styles/styles.css">
<?php 
session_start();
$IdKasir=$_SESSION['IdKasir'];
if($IdKasir==''){
echo "<script>
alert('Anda tidak bisa mengakses halaman ini ! Silahkan login terlebih dahulu!');
location.href='login.php';
</script>";
}	
include "koneksi.php";
	$NoTransaksi=$_GET['NoTransaksi'];
$sql="select tbkasir.*,tbpenjualan.* from tbkasir inner join tbpenjualan on tbkasir.idkasir=tbpenjualan.idkasir where NoTransaksi='$NoTransaksi'";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);

$sql2="update tbpenjualan set Status='Tercetak' where NoTransaksi='$NoTransaksi'";
$query2=mysql_query($sql2);

?>
<link rel="icon" href="image/logo.png">
<title>Cetak Nota Penjualan No Transaksi <?php echo $NoTransaksi; ?></title>
</head>
<body onLoad="window.print();">
<style>
#bingkai{
	width:70%;
	height:auto;
	background-color:#FFF;
	margin:20px auto 5px auto;
	border: 1px solid #000;	
}

.table1 th{
border-collapse:collapse;
margin:auto; border:1px groove #000;
}.table1 td{
border-collapse:collapse;
margin:auto; border:1px groove #000;
}.table1 {
border-collapse:collapse;
margin:auto; border:1px groove #000;
}
</style>
<div id="bingkai">
  <h2 align="center">Nota Penjualan Buku Toko New Dewata Buku</h2>
  <hr>
  
<table>
<tr>
<td>&nbsp;No Transaksi :</td>
<td><?php echo $row['NoTransaksi'] ?></td>
</tr>
<tr>
<td>&nbsp;Admin :</td>
<td><?php echo $row['NamaLengkap'] ?></td>
</tr>
<tr>
<td>&nbsp;No Telp :</td>
<td><?php echo $row['Telp'] ?></td>
</tr>
</table><br>
 
 <div>
<table width="90%" class="table1" align="center" style="margin-bottom:50px;"> 
<thead >
	<th>No</th>
	<th>Judul Buku</th>	
    <th>Jumlah</th>
    <th>Total Bayar</th>
    </thead>
  
     
<tbody>
<?php 
	$sql="select tbpenjualan.*,tbbuku.* from tbpenjualan inner join tbbuku on tbpenjualan.idbuku=tbbuku.idbuku where NoTransaksi='$NoTransaksi'";
	$query=mysql_query($sql);
	$total=0;
	$no=1;
	while ($data=mysql_fetch_array($query)){
	?>
<tr>
<td align="center"><?php echo $no; ?></td>
<td align="center"><?php echo $data['JudulBuku'] ?></td>
<td align="center"><?php echo $data['Jumlah'] ?></td>
<td align="center"><?php echo 'Rp.'.number_format($data['TotalBayar'],'0',',','.') ?></td>
</tr>
<?php $no++;
$total=$total+$data['TotalBayar'];
$NoTransaksi=$data['NoTransaksi'];} 

?>
<tr>
<td colspan="3" align="center" style="font-size:18px">Total Bayar : &nbsp;</td>
<td align="center"><?php echo 'Rp.'.number_format($total,'0',',','.'); ?></td>
</tr>
</tbody>
</table>
<h4 align="center" style="margin-bottom:2%;"><i>
Jika ada masalah hubungi kami, jika tidak ada hubungi teman... Terima Kasih - &copy; New Dewata Buku</i><br><br> Customer Service Hubungi : 081999393787</h4>
<div id="idprint" style="margin-bottom:1%;">
<center><a href="penjualan.php" class="btn-default"> Kembali </a></center></div>
</div>

</div>
</body>