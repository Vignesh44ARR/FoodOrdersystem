<html>
<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
?>
<head>
<link rel = "icon" href = "../foods/brand.png" type = "image/x-icon">
<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/stylecss.css">
	<link rel="stylesheet" href="../css/main.css"> 
    </script>
<script src="../js/inactivity.js"></script>

<style>

         #image
       {
           height: 20rem;
           box-shadow: 2px 2px 2px 2px #a79f9f;
           width : 20rem;
       }
	   .btn:hover, .btn-success:hover{
		   font-size:15px;
	   }
	 
       div.pending {
  overflow: scroll;
} 
    </style>
</head>

<body>


<?php
$id=$_SESSION["hotelemail"];                                        
$querys="SELECT * FROM hoteluser WHERE email='$id'";
$runs=(mysqli_query($con,$querys));
$ok="ok";
$ver="Under Verification";
$no="no";
$status="";
while($row = $runs ->fetch_assoc())
    {
		$hotelid=$row['sno'];
        $status=$row['status'];
        $hname=$row['hotelname'];
        $desc = $row['descs'];
        $fname=$row['filename'];
    }
if($status==$ver){
	?>
    <header>
        <nav class="navbar navbar-expand-sm fixed-top  nav">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link act" href="hotelhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
              

                <li class="navbar-item">
                    <a class="nav-link" href="../bookingpage/logoff.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
                </li>
            </ul>
        </nav>
    </header>
	<br/><br/><br/><br/><br/><br/><br/>
	<h1 Style="color:red">Your Hotel id is under verification..<br/> Stay tunned</h1>
	<?php
}
else if($status==$no){
	?>
	<br/><br/><br/><br/><br/><br/><br/>
	<h1 Style="color:red">Your Hotel id has been rejected.. Kindly check your email to proceed<br/> Stay tunned</h1>
	<?php
}
else{
	?>
	<br/><br/><br/><br/>
	<!--<h1 Style="color:red"> success .. verified</h1>-->
    <header>
        <nav class="navbar navbar-expand-sm fixed-top  nav">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link act" href="hotelhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link " href="hotelprofile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
                </li>
				<li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="droplogin" data-toggle="dropdown"><i class="fa fa-fw fa fa-cutlery"></i>Foods</a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" id="userloginbtn" href="foodentry.php" style="width:150px;">Add Foods</a>
                        <a class="dropdown-item" id="hotelloginbtn" href="modifyfoods.php" style="width:150px;">View Foods</a>
                    </div>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="hotelcomplaints.php"><i class="fa fa-fw fa-envelope"></i>Complaints</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="../bookingpage/logoff.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
                </li>
            </ul>
        </nav>
    </header>
	<?php if(isset($_GET["mes"]))
{
$mes = $_GET['mes'];
?><center> <h4 style="color:red; background-color:white;"> <?php echo $mes; ?></style></h4></center><?php
}?>
    <div class="row ">
       
        <div class="col-lg-12 text-center" style="position:relative;">
		<Center>
           <h1 style="background-color:white;">
               <dl>
               <dt><?php echo $hname ?></dt></h1>
               <dd><h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <?php echo $desc ?></h5></dd>
               </dl>
           </h1>
		  <B style="color:red; background-color:#e0e0e0;"><?php
		  if(isset($_GET["mos"])){
			  echo $_GET["mos"];
		  }
		  
		  ?></b>
           <div class="row" style="position:relative;">
           
            
                <div  class="col-lg-4 pending" style="margin-left:50px;"style="position:relative;">
      
                <div class="table-responsive">
               
				<center style="color:red;"><b>New orders</b></center>
<table class="table table-striped table-bordered   table-hover table-sm">
    <thead style="text-align: center; color: white; background-color: black;">
      <tr>
      <th scope="col">Order Id</th>
        <th scope="col">Price</th>
		<th scope="col">Address</th>
        <th scope="col">update</th>
		 <th scope="col"></th>
      </tr>
    </thead>
    <tbody> 
           <?php
$id=$_SESSION["hotelemail"];                                        
$querys="SELECT * FROM hoteluser WHERE email='$id'";
$runs=(mysqli_query($con,$querys));
$hotelid='';$address='';
while($row = $runs ->fetch_assoc())
    {
		$hotelid=$row['sno'];
	}	
$counter=-1;
$pending="pending";
 $sql1 = "Select orderid, count(orderid) from  orders where hotelid='$hotelid' and status='$pending' group by orderid order by orderid desc"; //and status='$pe' or status='$on' order by orderid DESC";
        $result1 = $con->query($sql1);
	$orderid='';
	$rt=mysqli_num_rows($result1);
	if($rt>1){
    while($rows = $result1 ->fetch_assoc())
    {  	
        $orderid = $rows['orderid'];
	}
$lets="SELECT * FROM ordertotal WHERE orderid='$orderid'";
$deads=(mysqli_query($con,$lets));
while($lds = $deads ->fetch_assoc())
    {
		$total=$lds['total'];
	}	
$querys="SELECT * FROM orders WHERE orderid='$orderid'";
$runs=(mysqli_query($con,$querys));
$useremail='';
while($row = $runs ->fetch_assoc())
    {
		$useremail=$row['useremail'];
	}
$querys="SELECT * FROM users WHERE email='$useremail'";
$runs=(mysqli_query($con,$querys));

while($row = $runs ->fetch_assoc())
    {
		$address=$row['town'];
	}
	}
	$pen='pending';
$sql = "Select orderid,count(*) from orders where status='$pen' and hotelid='$hotelid' group by orderid order by orderid desc";
$result = $con->query($sql)  or die(mysqli_error($con));
$sno=0;
$dot="...";
if ($result -> num_rows > 0)
{
    while($row = $result ->fetch_assoc())
    {
		$orderss=$row["orderid"];
       echo '
        <tr class="display" onmouseout="notdisp(this)" onmouseover="disp(this)">
          <td class="idclass1">'.$row["orderid"].'</td>';
		  $lets="SELECT * FROM ordertotal WHERE orderid='$orderss'";
$deads=(mysqli_query($con,$lets));
while($lds = $deads ->fetch_assoc())
    {
		$total=$lds['total'];
	}
		  echo '<td>'.$total.'</td>
		 
          <td>'.$address.'</td>
		   <td><select class = "updater" id ="updater">
		  <option value="accept">Accept</option>
		    <option value="reject">Reject</option>
		  </select></td>
          <td><a   class="btn btn-success me" onclick="order1(this);">ok</a></td> 
        </tr>
		<tr class="visib" style="visibility :hidden;">
		<td colspan="5">';
		echo"<table class='myclass2' onmouseout='notdisp2(this)' onmouseover='disp2(this)'><tr><th>FoodID</th><th>Food Name</th><th>Quantity</th><th>Cost</th><th>Subtotal</th></tr>";
		$pending="pending";
		$qwer = "Select orderid, count(*) from orders where orderid='$orderss' and hotelid='$hotelid' and status='$pending' group by orderid order by orderid desc";
		$pqrs=mysqli_query($con,$qwer);
		while($abcd=$pqrs->fetch_assoc()){
			
			$orderid1=$abcd['orderid'];
		$ij="select * from orders where orderid='$orderid1' order by orderid desc";
		$klm=mysqli_query($con,$ij);
		//echo 'order details';
			while($lemon=$klm->fetch_assoc()){
				$foodid=$lemon['foodid'];
				$apple="select * from food where foodid='$foodid'";
				$exc=mysqli_query($con,$apple);
				$foodname='';
				while($temp=$exc->fetch_assoc()){
					$foodname=$temp['foodname'];
				}
				$quantity=$lemon['quantity'];
				$cost=$lemon['cost'];
				$subtotal=$lemon['subtotal'];
				
				echo '<tr><td style="width:25%">'.$foodid."</td>
				<td style='width:25%'> ".$foodname."</td>
				<td style='width:25%'>".$quantity."</td>
				<td style='width:25%'>  ".$cost."</td>
				<td> ".$subtotal."</td></tr>";
			}
			echo "<tr><td colspan='5' style='text-align: right; color:red'><b>Total : <span style='color:black;'>".$total."</span></b></td></tr>";
		}
		echo '</table></td>
		<tr/>
		
		
		';
		
    }
    $result->free();
}
?>     
  <script>
  function order1(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('me'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var res=document.getElementsByClassName('updater');
	  var cal=res[index].value;
	  var news=document.getElementsByClassName('idclass1');
	  var newsp=news[index].innerText;
	  var url = "updateorders.php?orderid=" + encodeURIComponent(newsp) + "&values=" + encodeURIComponent(cal);
        window.location.href = url;	
	  	
  }
  function disp(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('display'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visi=document.getElementsByClassName("visib");
	  visi[index].style.visibility = "visible";
  }
    function notdisp(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('display'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visi=document.getElementsByClassName("visib");
	  visi[index].style.visibility = "hidden";
  }
   function disp2(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('display'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visi=document.getElementsByClassName("visib");
	  visi[index].style.visibility = "visible";
  }
    function notdisp2(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('display'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visi=document.getElementsByClassName("visib");
	  visi[index].style.visibility = "hidden";
  }
</script>
  </tbody>
  </table>
                </div>
           </div>
		   
		   
<!-- accepted parted -->

<div  class="col-lg-3 pending" style="margin-left:50px;"style="position:relative;">
      
                <div class="table-responsive">
              	<center style="color:red;"><b>Accepted orders</b></center>
<table class="table table-striped table-bordered   table-hover table-sm">
<caption style="color:white;">List of Deliveries</caption>
    <thead style="text-align: center; color: white; background-color: black;">
      <tr>
      <th scope="col">Order Id</th>
        <th scope="col">Price</th>
        <th scope="col">update</th>
		 <th scope="col"></th>
      </tr>
    </thead>
    <tbody> 
           <?php
$id=$_SESSION["hotelemail"];                                        
$querys="SELECT * FROM hoteluser WHERE email='$id'";
$runs=(mysqli_query($con,$querys));
$hotelid='';
while($row = $runs ->fetch_assoc())
    {
		$hotelid=$row['sno'];
	}	
$counter=-1;
$pending="accepted";
 $sql1 = "Select orderid, count(orderid) from  orders where hotelid='$hotelid' and status='$pending' group by orderid order by orderid desc"; //and status='$pe' or status='$on' order by orderid DESC";
        $result1 = $con->query($sql1);
	$orderid='';
    while($rows = $result1 ->fetch_assoc())
    {  	
        $orderid = $rows['orderid'];
	}
$lets="SELECT * FROM ordertotal WHERE orderid='$orderid'";
$deads=(mysqli_query($con,$lets));
while($lds = $deads ->fetch_assoc())
    {
		$total=$lds['total'];
	}	
$querys="SELECT * FROM orders WHERE orderid='$orderid'";
$runs=(mysqli_query($con,$querys));
$useremail='';
while($row = $runs ->fetch_assoc())
    {
		$useremail=$row['useremail'];
	}
$querys="SELECT * FROM users WHERE email='$useremail'";
$runs=(mysqli_query($con,$querys));
$address='';
while($row = $runs ->fetch_assoc())
    {
		$address=$row['town'];
	}
	$pen='accepted';
$sql = "Select orderid,count(*) from orders where status='$pen' and hotelid='$hotelid' group by orderid order by orderid desc";
$result = $con->query($sql)  or die(mysqli_error($con));
$sno=0;
$dot="...";
if ($result -> num_rows > 0)
{
    while($row = $result ->fetch_assoc())
    {
		$orderss=$row["orderid"];
       echo '
        <tr class="displays" onmouseout="notdisp3(this)" onmouseover="disp3(this)">
          <td class="idclass2">'.$row["orderid"].'</td>';
		  $lets="SELECT * FROM ordertotal WHERE orderid='$orderss'";
$deads=(mysqli_query($con,$lets));
while($lds = $deads ->fetch_assoc())
    {
		$total=$lds['total'];
	}
		  echo '<td >'.$total.'</td>
		   <td><select class="updater2" id ="updater">
		  <option value="On the way">On the way</option>
		  <option value="Reject">Reject</option>
		  </select></td>
          <td><a   class="btn btn-success me2" onclick="order2(this);">ok</a></td> 
        </tr>
		<tr class="visiter" style="visibility :hidden;">
		<td colspan="5">';
		echo"<table class='myclass2'><tr><th>FoodID</th><th>Food Name</th><th>Quantity</th><th>Cost</th><th>Subtotal</th></tr>";
		$pending="accepted";
		$qwer = "Select orderid, count(*) from orders where orderid='$orderss' and hotelid='$hotelid' and status='$pending' group by orderid order by orderid desc";
		$pqrs=mysqli_query($con,$qwer);
		while($abcd=$pqrs->fetch_assoc()){
			
			$orderid1=$abcd['orderid'];
		$ij="select * from orders where orderid='$orderid1' order by orderid desc";
		$klm=mysqli_query($con,$ij);
		//echo 'order details';
			while($lemon=$klm->fetch_assoc()){
				$foodid=$lemon['foodid'];
				$apple="select * from food where foodid='$foodid'";
				$exc=mysqli_query($con,$apple);
				$foodname='';
				while($temp=$exc->fetch_assoc()){
					$foodname=$temp['foodname'];
				}
				$quantity=$lemon['quantity'];
				$cost=$lemon['cost'];
				$subtotal=$lemon['subtotal'];
				
				echo '<tr><td style="width:25%">'.$foodid."</td>
				<td style='width:25%'> ".$foodname."</td>
				<td style='width:25%'>".$quantity."</td>
				<td style='width:25%'>  ".$cost."</td>
				<td> ".$subtotal."</td></tr>";
			}
			echo "<tr><td colspan='5' style='text-align: right; color:red'><b>Total : <span style='color:black;'>".$total."</span></b></td></tr>";
		}
		echo '</table></td>
		<tr/>
		
		
		';
		
    }
    $result->free();
}
?>     
  <script>
  
    function order2(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('me2'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var res=document.getElementsByClassName('updater2');
	  var cal=res[index].value;
	  var news=document.getElementsByClassName('idclass2');
	  var newsp=news[index].innerText;
	  var url = "updateorders.php?orderid=" + encodeURIComponent(newsp) + "&values=" + encodeURIComponent(cal);
        window.location.href = url;		  	
  }
  function disp3(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('displays'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visit=document.getElementsByClassName("visiter");
	  visit[index].style.visibility = "visible";
  }
    function notdisp3(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('displays'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visit=document.getElementsByClassName("visiter");
	  visit[index].style.visibility = "hidden";
  }
   function disp2(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('display'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visi=document.getElementsByClassName("visib");
	  visi[index].style.visibility = "visible";
  }
    function notdisp2(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('display'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visi=document.getElementsByClassName("visib");
	  visi[index].style.visibility = "hidden";
  }
</script>
  </tbody>
  </table>
                </div>
           </div>

<!-- end of accepted parted -->

<!-- start of on the way part -->
<!-- accepted parted -->

<div  class="col-lg-3 pending" style="margin-left:50px;"style="position:relative;">
      
                <div class="table-responsive">
              	<center style="color:red;"><b>Dispatched orders</b></center>
<table class="table table-striped table-bordered   table-hover table-sm">
<caption style="color:white;">List of Deliveries</caption>
    <thead style="text-align: center; color: white; background-color: black;">
      <tr>
      <th scope="col">Order Id</th>
        <th scope="col">Price</th>
		
        <th scope="col">update</th>
		 <th scope="col"></th>
      </tr>
    </thead>
    <tbody> 
           <?php
$id=$_SESSION["hotelemail"];                                        
$querys="SELECT * FROM hoteluser WHERE email='$id'";
$runs=(mysqli_query($con,$querys));
$hotelid='';
while($row = $runs ->fetch_assoc())
    {
		$hotelid=$row['sno'];
	}	
$counter=-1;
$pending="On the way";
 $sql1 = "Select orderid, count(orderid) from  orders where hotelid='$hotelid' and status='$pending' group by orderid order by orderid desc"; //and status='$pe' or status='$on' order by orderid DESC";
        $result1 = $con->query($sql1);
	$orderid='';
    while($rows = $result1 ->fetch_assoc())
    {  	
        $orderid = $rows['orderid'];
	}
$lets="SELECT * FROM ordertotal WHERE orderid='$orderid'";
$deads=(mysqli_query($con,$lets));
while($lds = $deads ->fetch_assoc())
    {
		$total=$lds['total'];
	}	
$querys="SELECT * FROM orders WHERE orderid='$orderid'";
$runs=(mysqli_query($con,$querys));
$useremail='';
while($row = $runs ->fetch_assoc())
    {
		$useremail=$row['useremail'];
	}
$querys="SELECT * FROM users WHERE email='$useremail'";
$runs=(mysqli_query($con,$querys));
$address='';
while($row = $runs ->fetch_assoc())
    {
		$address=$row['town'];
	}
	$pen='On the way';
$sql = "Select orderid,count(*) from orders where status='$pen' and hotelid='$hotelid' group by orderid order by orderid desc";
$result = $con->query($sql)  or die(mysqli_error($con));
$sno=0;
$dot="...";
if ($result -> num_rows > 0)
{
    while($row = $result ->fetch_assoc())
    {
		$orderss=$row["orderid"];
       echo '
        <tr class="displayer" onmouseout="notdisp4(this)" onmouseover="disp4(this)">
          <td class="idclass3">'.$row["orderid"].'</td>';
		  $lets="SELECT * FROM ordertotal WHERE orderid='$orderss'";
$deads=(mysqli_query($con,$lets));
while($lds = $deads ->fetch_assoc())
    {
		$total=$lds['total'];
	}
		  echo '<td>'.$total.'</td>
		 
        
		   <td><select class="updater3" id ="updater">
		  <option value="Delivered">Delivered</option>
		  <option value="Reject">Reject</option>
		  </select></td>
          <td><a   class="btn btn-success me3" onclick="order3(this);">ok</a></td> 
        </tr>
		<tr class="vi" style="visibility :hidden;">
		<td colspan="5">';
		echo"<table class='myclass2'><tr><th>FoodID</th><th>Food Name</th><th>Quantity</th><th>Cost</th><th>Subtotal</th></tr>";
		$pending="On the way";
		$qwer = "Select orderid, count(*) from orders where orderid='$orderss' and hotelid='$hotelid' and status='$pending' group by orderid order by orderid desc";
		$pqrs=mysqli_query($con,$qwer);
		while($abcd=$pqrs->fetch_assoc()){
			
			$orderid1=$abcd['orderid'];
		$ij="select * from orders where orderid='$orderid1' order by orderid desc";
		$klm=mysqli_query($con,$ij);
		//echo 'order details';
			while($lemon=$klm->fetch_assoc()){
				$foodid=$lemon['foodid'];
				$apple="select * from food where foodid='$foodid'"; // $accepted
				$exc=mysqli_query($con,$apple);
				$foodname='';
				while($temp=$exc->fetch_assoc()){
					$foodname=$temp['foodname'];
				}
				$quantity=$lemon['quantity'];
				$cost=$lemon['cost'];
				$subtotal=$lemon['subtotal'];
				
				echo '<tr><td style="width:25%">'.$foodid."</td>
				<td style='width:25%'> ".$foodname."</td>
				<td style='width:25%'>".$quantity."</td>
				<td style='width:25%'>  ".$cost."</td>
				<td> ".$subtotal."</td></tr>";
			}
			echo "<tr><td colspan='5' style='text-align: right; color:red'><b>Total : <span style='color:black;'>".$total."</span></b></td></tr>";
		}
		echo '</table></td>
		<tr/>
		
		
		';
		
    }
    $result->free();
}
?>     
  <script>
  
   function order3(e){
	  var els = Array.prototype.slice.call(document.getElementsByClassName('me3'), 0 );
	
	  var index=parseInt(els.indexOf(event.currentTarget));

	  var res=document.getElementsByClassName('updater3');
	  var cal=res[index].value;
	  var news=document.getElementsByClassName('idclass3');
	  var newsp=news[index].innerText;
	  var url = "updateorders.php?orderid=" + encodeURIComponent(newsp) + "&values=" + encodeURIComponent(cal);
        window.location.href = url;	
	  	
  }
  function disp4(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('displayer'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visit=document.getElementsByClassName("vi");
	  visit[index].style.visibility = "visible";
  }
    function notdisp4(e){
	  var els = Array.prototype.slice.call( document.getElementsByClassName('displayer'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var visit=document.getElementsByClassName("vi");
	  visit[index].style.visibility = "hidden";
  }
</script>
  </tbody>
  </table>
                </div>
           </div>

<!-- end of on the way part-->
</div>
  
</div>

</div>
	<?php
}
?>
</body>
</html>
<?php

}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>