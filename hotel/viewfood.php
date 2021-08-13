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
	 <link rel="stylesheet" href="../css/main.css">
    <script src="../js/inactivity.js"></script>
	
    <style>
	
      
     
       h6
       {
           font-size: 1.5rem;
           line-height: 2.5rem;
		   padding-left:10px;
          
       }
       .ans
       {
           color:green;
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
    <nav class="navbar navbar-expand-sm fixed-top  nav">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link " href="hotelhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="hotelprofile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
                </li>
				<li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle act" href="#" id="droplogin" data-toggle="dropdown"><i class="fa fa-fw fa fa-cutlery"></i>Foods</a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" id="userloginbtn" href="foodentry.php" style="width:150px;">Add Foods</a>
                        <a class="dropdown-item act" id="hotelloginbtn" href="modifyfoods.php" style="width:150px;">View Foods</a>
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
<Center> <h1 style=" color:white;background-color:black; width:47%;">Food Details</h1></center>		
		<center>
                <div class="col-lg-5 col-sm-12" style="width:65%">
                <?php    
        

        $id=$_GET['id'];
$sql = "Select * from food where foodid = '$id'";
$result = $con->query($sql);
$sno=0;
while($row = $result ->fetch_assoc())
    {
        $foodname=$row['foodname'];
        $cost=$row['cost'];
        $type = $row['foodtype'];
        $cuisines=$row['cuisines'];
        $available=$row['available'];
        $description= $row['fooddesc'];
        $keyword=$row['keyword'];
        $fname=$row['foodimage'];
    }
    ?>
	<table style="background-color:white; border:1px solid;">
                <td><img id="image" src="foodimage/<?php echo $fname ?>"  alt="<?php echo $fname ?>" style="width:400px;height:400px" >
             </td> 
		
        
                   <td> <Table><form action="updatecost.php?id=<?php echo $id; ?>" method="POST"  >
						
					
                        <tr><td ><h6>Food Name :</td><td> <span class="ans"> <?php echo $foodname ?></span>  </h6></td></tr>
                        <tr><td><h6>Cost  : </td><td> <span class="ans"><h3>₹<input type="text" name ="cost" style="width:100px;" value="<?php echo $cost; ?>" required /></span>  </h6></td></tr>
                        <tr><td><h6>Type:</td><td>  <span class="ans"><?php echo $type ?></span>  </h6></td></tr>
                        <tr><td><h6>Cuisines : </td><td> <span class="ans"><?php echo $cuisines ?></span>  </h6></td></tr>
                        <tr><td><h6>Available : </td><td> <span class="ans"><?php echo $available ?></span>  </h6></td></tr>
                        <tr><td><h6>Description : </td><td> <span class="ans"><?php echo $description ?></span>  </h6></td></tr>
                        <tr><td><h6>Keyword : </td><td> <span class="ans"><?php echo $keyword ?></span>  </h6><br></td></tr>
						<tr><td></td><td><input class ="btn btn-primary" type="submit"value="Update Cost">
                          <a class="btn btn-danger" href="deletefood.php?id=<?php echo $id; ?>">Delete Food</a></td></tr>
	</form></table>
					</td></tr></table>
                </div>
            
    </section>
</body>
</html>

<?php

}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>