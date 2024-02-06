<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['memno'];
$e = $_POST['prod_name'];
$f = $_POST['note'];
$g = $_POST['date'];
// query
$sql = "INSERT INTO customer (customer_name,address,contact,membership_number,prod_name,note,expected_date,nama_toko) VALUES (:a,:b,:c,:d,:e,:f,:g,:nama_toko)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':nama_toko'=>$_SESSION['SESS_FIRST_NAME']));
header("location: customer.php");


?>