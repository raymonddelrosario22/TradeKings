<html>
<main>


<object align="right" hspace="170" vspace="170">

<b>
Player Card:

</b>


<ol>

 <?php
echo '<body style="background-color:lightgray">';
session_start();

$host = 'userregistration.ccfiwisnnhob.us-east-2.rds.amazonaws.com';
$db = mysqli_connect($host,'admin','marsic123','UserRegistrationDB');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
            . $db->connect_error);
}



//$email=$_SESSION['email'];
$email='nkp9733@gmail.com';
//$query = 'Select title from league where email=$email';

?>
<html lang="en">
<table class="table thead-dark table-striped table-curved" align = "right" width = "500" id="activeLeagues" style="border: 2px solid black; border-radius: 25px;padding:10px;background-color:white">
				<thead style="background-color: #406cb7; color:white; border-bottom: 2px solid black;">
					<tr>
						<th data-sortable="true">Leagues</th>
					</tr>
				</thead>


				
				<?php
				$results = mysqli_query($db,'SELECT distinct id from containing where email="'.$email.'";');

while ($row = mysqli_fetch_array($results)) { //for every league
							//find out how many players are in each league using the ID
							$query = 'Select * from league where id="'.$row[0].'";';
							$leagueResults = mysqli_query($db,$query);
							while($leagues = $leagueResults->fetch_assoc()){
								$titleU = $leagues['title'];
								//$capitalU = $leagues['capital'];
								//$size = $leagues['size'];
							}
							$query = 'select count(distinct email) as times from containing where id="'.$row[0].'";';
							$playerResults = mysqli_query($db,$query);
							//while($playerResult = $playerResults->fetch_assoc()){
								//$playerCount=$playerResult['times'];
							//}
							
					?>	
								
								<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >		
								
								<tr>
									<td><?php echo $titleU; ?><input type="radio" id="radioButton" value="<?php echo $titleU;?>" name="leagueButton" onclick="myFunction()"></a></td>
									
								</tr>	
								
								</form>
								 
					<?php
				}
				?>
				
</table>	
	<script>
	var filter;

		function myFunction(){
	var radios = document.getElementsByName('leagueButton');
	
for (var i = 0, length = radios.length; i < length; i++)
{
 if (radios[i].checked)
 {
  // do whatever you want with the checked radio
  alert('You have selected League "' + radios[i].value + '"');
 


 var ans = radios[i].value;
  window.location = "table.php?leagueName=" +ans;
 break;
  // only one radio can be logically checked, don't check the rest

  
 }
}						
	}
	</script>
	
	
	
</ol>


</object>	
     
 
</div>
  
</main>
</div>
  
  


</body>

</html>
