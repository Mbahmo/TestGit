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
$IdPenjualan=$_GET['IdPenjualan'];
$IdBuku=$_GET['IdBuku'];

function carijumlahbuku($IdPenjualan){
$sql="select Jumlah from tbpenjualan where idpenjualan='$IdPenjualan'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$Jumlah= $data['Jumlah'];
return $Jumlah;
}
function caristokbuku($IdBuku){
$sql="select Stok from tbbuku where idbuku='$IdBuku'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$Stok= $data['Stok'];
return $Stok;
}

$JumlahKembali=carijumlahbuku($IdPenjualan);
$StokBuku=caristokbuku($IdBuku);
$Hasil=$StokBuku+$JumlahKembali;

function kembalikanstokbuku($Hasil,$IdBuku){
$sql="update tbbuku set Stok='$Hasil' where IdBuku='$IdBuku'";
$query=mysql_query($sql);
}

$sql="delete from tbpenjualan where IdPenjualan='$IdPenjualan'";
$query=mysql_query($sql);
if ($query)
{	
	kembalikanstokbuku($Hasil,$IdBuku);
	echo "<script>
		alert('Berhasil menghapus data');
		location.href='penjualan.php';</script>";
}
else
{
	echo "<script>
		alert('Gagal menghapus data');
		location.href='penjualan.php';</script>";
}
	?>