<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["useremail"])){
	if(isset($_GET["orderid"])){
		$orderid=$_GET["orderid"];
		$text=$_POST['comp'];
		$sql="select * from ordercompalints";
		$run=mysqli_query($con,$sql);
		$count=mysqli_num_rows($run)+1;
		$complaintid='OrdCmpid'.$count;
		$sql2="insert into ordercompalints values('$orderid','$complaintid','$text')";
		$run2=mysqli_query($con,$sql2);
		header("refresh:0; url=viewmycomplaints.php?mes=ticket raised");
	}else{
		header("refresh:0; url=complaints.php");
		
	}
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}
?>