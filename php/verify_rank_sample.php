<?php
require_once('./connect_mysql.php');
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	switch ($_SESSION['rank'])
	{
		case 1:
		echo "Hey Admin";
		//header("Location: #");
		break;
		case 2:
		echo "Hey Staff";
		//header("Location: #");
		break;
		case 3:
		echo "Hey Member";
		header("Location: ./member_zone.php");
		break;
	}
}
?>

#####################