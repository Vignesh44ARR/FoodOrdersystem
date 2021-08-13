<?php
//require("../dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
require("../database/dbfood.php"); 


$foodname= $_POST['fname'];
$cost = $_POST['cost'];
$foodtype=$_POST['foodtype'];
$cuisines=$_POST['cuisine'];
$available=$_POST['available'];
$fdesc=$_POST['fdesc'];
$keyword=$_POST['keyword'];

$querys="SELECT * FROM food";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
$row = mysqli_num_rows($runs)+1;
$foodid = "food".$row;

$hotelemail = $_SESSION["hotelemail"];

$sql = "Select sno from hoteluser where email = '$hotelemail'";
$result = $con->query($sql);
$hotelid = "";

    while($row = $result ->fetch_assoc())
    {
        $hotelid = $row["sno"];
    }

$targetDir = "foodimage/";
$fileName = basename($_FILES["file"]["name"]); // get the filename
	$temp = explode(".", $_FILES["file"]["name"]); //get extension and filename removed
		$path_parts = pathinfo($fileName);
		$fil= $path_parts['filename'];  //get the original filename
		$newfilename = round(microtime(true)) . '.' . end($temp);
		$fi=$fil . $newfilename;
$targetFilePath = $targetDir.$fi;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
	
		//move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sqler="INSERT INTO food VALUES('$foodid','$hotelid',$cost,'$foodname','$foodtype','$cuisines','$available','$fdesc','$keyword','$fi')";
           $insert =  $con->query($sqler) or die(mysqli_error($con));
            if($insert){
            header("refresh:0; url=foodentry.php?mes=Successfully Added");
        }
        else
        {
            header("refresh:0; url=foodentry.php?mes=Error FIle Uploading");
        }
    }


}
else
{
    header("refresh:0; url=foodentry.php?mes=Error in File Extension");

}
}
else
{
    header("refresh:0; url=../index.php?mes=Login to proceed");

}
?>
