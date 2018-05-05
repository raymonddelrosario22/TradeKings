<?php
session_start();
$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');
if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}

//$email=$_SESSION['email'];
$email='tradekingsllc@gmail.com';
//$query = 'Select title from league where email=$email';


if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['leagueName'])){
	$leaguetitle = $_GET['leagueName'];


$sql = "SELECT ticker FROM UserRegistrationDB.Portfolio WHERE email = '$email' AND leagueName = '$leaguetitle'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
	
	echo "id: " . $row["ticker"];
	
    }
} else {
    echo "0 results";
}

}


?> 