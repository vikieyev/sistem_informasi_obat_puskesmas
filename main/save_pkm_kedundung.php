<?php
session_start();
include('../connect.php');
$no_obat = $_POST['no_obat'];
$jml = $_POST['jumlah'];
$nama_pkm = $_POST['nama_pkm'];
$tgl_terima = null;
$nama_obat = "";
$no_batch = "";
$satuan = "";
$jumlah_terima = 0;

$sql_get_master_obat = "select * from master_obat where no_obat = :no_obat";
$result = $db->prepare($sql_get_master_obat);
$result->bindParam(':no_obat', $no_obat);
$result->execute();
for($i=0; $row = $result->fetch(); $i++)
{
	$nama_obat = $row['nama_obat'];
	$no_batch = $row['no_batch'];
	$satuan = $row['satuan'];
	$jumlah_terima = $row['jumlah_terima'];
	$tgl_terima = $row['tanggal_terima'];
}


if( is_null($e) ) {
	$e = "-";
}
// query
$sql = "INSERT INTO pkm_kedundung (tgl_terima,nama_pkm,nama_obat,kode_obat,satuan,jumlah,total_perencanaan,no_batch) VALUES (:tgl_terima,:nama_pkm,:nama_obat,:kode_obat,:satuan,:jumlah,:total_perencanaan,:no_batch)";
$q = $db->prepare($sql);
$q->execute(array('tgl_terima'=>$tgl_terima,':nama_pkm'=>$nama_pkm,':nama_obat'=>$nama_obat,':kode_obat'=>$no_obat,':satuan'=>$satuan,':jumlah'=>$jml,':total_perencanaan'=>$jumlah_terima,':no_batch'=>$no_batch));
header("location: puskesmas_kedundung.php");


?>