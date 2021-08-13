<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["useremail"])){
?>
<html>
<head lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <link rel="stylesheet" href="../css/stylecss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script src="../js/inactivity.js"></script>
 <link rel="stylesheet" href="../css/main.css">'
 <Style>
   nav a
        {
            color: #000000;
        }
 </style>
 </head>
<body>
<header>
<!-- Nav Bar-->
<nav class="navbar navbar-expand-sm fixed-top  nav  ">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link " href="userhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>	
                <li class="navbar-item">
                    <a class="nav-link " href="userprofile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
                </li>
				 <li class="navbar-item">
                    <a class="nav-link" href="myorders.php"><i class="fa  fa-shopping-cart"></i>&nbsp;My orders</a>
                </li>
				 <li class="navbar-item">
                    <a class="nav-link act" href="complaints.php"><i class="fa  fa-comments-o"></i>&nbsp;Complaints</a>
                </li>
				<li class="navbar-item">
                    <a class="nav-link" href="../bookingpage/logoff.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </nav>
		<br><br><br>

    </header>

        <div class="col-lg-12" style="margin-left:10%; width:80%;">
<div class="row" id="thisrow">
<?php
$hotelname="";
$mail=$_SESSION['useremail'];
	
      if(isset($_GET['orderid'])){
        $orderid = $_GET['orderid'];
		$sqlss="select * from orders where orderid='$orderid'";
		$rop=$con->query($sqlss);
		
		$hots="select hotelid from orders where orderid='$orderid'";		
		$hotres=$con->query($hots);
		while($resu=$hotres->fetch_assoc()){
			$hotelid = $resu['hotelid'];
		}
		
		$hots="select * from hoteluser where sno='$hotelid'";		
		$hotres=$con->query($hots);
		$filename='';
		while($resu=$hotres->fetch_assoc()){
			$filename = $resu['filename'];
		}
		
		
		
        echo '
       
	   <div class="row" id="cont" style="border:5px solid; margin-left:20px;">
	   
		<h4 style="text-transform:Capitalize; color:blue">
	   <div class="col-lg-12">
        <img class="img-responsive img-thumbnail im" style="width : 300px;margin-right : 2rem;height : 300px;float:left;" src="../hotel/doc/'.$filename. '">
        </div>
		<br/>';
		$queue="select * from hoteluser where sno='$hotelid'";
		$runit=mysqli_query($con,$queue);
		while($myrun=$runit->fetch_assoc()){
			$hnamer=$myrun['hotelname'];
			$streeter=$myrun['street'];
			$towner=$myrun['town'];
		}
		echo $hnamer."<br>";
		echo $streeter."<br>";
		echo $towner;
		
		$qur="select * orders where orderid= '$orderid'";
		$roww=$con->query($qur);
		while($roww=$rop->fetch_assoc()){
		
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
		echo "<span style='float:right;color:black;'>".$foodname." - " .$quantity. " * " .$cost." = ".$subb."</span><br/>";
		}
		$myquery="select total from ordertotal where orderid='$orderid'";
		$runner=mysqli_query($con,$myquery);
		while($qqq=$runner->fetch_assoc()){
			$fulltotal=$qqq['total'];
		}
        echo "<span style='float:right;color:green;'>Total = ".$fulltotal."<br/></span>";
		 echo "<br/><span style='float:right;'>Ordered on:  ".$od."<br/></span>";
		echo"</h2>";
	    
		?>
	    <div >
		<h2 style="float:right; font-size:30px; width : 50% ;background-color:transparent" >
		
		<form method="post" action="updatecomplete.php?orderid=<?php echo $orderid;?>">
		<textarea  name="comp" rows="5" cols="20" style="width : 100%" placeholder="Write your feedback and submit" required></textarea>
		<br/><input type="submit" class="btn btn-success" />
		<input type="reset" style="margin : 2px" class="btn btn-danger"/>
		</form>
		</h2></div>
	
		
		</div>
		
		<?php
	  }else{
		 header("refresh:0; url=complaints.php"); 
	  }
?>
 </div>


</body>
</html>
		
		
		
		
		
		

<!--
</header>

<div class="row">
<div class="col-lg-12">
<?php

?>
</div>
</div>-->
<?php
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>