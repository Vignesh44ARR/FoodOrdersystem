<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Admin</title>
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

		.b:hover{
			background-color:#c6c6c6;
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
                    <a class="nav-link " href="adminhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
				<li class="navbar-item">
                    <a class="nav-link" href="complaintlist.php"><i class="fa fa-fw fa-envelope"></i>Complaint List</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link act" href="hotellist.php"><i class="fa fa-fw fa fa-list"></i>Hotel List</a>
                </li>
                
                <li class="navbar-item">
                    <a class="nav-link" href="userlist.php"><i class="fa fa-fw fa fa-list-alt"></i>User List</a>
                </li>
                
                <li class="navbar-item">
                    <a class="nav-link" href="../bookingpage/logoff.php"><i  class ="fa fa-sign-out"></i>Logout</a>
                </li>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        
        <Center>
		<?php if(isset($_GET["mes"]))
{
$mes = $_GET['mes'];
?><center> <h4 style="color:red; background-color:white;"> <?php echo $mes; ?></style></h4></center><?php
}?>
            <div class="col-lg-8 col-sm-12">
                <br><br><br>
				
                <h1 class="text-center" style="background-color:white;">Hotel List</h1>
            
                <!--Export excel button-->
				<br>
<form action="../csvexport/hoteldataexport.php" method="POST">
<button  style="float:right;" type="submit" class="btn btn-secondary" name="export">Export as csv</button><br/><br/>
</form>
<br>
                <div class="table-responsive">
<table class="table table-striped table-bordered   table-hover table-sm">
<caption style="color:white;">List of Hotel</caption>
    <thead style="text-align: center; color: white; background-color: black;">
      <tr>
      <th scope="col">Hotel Id</th>
        <th scope="col">Hotel Name</th>
        <th scope="col">Owner Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Type</th>
        <th scope="col">Town</th>
        <th scope="col">Details</th>
      </tr>
    </thead>
    <tbody style="background-color:white;"> 
                <?php
require("../database/dbfood.php");
$sql = "Select * from users";
$result = $con->query($sql);
$sno=0;
$sql = "Select * from hoteluser where status='ok'";
$result = $con->query($sql);

if ($result -> num_rows > 0)
{
    while($row = $result ->fetch_assoc())
    {
       echo '
        <tr class="b">
          <th scope="row">'.$row["sno"].'</th>
          <td>'.$row["hotelname"].'</td>
          <td>'.$row["ownername"].'</td>
          <td>'.$row["email"].'</td>
          <td style="text-align: right;">'.$row["phone"].'</td>
          <td>'.$row["type"].'</td>
          <td>'.$row["town"].'</td>
          <td><a  class="btn btn-primary" href="viewhotel.php?email='.$row["email"].'">View</a></td>
        </tr>';
    }
    $result->free();
}
?>
          </tbody>
    </table>
</div>
</div>            
            <div class="col-lg-1 col-sm-0">
            </div>
        </div>
    </section>
</body>