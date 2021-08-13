<?php
session_start();
if(isset($_GET["time"]))
{
	$time = $_GET["time"];
	session_unset();
	session_destroy();
	header("refresh:0; url=../index.php?mes=$time");
}
else
{
	session_unset();
	session_destroy();
	header("refresh:0; url=../index.php?mes=Logged Off Successfully");
}
	?>