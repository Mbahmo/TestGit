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
$Username= addslashes($_POST['Username']);
$Password= addslashes($_POST['Password']);
$Nama= addslashes($_POST['Nama']);
$Alamat= addslashes($_POST['Alamat']);
$Telp= addslashes($_POST['Telp']);
$Level= addslashes($_POST['Level']);
$Foto=$_FILES['Foto']['name'];
$target_dir="foto/kasir/";
$target_file=$target_dir.basename($Foto);


	 function cekuser($Username){
	 $sql="select * from tbkasir where Username='$Username'";
	 $query=mysql_query($sql);
	 $hasil=mysql_num_rows($query);
	 return $hasil;
	 }
	
$CekUsername=cekuser($Username);	
	


if($CekUsername>0){
	echo "<script>alert('Gagal Mendaftar. Username Sudah Terdaftar.');
			location.href='kasir.php';</script>";
	}
	else {	
	$sql="insert into tbkasir value ('','$Username','$Password','$Nama','$Alamat','$Telp','Aktif','$Level','$Foto')";

	$query=mysql_query($sql);
if($query){
	move_uploaded_file($_FILES['Foto']['tmp_name'],$target_file);
echo "<script>
alert('Berhasil menambahkan data');
location.href='kasir.php';
	</script>";

}
else {
	echo "<script>
alert('Gagal menambahkan data');
location.href='kasir.php';
	</script>";

}
	}
?>