<?php
   include('../connect.php');
   require_once('auth.php');
	if(!$db) {
	
		echo 'Could not connect to the database.';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $_POST['queryString'];
			
			if(strlen($queryString) >0) {

				$query = "SELECT customer_name FROM customer WHERE nama_toko=:nama_toko and customer_name LIKE CONCAT('%', :queryString, '%') LIMIT 10";
				$q = $db->prepare($query);
				$q->bindParam(':queryString', $queryString); 
				$q->bindParam(':nama_toko', $_SESSION['SESS_FIRST_NAME']); //tambahan nama toko//
				$q->execute();
				if($q) {
				echo '<ul>';
					while ($row = $q->fetch()) {
	         			echo '<li onClick="fill(\''.addslashes($row[0]).'\');">'.$row[0].'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'OOPS we had a problem :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>