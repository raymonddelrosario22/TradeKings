<?php
session_start();

//ob_start();
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

if(isset($_POST['inputEmail3'])){
	$email = $_POST['inputEmail3'];
	//echo '<p> Your email address is ' . $email.'</p>';

	$query = 'SELECT count(email) as email2 from users where email = "'.$email.'";';
	//echo '<p> QUERY IS THE FOLLWING'.$query.'</p>';
	$checkEmails = mysqli_query($db,$query);

	/*echo "<table border='1'>
	<tr>
	<th>COUNT</th>
	</tr>";*/

	while($checkEmail = $checkEmails->fetch_assoc()){
		//echo '<p> Count is ' . $checkEmail['email2'].'</p>';
		//echo "<tr>";
		//echo "<td>" . $checkEmail['email2'] . "</td>";
		$emailCount = $checkEmail['email2'];
		//echo "</tr>";
	}
	//echo "</table>";

	if ($emailCount<1){
		echo '<p> EMAIL ID NOT FOUND. PLEASE REGISTER ->>>> </p>';
	}else{
		if(isset($_POST['inputPassword3'])){
			$password = $_POST['inputPassword3'];
			$query = 'SELECT password from users where email = "'.$email.'";';
			$results = mysqli_query($db,$query);
			while($result = $results->fetch_assoc()){
				$realPass = $result['password'];
			}
			if (sha1($password)==$realPass){
					echo '<p> CORRECT PASSWORD </p>';
					$_SESSION['email']=$email;
					$url="home.php?inputEmail3=" .$email;
					header('Location: '.$url);
					exit();
			}else{
					echo '<p> INVALID PASSWORD </p>';
			}
		}else{
			echo '<p> PLEASE ENTER A PASSWORD </p>';
		}
	}
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
		<div class="col-md-6" style="width:400px;padding-left:30px;padding-right:30px;margin-left:120px;margin-top:70px">
			<div style="padding:15px;border:black solid 2px; border-radius:25px;background-color:black;opacity:0.75">
				<form method="post" action="" class="form-horizontal" role="form" style="border:blue solid 2px;border-radius:25px;padding-left:45px">
					<div class="form-group" style="margin-top:20px">
						<label for="inputEmail3" class="col-sm-2 control-label;" style="color:white;margin-right:5px">
							Email
						</label>
						<div class="col-sm-7">
							<input type="email" class="form-control" id="inputEmail3" name ="inputEmail3">
						</div>
					</div>
					
					<div class="form-group" style="margin-top:25px">
						<label for="inputPassword3" class="col-sm-2 control-label" style="padding:0px;color:white;margin-right:5px">
							Password
						</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="inputPassword3" name="inputPassword3" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-7" style="margin-left:70px">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Remember me
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10" style="margin-left:90px">
							<button type="submit" class="btn btn-default" onclick="SignedIn()" >
								Sign in
							</button>
						</div>
					</div>
				</form>
			</div>
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


