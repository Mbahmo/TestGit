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
$PasswordLama=addslashes($_POST['PasswordLama']);
$PasswordBaru=addslashes($_POST['PasswordBaru']);

function cekpassword($PasswordLama){
$sql="select Password from tbkasir where Password='$PasswordLama'";
$query=mysql_query($sql);
$hasil = mysql_num_rows($query);
return $hasil;
}
$CekPassword=cekpassword($PasswordLama);
//echo $CekPassword;
if($CekPassword==0){
	echo "<script>alert('Maaf, Password Lama Salah. Coba Lagi.');
			location.href='kasir.php';</script>";
	}
	else {
$sql="update tbkasir set Password='$PasswordBaru' where IdKasir='$Id'";
$query=mysql_query($sql);
if ($query){
echo "<script>alert('Berhasil mengganti password');
location.href='kasir.php';</script>";
}
else{
echo "<script>alert('Gagal mengganti password');
location.href='kasir.php';</script>";
}
	}
?>