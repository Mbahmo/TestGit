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
function notransaksi(){
$Kunci="ABCDEFGHIJKLMNPQRSVTUVWVXYZ1234567890";
$Huruf=substr(str_shuffle($Kunci),0,4);
$Tahun=date('Y-m');
$Kode=$Huruf.$Tahun;
return $Kode;
}
$Notransaksi=notransaksi();
$sql="update tbpenjualan set NoTransaksi='$Notransaksi' where IdKasir='$IdKasir'
and Status='Belum Tercetak'";
$query=mysql_query($sql);
echo "<script>
	alert('Transaksi Tersimpan !');
	location.href='penjualan.php';
	</script>";


?>