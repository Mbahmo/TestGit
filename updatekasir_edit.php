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
$Id=addslashes($_POST['IdKasir']);
$Nama= addslashes($_POST['Nama']);
$Alamat= addslashes($_POST['Alamat']);
$Telp= addslashes($_POST['Telp']);
$Level= addslashes($_POST['Level']);
$Foto=$_FILES['Foto']['name'];
$target_dir="foto/kasir/";
$target_file=$target_dir.basename($Foto);
	

if (!$Foto){
	
	$sql="update tbkasir set NamaLengkap='$Nama', Alamat='$Alamat',Telp='$Telp',Level='$Level' where IdKasir='$Id' ";

	$query=mysql_query($sql);
if($query){
echo "<script>
alert('Update data berhasil');
location.href='kasir.php';
	</script>";

}
else {
	echo "<script>
alert('Update data gagal');
location.href='kasir.php';
	</script>";

}
	}
	else {
		$sql="update tbkasir set NamaLengkap='$Nama', Alamat='$Alamat',Telp='$Telp',Level='$Level',Foto='$Foto' where IdKasir='$Id'";

	$query=mysql_query($sql);
if($query){
	move_uploaded_file($_FILES['Foto']['tmp_name'],$target_file);
echo "<script>
alert('Update data berhasil');
location.href='kasir.php';
	</script>";

}
else {
	echo "<script>
alert('Update data gagal');
location.href='kasir.php';
	</script>";

}
	
	}

?>