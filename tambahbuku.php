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
$Judul=addslashes($_POST['Judul']);
$ISBN=addslashes($_POST['ISBN']);
$Penulis=addslashes($_POST['Penulis']);
$Penerbit=addslashes($_POST['Penerbit']);
$Tahun=addslashes($_POST['Tahun']);
$Stok=addslashes($_POST['Stok']);
$HargaPokok=addslashes($_POST['HargaPokok']);
$HargaJual=addslashes($_POST['HargaJual']);
$PPN=addslashes($_POST['PPN']);
$Diskon=addslashes($_POST['Diskon']);
$sql="insert into tbbuku value ('','$Judul','$ISBN','$Penulis','$Penerbit','$Tahun','$Stok','$HargaPokok','$HargaJual','$PPN','$Diskon')";

$query=mysql_query($sql);
if($query){
echo "<script>
alert('Berhasil menambahkan data');
location.href='buku.php';
	</script>";

}
else {
	echo "<script>
alert('Gagal menambahkan data');
location.href='buku.php';
	</script>";

}

?>