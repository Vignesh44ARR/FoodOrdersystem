<?php
require("../database/dbfood.php"); 
session_start();
if(isset($_SESSION["adminemail"])){
$id = $_GET['id'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Complaint Page</title>
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
       #on2{
		   font-size: 1.5rem;
           line-height: 2.5rem;
           word-spacing: 0.5rem;
		   padding-left:15px;
		   color:red;
	   }
        h3
       {
           font-size: 1.5rem;
           line-height: 2.5rem;
           word-spacing: 0.5rem;
		   
       }
       textarea
       {
           height: 8rem;

       }
       form
       {
           margin-top:1rem;
           margin-left : 4rem;
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
                    <a class="nav-link act" href="complaintlist.php"><i class="fa fa-fw fa-envelope"></i>Complaint List</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="hotellist.php"><i class="fa fa-fw fa fa-list"></i>Hotel List</a>
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
	
    <br><br><br><br><br><br><br>

				
                <div style="margin-left: 30%; margin-right: 30%; border : solid; background: rgba(255, 255, 255, 0.8);padding:10px;">
				<CenteR><h2 style="Color:white; width:100%; background-color:black">Complaint Details </h2></center>
                <?php

$sql = "Select * from contactus where id='$id'";
$result = $con->query($sql);
$dot="...";
    while($row = $result ->fetch_assoc())
    {
		$email=$row["email"];
		$query=$row["query"];
		$status=$row["status"];
       ?>
	   <form action="next.php?id=<?php echo $id?>"  Method="POST">
	   <table>
	   <tr><td><h3>Complaint ID: </h3></td><td id="on2"><?php echo $id; ?></td></tr>
	   <tr><td><h3>Email:  </h3></td><td id="on2"> <?php echo $email; ?></td></tr>
	   <tr><td><h3>Query:  </h3></td><td id="on2"> <?php echo $query ; ?></td></tr>
	   <tr><td><h3>status: </h3> </td><td id="on2"><?php echo $status; ?></td></tr>
	   <tr><td colspan="2"><textarea class="form-control" style="    background-color: rgba(233, 201, 72, 0.2);
" id="rep" name="rep"  required></textarea></td></tr>
       
	   <!--<input class="btn btn-success offset-lg-6" type="Submit" value="reply" />-->
       <tr><td colspan="2"><br><button style="float:right; " type="submit" class="btn btn-success offset-lg-6">Reply</button></td></tr>
		</table>
	   </form>
	   <?php

    }
    $result->free();
}
?>
 </div>

            

      
</body>
</html>
