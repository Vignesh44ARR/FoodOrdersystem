<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
	if(isset($_GET["orderid"]) && isset($_GET["values"])){
		$orderid=$_GET["orderid"];
		$my="select * from orders where orderid='$orderid'";
		$value=$_GET["values"];
		
		$my="select * from orders where orderid='$orderid'";
		$res=mysqli_query($con,$my);
		$sta='';
		while($row=$res->fetch_assoc()){
			$sta=$row['status'];
		}
		if($sta!="cancelled"){
		
		if($value=="accept"){
			$value="accepted";
		}
		if($value=="Reject"){
			$value="rejected";
		}
		if($value=="On the way"){
			$value="On the way";
		}
		if($value=="Delivered"){
			$value="delivered";
		}
		$sql="update orders set status='$value' where orderid='$orderid'";
		mysqli_query($con,$sql);
		
		header("refresh:0; url=hotelhome.php?mes=Order Updated..");
	}else{
		header("refresh:0; url=hotelhome.php?mes=Cannot Update customer cancelled the order...");
	}
	
	}else{
		header("refresh:0; url=hotelhome.php");
	}
}
else{
	header("refresh:0; url=../index.php?mos=Login to proceed");
}
?>