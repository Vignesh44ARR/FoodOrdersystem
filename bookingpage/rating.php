<?php
session_start();
require("../database/dbfood.php"); 
if(isset($_SESSION["useremail"])){
if(isset($_GET['values']) && isset($_GET['orderid'])){
	$rating=$_GET['values'];
	$orderid=$_GET['orderid'];
	$sql="Select hotelid from orders where orderid='$orderid'";
	$result1=mysqli_query($con,$sql);
	$hotelid="";
	while($row1=$result1->fetch_assoc()){
			$hotelid=$row1['hotelid'];
	}
	
	$sql="select * from rating where hotelid='$hotelid' and orderid='$orderid'";
	$result2=mysqli_query($con,$sql);
	$counters=mysqli_num_rows($result2);
	if($counters>0){
		$quer="update rating set rating='$rating' where hotelid='$hotelid' and orderid='$orderid'";
		mysqli_query($con,$quer);
		header("refresh:0; url=myorders.php?from=this & mes=Rating Updated.. Thanks for your feedback");
	}else{
		$quer="insert into rating values('$hotelid','$orderid','$rating')";
		mysqli_query($con,$quer);
	header("refresh:0; url=myorders.php?from=this & mes=Rating Updated.. Thanks for your feedback");
	}
	
}else{
	echo "not done";
}
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}