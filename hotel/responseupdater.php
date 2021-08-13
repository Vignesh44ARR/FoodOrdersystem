<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
	if(isset($_POST['message'])){
	$message=$_POST['message'];
	$orderid=$_GET['id'];
	$insert="insert into orderresponse values('$orderid','$message')";
	mysqli_query($con,$insert);
	header("refresh:0; url=complaintresponse.php?id=$orderid&from=hi");
	}else{
		header("refresh:0; url=hotelcomplaints.php");
	}
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}