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
$Stok=addslashes($_POST['Jumlah']);
$IdBuku=addslashes($_POST['Buku']);
$TglKeluar=addslashes($_POST['TglKeluar']);
$Jumlah=addslashes($_POST['JumlahPasok']);
function cekstokbuku($IdBuku){
$sql="select Stok from tbbuku where IdBUku='$IdBuku'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$StokBuku=$data['Stok'];
	return $StokBuku;
}
//echo cekstokbuku($IdBuku);

$Hasil=$Jumlah-$Stok;
$StokBuku=cekstokbuku($IdBuku);
$HasilStok=$StokBuku+$Stok;

function updatestokbuku($IdBuku,$HasilStok){
	$sql="update tbbuku set stok='$HasilStok' where IdBuku='$IdBuku'";
	$query=mysql_query($sql);
}

//echo $HasilStok;
//echo $Hasil;
//echo $IdBuku;

if ($Hasil<0){
	echo "<script>
	alert('Stok tidak mencukupi');
	location.href='pasok.php';
	</script>";
}
else{
$sql="update tbpasok set Jumlah='$Hasil',TglKeluar='$TglKeluar' where IdPasok='$IdPasok'";
$query=mysql_query($sql);
if ($query){
	updatestokbuku($IdBuku,$HasilStok);
echo "<script>alert('Tambah stok buku berhasil');
location.href='pasok.php';</script>";
}
else{
echo "<script>alert('Tambah stok buku gagal');
location.href='pasok.php';</script>";
}
	}
?>