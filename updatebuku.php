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
$IdBuku=addslashes($_POST['IdBuku']);
$Judul= addslashes($_POST['Judul']);
$ISBN=addslashes($_POST['ISBN']);
$Penulis=addslashes($_POST['Penulis']);
$Penerbit=addslashes($_POST['Penerbit']);
$Tahun=addslashes($_POST['Tahun']);
$Stok=addslashes($_POST['Stok']);
$HargaPokok=addslashes($_POST['HargaPokok']);
$HargaJual=addslashes($_POST['HargaJual']);
$PPN=addslashes($_POST['PPN']);
$Diskon=addslashes($_POST['Diskon']);
$sql="update tbbuku set JudulBuku='$Judul',NoISBN='$ISBN',Penulis='$Penulis',Penerbit='$Penerbit',TahunTerbit='$Tahun',Stok='$Stok',HargaPokok='$HargaPokok',HargaJual='$HargaJual',PPN='$PPN',Diskon='$Diskon' where IdBuku='$IdBuku'";

$query=mysql_query($sql);
if($query){
echo "<script>
alert('Update data berhasil');
location.href='buku.php';
	</script>";

}
else {
	echo "<script>
alert('Update data gagal');
location.href='buku.php';
	</script>";

}

?>