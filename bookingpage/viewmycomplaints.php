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
		.hello {
  background-color: #4190EC;
  border: none;
  color: white;
  width:max-content;
   border-radius: 25px;
   padding:10px;
}
.hi {
  background-color: #e8e5e5;
  border: none;
  color: black;
  width:max-content;
   border-radius: 25px;
   padding:10px;
}
.mydivs{
	margin-left: auto; 
margin-right: 0;
}
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  border:1px black solid;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
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
		
		<center><h2>Old Complaints </h2></center>
		
<div class="row" id="thisrow">

<?php
$hotelname="";
$mail=$_SESSION['useremail'];
$pe="delivered";
        $sql1 = "Select orderid, count(orderid) from  ordercompalints  group by orderid"; //and status='$pe' or status='$on' order by orderid DESC";
        $result1 = $con->query($sql1);
		if(mysqli_num_rows($result1)>0){
		//pending, cancel, on the way, rejected
    while($rows = $result1 ->fetch_assoc())
    {
		
      
        $orderid = $rows['orderid'];
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
       
	   <div class="row" id="cont" style="border:10px solid; margin-left:20px;">
	   
		<h4 style="text-transform:Capitalize;">
	   <div class="col-lg-12" style="border:2px solid;">
        <img class="img-responsive img-thumbnail im" style="width : 150px;height : 150px;float:left;" src="../hotel/doc/'.$filename. '">
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
        echo "<span style='float:right;color:green;'>Total = ".$fulltotal."</span></h2>";
	
		?>
		<div class="dropdown" style="width:100%;">
  <button style="float:right" onclick="myFunction()" class="dropbtn">View your query / response</button>
    <div id="myDropdown" style="width:40%;margin-left:45%;" class="dropdown-content">
	<h3 style="width:100%;height:60px;text-align:center;color:white;background-color:4190EC;padding-top:10">Complaints/Queries</h3>
	    <div style="padding:20px;">
		<h2 style="color:red;text-align:right" >Your Feedback/Compliants<br></h2>
		
		<?php
		$sql22 = "Select * from  ordercompalints where orderid='$orderid'";
		$newsql=$con->query($sql22);
		while($newrow=$newsql->fetch_assoc()){
			echo "<div align='right' ><h2 class='hello'>";
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
		<h2  class style="color:red;">Response</h2>
		
		<?php
		$sql23 = "Select * from  orderresponse where orderid='$orderid'";
		$newsql2=$con->query($sql23);
		while($newrows=$newsql2->fetch_assoc()){
			echo "<div><h2 class='hi'>";
			echo $newrows['response']."</h2></div>";
		}
		
	}
		?>
		</div>
		
	<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>	
		
		</div>
		</div>
		</div>

		
		<?php
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
		}else{
			
			echo "No Complaints raised by you yet";
		}
		
?>
</div>
</div>-->
 </div>
<?php
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>