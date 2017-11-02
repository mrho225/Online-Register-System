<?php
define('db_name', 'database-name');
define('db_user', 'username');
define('db_password', 'password');
define('db_host', 'server-host');

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
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = "insert into member (username, password, address, email, phone) values ($username, $password, $address, $email, $phone)";

if (!mysql_query($query))
{
    die('Error: ' . mysql_error());
}

mysql_close();
?>