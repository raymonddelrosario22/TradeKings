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

//mysqli_query($db,"insert into users values(".$_GET['inputEmail3'].",'Biden','VP','Biden@Joe.com');");

/*echo "<table border='1'>
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
*/

if(isset($_POST['newEmailR'])){
	$firstNameR = $_POST['firstNameR'];
	$lastNameR = $_POST['lastNameR'];
	$newEmailR = $_POST['newEmailR'];
	//echo '<p> Your email address is ' . $newEmailR.'</p>';
	$newPasswordR = $_POST['newPasswordR'];
	$code = mt_rand(100000,999999);
	mail($newEmailR,"Confirmation Email",'This is a confirmation email for your registration on Trade Kings. Please use the following code to enter on the site to verify your account: '.$code.'',"From: tradekingsllc@gmail.com");
	$query = 'insert into users(id,firstname,lastname,password,email,date,code,verified) values(NULL,"'.$firstNameR.'","'.$lastNameR.'","'.sha1($newPasswordR).'","'.$newEmailR.'",date(now()),"'.$code.'","N");';
	$confirmation =  mysqli_query($db,$query);
	header('Location: register.php?inputEmail3='.$newEmailR.'');
}

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
		//echo '<p> EMAIL ID NOT FOUND. PLEASE REGISTER ->>>> </p>';
	}else{
		if(isset($_POST['inputPassword3'])){
			$password = $_POST['inputPassword3'];
			$query = 'SELECT password from users where email = "'.$email.'";';
			$results = mysqli_query($db,$query);
			while($result = $results->fetch_assoc()){
				$realPass = $result['password'];
			}
			if (sha1($password)==$realPass){
					//echo '<p> CORRECT PASSWORD </p>';
					//console.log("successful login");
					//session_start();
					$_SESSION['email']=$email;
					$url="home.php?inputEmail3=" .$email;
					header('Location: '.$url);
					exit();
					
					//header("register.php");
					/*echo "
					<script type=\"text/javascript\">
						window.location.assign('index.html');
					</script>
					";*/
			}else{
					session_destroy();
					//console.log("invalid login");
					//echo '<p> INVALID PASSWORD </p>';
					//ob_end_flush();
			}
		}else{
			//echo '<p> PLEASE ENTER A PASSWORD </p>';
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
  <body style="background-image:url('perhaps.jpg'); background-size:100%;">

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


