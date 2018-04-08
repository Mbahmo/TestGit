<?php 
include "koneksi.php";
session_start();
$Username=$_POST['Username'];
$Password=$_POST['Password'];

$sql="select *from tbkasir where Username ='$Username'and Password= '$Password'
and Status='Aktif'";

$query=mysql_query($sql);
if (mysql_num_rows($query)>0){
	$data=mysql_fetch_array($query);
	$_SESSION['IdKasir']=$data['IdKasir'];
	$_SESSION['Level']=$data['Level'];
echo "<script>
alert('Login Berhasil !');
location.href='utama.php';
	</script>";
}
else{
echo "<script>
alert('Gagal Login');
location.href='login.php';
	</script>";
}
	?>