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
	$username = $_POST['username'];
	$search_query = mysql_query("SELECT * FROM member WHERE username='$username'");
	while ($row = mysql_fetch_array ($search_query))
		{
			$username = $row['username'];
			$password = $row['password'];
			$rank = $row['rank'];
			$address = $row['address'];
			$phone = $row['phone'];
			$email = $row['email'];
			$lastsession = $row['lastsession'];
		}
}
else {
	header("Location: ../html/sign_in.html");
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin Panel - Update User</title>
    <link href="../css/admin_panel.css" rel="stylesheet" />
</head>
<body>
    <!-- START ADMIN SHOW USER DETAIL MODULE -->
    <h1>Admin Panel - Update User</h1>
    <div class="form-module">

        <div class="form">
            <h2>User details</h2>
            <form action="../php/admin_update.php" method="post">
                <input type="text" name="username" placeholder="Username" value ="<?php echo $username; ?>">
                <input type="password" name="password" placeholder="Password" value ="<?php echo $password; ?>">
                <input type="text" name="rank" placeholder="Rank 1-Admin 2-Staff 3-Member" value ="<?php echo $rank; ?>">
                <input type="text" name="address" placeholder="Address" value ="<?php echo $address; ?>">
                <input type="text" name="phone" placeholder="Phone Number" value ="<?php echo $phone; ?>">
                <input type="text" name="email" placeholder="Email Address" value ="<?php echo $email; ?>">
				<input type="text" name="lastsession" placeholder="Last login session" value ="<?php echo $lastsession; ?>">
                <input type="submit" value="Update">
            </form>
        </div>

    </div>

    <!-- END ADMIN SHOW USER DETAIL MODULE -->
</body>
</html>