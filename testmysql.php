<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-2 control-label">
						Email
					</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail3">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">
						Password
					</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="inputPassword3">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							 
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 
						<button type="submit" class="btn btn-default" onclick="SignedIn()">
							Sign in
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					 
					<label for="newEmail" class="col-sm-2 control-label">
						Enter Email
					</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="newEmail">
					</div>
				</div>
				
				<div class="form-group">
					<label for="newPassword" class="col-sm-2 control-label">
						Enter Password
					</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="newPassword">
					</div>
				</div>
				
				<div class="form-group">
					<label for="newPassword2" class="col-sm-2 control-label">
						Confirm Password
					</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="newPassword2">
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 
						<button type="submit" class="btn btn-default">
							Register
						</button>
					</div>
				</div>
			</form>
			
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


<?php

$mysqli = new mysqli();

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

echo '<p>Connection OK </p>';
if(isset($_GET['inputEmail3'])){
	$email = $_POST["inputEmail3"];
	echo '<p>Connection OK2 '. $email.'</p>';
}


echo '<p>Server '.$mysqli->server_info.'</p>';
$results = mysqli_query($mysqli,'SELECT * from users;');

mysqli_query($mysqli,"insert into users values(".$_GET['inputEmail3'].",'Biden','VP','Biden@Joe.com');");


echo "<table border='1'>
<tr>
<th>First name</th>
<th>Last name</th>
</tr>";

while($result = $results->fetch_assoc())
{
echo "<tr>";
echo "<td>" . $result['firstname'] . "</td>";
echo "<td>" . $result['lastname'] . "</td>";
echo "</tr>";
}
echo "</table>";

$mysqli->close();
?>
