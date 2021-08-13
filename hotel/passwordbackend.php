<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
$id=$_SESSION["hotelemail"];                                        
$querys="SELECT password FROM hoteluser WHERE email='$id'";
$runs=(mysqli_query($con,$querys));
$password=$_POST['pass'];
$newpassword=password_hash($_POST['password'],  
          PASSWORD_DEFAULT);

while($row = $runs ->fetch_assoc())
    {
        $hash=$row['password'];
    }
	
	
	$verify=password_verify($password, $hash); 
if($verify){
	$querys="update hoteluser set password='$newpassword' where email='$id'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
$mes="Password Updated Successfully....";
 header("refresh:0; url=hotelprofile.php?id=$id & msg=$mes");
}
else{
	$mes="Entered Current Password is Wrong...";
	header("refresh:0; url=hotelprofile.php?id=$id & msg=$mes");
}
}
else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>