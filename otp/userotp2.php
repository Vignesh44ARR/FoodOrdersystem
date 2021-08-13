<?php
//require("../dbfood.php"); 
require("../database/dbfood.php"); 

$email=strtolower($_GET['id']);
$otp=$_POST['otpe'];
$querys="SELECT * FROM uotp WHERE email='$email'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
$otps=0;
while($row = mysqli_fetch_array($runs))
{

	$otps=$row['otp'];
	$fname=$row['firstname'];
	$lname=$row['lastname'];
	$email1=strtolower($row['email']);
	$password=$row['password'];
	$gender=$row['gender'];
	$dob=$row['dob'];
	$door=$row['door'];
	$pin=$row['pin'];
	$street=$row['street'];
	$town=$row['town'];
	$phone=$row['phone'];
}
$sqler="";
if($otps==$otp){
	
	$sqler="INSERT INTO users VALUES('$email','$fname','$lname','$password','$gender','$door','$street','$town','$pin','$dob','$phone')";
	$con->query($sqler);
	$sqler="DELETE from uotp WHERE email='$email'";
	$con->query($sqler);
			header("refresh:0; url=../index.php?mes=Successfully Registered, Login to Continue");
}
else{
	$sqler="DELETE from uotp WHERE email='$email'";
	$con->query($sqler);
	$mes= "Incorrect OTP or TIMEOUT, Try again!!";
	header("refresh:0; url=../signup.php?id=$email&mes=$mes");
}
?>
