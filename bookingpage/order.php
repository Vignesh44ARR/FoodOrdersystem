<?php
session_start();
require("../database/dbfood.php"); 
if(isset($_SESSION["useremail"])){
	if(isset($_GET["quantity"])){
		$email=$_SESSION["useremail"];
		$quantity = explode(',', $_GET["quantity"]);
		$n=count($quantity);	
		$cost = explode(',', $_GET["cost"]);
		$food = explode(',', $_GET["foodid"]);
		$total= $_GET["total"];
		$hotelid= $_GET["hotelid"];
		$count="select * from orders";
		$r=mysqli_query($con,$count);
		$ro=mysqli_num_rows($r)+1;
		$oid="order".$ro;
		$status="pending";
		$query="insert into ordertotal value('$oid','$total')";
		date_default_timezone_set('Asia/Kolkata');
		$dat= date('d-m-Y H:i');
		mysqli_query($con,$query);
		for ($i=0;$i<$n;$i++){
			$cf=$food[$i];
			$cq=$quantity[$i];
			$cc=$cost[$i];
			$cs=$cq*$cc;
			
			$query="insert into orders value('$oid','$cf','$hotelid','$email','$cq','$cc','$cs','$status','$dat')";
			mysqli_query($con,$query);
			
			
		}
		header("refresh:0; url=myorders.php?mes=Order placed...");
		
	}else{
		header("refresh:0; url=userhome.php");
	}
	
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}