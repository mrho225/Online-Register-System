<?php
require_once('./connect_mysql.php');
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $$_SESSION['rank'] == 1 | $_SESSION['rank'] == 2) {

	$username = $_POST['username'];
$password = $_POST['password'];
$rank = $_POST['rank'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$lastsession = date('d.m.y h:i:s');
$update_query = mysql_query("UPDATE member SET password='$password', rank='$rank', address='$address', phone='$phone', email='$email' WHERE username='$username'");
header("Location: ../html/admin_search.html");

} else {
    echo "Please log in first to see this page.";
}


?>