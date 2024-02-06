<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['note'];
// query
$sql = "INSERT INTO supliers (suplier_name,suplier_address,suplier_contact,contact_person,note,nama_toko) VALUES (:a,:b,:c,:d,:e,:nama_toko)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':nama_toko'=>$_SESSION['SESS_FIRST_NAME']));
header("location: supplier.php");


?>