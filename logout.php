<?php 
	include('dbh.php');
	include('user.php');
	session_destroy();
	foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
	header('location:./index.php');
?>