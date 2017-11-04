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
    <h1>Admin Panel - Search User</h1>
    <div class="form-module">

        <div class="form">
            <h2>Create an account</h2>
            <form action="../php/admin_search.php" method="post">
                <input type="text" name="username" placeholder="Enter username" required=" ">

                <input type="submit" value="Search">
            </form>
        </div>
    </div>

    <!-- END ADMIN SEARCH USER MODULE -->
</body>
</html>