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
		input,
textarea {
  border: 1px solid #eeeeee;
  box-sizing: border-box;
  margin: 0;
  outline: none;
  padding: 10px;
}

input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
}

.input-group input[type='button'] {
  background-color: #eeeeee;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
}

.input-group .button-minus,
.input-group .button-plus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 38px;
  position: relative;
}

.input-group .quantity-field {
  position: relative;
  height: 38px;
  left: -6px;
  text-align: center;
  width: 62px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}

.button-plus {
  left: -13px;
}

input[type="number"] {
  -moz-appearance: textfield;
  -webkit-appearance: none;
}
td,tr,table{  
font-size: 25px;
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
                    <a class="nav-link act" href="userhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>	
                <li class="navbar-item">
                    <a class="nav-link " href="userprofile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
                </li>
               <li class="navbar-item">
                    <a class="nav-link" href="myorders.php"><i class="fa  fa-shopping-cart"></i>&nbsp;My orders</a>
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
<br><br> <!--
    <div class="row">
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


        </div>
        <div class="lef col-lg-9" >
           
-->
<div class="col-lg-12 input-group mb-3 text-center" style=" width:100%; color : orange; BACKGROUND-COLOR: rgba(184, 178, 178, 0.432);">
<?php
if(isset($_GET["id"])){
echo '<span id="hhid" hidden>'.$_GET["id"].'</span>';
$ids= $_GET['id'];
$sql = "Select * from food where hotelid='$ids'";
 $result1 = $con->query($sql);
 $rower=mysqli_num_rows($result1);
$hotelname="";
if (mysqli_num_rows($result1) > 0)
{
	$sqls="select * from hoteluser where sno='$ids'";
	$res= mysqli_query($con,$sqls);
	while($rows=$res->fetch_assoc()){
	$hid=$rows['hotelname'];
	$door=$rows['door'];
	$street=$rows['street'];
	$town=$rows['town'];
	$pin=$rows['pin'];
	$file=$rows['filename'];
	}
	echo  '<img height=250 width= 250 src="../hotel/doc/'.$file.'" />';
	echo "<span style='margin-left:380px;  text-shadow: 2px 2px #ff0000;
	height : min-content'><b style='text-transform:capitalize;font-size:100px;'>$hid</b>";
	echo "<H2 style=' height : min-content; color : orange; margin-left : 30%; background-color:transparent;text-transform:capitalize;font-size:25px;'>".$door.", ".$street.", <BR>".$town.", ".$pin."</H2></span>";
	?>
 
</div>
<div class="row">
<div class="col-lg-6" style="border: 1px solid;" >
<div class="row">

	<?php
    while($row = $result1 ->fetch_assoc())
    {
        $foodtype=$row['foodtype'];
	
		$foodname= $row['foodname'];
		$foodid=$row['foodid'];
       echo '
       <div class="row col-lg-10" style="margin-bottom:24px; margin:2%; border:2px solid;">
      <div class="col-lg-4" ><img class="img-responsive img-thumbnail im " style="width:150px; height:150px;" src="../hotel/foodimage/'.$row['foodimage']. '" alt="'.$row['foodimage']. '">
	  </div>
	 
     <div class="col-lg-8" >
	 <div class="row">
	 <div class="col-lg-6" >';
	
	if($foodtype=='veg'){
	
		echo '<span class="fid" hidden>'.$foodid.'</span>';
		 echo '<h4  style="text-transform:capitalize"> <img src="veg.png" height="20px" width="20px">&nbsp; <BR><span class="fname">'. $foodname.'</Span></h4>';
		 
	 }
	 else{
		 echo '<span class="fid" hidden>'.$foodid.'</span>';
		  echo '<h4 style="text-transform:capitalize"><img src="nonveg.png" height="20px" width="20px">&nbsp;<BR><span class="fname">'. $foodname.'</Span></h4>';
		 
	 }
		echo '<h5 >₹.<Span class="cost">'.$row['cost'].'</span><h5>
     
	  </div>
	
	 <div class="col-lg-6">
	 <br>
	 
	  <div class="input-group">
	  
  <input type="button" value="-" onclick ="callus(this); dec(this);" class="button-minus mut" data-field="quantity"  style="color:white; background-color:#171A29; 
  padding:0px; height:40px; font-size:30px;">
  <input type="number" id="num" step="1" max="10" value="0" name="quantity" class="quantity-field quantity" style="height:40px; color:blue;font-size:30px;">
  <input type="button" id="but" value="+" onclick="callplus(this); inc(this);" class="button-plus but" data-field="quantity" style="color:white; background-color:#171A29; 
  padding:0px; height:40px; font-size:30px;">
   </div>
</div>

</div>
</div>

	   
   </div>
   
   
       ';
    } 

    $result1->free();
}
else{
	
}
?>
 </div>
 
 </div>
 <div class="col-lg-6" id="adder" style="border:1px solid">
<h2>Cart <span id="counts">0</span>&nbsp;Items</h2><br/>


<?php
$sql = "Select * from food where hotelid='$ids'";
 $result1 = $con->query($sql);
 if (mysqli_num_rows($result1) > 0)
{	echo '<table>';
	 while($row = $result1 ->fetch_assoc())
    {	
		echo '<h2>';
		
		$foodid=$row['foodid'];
		echo '<tr><td><b><span style="color:black" class="foodie"></span></b></td></tr><tr>
		<td><span class="quan" style="color:black"></span></td><td><span style="color:black"  class="coster"></span></td>
		<td ><span style="color:black" id="'.$foodid.'"></span></h2></td></tr>';
	}
}
?>
</table>
<br/><br/>
<h2><span id='hid' style="color:black;"></span>
<span id="total"style="color:black;"></span></h2><br/>
<script>
function checkout(x){
	
	var cost=document.getElementsByClassName("cost");
	var quantity=document.getElementsByClassName("quantity");
	 var ids=document.getElementsByClassName('fid');
	 var co = [];
	 var qua = [];
	 var fid = [];
	 var count=0;
	for (var i=0;i<x;i++){
		
		temp=parseInt(quantity[i].value);
		if(temp>0){
		qua[count]=parseInt(quantity[i].value);
		co[count]=parseFloat(cost[i].innerText);
		fid[count]=ids[i].innerText;
		count=count+1;
		}
		}
	var hotelid=document.getElementById("hhid").innerText;
	var total=document.getElementById("total").innerText;
	var url = "order.php?quantity=" + encodeURIComponent(qua) + "&cost=" + encodeURIComponent(co) + "&foodid="+ encodeURIComponent(fid) + "&hotelid="+ encodeURIComponent(hotelid) + "&total="+ encodeURIComponent(total);
        window.location.href = url;	
}
</script>
<Center><Button onclick="checkout('<?php echo $rower;?>');" id="buy" type="button" class="btn btn-primary btn-success" 
style="background-color:#60B246; color:white; width:50%; height:60px; font-size:30px; visibility :hidden">
<span class="fa fa-shopping-cart" style="color:white">&nbsp;&nbsp;Check Out</span>
</button></center><br/>
</div>

</div>
 </div>

 <script>
 function inc(e1){
	 var els = Array.prototype.slice.call( document.getElementsByClassName('but'), 0 );
		 var index=parseInt(els.indexOf(event.currentTarget));
	    var p= document.getElementsByClassName('quantity');
	 if(p[index].value>=10){
	 var z= document.getElementsByClassName('but');
	 z[index].disabled=true;
	 
	 }
	 else{
		 var q= document.getElementsByClassName('mut');
		 q[index].disabled=false;
			 
	 }
	 
	 
 }
 /*
 
 var ch=document.getElementsByClassName('fid');
	 alert(ch[0].innerText);*/
	 
 function dec(e1){
	 var els = Array.prototype.slice.call( document.getElementsByClassName('mut'), 0 );
		 var index=parseInt(els.indexOf(event.currentTarget));
	    var p= document.getElementsByClassName('quantity');
	 if(p[index].value<=0){
	 var z= document.getElementsByClassName('mut');
	 z[index].disabled=true;
	 
	 } 
	 
	  else{
		 var q= document.getElementsByClassName('but');
		 q[index].disabled=false;
			 
	 }
 }
 function callus(e1){

	     var els = Array.prototype.slice.call( document.getElementsByClassName('mut'), 0 );
		 var index=parseInt(els.indexOf(event.currentTarget));
	
	 var x=(document.getElementsByClassName('quantity'));
	var k=parseInt(x[index].value);
	var add= parseInt(document.getElementById('counts').innerText);
	
	if(k>0){
		
		document.getElementById("counts").innerHTML = add-1;
	}
	x=(document.getElementsByClassName('quantity'));
	k=parseInt(x[index].value)-1;

	var ch=document.getElementsByClassName('cost');
	 var cal=parseFloat(ch[index].innerText);
	 var ids=document.getElementsByClassName('fid');
	 var val=(ids[index].innerText);
	 var pre=document.getElementById(val);
	 var h=pre.innerTEXT;
	// alert(h);
	 if(h==null){
		 h=0;
	 }
	 if(k>0)
	 pre.innerHTML=(k*cal).toFixed(2);
	 x=(document.getElementsByClassName('quantity'));
	 k=parseInt(x[index].value);
	 var getting=document.getElementsByClassName('foodie');
	 var quan=document.getElementsByClassName('quan');
	 var coster=document.getElementsByClassName('coster');
	 quan[index].innerHTML=k-1+"  *  ";
	 coster[index].innerHTML=cal + "  =  ";
	
	 if(k<=1 ){
		 quan[index].innerHTML='';
	 coster[index].innerHTML='';
		getting[index].innerHTML='';
		pre.innerHTML='';
		}
	x=(document.getElementsByClassName('quantity'));
	k=parseInt(x[index].value);
	 if(k>0){
	 var total=document.getElementById("total").innerText;
	 var write=document.getElementById("total");


	 if(total!=null || total!=""){
		 document.getElementById('hid').innerHTML='Total -';
		write.innerHTML=(parseFloat(total)-cal).toFixed(2);
		m=(write.innerText);
		//var m=5-parseFloat(write.innerTEXT);
		//alert(m);
		
	 if(m<=0 || m=="" || m==null || m==0.00)
	{
		write.innerHTML='';
		document.getElementById('hid').innerHTML='';
		
	}
	 }
}
var add= parseInt(document.getElementById('counts').innerText);
	
	if(add<=0){
		document.getElementById("buy").style.visibility = "hidden";
	}

 }
 function callplus(e1){
	 var els = Array.prototype.slice.call( document.getElementsByClassName('but'), 0 );
		 var index=parseInt(els.indexOf(event.currentTarget));
	
	 var x=(document.getElementsByClassName('quantity'));
	var k=parseInt(x[index].value);
	var add= parseInt(document.getElementById('counts').innerText);
	
	if(add>0){
		document.getElementById("buy").style.visibility = "visible";
	}
	if(k<10){
		
		document.getElementById("counts").innerHTML = add+1;
	}
	if(k==10){
		
	}
	
	 add= parseInt(document.getElementById('counts').innerText);
	
	if(add>0){
		document.getElementById("buy").style.visibility = "visible";
	}
	
	x=(document.getElementsByClassName('quantity'));
	k=parseInt(x[index].value)+1;

	var ch=document.getElementsByClassName('cost');
	 var cal=parseFloat(ch[index].innerText);
	 var ids=document.getElementsByClassName('fid');
	 var val=(ids[index].innerText);
	 var pre=document.getElementById(val);
	 var h=pre.innerTEXT;
	 var fna=document.getElementsByClassName('fname');
	 var fnam=(fna[index].innerText);
	 var quan=document.getElementsByClassName('quan');
	 var coster=document.getElementsByClassName('coster');
	 if(k>10){
		 k=10;

	 }
	 	 quan[index].innerHTML=k+"  *  ";
	
	 coster[index].innerHTML=cal + "  =  ";
	// alert(h);
	 if(h==null){
		 h=0;
	 }
	 var getting=document.getElementsByClassName('foodie');
	 getting[index].innerHTML=fnam;
	// getting[index].innerHTML+="<br>";
	 if(k<=10){
		 
	 pre.innerHTML=(k*cal).toFixed(2);
	 var total=document.getElementById("total").innerText;
	 var write=document.getElementById("total");
	 document.getElementById('hid').innerHTML='Total -';
	 if(total==null || total==""){
		
		write.innerHTML=cal.toFixed(2);
	 }
	 else{
		 x=(document.getElementsByClassName('quantity'));
		k=parseInt(x[index].value)+1;
		if(k<=10)
		write.innerHTML=(parseFloat(total)+cal).toFixed(2);
	
		
	 }
	 
	 }
 }
 
 function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal<10) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(10);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});
</script>
       

</body>

</html>
<?php

}
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");

}
?>