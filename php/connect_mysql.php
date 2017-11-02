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

?>