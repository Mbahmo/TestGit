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
$Id=$_GET['IdKasir'];
$sql="update tbkasir set Status='Off' where IdKasir='$Id'";
$query=mysql_query($sql);
if ($query)
{
	echo "<script>
		alert('Berhasil menonaktifkan kasir');
		location.href='kasir.php';</script>";
}
else
{
	echo "<script>
		alert('Gagal menonaktifkan kasir');
		location.href='kasir.php';</script>";
}
	?>