<?php
require("dbfood.php"); 
/*$pass='$2y$10$CZ6r3plGHTcveCw9UVHAlO2eUlkJyRujO09ygQHhx99uHylPpV8L2';
1234
*/
$sql="Insert into users values('prakashdayalans@gmail.com','Prakash','d','1234','Male','50','1st street','gudiyatham',632602,'1996-09-14',7010367403)";
$con->query($sql);
$sql="Insert into users values('vignesh.a2020@vitstudent.ac.in','Vignesh','A','1234','Male','50','1st street','Ranipet',612602,'2000-07-05',7845965876)";
$con->query($sql);
$sql="Insert into users values('karthikeyan.d2020@vitstudent.ac.in','Karthikeyan','D','1234','Male','50','1st street','chennai',612602,'2000-07-05',7845965878)";
$con->query($sql);




?>