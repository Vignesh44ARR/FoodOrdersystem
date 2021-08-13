<!DOCTYPE html>
<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codies-Admin</title>
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
    <nav class="navbar navbar-expand-sm fixed-top  nav">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link " href="hotelhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link act" href="hotelprofile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
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
    <section> 
        <br><br><br><br>       
		<center>
                <div class="col-lg-5 col-sm-12" style="width:40%">
				<center><h2 style="color:red;background-color:#bfbebd; width:100%;">
  <?php if(isset($_GET["msg"])){ 
  $mes = $_GET['msg'];
  echo $mes;
  }?>     </h2><center>
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
        $status=$row['status'];
        $hname=$row['hotelname'];
        $desc = $row['descs'];
        $fname=$row['filename'];
        $oname=$row['ownername'];
        $email= $row['email'];
        $phone=$row['phone'];
        $type=$row['type'];
        $address=$row["door"].",".$row["street"].",".$row["town"].",".$row["pin"];
        $rating=$row['rating'];
    }
    ?>
	<table><tr><td style="background-color:#878787;">
                <center><img id="image" src="doc/<?php echo $fname ?>"  class="rounded-circle" alt="<?php echo $fname ?>" style=" width:100px; height:100px;">
               </center>
               
         
                    <form action="updatehotelpassword.php?<?php echo $email ?>"  method="POST"  >
					<table style="background-color:white;">
					
                        <tr><td style="width:30%"><h6>Hotel Name :</td><td> <span class="ans"> <?php echo $hname ?></span>  </h6></td></tr>
                        <tr><td><h6>Owner Name : </td><td> <span class="ans"><?php echo $oname ?></span>  </h6></td></tr>
                        <tr><td><h6>Email:</td><td>  <span class="ans" name="email"><?php echo $email ?></span>  </h6></td></tr>
                        <tr><td><h6>Contact No : </td><td> <span class="ans"><?php echo $phone ?></span>  </h6></td></tr>
                        <tr><td><h6>Type : </td><td> <span class="ans"><?php echo $type ?></span>  </h6></td></tr>
                        <tr><td><h6>Address : </td><td> <span class="ans"><?php echo $address ?></span>  </h6></td></tr>
                        <tr><td><h6>Rating : </td><td> <span class="ans"><?php echo $rating ?></span>  </h6><br></td></tr>
                    </form>
					</td></tr>
					<tr><td colspan="2"><center> <button type="submit" class="btn btn-primary">Update Password</button></center></td></tr>
					</table>
                </div>
            
    </section>
</body>
</html>

<?php

}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>