<?php
//require("../dbfood.php"); 
require("../database/dbfood.php"); 

$email= strtolower($_GET['id']);
$otp=$_POST['otpe'];
$querys="SELECT * FROM hotp WHERE email='$email'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
$otps=0;
while($row = mysqli_fetch_array($runs))
{
$ownername = $row['ownername'];
$hotel= $row['hotelname'];
$email1= strtolower($row['email']);
$desc= $row['descs'];
$hoteltype=$row['type'];
$door=$row['door'];
$street=$row['street'];
$town=$row['town'];
$pin=$row['pin'];
$password=$row['password'];
$phone=$row['phone'];
$filename=$row['filename'];
$otps=$row['otp'];

}
$querys="SELECT * FROM hoteluser";
$runs=(mysqli_query($con,$querys));
$id1=mysqli_num_rows($runs)+1;
$id = "hotel".$id1;
$sqler="";
$status="Under Verification";
$rating=0;

if($otps==$otp){
	//made changes here
	$sqler="INSERT INTO hoteluser VALUES('$id','$ownername','$email1','$hotel','$desc','$password','$hoteltype','$door','$street','$town','$pin','$phone','$filename','$status','$rating')";
	$con->query($sqler) or die(mysqli_error($con));
	$sqler="DELETE from hotp WHERE email='$email'";
	$con->query($sqler);
			header("refresh:0; url=../index.php?mes=Successfully Registered, Login to Continue");
}
else{
	$sqler="DELETE from hotp WHERE email='$email'";
	$con->query($sqler);
	$mes= "Incorrect OTP or TIMEOUT, Try again!!";
	//header("refresh:0; url=hotelsignup.php?id=$email&mes=$mes");
}
?>
