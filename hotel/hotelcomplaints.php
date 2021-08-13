<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["hotelemail"])){

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title>Admin-Complaint Page</title>
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
                    <a class="nav-link dropdown-toggle " href="#" id="droplogin" data-toggle="dropdown"><i class="fa fa-fw fa fa-cutlery"></i>Foods</a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" id="userloginbtn" href="foodentry.php" style="width:150px;">Add Foods</a>
                        <a class="dropdown-item" id="hotelloginbtn" href="modifyfoods.php" style="width:150px;">View Foods</a>
                    </div>
                </li>
                <li class="navbar-item ">
                    <a class="nav-link act" href="hotelcomplaints.php"><i class="fa fa-fw fa-envelope"></i>Complaints</a>
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
                
             
			<Center><h1 style="color:white; background-color:black; width:50%;">Your Complaints</h1></center>
           <br><Center>
            <div style="width:50%">
			
                
                <form action="../csvexport/complaintsdataexport.php" method="POST" style="float:right;">
<button type="submit" class="btn btn-secondary" name="export">Export as csv</button>
</form>
   </div>    </center>        <br/>  <br/>
  

   <div class="table-responsive" style="width:100%;" >
      <center>
<table class="table table-striped table-bordered   table-hover table-sm" style="width:50%;">
<caption style="color:white;">List of Complaints</caption>
    <thead style="text-align: center; color: white; background-color: black;">
      <tr>
      <th scope="col">Order id</th>
        <th scope="col">Order date</th>
		<th scope="col"></th>
       
      </tr>
    </thead>
    <tbody> 
<?php
$hotelemail=$_SESSION["hotelemail"];
$qu="select * from hoteluser where email='$hotelemail'";
$mysql=mysqli_query($con,$qu);
$hotelid="";
while($ru=$mysql->fetch_assoc()){
	$hotelid=$ru['sno'];
}

$sql = "Select * from ordercompalints where orderid in (select orderid from orders where hotelid='$hotelid')  group by orderid";
$result = $con->query($sql);
$sno=0;
$dot="...";
if ($result -> num_rows > 0)
{
    while($row = $result ->fetch_assoc())
    {
		$id=$row['orderid'];
		$ins="select od from orders where orderid='$id'";
		$runins=mysqli_query($con,$ins);
		while($rowinns=$runins->fetch_assoc()){
			$od=$rowinns['od'];
		}
       echo '
        <tr>
        <th scope="row">'.$id.'</th>
          <td>'.$od.'</td>
          <td><a  class="btn btn-success" href="complaintresponse.php?id='.$id.'">Response</a></td>
        </tr>';
    }
    $result->free();
}
?>
          </tbody>
		  
    </table>
	</form>
</div>
</div>            
            <div class="col-lg-1 col-sm-0">
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