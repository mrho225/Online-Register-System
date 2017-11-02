<?php
require_once('./connect_mysql.php');

$username = $_POST['username'];
$password = $_POST['password'];
$rank = 1;
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$lastsession = date('d.m.y h:i:s');

$sign_up_query = "INSERT INTO member (username, password, rank, address, phone, email, lastsession) VALUES ('$username', '$password', '$rank', '$address', '$phone', '$email', '$lastsession')";

if (!mysql_query($sign_up_query))
{
    die('Error: ' . mysql_error());
}

echo "You are Signed Up. Now Sign In";

mysql_close();
?>