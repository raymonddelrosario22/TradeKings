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
		<form>
			<div class="row">
			</div>
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
					<button type="button" class="btn btn-primary" onclick="createLeague()">Create League</button>
				</div>
				<div class="col-md-3">
					<button type="button" class="btn btn-primary" onclick="joinLeague()">Join a League</button>
				</div>
			</div>
		</form>
	</body>

	<script>
		function createLeague(){
			window.location.assign("createLeague.php");
			console.log("switch to create");
		}
	</script>
	
	<script>
		function joinLeague(){
			window.location.assign("joinLeague.php");
			console.log("switch to join");
		}
	</script>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</html>




