<?php
//excelexport.php  
require("../database/dbfood.php");
if(isset($_POST["export"]))
{
$sql = "Select * from users";
$result = $con->query($sql);
 $filename = "users" . date('Y-m-d') . time() . ".csv";
 $delimiter = ",";
 //create a file pointer
 $f = fopen('php://memory', 'w');
 //set column headers
 $fields = array('SNO', 'Name', 'Gender', 'DOB', 'Email', 'Phonenumber','Door','Street','Town','Pincode');
 fputcsv($f, $fields, $delimiter);
 $sno=0;
 //output each row of the data, format line as csv and write to file pointer
 while($row = $result->fetch_assoc()){
     $lineData = array(++$sno,$row["firstname"].' '.$row["lastname"] ,$row["gender"], $row["dob"],$row["email"], $row["phone"],$row["door"],$row["street"],$row["town"],$row["pin"]);
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