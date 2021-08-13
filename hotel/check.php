<?php
require("../database/dbfood.php"); 
if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($con,$_POST['username']);
	if ($username!=''){
	$sql = "SELECT email FROM hoteluser WHERE email = '$username'";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		echo "<b style = 'color:#ff0000;'>"."Email already Registered"."</b>";
	}else{
		echo "<b style ='color:#008000;'>"."Email Available "."</b>";
	}
	}
}
?>