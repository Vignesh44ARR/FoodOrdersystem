<?php
//forgpt password otp process
require("../database/dbfood.php"); 
$email= $_GET['id'];
$otp=$_POST['otpe'];
$pass= password_hash($_POST['password'],   PASSWORD_DEFAULT);
$querys="SELECT * FROM huotp WHERE email='$email'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
$otps=0;
while($row = mysqli_fetch_array($runs))
{
	$otps=$row['otp'];

}
$sqler="";
if($otps==$otp){
	$sqler="DELETE from huotp WHERE email='$email'";
	$con->query($sqler);
	$sqler2="UPDATE hoteluser SET password='$pass' WHERE email='$email'";
	$con->query($sqler2) or die(mysqli_error($con));
	header("refresh:0; url=../index.php?mes=Password Updated.. Login to continue..");
}
else{
	header("refresh:0; url=../index.php?id=$email&mes=Incorrect OTP, Try again...");
}
?>
