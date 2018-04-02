<?php

$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}else{
echo '<p>Connection OK </p>';
}

$results = mysqli_query($db,'SELECT * from users;');

echo "<table border='1'>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Password</th>
<th>Email</th>
</tr>";

while($result = $results->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $result['firstname'] . "</td>";
echo "<td>" . $result['lastname'] . "</td>";
echo "<td>" . $result['password'] . "</td>";
echo "<td>" . $result['email'] . "</td>";
echo "</tr>";
}
echo "</table>";


?>