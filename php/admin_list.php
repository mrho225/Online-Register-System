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

<?php

$list_query = mysql_query("SELECT * FROM member");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Username</th>
<th>Rank</th>
<th>Address</th>
<th>Phone Number</th>
<th>EmailAddress</th>
<th>Last Session</th>
</tr>";

while($row = mysql_fetch_array ($list_query))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['rank'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['lastsession'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>