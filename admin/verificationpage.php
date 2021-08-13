<?php
session_start();
if ($_SESSION['adminemail'])
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codies-Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/stylecss.css">
    <script src="../js/inactivity.js"></script>
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
		 <link rel="stylesheet" href="../css/main.css">
   <style>
       
       #image
       {
           height: 35rem;
           box-shadow: 2px 2px 2px 2px #888888;
       }
       h6
       {
           font-size: 1.5rem;
           line-height: 2.5rem;
           word-spacing: 0.5rem;
		   color:red;
       }
       .ans
       {
           color:Black;
       }
       textarea
       {
           height: 8rem;

       }
	   form{
		   border:1px solid;
		   padding:10px;
		   
	   }
	   div {

  width: 50%;
  background-color: powderblue;
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
                    <a class="nav-link act" href="adminhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
				<li class="navbar-item">
                    <a class="nav-link" href="complaintlist.php"><i class="fa fa-fw fa-envelope"></i>Complaint List</a>
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
        <br><br><br><br>  
        <?php
require("../database/dbfood.php");
$mail = $_GET['email'];
$sql = "Select * from hoteluser where status = 'Under Verification' and email = '$mail'";
$result = $con->query($sql);

if ($result -> num_rows > 0)
{
    while($row = $result ->fetch_assoc())
    {
        $hname=$row['hotelname'];
        $oname=$row['ownername'];
        $email=$row['email'];
        $contact=$row['phone'];
        $type=$row['type'];
        $address=$row["door"].",".$row["street"].",".$row["town"].",".$row["pin"];
        $rating=$row['rating'];
        $filename=$row['filename'];
    }
    $result->free();
?>     
          
   

				
             <Center>
                <div style="  background: rgba(255, 255, 255, 0.8); border:1px solid;"> 
				 <h1 style="font-size:35px; background-color:black; color:white; width:100%" >Hotel application detials</h1>
				 <table >
				 <tr><td>
				 <img style="float:left" src="../hotel/doc/<?php echo $filename ?>" height="500px" width="450px" onclick="showImage();" alt="<?php echo $filename ?>" class="rounded mx-auto d-block"  id="image">
				<td/>
               <td>
                <br>
                    <form action="verified.php?email=<?php echo $mail;?>&mes='mailsent'" method="POST" style="width:100%; heigth=100%; background: rgba(255, 255, 255, 0.9); border:none; ">	
                        <h6>Hotel Name: <span class="ans"> <?php echo $hname ?> </span>  </h6>
                        <h6>Owner Name: <span class="ans"><?php echo $oname ?></span>  </h6>
                        <h6>Email: <span class="ans"><?php echo $email ?></span>  </h6>
                        <h6>Contact No: <span class="ans"><?php echo $contact ?></span>  </h6>
                        <h6>Type: <span class="ans"><?php echo $type ?></span>  </h6>
                        <h6>Address: <span class="ans"><?php echo $address ?></span>  </h6>
						<button type="submit" class="btn btn-success offset-lg-6">Approve</button>
						<button type="submit"  class="btn btn-danger" formaction="revert.php?email=<?php echo $mail?>">Reject</button>
					 </form>
					</td>
					</tr>
					</table>
         
            </div>
    </section>
</body>
</html>




<?php
}
}
else
{
    header("refresh:0; url=../index.php?mes=Login to continue");
}
?>