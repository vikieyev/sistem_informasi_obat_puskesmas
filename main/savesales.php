<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];
$cname = $_POST['cname'];
if($d=='credit') {
$f = $_POST['due'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name,nama_toko) VALUES (:a,:b,:c,:d,:e,:z,:f,:g,:nama_toko)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname,':nama_toko'=>$_SESSION['SESS_FIRST_NAME']));
header("location: preview.php?invoice=$a");
exit();
}
if($d=='cash') {
$f = $_POST['cash'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name,nama_toko) VALUES (:a,:b,:c,:d,:e,:z,:f,:g,:nama_toko)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname,':nama_toko'=>$_SESSION['SESS_FIRST_NAME']));
header("location: preview_kecil.php?invoice=$a");
exit();
}
// query



?>