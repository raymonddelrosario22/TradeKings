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
	header('Location: newlogin.php?inputEmail='.$newEmailR.'');
}

if(isset($_POST['inputEmail'])){
	$email = $_POST['inputEmail'];

	$query = 'SELECT count(email) as email2 from users where email = "'.$email.'";';

	$checkEmails = mysqli_query($db,$query);

	while($checkEmail = $checkEmails->fetch_assoc()){
		$emailCount = $checkEmail['email2'];
	}

	if ($emailCount<1){
		//echo '<p> EMAIL ID NOT FOUND. PLEASE REGISTER ->>>> </p>';
	}else{
		if(isset($_POST['inputPassword'])){
			$password = $_POST['inputPassword'];
			$query = 'SELECT password from users where email = "'.$email.'";';
			$results = mysqli_query($db,$query);
			while($result = $results->fetch_assoc()){
				$realPass = $result['password'];
			}
			if (sha1($password)==$realPass){
					//echo '<p> CORRECT PASSWORD </p>';
					//console.log("successful login");
					$_SESSION['email']=$email;
					$url="home.php?inputEmail=" .$email;
					header('Location: '.$url);
					exit();
			}else{
					session_destroy();
					//console.log("invalid login");
					//echo '<p> INVALID PASSWORD </p>';
			}
		}else{
			//echo '<p> PLEASE ENTER A PASSWORD </p>';
		}
	}
}

$db->close();
?>

<html>
<head>
<title>Login and Registration Form Design</title>
    <link rel="stylesheet" href = "style.css"
</head>
<body style="background-image:url('perhaps.jpg'); background-size:100%;">
	<div class = "login-page">
		<div class = "form" style="padding:15px;border:black solid 2px; border-radius:25px;background-color:black;opacity:0.9">
			<form class="registration-form" method="post" action="" style="border:blue solid 2px;border-radius:25px;padding:20px">
				<input type="text" placeholder="Enter First Name" id="firstNameR" name="firstNameR" style="border-radius:5px" required>
				<input type="text" placeholder="Enter Last Name" id="lastNameR" name="lastNameR" style="border-radius:5px" required>
				<input type="text" placeholder="Email Address" id="newEmailR" name="newEmailR" style="border-radius:5px" required>
				<input type="password" placeholder="Enter Password" id="newPasswordR" name="newPasswordR" style="border-radius:5px" required>
				<input type="password" placeholder="Re-enter Password" id="newPassword2R" name="newPassword2R" style="border-radius:5px" required>
				<button type="submit">Register</button>
				<p class="message">
					Already Registered?
					<a href="#">
						LOGIN
					</a>
				</p>
			</form>    
			
			<form class="login-form" method="post" action="" style="border:blue solid 2px;border-radius:25px;padding:20px;align-content:center;">
				<input type="text" placeholder="Username" id="inputEmail" name ="inputEmail" style="border-radius:5px" required>
				<input type="password" placeholder="Password" id="inputPassword" name="inputPassword" style="border-radius:5px" required>
				<button type="submit">LOGIN</button>
				<p class="message">
					Not Registered?
					<a href="#">
						Create Account
					</a>
				</p>
			</form>
		</div>
	</div>
	
	<script src='https://code.jquery.com/jquery-3.2.1.min.js'> </script>
	
	<script>
		$('.message a').click(function(){
			$('form').animate({height:"toggle",opacity: "toggle",}, "slow")
		}); 
	</script>
</body>  
<div class="container">
	<div class="bottom-right">Trade Kings</div>
</div>
</html>