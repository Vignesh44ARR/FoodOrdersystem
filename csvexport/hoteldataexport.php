<?php
//excelexport.php  
require("../database/dbfood.php");
if(isset($_POST["export"]))
{
$sql = "Select * from hoteluser";
$result = $con->query($sql);
$filename = "hotels" . date('Y-m-d') . time() . ".csv";
$delimiter = ",";
//create a file pointer
 $f = fopen('php://memory', 'w');
 $fields = array('SNO', 'HotelName','OwnerName', 'Email','PhoneNumber','Type','Door','Street','Town','Pincode','Status','Rating');
 fputcsv($f, $fields, $delimiter);
 $sno=0;
 //output each row of the data, format line as csv and write to file pointer
 while($row = $result->fetch_assoc()){
     $lineData = array(++$sno,$row["hotelname"],$row["ownername"] ,$row["email"], $row["phone"],$row["type"],$row["door"],$row["street"],   $row["town"],$row["pin"],$row["status"],$row["rating"]);
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