<?php
session_start();
include('../connect.php');
$a = $_POST['nama_obat'];
$b = $_POST['no_batch'];
$c = $_POST['sumber_anggaran'];
$d = $_POST['keterangan'];
$e = $_POST['tanggal_terima'];
$f = $_POST['ED'];
$g = $_POST['jumlah_terima'];
$h = $_POST['satuan'];

if( is_null($e) ) {
	$e = "-";
}
// query
$sql = "INSERT INTO master_obat (nama_obat,no_batch,sumber_anggaran,keterangan,tanggal_terima,ED,jumlah_terima,satuan) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g ,':h'=>$h));
header("location: masterobat.php");


?>