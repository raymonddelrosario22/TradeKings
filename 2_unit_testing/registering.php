<?php
session_start();

$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}

//echo '<p>Connection OK </p>';

$results = mysqli_query($db,'SELECT * from users;');

echo "<table border='1'>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Password</th>
<th>Email</th>
<th>Date</th>
<th>Profile Pic</th>
<th>Code</th>
<th>Verified?</th>
</tr>";

while($result = $results->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $result['firstname'] . "</td>";
echo "<td>" . $result['lastname'] . "</td>";
echo "<td>" . $result['password'] . "</td>";
echo "<td>" . $result['email'] . "</td>";
echo "<td>" . $result['date'] . "</td>";
echo "<td>" . $result['profile_pic'] . "</td>";
echo "<td>" . $result['code'] . "</td>";
echo "<td>" . $result['verified'] . "</td>";
echo "</tr>";

}
echo "</table>";

if(isset($_POST['newEmailR'])){
	$firstNameR = $_POST['firstNameR'];
	$lastNameR = $_POST['lastNameR'];
	$newEmailR = $_POST['newEmailR'];
	$newPasswordR = $_POST['newPasswordR'];
	$code = mt_rand(100000,999999);
	$query = 'insert into users(id,firstname,lastname,password,email,date,code,verified) values(NULL,"'.$firstNameR.'","'.$lastNameR.'","'.sha1($newPasswordR).'","'.$newEmailR.'",date(now()),"'.$code.'","N");';
	$confirmation =  mysqli_query($db,$query);
	header('Location: registering.php?inputEmail3='.$newEmailR.'');
}

$db->close();
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trade Kings</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    
  </head>
  <body style="">

    <div class="container-fluid">
	<div class="row" style="margin:25px;margin-top:50px">	
			<div class="col-md-6" style="padding:10px;margin-left:250px;width:450px">
				<div style="padding:15px;border:black solid 2px; border-radius:25px;background-color:black;opacity:0.75">
				<form class="form-horizontal" role="form" action="" method="post" style="border:blue solid 2px;border-radius:25px;padding-left:35px;width:400px;margin-right:0px">
				
					<div class="form-group" style="margin-top:20px;width:400px">
						<label for="firstname" class="col-sm-2 control-label" style="margin-right:10px;padding-right:0px;width:125px;padding-left:0px;text-align:center;color:white">
							First Name
						</label>
						<div class="col-sm-7">
							<input type="name" class="form-control" id="firstNameR" name="firstNameR">
						</div>
					</div>
				
					<div class="form-group" style="margin-top:20px;width:400px">
						<label for="lastname" class="col-sm-2 control-label" style="margin-right:10px;padding-right:0px;width:125px;padding-left:0px;text-align: center;color:white">
							Last Name
						</label>
						<div class="col-sm-7">
							<input type="name" class="form-control" id="lastNameR" name="lastNameR">
						</div>
					</div>
				
					<div class="form-group" style="margin-top:20px;width:400px">
						<label for="newEmail" class="col-sm-2 control-label" style="margin-right:10px;padding-right:0px;width:125px;padding-left:0px;text-align: center;color:white">
							Enter Email
						</label>
						<div class="col-sm-7">
							<input type="email" class="form-control" id="newEmailR" name="newEmailR">
						</div>
					</div>
					
					<div class="form-group" style="margin-top:20px;width:400px">
						<label for="newPassword" class="col-sm-2 control-label" style="margin-right:10px;padding-right:0px;width:125px;padding-left:0px;text-align: center;color:white">
							Enter Password
						</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="newPasswordR" name="newPasswordR">
						</div>
					</div>
					
					<div class="form-group" style="margin-top:20px;width:400px">
						<label for="newPassword2" class="col-sm-2 control-label" style="margin-right:10px;padding-right:0px;width:125px;padding-left:0px;text-align: center;color:white">
							Confirm Password
						</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="newPassword2R" name="newPassword2R">
						</div>
					</div>
					
					<div class="form-group" style="margin-top:20px;width:400px;margin-right:0px;width:100px;margin-left:150px">
						<div class="col-sm-offset-2 col-sm-7">
							<button type="submit" class="btn btn-default">
								Register
							</button>
						</div>
					</div>
				</form>
				</div>
				<p id="demo"></p>
			</div>
		
	</div>
</div>
	
	<script>
		function SignedIn() {
			document.getElementById("demo").innerHTML = document.getElementById("inputEmail3").value;
		}
	</script>
	
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>


