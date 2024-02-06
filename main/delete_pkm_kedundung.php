<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM pkm_kedundung WHERE no = :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>