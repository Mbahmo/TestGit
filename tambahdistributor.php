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
$Nama= addslashes($_POST['Nama']);
$Alamat=addslashes($_POST['Alamat']);
$Telp=addslashes($_POST['Telp']);
$sql="insert into tbdistributor value ('','$Nama','$Alamat','$Telp')";
$query=mysql_query($sql);
if($query){
echo "<script>
alert('Berhasil menambahkan data');
location.href='distributor.php';
	</script>";

}
else {
	echo "<script>
alert('Gagal menambahkan data');
location.href='distributor.php';
	</script>";

}

?>