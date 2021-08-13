<?php
session_start();
require("../database/dbfood.php"); 
if(isset($_SESSION["useremail"])){
	if(isset($_GET['orderid'])){
		$orderid=$_GET['orderid'];
		$sql="select * from orders where orderid='$orderid'";
		$result=mysqli_query($con,$sql);
		$status='';
		while($row=$result->fetch_assoc()){
			$status=$row['status'];
		}
		if($status!='delivered' && $status !='cancelled'){
			$string="cancelled";
			$newquery="update orders set status='$string' where orderid='$orderid'";
			mysqli_query($con, $newquery);
			$string="your order cancelled successfully";
			header("refresh:0; url=myorders.php?mos='$string'");
		}
		else{
			$string="That order is already ".$status;
			header("refresh:0; url=myorders.php?mos='$string'");
		}
		
	}else{
		header("refresh:0; url=myorders.php");
	}
	
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");

}
?>