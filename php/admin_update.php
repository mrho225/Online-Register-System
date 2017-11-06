<?php
require_once('./connect_mysql.php');
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	switch ($_SESSION['rank'])
	{
		case 1:
		echo "Verify member rank module is running: Hey Admin";
		//header("Location: ./member_zone.php");
		break;
		case 2:
		echo "Verify member rank module is running: Hey Staff";
		//header("Location: ./member_zone.php");
		break;
		case 3:
		echo "Verify member rank module is running: Hey Member";
		header("Location: ./member_zone.php");
		break;
		default:
		header("Location: ../html/sign_in.html");
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
	$rank = $_POST['rank'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$lastsession = date('d.m.y h:i:s');
	$update_query = mysql_query("UPDATE member SET password='$password', rank='$rank', address='$address', phone='$phone', email='$email' WHERE username='$username'");
	header("Location: ./admin_panel.php");
}
else {
	header("Location: ../html/sign_in.html");
}
?>