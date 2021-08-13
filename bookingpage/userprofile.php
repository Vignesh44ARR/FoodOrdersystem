<!DOCTYPE html>
<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["useremail"])){
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
	<link rel="stylesheet" href="../css/main.css">
    <script src="../js/inactivity.js"></script>
    <style>
         
       #image
       {
          
           width:32rem;
           image-rendering:pixelated; 
           height:32rem  
       }
       h6
       {
           font-size: 1.5rem;
           line-height: 2.5rem;
		   padding-left:5px;
          
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
            

                <?php
$id=$_SESSION["useremail"];                                        
$querys="SELECT * FROM users WHERE email='$id'";
$runs=(mysqli_query($con,$querys));
$ok="ok";
$ver="Under Verification";
$no="no";
$status="";
while($row = $runs ->fetch_assoc())
    {
        $lname=$row['lastname'];
        $fname=$row['firstname'];
        $email= $row['email'];
        $phone=$row['phone'];
        $address=$row["door"].",".$row["street"].",".$row["town"].",".$row["pin"];
        $dob=strval($row['dob']);
        $gender=strval($row['gender']);
    }
    ?>
                <div class="col-lg-4     col-sm-12" style="width:40% ;margin-left : 30rem" > 

				<center><h2 style="color:red;background-color:#bfbebd; width:100%;">
  <?php if(isset($_GET["msg"])){ 
  $mes = $_GET['msg'];
  echo $mes;
  }?>     </h2>
				<table >
				<tr style="background-color:#878787;">
                <h1>Your Profile</h1><br>

				<td style="background-color:#878787;">

                <Center><img id="image" src="../foods/user.jpg"   class="rounded-circle" alt="user.jpg" style=" width:100px; height:100px;">
                   </center></td></tr> <tr>
                       <form class="form1" action="updateuserpassword.php" method="POST"  >
                     
					<table >
                    <br>
                        <tr><td><h6>First Name: </td><td><span class="ans"> <?php echo $fname ?></span>  </h6></td></tr>
                        <tr><td><h6>Last Name: </td><td><span class="ans"><?php echo $lname ?></span>  </h6></td></tr>
                        <tr><td><h6>Email:</td><td> <span class="ans"><?php echo $email ?></span>  </h6></td></tr>
                        <tr><td><h6>Contact No:</td><td> <span class="ans"><?php echo $phone ?></span>  </h6></td></tr>
                        <tr><td><h6>Gender: </td><td><span class="ans"><?php echo $gender ?></span>  </h6></td></tr>
                        <tr><td><h6>Date of Birth:</td><td> <span class="ans"><?php echo $dob ?></span>  </h6></td></tr>
                        <tr><td><h6>Address: </td><td><span class="ans"><?php echo $address ?></span>  </h6></td></tr>
						</table><br>
						<tr><td></td><td><button type="submit" class="btn btn-primary">Update Password</button>
						<a href="updateaddress.php" class="btn btn-primary">Update address</a>
						
						</td></tr>
                    </form>
					</tr></td></table>
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