<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['adminemail']))
{
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
    <link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
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
        
    <center>
           
			
            <div class="col-lg-8 col-sm-12">
			               <br/><br/><br/>
<?php
require("../database/dbfood.php"); 
require '../phpmailer/PHPMailerAutoload.php';
require '../phpmailer/class.PHPMailer.php';
require '../phpmailer/class.smtp.php';
						   						   
if(isset($_GET["mes"]))
{
$mes = $_GET['mes'];
?><center> <h4 style="color:red; background-color:white;"> <?php echo $mes; ?></style></h4></center><?php
}
if(isset($_GET["ids"])){
	$ids=$_GET["ids"];
$mail = new PHPMailer;
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$EMAIL='quizeronline@gmail.com';
$PASS='alhnqonpamhykmsd';
$mail->SMTPDebug = 0;                            // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;   

// Enable SMTP authentication
$mail->Username = $EMAIL;                 // SMTP username
$mail->Password = $PASS;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->SMTPAutoTLS = false;
$mail->setFrom('prakashdayalans@gmail.com', 'Codies');
$mail->addAddress($ids, 'User');     // Add a recipient

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'COdies Hotel Approved';
$mail->Body    = '<div>Hello '.$ids.', <br/> Your Hotel has been approved.. login to proceed :<br/>
<p style="color:blue;"><br/><br/><br/><br/><br/><br/><b>Best regards,</b><br/>Codies Team.</div>';
$mail->AltBody = '';

if(!$mail->send()) {
   echo "unable to send otp right now. Please try after sometime";
}	
}
?>                <h1 class="text-center" style="background-color:white; width: max-content"> Un-Verified Hotel List</h1>
                <br>
                <!--Export excel button-->
<form action="../csvexport/hoteldataexport.php" method="POST">
<button type="submit" style="float:right;" class="btn btn-secondary" name="export">Export as csv</button>
</form>
<br>
<br>
                <div class="table-responsive">

<table class="table table-striped   table-hover table-sm">
<caption style="color:white;">Unverified Hotel-List</caption>

    <thead style="text-align: center; color: white; background-color: black;">
      <tr>
        <th scope="col">SNO</th>
        <th scope="col">Hotel Name</th>
        <th scope="col">Owner Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Type</th>
        <th scope="col">Town</th>
        <th scope="col">Status</th>
        
      </tr>
    </thead>
    <tbody style="background-color:white;"> 
                <?php
$sql = "Select * from hoteluser where status = 'Under Verification'";
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
          <td><a  class="btn btn-success" href="verificationpage.php?email='.$row["email"].'">Verify</a></td>

        </tr>';
    }
    $result->free();
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
</html>
<?php
}}else
{
    header("refresh:0; url=../index.php?mes=Login to continue");
}
?>