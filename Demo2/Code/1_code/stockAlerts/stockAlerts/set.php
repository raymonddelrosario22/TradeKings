<!-- WRITTEN BY CHRIS CENA-->
<!doctype html>


<?php

session_start();
require('connect.php');
if (@$_SESSION["email"])
{

?>


<html>

<head>
<title> SET </title>

 <link rel="stylesheet" type="text/css" href="style.css">

<style>

body
{
	/* background-color: yellow; */
	background-image: url("perhaps.jpg");
}

.header {
  width: 30%;
  height:30px;
  margin: 30px auto 0px;
  color: white;
  background: #9B2335;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  
  padding: 20px;
}

div {
     width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
</style>

</head>




<body>
<CENTER>
	<br>   <br><br>   <br><br>  
	 <div class="header">
  	<h2>SET ALERTS</h2>
  </div>
	<form action="set.php" method="POST">
	
	   
	<div>    

<b>BUY: <input type="radio" name="bos" value="buy" checked="checked">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 

SELL: <input type="radio" name="bos" value="sell" > <br><br></b>

		<b> <input type="hidden" name="target" value="0">

  
  	   <input type="hidden" name="ticker" value="NULL">
  

       &nbsp; STOCK TARGET:	 <input type="number" name="target2" value="0">
		<br>   <br>
  
  	   &nbsp; STOCK TICKER:	 <input type="text" name="ticker2" value="NULL">
        <br>  <br>

      &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;  P/E TARGET: 	<input type="number" name="target3" value="0">
		<br>   <br>
  
  	   &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp; P/E TICKER:	 <input type="text" name="ticker3" value="NULL">
        <br>  <br></b> 

    </div>
		<br>
		<input type="submit" name="submit" value="Set"> or <a href="check.php">CHECK PAGE </a>
	</form>
</CENTER>

</body>
</html>











<?php

$type=@$_POST['bos'];

$price=@$_POST['target'];
$tick=@$_POST['ticker'];

$price2=@$_POST['target2'];
$tick2=@$_POST['ticker2'];

$price3=@$_POST['target3'];
$tick3=@$_POST['ticker3'];

//

if(isset($_POST['submit']))
	{
		if( ($price && $tick) || ($price2 && $tick2) || ($price3 && $tick3))
		{				
				
						 if($query=mysqli_query($connect,"INSERT INTO crypto(`email`,`ticker`,`target`,`id`,`stock`,`stockPrice`,`stockPE`,`PE`,`type`) VALUES ('".$_SESSION["email"]."','".$tick."','".$price."','','".$tick2."','".$price2."','".$tick3."','".$price3."','".$type."')"))
						{
							
							echo "<br> SUCCESS"; 

							
						}
						else

						{
							echo "<br> FAILURE";
						}
				
		}
		else
		{
			echo "PLEASE FILL IN ALL REQUIRED FIELDS.";
		}
	}
	//








}
else
{
	echo "You are not logged in.";
}


?>