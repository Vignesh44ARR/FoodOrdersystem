<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>Admin-Complaint Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/stylecss.css">
    <script src="../js/inactivity.js"></script>
		 <link rel="stylesheet" href="../css/main.css">

    <style>
     .hi {
  background-color: #4190EC;
  border: none;
  color: white;
  width:max-content;
   border-radius: 25px;
   padding:10px;
}
.hello {
  background-color: #e8e5e5;
  border: none;
  color: black;
  width:max-content;
   border-radius: 25px;
   padding:10px;
}
.hello2 {
  background-color: white;
  border: none;
  color: black;
  width:75%;
  border:1px solid;
   border-radius: 25px;
   padding:10px;
 
}
.yes{
	border-radius: 25px;
	padding:10px;
	width:18%;
}
    </style>
</head>
<body>
<?php
if(isset($_GET['from'])){
	?>
	<script>
	$(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#thisrow').offset().top
    }, 'fast');
});
	</script><?php
}
?>
    <header>
        <nav class="navbar navbar-expand-sm fixed-top  nav">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link " href="hotelhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link " href="hotelprofile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
                </li>
				<li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="droplogin" data-toggle="dropdown"><i class="fa fa-fw fa fa-cutlery"></i>Foods</a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" id="userloginbtn" href="foodentry.php" style="width:150px;">Add Foods</a>
                        <a class="dropdown-item" id="hotelloginbtn" href="modifyfoods.php" style="width:150px;">View Foods</a>
                    </div>
                </li>
                <li class="navbar-item ">
                    <a class="nav-link act" href="hotelcomplaints.php"><i class="fa fa-fw fa-envelope"></i>Complaints</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="../bookingpage/logoff.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        <br><br><br><br>
                <Center>
          <div style="width:50%">   
			<Center><h1 style="color:white; background-color:black; width:100%;"><?php echo $_GET['id'] ?></h1></center>
           
  
     
<?php
if(isset($_GET['id'])){
$orderid=$_GET['id'];
$hotelemail=$_SESSION["hotelemail"];
$qu="select * from hoteluser where email='$hotelemail'";
$mysql=mysqli_query($con,$qu);
$hotelid="";
while($ru=$mysql->fetch_assoc()){
	$hotelid=$ru['sno'];
}
$sql1 = "Select * from orders where orderid ='$orderid'";//print orderid details and orderid complaints
$result1 = $con->query($sql1);
while($roww = $result1 ->fetch_assoc())
    {
		$quantity = $roww['quantity'];
		$foodid = $roww['foodid'];
		$cost = $roww['cost'];
		$status = $roww['status'];
		$od = $roww['od'];
		$subb = $roww['subtotal'];
		$op="select * from food where foodid ='$foodid'";
		$oop=$con->query($op);
		$foodname='';
		while($tt=$oop->fetch_assoc()){
			$foodname=$tt['foodname'];
		}
		echo "<h2 style='color:black;'>".$foodname." - " .$quantity. " * " .$cost." = ".$subb."</h2>";
    }
	$myquery="select total from ordertotal where orderid='$orderid'";
		$runner=mysqli_query($con,$myquery);
		while($qqq=$runner->fetch_assoc()){
			$fulltotal=$qqq['total'];
		}
        echo "<h2 style='color:green;'>Total = ".$fulltotal."</h2>";
		?>
<div style="padding:20px;">
		<h2 style="color:red;text-align:left" >Customer Feedback/Compliants<br></h2>
		
		<?php
		$sql22 = "Select * from  ordercompalints where orderid='$orderid'";
		$newsql=$con->query($sql22);
		while($newrow=$newsql->fetch_assoc()){
			echo "<div align='left' ><h2 class='hello'>";
			echo $newrow['complaints']."</h2></div>";
		}
		?>
		</div>
	
		<div style="padding:20px;">
		<?php
		$abc="select * from orderresponse where orderid='$orderid'";
		$bcd=mysqli_query($con,$abc);
		if(mysqli_num_rows($bcd)>0){
			?>
		<h2  class style="color:red; text-align:right;">Response</h2>
		
		<?php
		$sql23 = "Select * from  orderresponse where orderid='$orderid'";
		$newsql2=$con->query($sql23);
		while($newrows=$newsql2->fetch_assoc()){
			echo "<div align='right'><h2 class='hi'>";
			echo $newrows['response']."</h2></div>";
		}
		
	}
		?>
		</div>
		<div id='thisrow' style="width:100%">
		<form method='POST' action="responseupdater.php?id=<?php echo $orderid;?>">
		<input type="text" name="message" class="hello2" required/>
		<button type="submit" class="btn btn-primary yes"> <i class="fa fa-paper-plane" aria-hidden="true"> </i><h4> Send</h4></button>
		</form>
		</div>
		<?php
}else{
	header("refresh:0; url=hotelcomplaints.php");
}
?>
</div>           
         
        </div>
    </section>
</body>
</html>
<?php
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}
?>