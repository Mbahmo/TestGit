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
$Distributor= addslashes($_POST['Distributor']);
$Buku=addslashes($_POST['Buku']);
$Jumlah=addslashes($_POST['Jumlah']);
$TglMasuk=addslashes($_POST['TglMasuk']);
$sql="insert into tbpasok value ('','$Distributor','$Buku','$Jumlah','$TglMasuk','')";
$query=mysql_query($sql);
if($query){
echo "<script>
alert('Berhasil menambahkan data');
location.href='pasok.php';
	</script>";

}
else {
	echo "<script>
alert('Gagal menambahkan data');
location.href='pasok.php';
	</script>";

}

?>