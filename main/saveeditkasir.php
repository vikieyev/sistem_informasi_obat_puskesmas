<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['username'];
$b = $_POST['password'];
$c = $_POST['posisi'];

// query
$sql = "UPDATE user 
        SET username=?, password=?, position=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$c,$id));
header("location: kasir.php");

?>