<?php
	include('../connect.php');
	$id=$_GET['id'];
	$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	$kode_barcode="";
	$kode_barcode=$_GET['kode_barcode'];
	//edit qty
	$sql = "UPDATE products 
			SET qty=qty+?
			WHERE product_id=? or kode_barcode=?";
	$q = $db->prepare($sql);
	$q->execute(array($qty,$wapak,$kode_barcode));

	$result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: sales.php?id=$sdsd&invoice=$c");
?>