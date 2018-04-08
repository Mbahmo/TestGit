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
$IdBuku=$_GET['IdBuku'];
$sql="delete from tbbuku where IdBuku='$IdBuku'";
$query=mysql_query($sql);
if ($query)
{
	echo "<script>
		alert('Berhasil menghapus data');
		location.href='buku.php';</script>";
}
else
{
	echo "<script>
		alert('Gagal menghapus data');
		location.href='buku.php';</script>";
}
	?>