<?php
define('db_name', 'X33067707');
define('db_user', 'X33067707');
define('db_password', 'X33067707');
define('db_host', 'localhost');

$link = mysql_connect (db_host, db_user, db_password);

if (!$link)
{
  die('Could not connect to database. Error: ' . mysql_error());
}

$db_selected = mysql_select_db (db_name, $link);

if (!$db_selected)
{
  die(db_name . ' is inavailable. Error: ' . mysql_error());
}

echo 'Connected to database.';

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

mysql_close();
?>