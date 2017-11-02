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

$lastsession = date('d.m.y h:i:s');

$sign_in_status = mysql_query("SELECT username, password FROM member WHERE username = '".$username."' && password = '".$password."'");


if ($sign_in_status && mysql_num_rows($sign_in_status) > 0) {
    echo 'You are IN';
	$check_rank = intval(mysql_fetch_assoc(mysql_query("SELECT rank FROM member WHERE username = '".$username."' && password = '".$password."'")));
	$check_lastsession = mysql_fetch_assoc(mysql_query("SELECT lastsession FROM member WHERE username = '".$username."' && password = '".$password."'"));
	
	echo $check_rank;
	
	switch ($check_rank)
	{
		case 1:
		echo "Hey Admin";
		echo implode($check_lastsession);
		break;
		case 2:
		echo "Hey Staff";
		echo implode($check_lastsession);
		break;
		case 3:
		echo "Hey Guess";
		echo implode($check_lastsession);
		break;
	}
} else {
    echo 'Wrong!';
}
mysql_close();
?>