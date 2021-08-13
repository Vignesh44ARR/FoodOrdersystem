<?php 
session_start();
require("../database/dbfood.php"); 
if(isset($_POST['email'])){
$email= strtolower($_POST['email']); 
$password=$_POST['adminpassword'];
$querys="SELECT * FROM admin WHERE email='$email'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
if(mysqli_num_rows($runs)>1){
	while($row = mysqli_fetch_array($runs))
{

	$email1=$row['email'];
	$hash=$row['password'];

}
if($password == $hash){
$_SESSION['adminemail']=$email;

 header("refresh:0; url=adminhome.php?id=$email1");
}
else{
		header("refresh:0; url=../index.php?mes=Incorrect Mail ID and Password");
}
}else{
	header("refresh:0; url=../index.php?mes=Kindly check your Email id or Register to Continue");	
}
}
?>