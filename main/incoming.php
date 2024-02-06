<?php
session_start();
include('../connect.php');
$kode_barcode = "";
$kode_barcode = $_POST['product'];
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$w = $_POST['pt'];
$date = $_POST['date'];
$discount = $_POST['discount'];
$discount = 0;
$result = $db->prepare("SELECT * FROM products WHERE nama_toko= :nama_toko and (product_id= :userid or kode_barcode= :kode_barcode)");
$result->bindParam(':userid', $b);
$result->bindParam(':nama_toko',$_SESSION['SESS_FIRST_NAME']);
$result->bindParam(':kode_barcode', $kode_barcode);
$result->execute();
$product_ada1 = "";
// for($i=0; $row = $result->fetch(); $i++){
// 	$product_ada1=$row['product'];
// }
// if($product_ada != ""){
// 	echo "<center style='right:50%;top:50%;margin: 0;position:absolute;'><h1> Barcode Product Tidak Terdaftar! </h1></center>";
// 	echo "<script type='text/javascript'>alert('Barcode Product Tidak Terdaftar!');history.back();</script>";
// }

$asasa ="";
$fffffff=0;
$d=0;
$profit=0;
function update_product($c,$b,$kode_barcode) {
include('../connect.php');
  $sql = "UPDATE products 
		        SET qty=qty-?
				WHERE product_id=? or kode_barcode=?";
		$q = $db->prepare($sql);
		$q->execute(array($c,$b,$kode_barcode));
		
}
//if($result2->fetchColumn() == true){

	for($i=0; $row = $result->fetch(); $i++){
		$asasa=$row['price'];
		$code=$row['product_code'];
		$gen=$row['gen_name'];
		$name=$row['product_name'];
		$p=$row['profit'];
		
	}
	if($asasa != ""){
		//edit qty
		// $sql = "UPDATE products 
		//         SET qty=qty-?
		// 		WHERE product_id=? or kode_barcode=?";
		// $q = $db->prepare($sql);
		// $q->execute(array($c,$b,$kode_barcode));
		// $fffffff=intval($asasa)-intval($discount);
		// $d=$fffffff*$c;
		// $profit=$p*$c;
		
		$fffffff=intval($asasa)-intval($discount);
		$d=$fffffff*$c;
		$profit=$p*$c;
		// cek barang sudah ada //
		$sql_cek_increment = "select * from sales_order where invoice = :invoice and product = :product ";
		$result_sci = $db->prepare($sql_cek_increment);
		$result_sci->bindParam(':invoice', $a);
		$result_sci->bindParam(':product', $b);
		$result_sci->execute();
		$product_ada = "";
		$trx_id = "";
		$qty_awal = 0;
		for($i=0; $row = $result_sci->fetch(); $i++){
			$product_ada=$row['product'];
			$trx_id = $row['transaction_id'];
			$qty_awal = $row['qty'];
		}
		if($product_ada != ""){
			$qty_awal = intval($qty_awal) + 1;
			$amount=$asasa*$qty_awal;
			$profit=$p*$qty_awal;
			$qty_string = strval($qty_awal);
			$amount = strval($amount);
			$profit = strval($profit);
			$sql_update = "UPDATE sales_order SET qty= :qty_awal, amount= :amount, profit= :profit WHERE transaction_id = :trx_id";
			$result_update = $db->prepare($sql_update);
			$result_update->bindParam(':qty_awal', $qty_string);
			$result_update->bindParam(':amount', $amount);
			$result_update->bindParam(':profit', $profit);
			$result_update->bindParam(':trx_id', $trx_id);
			$result_update->execute();
			update_product($c,$b,$kode_barcode);
			header("location: sales.php?id=$w&invoice=$a");
		}else{
			// query insert //
			$sql = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,profit,product_code,gen_name,date) VALUES (:a,:b,:c,:d,:e,:f,:h,:i,:j,:k)";
			$q = $db->prepare($sql);
			$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':h'=>$profit,':i'=>$code,':j'=>$gen,':k'=>$date));
			// query insert end //
			update_product($c,$b,$kode_barcode);
			header("location: sales.php?id=$w&invoice=$a");

		}


			
	}else{
		//echo $result->fetchColumn(); 
		echo "<center style='right:50%;top:50%;margin: 0;position:absolute;'><h1> Barcode Product Tidak Terdaftar! </h1></center>";
		echo "<script type='text/javascript'>alert('Barcode Product Tidak Terdaftar!');history.back();</script>";
		
	}
?>