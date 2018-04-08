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

$IdPasok=addslashes($_POST['IdPasok']);
$IdBuku=addslashes($_POST['Buku']);
$IdDistributor=addslashes($_POST['Distributor']);
/*
$TglMasuk=addslashes($_POST['TglMasuk'];
$Jumlah=addslashes($_POST['JumlahPasok'];
echo $HasilStok;
echo $Hasil;
echo $IdBuku;
$Hasil=$Jumlah + $BarangMasuk;*/
$sql="update tbpasok set IdBuku='$IdBuku',IdDistributor='$IdDistributor' where IdPasok='$IdPasok'";
$query=mysql_query($sql);
if ($query){
echo "<script>alert('Update data pasok berhasil');
location.href='pasok.php';</script>";
}
else{
echo "<script>alert('Update data pasok gagal');
location.href='pasok.php';</script>";
}
?>