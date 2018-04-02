
<?php

?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<title>Bhargav is the best</title> 
	</head>
	<body class="bg-dark">
		<div class="container">
			<div class="alert alert-success" role="alert">
				<strong>Well done!</strong> You have successfully registered.
			</div>
			
			<button type="button" class="btn btn-primary" onclick="clicked()" action="testmysql.php" >
				Log In
			</button>
			
			<script>
				function clicked(){
					window.location.assign("login.php");
					console.log("HI");
				}
			</script>
			    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
		</div>
	</body>
	
</html>