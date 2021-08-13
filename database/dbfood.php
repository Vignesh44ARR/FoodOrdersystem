<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);


$sql = "CREATE DATABASE dbfoods";
$conn->query($sql);
$con=mysqli_connect("localhost","root","","dbfoods") or die(mysqli_error($conn)); 


$sql2 = "CREATE TABLE users(email VARCHAR(50) PRIMARY KEY, firstname VARCHAR(30), lastname VARCHAR(30)
, password VARCHAR(1000) NOT NULL, gender VARCHAR(30) NOT NULL,door VARCHAR(10) NOT NULL, street VARCHAR(100) NOT NULL, town VARCHAR(30) NOT NULL, pin INT(6) NOT NULL ,dob date,phone bigint(10))";
$con->query($sql2);

$sql3 = "CREATE TABLE fuotp(
    email VARCHAR(50) Primary Key, otp INT(6))";
$con->query($sql3);

$sql4 = "CREATE TABLE uotp(email VARCHAR(50) PRIMARY KEY,
firstname VARCHAR(30), lastname VARCHAR(30), password VARCHAR(150) NOT NULL, gender VARCHAR(30) NOT NULL ,door VARCHAR(10) NOT NULL, street VARCHAR(100) NOT NULL, town VARCHAR(30) NOT NULL, pin INT(6) NOT NULL,dob date , otp INT(6), phone bigint(10) )";
$con->query($sql4);

$sql6 = "CREATE TABLE contactus(id VARCHAR(30) PRIMARY KEY,
email VARCHAR(50), query TEXT, status VARCHAR(30))";
$con->query($sql6);
//add one col here
$sql7 = "CREATE TABLE hotp(email VARCHAR(50) PRIMARY KEY,ownername VARCHAR(60) NOT NULL , hotelname VARCHAR(60) NOT NULL,descs varchar(100) NOT NULL,password VARCHAR(150) NOT NULL, type VARCHAR(10) NOT NULL,door VARCHAR(10) NOT NULL, street VARCHAR(100) NOT NULL, town VARCHAR(30) NOT NULL, pin INT(6) NOT NULL,phone bigint(10), filename varchar(200) NOT NULL , otp int(6) NOT NULL)";
$con->query($sql7);
//here also
$sql8 = "CREATE TABLE hoteluser(sno varchar(10) PRIMARY KEY ,ownername VARCHAR(60) NOT NULL, email VARCHAR(50), hotelname VARCHAR(60) NOT NULL,descs varchar(100) NOT NULL,password VARCHAR(150) NOT NULL, type VARCHAR(10) NOT NULL,door VARCHAR(10) NOT NULL, street VARCHAR(100) NOT NULL, town VARCHAR(30) NOT NULL, pin INT(6) NOT NULL,phone bigint(10), filename varchar(200) NOT NULL ,status varchar(20) NOT NULL, rating float(1,1))";
$con->query($sql8);

$sql9 = "CREATE TABLE huotp(email VARCHAR(50) Primary Key, otp INT(6))";
$con->query($sql9);

//admin table
$sql10 = "CREATE TABLE admin (email VARCHAR(50) , password VARCHAR(50))";
$con->query($sql10);
$sql11 = "CREATE TABLE reply (id VARCHAR(30) PRIMARY KEY,
email VARCHAR(50), query TEXT, status VARCHAR(30))";
$con->query($sql11);

//fooddetails
$sql12 = "CREATE TABLE food ( foodid varchar(10) PRIMARY KEY, hotelid varchar(10), cost decimal(6,2) ,foodname varchar(50) ,
 foodtype varchar(15), cuisines varchar(50), available varchar(20) , fooddesc varchar(255) , keyword varchar(255), foodimage varchar(200))";
$con->query($sql12);

//bulkorder
$sql13 = "CREATE TABLE foodorderdetails (orderid varchar(100)  , foodid varchar(100) ,hotelid varchar(100),foodname varchar(50),
cost decimal(6,2) , quantity int ,  orderdate DATETIME)";
$con->query($sql13);

//orderdetails


//foodcomplaints
$sql15 = "CREATE TABLE foodcomplaint (complaintid varchar(100) PRIMARY KEY, orderid varchar(100), 
foodid varchar(100),  useremail varchar(100), complaint varchar(255) ,currentstatus varchar(100))";
$con->query($sql15);

//complaintsreply
$sql15 = "CREATE TABLE complaintsreply (complaintid varchar(100) PRIMARY KEY,currentstatus varchar(100),   useremail varchar(100), reply varchar(255))";
$con->query($sql15);

$sql16 = "CREATE TABLE orders (orderid varchar(15),foodid varchar(50),  hotelid varchar(50) ,useremail varchar(100), quantity int(3), cost DECIMAL(8,3), subtotal DECIMAL(8,3),status varchar(255),od varchar(40))";
$con->query($sql16);// or die(mysql_error($con));
$sql17 = "CREATE TABLE ordertotal (orderid varchar(15), total DECIMAL(10,3))";
$con->query($sql17);// or die(mysql_error($con));

$sql18 = "CREATE TABLE rating (hotelid varchar(15), orderid varchar(20),rating DECIMAL(4,2))";
$con->query($sql18);// or die(mysql_error($con));

$sql19 = "CREATE TABLE ordercompalints (orderid varchar(20), complaintid varchar(30),complaints varchar(255))";
$con->query($sql19);// or die(mysql_error($con));
$sql20 = "CREATE TABLE orderresponse (orderid varchar(20),response varchar(255))";
$con->query($sql20);// or die(mysql_error($con));
?>