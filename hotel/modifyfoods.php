<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){

?>

<!DOCTYPE html>

<html lang="en">
<head>
<link rel = "icon" href = "../foods/brand.png" type = "image/x-icon">
    <title>Modify Foods</title>
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
        <br><br><br>

    </header>
<Center> <h1 style="background-color:white; width:min-content%;">View Foods</h1></center>

        <div class="col-lg-6" style="margin-left:30%; width:40%;">
           
            <form  method="post" name="foodentry" onsubmit="return Validate();" action="" enctype="multipart/form-data" style="background: rgba(255, 255, 255, 0.8);padding:50px">

 <!-- <div class="row" >
                    <div class="col-lg-12">
                        <b>Search  : </b> 
                            <input id="ins" type="text" name="sfname" placeholder="Food name" size="50" autofocus />
                        <label>&nbsp;</label>
                        <button type="submit" class="btn-success">Search </button>
                    </div> 
            </div><br>-->
            <div class="row" >
                <div class="col-lg-12">
                <div class="col-lg-12 col-sm-12">
</form>
<form action="../csvexport/fooddetailsexport.php" method="POST">
<button  style="float:right;"type="submit" class="btn btn-secondary" name="export">Export as csv</button><br/><br/>
</form>

                <div class="table-responsive">
                
				<?php
				if(isset($_GET['msg'])){
					echo "<Center><h2 style='color:red;'>".$_GET['msg']."</h2></center>";
				}
				?>
<table class="table table-striped table-bordered   table-hover table-sm">
    <caption>List of Foods</caption>
    <thead style="text-align: center; color: white; background-color: black;">
      <tr>
      <th scope="col">Food ID</th>
        <th scope="col">Food Name</th>
        <th scope="col">Type</th>
        <th scope="col">Cost</th>
		<th scope="col">Cuisines</th>
        <th scope="col">Available</th>
        <th scope="col">Modify</th>


    
       
      </tr>
    </thead>
    <tbody> 
                <?php

$hotelemail = $_SESSION["hotelemail"];

$sql = "Select sno from hoteluser where email = '$hotelemail'";
$result = $con->query($sql);
$hotelid="";
while($row = $result ->fetch_assoc())
{
    $hotelid = $row["sno"];
}
$sql = "Select * from food where hotelid = '$hotelid'" ;
$result = $con->query($sql);
$sno=0;
if ($result -> num_rows > 0)
{
    while($row = $result ->fetch_assoc())
    {
        $id =$row['foodid'];
       echo '
        <tr>
        <th scope="row">'.$row['foodid'].'</th>
          <td>'.$row["foodname"].'</td>
          <td>'.$row["foodtype"].'</td>

          <td>'.$row["cost"].'</td>
          <td>'.$row["cuisines"].'</td>
          <td>'.$row["available"].'</td>
          <td><a  class="btn btn-primary" href="viewfood.php?id='.$id.'">View</a></td> 
        </tr>';
    }
    $result->free();
}
?>
          </tbody>
                </div>
                    
                    
                    </div>

            </form>

</body>
</html>
<?php
}
else
{
    header("refresh:0; url=../index.php?mes=Login to proceed");
}
?>