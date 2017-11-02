<?php
require_once('./connect_mysql.php');
session_start();
echo $_SESSION['rank'];
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $$_SESSION['rank'] == 1 | $_SESSION['rank'] == 2) {

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
} else {
	header("Location: ./member_zone.php");
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin Panel - Update User</title>
    <link href="../css/admin_panel.css" rel="stylesheet" />
</head>
<body>
    <!-- START REGISTER MODULE -->
    <h1>Admin Panel - Update User</h1>
    <div class="form-module">

        <div class="form">
            <h2>Create an account</h2>
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

    <!-- END REGISTER MODULE -->
</body>
</html>