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
$Buku= addslashes($_POST['Buku']);
$Jumlah=addslashes($_POST['Jumlah']);
$Sekarang=date('Y-m-d');

function caritotalbayar($Buku,$Jumlah){
$sql="select * from tbbuku where IdBuku='$Buku'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$HargaJual=$data['HargaJual']*$Jumlah;
$PPN=$data['PPN'];
$Diskon=$data['Diskon'];
$TotalBayar=$HargaJual-($HargaJual*($Diskon/100))+($HargaJual*($PPN/100));
return $TotalBayar;
}
$TotalBayar=caritotalbayar($Buku,$Jumlah);


function caristokbuku($Buku){
$sql="select Stok from tbbuku where idbuku='$Buku'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$Stok= $data['Stok'];
return $Stok;
}
/*
Coding Lama
function carihargajualbuku($Buku){
$sql="select HargaJual from tbbuku where idbuku='$Buku'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$Harga= $data['HargaJual'];
return $Harga;
}
function carippnbuku($Buku){
$sql="select PPN from tbbuku where idbuku='$Buku'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$PPN= $data['PPN'];


return $PPN;
}
function caridiskonbuku($Buku){
$sql="select Diskon from tbbuku where idbuku='$Buku'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$Diskon= $data['Diskon'];
return $Diskon;
}*/
// cek function data kuyyy :v
/*echo caristokbuku($Buku).'<br>';
echo carihargajualbuku($Buku).'<br>';
echo carippnbuku($Buku).'<br>';
echo caridiskonbuku($Buku);
$TotalBayar=(carihargajualbuku($Buku)*$JumlahBeli)-(carihargajualbuku($Buku)*(caridiskonbuku($Buku)/100))+((carihargajualbuku($Buku)*carippnbuku($Buku)/100));
$TotalBayar=$Hasil+abs(($Hasil*carippnbuku($Buku)/100));
echo $Hasil.'<br>';
echo $TotalBayar;
*/
function cekpenjualan($Buku){
$sql="select * from tbpenjualan where idbuku='$Buku' and Status='Belum Tercetak'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$Jumlah=$data['Jumlah'];
return $Jumlah;
}
$Stok=caristokbuku($Buku)-$Jumlah;

function updatestokbuku($Stok,$Buku){
$sql="update tbbuku set Stok='$Stok' where IdBuku='$Buku'";
$query=mysql_query($sql);
}

		function caritotalbayar2($Hasil,$Buku){
	$sql="select * from tbbuku where IdBuku='$Buku'";
$query=mysql_query($sql);
$data=mysql_fetch_array($query);
$HargaJual=$data['HargaJual']*$Hasil;
$PPN=$data['PPN'];
$Diskon=$data['Diskon'];
$TotalBayar2=$HargaJual-($HargaJual*($Diskon/100))+($HargaJual*($PPN/100));
return $TotalBayar2;
}
//echo cekpenjualan($Buku);
if($Stok<0){
echo "<script>alert('Jumlah Pembelian terlalu banyak ! Stok tidak mencukupi');
location.href='penjualan.php';
</script>";
}
else{
	if(cekpenjualan($Buku)>0)
		{
		$Hasil=cekpenjualan($Buku)+$Jumlah;
		$TotalBayar2=caritotalbayar2($Hasil,$Buku);
	//echo caritotalbayar($Buku,$Jumlah);
//echo caritotalbayar2($Hasil,$Buku);
//echo $Hasil;
		$sql="update tbpenjualan set Jumlah='$Hasil',TotalBayar='$TotalBayar2' where IdBuku='$Buku' And
		Status='Belum Tercetak'";
	}
	else{
$sql="insert into tbpenjualan value ('','','$Buku','$IdKasir','$Jumlah','$TotalBayar','$Sekarang','Belum Tercetak')";
	}
$query=mysql_query($sql);
if($query){
	updatestokbuku($Stok,$Buku);
echo "<script>
alert('Berhasil menambahkan data');
location.href='penjualan.php';
	</script>";

}
else {
	echo "<script>
alert('Gagal menambahkan data');
location.href='penjualan.php';
	</script>";

}
	}
?>