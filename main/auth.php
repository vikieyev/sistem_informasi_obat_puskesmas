<?php
//echo "<h2>PHP is Fun! auth</h2>";
    //var_dump($_SESSION);
    //Start session//
    //session_start();
    
    //echo json_encode($_SESSION);
    //Check whether the session variable SESS_MEMBER_ID is present or not
    if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
    	header("location: ../index.php");
    	exit();
    }
?>