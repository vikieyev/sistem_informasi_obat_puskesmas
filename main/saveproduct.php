<?php
session_start();
include('../connect.php');
$a = $_POST['code'];
$b = $_POST['name'];
$c = $_POST['exdate'];
$d = $_POST['price'];
$e = $_POST['supplier'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $_POST['profit'];
$i = $_POST['gen'];
$j = $_POST['date_arrival'];
$k = $_POST['qty_sold'];
$kode_barcode = $_POST['kode_barcode'];

if( is_null($e) ) {
	$e = "-";
}
// query
$sql = "INSERT INTO products (product_code,product_name,expiry_date,price,supplier,qty,o_price,profit,gen_name,date_arrival,qty_sold,nama_toko,kode_barcode) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:nama_toko,:kode_barcode)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':i'=>$i,':j'=>$j,':k'=>$k,':nama_toko'=>$_SESSION['SESS_FIRST_NAME'],':kode_barcode'=>$kode_barcode));
header("location: products.php");


?>