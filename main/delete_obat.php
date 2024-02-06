<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM master_obat WHERE no_obat= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>