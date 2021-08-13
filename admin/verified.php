<?php
session_start();
require("../database/dbfood.php");
if ($_SESSION['adminemail'])
{
$mail = $_GET['email'];
$ver="ok";
$sql = "update hoteluser set status= '$ver' where email = '$mail'";
$result = $con->query($sql);
$sql = "Select * from hoteluser where email = '$mail'";
$result = $con->query($sql);

if ($result -> num_rows > 0)
{
    while($row = $result ->fetch_assoc())
    {
        $hid=$row['sno'];
    }
    $result->free();
}
$msg="Hotel id: $hid has been approved";

header("refresh:0; url=adminhome.php?mes=$msg&ids=$mail");
}
else{
	    header("refresh:0; url=../index.php?mes=Login to continue");
}
?>
