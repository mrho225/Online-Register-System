<?php
require_once('./connect_mysql.php');
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$lastsession = date('d.m.y h:i:s');
	$check_lastsession = mysql_fetch_assoc(mysql_query("SELECT lastsession FROM member WHERE username = '".$_SESSION['username']."'"));
    echo "You are logged in as " . $_SESSION['username'] . $_SESSION['rank'] . "!";
	echo implode($check_lastsession);
	mysql_query("UPDATE member SET lastsession = '".$lastsession."' WHERE username = '".$_SESSION['username']."'");
} else {
    echo "Please log in first to see this page.";
}
?>