<!DOCTYPE html>
<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
    
    ?>
<html lang="en">
<head>
<link rel = "icon" href = "../foods/brand.png" type = "image/x-icon">
    <title>Add Foods</title>
    <meta charset="UTF-8">
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    
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
    <style>
   h1{
	   color:white;
   }
</style>
</head>
<body>
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
                    <a class="nav-link dropdown-toggle act" href="#" id="droplogin" data-toggle="dropdown"><i class="fa fa-fw fa fa-cutlery"></i>Foods</a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item act" id="userloginbtn" href="foodentry.php" style="width:150px;">Add Foods</a>
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
        <br><br><br>

    </header>
	<center>
    <?php 
require("../database/dbfood.php"); 
if(isset($_GET["mes"])){
$mes = $_GET['mes'];
echo "<center style='background-color : grey ;width:400px;'><h3>";
echo "<font color='red'>"; 
echo $mes;
echo "</font>";
echo "</h3></center>";	
	
}
?>
</center>
        <div  style="margin-left:35%; width:35%; border:1px solid"  ;>
            <center><h1 style="background-color:black; width:100%"> Food Entry</h1><br/></center>
			
            <form  method="post" name="foodentry" onsubmit="return Validate();" action="addfood.php" enctype="multipart/form-data" style="background: rgba(255, 255, 255, 0.8); padding:10px; padding-left:5%; padding-right:5%" >
	

  <div class="row" >
                    <div class="col-lg-6">
                        <b>Food Name : <b style="color:red">*</b></b> <br>
                        <input id="ins" type="text" name="fname" placeholder="Food name" required  autofocus /></div>
                    <div class="col-lg-6" > <b>Cost: <b style="color:red">*</b></b><br>
                        <input id="ins" type="number" name="cost" placeholder="Cost" step=".01" required /></div>
                    
</div><br>
<div class="row">
<div class="col-lg-7">
                    <b>Type : <b style="color:red">*</b></b><br>
                        <input type="radio" name="foodtype" value="veg" checked> <b>Veg</b>
                        <input type="radio" name="foodtype" value="nonveg"> <b>Non Veg</b>
                        <input type="radio" name="foodtype" value="onlyegg"> <b>Only Egg</b>
                    </div>
</div>
<div class="col-lg-6">
                     <br/>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
   
                        <b>Cuisines : <b style="color:red">*</b></b> <br>
                        <input list="Cuisines" name="cuisine" id="Cuisine">
                        <datalist id="Cuisines">
                        <option value="Southindian">
                        <option value="Northindian">
                        <option value="Italian">
                         <option value="Continental">
                        <option value="Thai">
                        <option value="Italian">
                        <option value="Japanese">
                        <option value="Chinese">
                        <option value="Mediterranean">
                        <option value="Mexican">
                        <option value="Dessert">    
                            </datalist>                        
                    </div>
                    <div class="col-lg-5"> <b>Time: <b style="color:red">*</b></b><br>
                    <select class="form-select form-select-sm" name="available" aria-label=".form-select-sm example" required>
                        <option selected>Available</option>
                        <option value="breakfast">Breakfast</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                        <option value="all">All</option>

                    </select>
                    </div>  
                    <div class="col-lg-6">
                     
                    </div>
                    </div><br>
					<div class="row">
					<div class="col-lg-10">
                    <b>Food Desciption <b style="color:red">*</b></b><br>
                    <textarea id="fdesc" rows="1" name="fdesc"  placeholder="Food Description" style="width: 100%" required></textarea>
                    
                    </div>
					</div><br/>
                        <div class="row">
                        <div class="col-lg-10">
                        <b>Key Word <b style="color:red">*</b></b><br>
                    <textarea id="keynotes" rows="5" name="keyword" placeholder="Keywords separated by comma" style="width: 100%" required ></textarea>
                    </div>
                    
                    
                        </div><br/>
                    <div class="row" >
                        <div class="col-lg-12">
                        <b>Picture : <b style="color:red">*</b></b> ('jpg','png','jpeg') only<br>
                        <br>
                        <input  type="file"  name="file" value=""/> 
                    </div>
                
                    </div><br><br>                   
                                  <div class="row" >
                    <div class="offset-lg-4">
                    <button type="submit" value="addfood" class="btn btn-success">Submit </button>
                    <button type="reset" value="clearall" class="btn btn-danger">Clear</button>

                    </div>
                    </div>
                    </div>

            </form>
<!-- below lines script is manditory-->	
<script type="text/javascript">
		$(document).ready(function() {
			$('#username').keyup(function(){
		      $.post("check.php", {
		        username: $('#username').val()
		      }, function(response){
		        $('#Result').fadeOut();
		        setTimeout("finishAjax('Result', '"+escape(response)+"')", 400);
		      });
		    	return false;
			});
		});
		function finishAjax(id, response) {
		  $('#Result').hide();
		  $('#'+id).html(unescape(response));
		  $('#'+id).fadeIn();
		} 
</script>
<!-- above lines script is manditory-->
</body>

<?php
}
else
{
    header("refresh:0; url=../index.php?mes=Login to proceed");
}
?>
</html>