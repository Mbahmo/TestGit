<?php 
session_start();
$IdKasir=$_SESSION['IdKasir'];
if($IdKasir==''){
echo "<script>
alert('Anda tidak bisa mengakses halaman ini ! Silahkan login terlebih dahulu!');
location.href='login.php';
</script>";
}
?><head>
<link rel="icon" href="image/logo.png">
<link rel="stylesheet" href="styles/styles.css">
<style >
body{
margin:0;
padding:0;
overflow-x:scroll;
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
<title>Cetak Laporan Penjualan Per-tanggal <?php echo date('Y-m-d')?></title>
</head>
<center>
  <img src="image/banner.png" style="display:block;
	max-width:100%;
	height:auto; text-align:center;"></center>
<h1 align="center" style="margin-top:1%;">Cetak Laporan Penjualan Per-tanggal <?php echo date('Y-m-d')?></h1>
<body>
<table width="99%" border="1px solid" class="table1" align="center" style="margin-top:10px;"> 
<thead >
	<th>No Transaksi</th>
	<th>Judul Buku</th>
	<th>Total Bayar</th>
	<th>Tanggal Transaksi</th>
	<th>Status Nota</th>
	<th>Kasir</th>
    
	<th>Jumlah Beli</th>
    </thead>
    <tbody>
<?php
include "koneksi.php";
$Bulan=$_POST['Bulan'];
$Tahun=$_POST['Tahun'];
$User=$_POST['User'];
if($User=='Semua'){
$sql="select tbpenjualan.*,tbbuku.*,tbkasir.Username from tbpenjualan
	inner join tbbuku on tbpenjualan.idbuku=tbbuku.idbuku inner join tbkasir on tbpenjualan.idkasir=tbkasir.idkasir WHERE TglTransaksi BETWEEN '$Tahun-$Bulan-01' AND '$Tahun-$Bulan-31'";
	
}
else{
	$sql="select tbpenjualan.*,tbbuku.*,tbkasir.Username from tbpenjualan
	inner join tbbuku on tbpenjualan.idbuku=tbbuku.idbuku inner join tbkasir on tbpenjualan.idkasir=tbkasir.idkasir WHERE TglTransaksi BETWEEN '$Tahun-$Bulan-01' AND '2018-$Bulan-31' AND tbkasir.IdKasir='$User'";
	
	} 	
	$query=mysql_query($sql);
	//echo $sql;
	$TotalBayar=0;
	while ($data=mysql_fetch_array($query)){	
?>
<tr>
<td align="center"><?php echo $data['NoTransaksi'] ?></td>
<td align="center"><?php echo $data['JudulBuku'] ?></td>
<td align="center"><?php echo 'Rp. '.number_format($data['TotalBayar'],'0',',','.')?></td>
<td align="center"><?php echo $data['TglTransaksi']?></td>
<td align="center"><?php echo $data['Status']?></td>
<td align="center"><?php echo $data['Username']?></td>
<td align="center"><?php echo $data['Jumlah'].' Buku'?></td>
</tr>
<?php $TotalBayar=$TotalBayar + $data['TotalBayar'];
} ?>
<td colspan="4" align="center"><font size="5">Total Penjualan</font></td>
<td colspan="3" align="center"><font size="5"><?php echo 'Rp. '.number_format($TotalBayar,'0',',','.');?></font></td>
</tbody>
</table>
<br>
<div id="idprint">
<table width="99%">
<td></td>
<td align="right"><a onClick="window.print()" class="btn-blue">Cetak Halaman</a></td>
</table>
</div>
</body>

