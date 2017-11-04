<?php
require_once('./connect_mysql.php');

$username = $_POST['username'];
$password = $_POST['password'];


$sign_in_check = mysql_query("SELECT username, password FROM member WHERE username = '$username' && password = '$password'");
if ($sign_in_check && mysql_num_rows($sign_in_check) > 0) {
	session_start();
	$get_rank_query = mysql_query("SELECT rank FROM member WHERE username = '$username' && password = '$password'");
	$get_rank = mysql_fetch_assoc($get_rank_query);
	$check_rank = $get_rank['rank'];
	
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['rank'] = $check_rank;
	echo $check_rank;
	switch ($_SESSION['rank'])
	{
		case 1:
		echo "Hey Admin";
		header("Location: ./admin_panel.php");
		break;
		case 2:
		echo "Hey Staff";
		header("Location: ./admin_panel.php");
		break;
		case 3:
		echo "Hey Member";
		header("Location: ./admin_panel.php");
		break;
	}
} else {
    echo 'Wrong password!';
}
mysql_close();
?>