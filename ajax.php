<?php
include('dbh.php');
include('user.php');
$action = $_GET['action'];
if($action == 'login'){
	$login = $object->login();
	if($login)
		echo $login;
}
?>