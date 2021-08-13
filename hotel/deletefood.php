<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql="delete from food where foodid='$id'";
mysqli_query($con,$sql);
header("refresh:0; url=modifyfoods.php?msg=Food Deleted Successfully");
}else{
	header("refresh:0; url=modifyfoods.php");
}	
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}
?>