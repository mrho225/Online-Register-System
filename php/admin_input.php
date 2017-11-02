<?php
require_once('./connect_mysql.php');
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($$_SESSION['rank'] == 1 || $_SESSION['rank'] == 2) {
echo $_SESSION['rank'];
}
else {
header("Location: ../php/member_zone.php");
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin Panel - Search User</title>
    <link href="../css/admin_panel.css" rel="stylesheet" />
</head>
<body>
    <!-- START REGISTER MODULE -->
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

    <!-- END REGISTER MODULE -->
</body>
</html>