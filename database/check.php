<?php

// important one  for checking valid email
require("dbfood.php"); 
//require("dbfood.php"); 

if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$sql = "SELECT email FROM users WHERE email = '$username'";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		echo "<b style = 'color:#ff0000;'>"."email id already registered"."</b>";
	}else{
		echo "<b style ='color:#008000;'>"."Available"."</b>";
	}
}
?>