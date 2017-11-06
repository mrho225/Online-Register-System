<?php
// VERIFY MEMBER RANK TO GRANT ACCESS
require_once('./connect_mysql.php');
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	switch ($_SESSION['rank'])
	{
		case 1:
		echo "Verify member rank module is running: Hey Admin";
		//header("Location: ./member_zone.php");
		break;
		case 2:
		echo "Verify member rank module is running: Hey Staff";
		//header("Location: ./member_zone.php");
		break;
		case 3:
		echo "Verify member rank module is running: Hey Member";
		//header("Location: ./member_zone.php");
		break;
		default:
		header("Location: ../html/sign_in.html");
	}
}
else {
	header("Location: ../html/sign_in.html");
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>My Order</title>
    <link href="../css/admin_panel.css" rel="stylesheet" />
</head>
<body>
    <!-- START ORDER MODULE -->
    <h1>My Order</h1>
    <div class="form-module">

        <div class="form">
            <h2>This is meant to be linked to Product Management and let members make order which is not finished by my group member as planned.</h2>
            <form action="./order.php" method="post">
                <input type="text" name="username" placeholder="Enter order details" required=" ">

                <input type="submit" value="Check Out">
            </form>
        </div>
    </div>

    <!-- END ORDER MODULE -->
</body>
</html>