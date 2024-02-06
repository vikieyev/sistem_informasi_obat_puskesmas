<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['nama_obat'];
$b = $_POST['no_batch'];
$c = $_POST['sumber_anggaran'];
$d = $_POST['keterangan'];
$e = $_POST['tanggal_terima'];
$f = $_POST['ED'];
$g = $_POST['jumlah_terima'];
$h = $_POST['satuan'];
// query
$sql = "UPDATE master_obat 
        SET nama_obat=?, no_batch=?, sumber_anggaran=?, keterangan=?, tanggal_terima=?, ED=?, jumlah_terima=?, satuan=?
		WHERE no_obat=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$id));
header("location: masterobat.php");

?>