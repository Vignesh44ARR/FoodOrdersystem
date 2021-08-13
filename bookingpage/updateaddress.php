<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["useremail"])){
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
	<script type="text/javascript" src="validatepassword.js"></script>
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
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
        
       #image
       {
           box-shadow: 2px 2px 2px 2px #888888;
           width:32rem;
           image-rendering:pixelated; 
           height:32rem  
       }
       h6
       {
           font-size: 1.5rem;
           line-height: 2.5rem;
		   padding-left:10px;
          
       }
       .ans
       {
           color:;
		   font-size: 1.5rem;
       }
       textarea
       {
           height: 8rem;

       }
       tr td
       {
           width : 1000px;
       }
    </style>
</head>
<body>
   <header>
    <nav class="navbar navbar-expand-sm fixed-top  nav  ">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link " href="userhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>	
                <li class="navbar-item">
                    <a class="nav-link act" href="userprofile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
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
    <section> 
        <br><br><br><br>       
		<center>
                <div class="col-lg-5 col-sm-12" style="width:40%;border:1px solid;margin-left : 20px">
				
				<h2 style="width:100%; background-color:black;color:white;">Change Password</h2>
        

               
                          <form action="backendaddress.php" method="POST"  style="margin-left:150px">
					<table style="background-color:white;">
					
                        <tr><td style="width:30%; font-weight:bold;"><label><br/> Door :</label></td><td><br/><input style="width:100px;" type="text" placeholder="door no" name="door" required/></td></tr>
						<tr><td style="width:30%;font-weight:bold;"><label><br/> Street :</label></td><td><br/><input style="width:350px;" type="text" id="password" name="street" placeholder="street" pattern=".{3,}" title="Min 3 characters required" required /></td></tr>
						<tr><td style="width:30%;font-weight:bold;"><label> <br/>Town :</label></td><td><br/><input style="width:200px;" type="text" id="confirm_password" name="town" placeholder="town" pattern=".{3,}" title="Min 3 characters required" required /></td></tr>
						<tr><td style="width:30%;font-weight:bold;"><label> <br/>pin :</label></td><td><br/><input style="width:200px;" type="text" id="confirm_password" name="pin" placeholder="pin"  pattern="[1-9]{1}[0-9]{5}" id="zip" title="Must contain 6 numerics" required /></td></tr>
               
                    
					</td></tr>
		
					<tr><td></td><td > <br/><input type="submit" class="btn btn-primary" value="Update Password"></td></tr>
					</table>
					</form>
                </div>
            
    </section>
</body>
</html>
<?php

}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>