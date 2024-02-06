<?php

include('connect.php');

$nama_toko = $_POST['nama_toko'];
$username = $_POST['username'];
$password = $_POST['password'];
$retype_password = $_POST['retype_password'];

$nama_toko = trim($nama_toko);
$nama_toko = strtoupper($nama_toko);

if($retype_password != $password){
	
	echo '<script>alert("Maaf Password dan Retype Password Tidak Sama!")</script>';
	echo "<meta http-equiv='refresh' content='0; URL=register.php'>";
}else{

	#echo $nama_toko;
	$res1 = $db->prepare("select name from user where name = :nama_toko");
	$res1->bindParam(':nama_toko', $nama_toko);
	$res1->execute();
	
	$row = $res1->fetch();
	if($row == false){
		#echo "nama toko tersedia";
		$sql = "INSERT INTO user (username,password,name,position) VALUES (:username,:password,:nama_toko,'admin')";
			$q = $db->prepare($sql);
			$q->bindParam(':username', $username);
			$q->bindParam(':password', $password);
			$q->bindParam(':nama_toko', $nama_toko);
			//$q->bindParam(':position', "admin");
			$q->execute();
			echo '<script>alert("SELAMAT ANDA BERHASIL MENDAFTAR!")</script>';
			echo "<meta http-equiv='refresh' content='0; URL=index.php'>";
	}else{
		echo '<script>alert("Maaf Nama Toko Sudah Terdaftar")</script>';
		echo "<meta http-equiv='refresh' content='0; URL=register.php'>";
	}
}

?>