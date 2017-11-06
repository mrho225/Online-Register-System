<?php
require_once('./php/connect_mysql.php');
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	switch ($_SESSION['rank'])
	{
		case 1:
		echo "Hey Admin";
		header("Location: ./php/admin_panel.php");
		break;
		case 2:
		echo "Hey Staff";
		header("Location: ./php/admin_panel.php");
		break;
		case 3:
		echo "Hey Member";
		header("Location: ./php/user_panel.php");
		break;
		default:
		header("Location: ./html/sign_in.html");
	}
}
else {
	header("Location: ./html/sign_in.html");
}
?>