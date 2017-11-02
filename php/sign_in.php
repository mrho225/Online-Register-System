<?php
require_once('./connect_mysql.php');

$username = $_POST['username'];
$password = $_POST['password'];

$lastsession = date('d.m.y h:i:s');

$sign_in_check = mysql_query("SELECT username, password FROM member WHERE username = '".$username."' && password = '".$password."'");
if ($sign_in_check && mysql_num_rows($sign_in_check) > 0) {
    echo 'You are IN';
	$check_rank = intval(mysql_fetch_assoc(mysql_query("SELECT rank FROM member WHERE username = '".$username."' && password = '".$password."'")));
	
	session_start();
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;

	echo $check_rank;
	
	switch ($check_rank)
	{
		case 1:
		echo "Hey Admin";
		header("Location: ./member_zone.php");
		break;
		case 2:
		echo "Hey Staff";
		header("Location: ./member_zone.php");
		break;
		case 3:
		echo "Hey Member";
		header("Location: ./member_zone.php");
		break;
	}
} else {
    echo 'Wrong password!';
}
mysql_close();
?>