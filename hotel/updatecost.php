<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
if(isset($_GET['id']) && isset($_POST['cost'])){
$id=$_GET['id'];
$cost=$_POST['cost'];
$sql="update food set cost='$cost' where foodid='$id'";
mysqli_query($con,$sql);
header("refresh:0; url=modifyfoods.php?msg=Food cost updated Successfully");
}else{
	header("refresh:0; url=modifyfoods.php");
}	
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}
?>