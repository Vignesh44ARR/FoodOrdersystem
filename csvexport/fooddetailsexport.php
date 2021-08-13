<?php
//excelexport.php  
require("../database/dbfood.php");
if(isset($_POST["export"]))
{
$sql = "Select * from food";
$result = $con->query($sql);
$filename = "Foods" . date('Y-m-d') . time() . ".csv";
$delimiter = ",";
//create a file pointer
 $f = fopen('php://memory', 'w');
 $fields = array('FoodID', 'HotelID','FoodName', 'Cost','FoodType','Cuisines','Available','Description','Keyword',);
 fputcsv($f, $fields, $delimiter);
 $sno=0;
 //output each row of the data, format line as csv and write to file pointer
 while($row = $result->fetch_assoc()){
     $lineData = array($row["foodid"],$row["hotelid"],$row["foodname"] ,$row["cost"], $row["foodtype"],$row["cuisines"],$row["available"],$row["fooddesc"],   $row["keyword"]);
     fputcsv($f, $lineData, $delimiter);
 }
 //move back to beginning of file
 fseek($f, 0);
 //set headers to download file rather than displayed
 header('Content-Type: text/csv');
 header('Content-Disposition: attachment; filename="' . $filename . '";');
 //output all remaining data on a file pointer
 fpassthru($f);
}
?>