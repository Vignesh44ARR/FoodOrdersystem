<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["useremail"])){
$id=$_SESSION["useremail"]; 
if(isset($_POST['pin'])){    
$town=$_POST['town'];
$pin=$_POST['pin'];   
$door=$_POST['door'];    
$street=$_POST['street'];                              
$querys="update users set door='$door', town='$town',pin='$pin',street='$street' where email='$id' ";
mysqli_query($con,$querys) or die(mysqli_error($con));
	
$mes="Address Updated Successfully....";
 header("refresh:0; url=userprofile.php?id=$id & msg=$mes");

}else{
	header("refresh:0; url=userprofile.php");
}
}
else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>