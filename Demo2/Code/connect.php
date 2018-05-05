<?php
$connect=mysqli_connect("localhost","root","")or die("Couldn't Connect");

mysqli_select_db($connect,"email")or die("Couldn't Connect");

?>
