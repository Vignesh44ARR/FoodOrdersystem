<?php
session_start();
require("../database/dbfood.php"); 
if(isset($_SESSION["useremail"])){
	
?>
<html>
<head lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <link rel="stylesheet" href="../css/stylecss.css">
	    <!-- jQuery CDN -->  
    <script src = "https://code.jquery.com/jquery-2.2.4.min.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script src="../js/inactivity.js"></script>
 <link rel="stylesheet" href="../css/main.css">
<style>
       span {
            color: red;
        }
        
        .h4 {
            color: brown;
        }
        
        p {
            color: rgb(5, 61, 9);
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .chec {
            margin-left: 2.9rem;
        }
        
        input {
            margin-bottom: 1.4rem;
        }
        
 
        
        .lef {
            margin: 10px;
        }
        
        .seac {
            font-size: 1.7rem;
        }
        
        .lab {
            font-size: 1.8rem;
            color: navy;
            font-weight: bold;
        }
        
        .row {
            border: none;
        }
        
        .rig {
            border-right: 2px solid rgb(0, 0, 0);
            height: 65%;
        }
        
        label {
            font-size: 1.1rem;
            font-weight: bold;
            text-align: right;
            padding-left: 6px;
        }
        
        .ah {
            color: white;
            background-color: rgb(63, 72, 150);
            text-decoration: none;
            padding: 5px;
        }
        nav a
        {
            color: #000000;
        }
		
        #abc{
			height:40px;
			width:100px;
		}
        #hotelist :hover
        {
            font-size : 36px;
        }
		#hyp{
			color:black;
			text-decoration:none;
		}
		#hyp:hover{
			color:black;
			background-color:#e0e0e0;
			}
		#cont:hover{
			background-color:#e0e0e0;
		}
		
input[type=radio] {
    width: 20px;
    height: 20px;

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
               <!-- <li class="navbar-item">
                    <a class="nav-link" href="#">Complaint</a>
                </li> -->
				 <li class="navbar-item">
                    <a class="nav-link act" href="myorders.php"><i class="fa  fa-shopping-cart"></i>&nbsp;My orders</a>
                </li>
			
				 <li class="navbar-item">
                    <a class="nav-link" href="complaints.php"><i class="fa  fa-comments-o"></i>&nbsp;Complaints</a>
                </li>
				<li class="navbar-item">
                    <a class="nav-link" href="../bookingpage/logoff.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
				
            </ul>
        </nav>
</header>
<br><br> 
    <div class="row">
		<!--
        <div class="rig col-lg-2" style="background-color:white;color:black;">
            <center>
                <img src="../img/dsd-removebg-preview.png " width="140 " height="120 " lt=" ">
                <br>
                <br>
              
                
                <?php
  
        $sql1 = "Select * from  hoteluser";
        $result1 = $con->query($sql1);
        echo '<Center>
        <label class="form-label"><b>Hotel Name</b></label></center>
                <input class="form-control text-center"  style="margin-left : .5rem " placeholder="Hotel Names.." list="hotels" name="hotel" id="hotel">
                
        <datalist id="hotels"style="width:5px" >
        ';
    while($rows = $result1 ->fetch_assoc())
    {
        echo '<option value="'.$rows['hotelname'].'"  ></option>';
    }
    echo '   </datalist>';
?>


                
             
           
                <br>
                <hr>

                <h6 style="color:brown; font-size: 1.7em;">Food Options</h6>
                <hr>
            </center>



            <div class="chec" >

                <input type="checkbox"> <label for="">Southindian</label><br>
                <input type="checkbox"> <label for="">Italian</label><br>
                <input type="checkbox"> <label for="">Northindian</label><br>
                <input type="checkbox"> <label for="">Continental</label><br>
                <input type="checkbox"> <label for="">Thai</label><br>
                <input type="checkbox"> <label for="">Italian</label><br>
                <input type="checkbox"> <label for="">Japanese</label><br>
                <input type="checkbox"> <label for="">Chinese</label><br>
                <input type="checkbox"> <label for="">Mediterranean</label><br>
                <input type="checkbox"> <label for="">Dessert</label><br>
                <input type="checkbox"> <label for="">Others</label><br>

            </div>


        </div>-->
        <div class="lef col-lg-10" >


<div  style="padding-top:10px; width:100%;  ">
<center>
 <?php
 if(isset($_GET["mes"])){
	 echo "<h2 style='color:red; background-color:#dbdbdb; width:50%;'>".$_GET["mes"]."</h2>";
 }
 ?>
 </center>
</div> 
<center style="color:red;"><b>Pending orders<br></b></center>
<div class="row">
<?php
$hotelname="";
$mail=$_SESSION['useremail'];
$pe="pending";
$ac="accepted";
$on="On the way";
        $sql1 = "Select orderid, count(orderid) from  orders where useremail='$mail' and status ='$pe' or status='$on' or status='$ac'  group by orderid"; //and status='$pe' or status='$on' order by orderid DESC";
        $result1 = $con->query($sql1);
		//pending, cancel, on the way, rejected
    while($rows = $result1->fetch_assoc())
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
      
	   <div class="row" id="cont" style="border: 3px solid; padding:4px; margin-left:100px; margin-bottom :2rem">
	   
		<h4 style="text-transform:Capitalize; color : blue">
	   <div class="col-lg-4" style="">
        <img class="img-responsive img-thumbnail im" style="width : 250px;height : 200px;float:left;margin-right : 2rem" src="../hotel/doc/'.$filename. '">
        </div>
		
		<br/>
		
		';
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
		$hid = $roww['hotelid'];
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
		echo "<span class='canc' hidden>". $orderid."</span>";
        echo "<span style='float:right;color:green;'>Total = ".$fulltotal."</span><br><br>" ;
		echo "<span style='float:right;color:black'><button class='btn btn-danger myclass' onclick='callthis(this);'>Cancel Order</button></span></h4></div>";
 }
?>
 </div>
<script>
function callthis(e){
	var els = Array.prototype.slice.call(document.getElementsByClassName('myclass'), 0 );
	  var index=parseInt(els.indexOf(event.currentTarget));
	  var news=document.getElementsByClassName('canc');
	  var newsp=news[index].innerText;
	  var url = "cancelorders.php?orderid=" + encodeURIComponent(newsp);;
        window.location.href = url;	
}
</script>

        
<!-- Delivered orders-->
<center style="color:red;"><b><br>Delivered orders<br></b></center>
<div class="row" id="thisrow">
<?php
$hotelname="";
$mail=$_SESSION['useremail'];
$pe="delivered";
        $sql1 = "Select orderid, count(orderid) from  orders where useremail='$mail' and status ='$pe'  group by orderid"; //and status='$pe' or status='$on' order by orderid DESC";
        $result1 = $con->query($sql1);
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
       
	   <div class="row" id="cont" style="border: 3px solid; padding:4px; margin-left:100px; margin-bottom :2rem">
	   
		<h4 style="text-transform:Capitalize; color:blue">
	   <div class="col-lg-12" >
        <img class="img-responsive img-thumbnail im" style="margin-right : 2rem;width : 250px;height : 200px;float:left;" src="../hotel/doc/'.$filename. '">
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
		$innerquery="select * from rating where hotelid='$hotelid' and orderid='$orderid'";
		$innerresult=mysqli_query($con,$innerquery);
		$innerrows=mysqli_num_rows($innerresult);
		if($innerrows==0){
		?>
	    <div>
		<h2 style="float:right;">
		<input type ="radio" class="rating" value="1" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" />1
		<input type ="radio" class="rating" value="2" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" />2
		<input type ="radio" class="rating" value="3" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" />3
		<input type ="radio" class="rating" value="4" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" />4
		<input type ="radio" class="rating" value="5" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" />5
		</h2><span id = "Result"></span></div>
		<?php
		}
		else{
			$thisrate='';
			while($rowing=$innerresult->fetch_assoc()){
				$thisrate=$rowing['rating'];
			}
			?>
			<div>
		<h2 style="float:right;">Rate your service
		<input type ="radio" class="rating" value="1" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" <?php if($thisrate==1){echo "checked";} ?> />1
		<input type ="radio" class="rating" value="2" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" <?php if($thisrate==2){echo "checked";} ?>/>2
		<input type ="radio" class="rating" value="3" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" <?php if($thisrate==3){echo "checked";} ?>/>3
		<input type ="radio" class="rating" value="4" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" <?php if($thisrate==4){echo "checked";} ?>/>4
		<input type ="radio" class="rating" value="5" id= "<?php echo $orderid ?>" name="<?php echo $orderid ?>" onclick="callrating('<?php echo $orderid ?>');" <?php if($thisrate==5){echo "checked";} ?>/>5
		</h2><span id = "Result"></span></div>
			<?php
		}
		?>
		
		</div>
		
		<?php
 }
?>
 </div>
 <script>
function callrating(id){
	var els =document.getElementsByName(id);
	 var z=0;
	for (var i=0;i<5;i++){
		if(els[i].checked){
			z=els[i].value;
		}
	}


	
	var url = "rating.php?orderid=" +encodeURIComponent(id)+  "&values=" + encodeURIComponent(z);
       window.location.href = url;	
}


</script>


<center style="color:red;"><b><br>Cancelled orders<br></b></center>
<div class="row">
<?php
$hotelname="";
$mail=$_SESSION['useremail'];
$pe="cancelled";
        $sql1 = "Select orderid, count(orderid) from  orders where useremail='$mail' and status ='$pe'  group by orderid"; //and status='$pe' or status='$on' order by orderid DESC";
        $result1 = $con->query($sql1);
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
      
	   <div class="row" id="cont" style="border: 3px solid; padding:4px; margin-left:100px; margin-bottom :2rem">
	   
		<h4 style="text-transform:Capitalize; color:red">
	   <div class="col-lg-12">
        <img class="img-responsive img-thumbnail im" style="width : 250px;margin-right:20px;height : 200px;float:left;" src="../hotel/doc/'.$filename. '">
        </div>
		<br/>
		';
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
        echo "<span style='float:right;color:green;'>Total = ".$fulltotal."</span></h2>" ;
		echo '</div>';
 }
?>
 </div>



</body>

</html>
<?php

}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");

}
?>