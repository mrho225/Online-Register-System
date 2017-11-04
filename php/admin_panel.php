<?php
// VERIFY MEMBER RANK TO GRANT ACCESS
require_once('./connect_mysql.php');
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	switch ($_SESSION['rank'])
	{
		case 1:
		echo "Hey Admin";
		//header("Location: ./member_zone.php");
		break;
		case 2:
		echo "Hey Staff";
		//header("Location: ./member_zone.php");
		break;
		case 3:
		echo "Hey Member";
		header("Location: ./member_zone.php");
		break;
		default:
		header("Location: ../html/sign_in.html");
	}
}
else {
	header("Location: ../html/sign_in.html");
}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		if (isset($_POST['list'])) {
			header("Location: ./admin_list.php");
		}
		elseif (isset($_POST['update'])) {
			header("Location: ./admin_input.php");
		}
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin Panel - Search User</title>
    <link href="../css/admin_panel.css" rel="stylesheet" />
</head>
<body>
    <!-- START ADMIN SEARCH USER MODULE -->
    <h1>Admin Control Panel</h1>
    <div class="form-module">

        <div class="form">
            <h2>Admin Control Panel</h2>
            <form action="./admin_panel.php" method="post">
                <button name="list" />List all users</button>
                <button name="update" />Search & Update</button>
            </form>
        </div>
    </div>

    <!-- END ADMIN SEARCH USER MODULE -->
</body>
</html>