<?php  session_start(); error_reporting(0); 
require_once('include/conn.php');  

/*	if(isset($_SESSION["user"])){
	mysqli_query($database,"DELETE FROM cart WHERE userid='$userid'");
	
/*	
	unset($_SESSION['user']);
	}
	if(isset($_SESSION["manager"])){
		unset($_SESSION['manager']);
	}
    */
        session_destroy();
	$rurl="index.php";
	redirect($rurl);	
?>