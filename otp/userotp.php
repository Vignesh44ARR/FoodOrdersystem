<?php
//require("../dbfood.php"); 
require("../database/dbfood.php"); 
require '../phpmailer/PHPMailerAutoload.php';
require '../phpmailer/class.PHPMailer.php';
require '../phpmailer/class.smtp.php';

$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email1= $email= strtolower($_POST['username']);
header("refresh:120; url=userotp2.php?id=$email1");
$gender= $_POST['gender'];
$dob=$_POST['dob'];
$door=$_POST['door'];
$street=$_POST['street'];
$town=$_POST['town'];
$pin=$_POST['pin'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
$phone=$_POST['phone'];

$querys="SELECT * FROM users WHERE email='$email1'";
$runs=(mysqli_query($con,$querys));
if(mysqli_num_rows($runs)==0){
$otps= rand(100000,999999);
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
$mail->setFrom('prakashdayalans@gmail.com', 'COdies');
$mail->addAddress($email1, 'User');     // Add a recipient

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'COdies One-Time-Password Registration';
$mail->Body    = '<div>Hello '.$fname.' '.$lname.', <br/> Your 6-digit OTP for registeration : <b>'.$otps.'</b><br/> This OTP is valid only for 2 minutes<br/><br/> 
<p style="color-red;">Do not share this otp to anyone.<br/><br/><br/><br/><br/><br/><b>Best regards,</b><br/>COdies Team.</div>';
$mail->AltBody = '';

if(!$mail->send()) {
   echo "unable to send otp right now. Please try after sometime";
} else {
	$querys="Delete FROM uotp WHERE email='$email1'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
	
//insert into utop table
	$sqler="INSERT INTO uotp VALUES('$email1','$fname','$lname','$password','$gender','$door','$street','$town','$pin','$dob','$otps','$phone')";
	
	$con->query($sqler) or die(mysqli_error($con));
	?>
<html>
<head>
<title> Registration</title>
<script type="text/javascript" src="validatepassword.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/main.css"> 
<style>
    img
    {
        width: 80%;
    }
 body
 {
     padding-top: 4rem;
 }
 #mail
 {
     color: #008080;
     font-weight: bolder;
 }
</style>
</head>
<body>
    
  <Center>
        <div class="col-lg-4" style="background-color:white; border:1px solid;">
           
            <form method ="post" action ="userotp2.php?id=<?php echo $email1 ?>">
              
                <fieldset >
    
                    <div class="form-row">
					<h2 style="background-color:black;color:white; width:100%;"> User Registeration</h2>
                        <h6> OTP sended to <span id="mail"><?php echo $email;?></span></h6> 
                    </div>
                    <div class=" form-row">
                        <input class="form-control" style="width:50%; id="otpe" type="text" placeholder="Enter 6 digit OTP" name="otpe" required/>
 
                       </div>
                    <div class="form-row">
                        <span id='message'></span>
    
                                <b style="color : #008080">Time Remaining: <b id="countdown" style="color: rgba(255, 0, 0, 0.8);">02:00</b>
                                <script src="timers.js"></script><br/><br/>
                            <div class="">
                                <input type="submit" class="btn btn-success" value="submit" method="post" />
                            </div>
                    </div>          
                   
                </fieldset>
                </form>
        </div>
  
</body>
</html
	<?php
}		
}
else{
	$msg="Email id :- .$email1. already registered...login to proceed";
	header("refresh:0; url=../index.php?mes=$msg");
}


?>

