<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["adminemail"])){
$id = $_GET['id'];
$closed='closed';
$sql = "update contactus set status='$closed' where id='$id'";
$result = $con->query($sql) or die("error");
$query=$_POST['rep'];
$sql = "select * from contactus where id='$id'";
$result = $con->query($sql);
    while($row = $result ->fetch_assoc())
    {
		$email=$row["email"];
		$status=$row["status"];

    }
$sqler="INSERT INTO reply VALUES('$id','$email','$query','$status')";
	$con->query($sqler) or die(mysqli_error($con));
	header("refresh:0; url=complaintlist.php?mes=Query Updated");
}
?>