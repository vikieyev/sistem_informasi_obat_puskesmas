<?php
session_start();
// configuration
include('../connect.php');
// new data
$username = $_POST['username'];
$password = $_POST['password'];
$posisi = $_POST['posisi'];
$name = $_SESSION['SESS_FIRST_NAME'];
// query
$sql = "INSERT INTO user (username,password,name,position) VALUES (:username,:password,:nama_toko,:posisi)";
$q = $db->prepare($sql);
$q->execute(array(':username'=>$username,':password'=>$password,':nama_toko'=>$name,':posisi'=>$posisi));
header("location: kasir.php");

?>