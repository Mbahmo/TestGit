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
$IdDistributor=addslashes($_POST['IdDistributor']);
$Nama=addslashes($_POST['Nama']);
$Alamat=addslashes($_POST['Alamat']);
$Telp=addslashes($_POST['Telp']);

$sql="update tbdistributor set NamaDistributor='$Nama',Alamat='$Alamat',NoTelp='$Telp' where IdDistributor='$IdDistributor'";
$query=mysql_query($sql);
if ($query){
echo "<script>alert('Update data berhasil');
location.href='distributor.php';</script>";
}
else{
echo "<script>alert('Update data gagal');
location.href='distributor.php';</script>";
}
?>