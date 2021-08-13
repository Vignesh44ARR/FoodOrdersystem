<?php
require("../database/dbfood.php"); 
require '../phpmailer/PHPMailerAutoload.php';
require '../phpmailer/class.PHPMailer.php';
require '../phpmailer/class.smtp.php';
$email= strtolower($_POST['email']);
$querys="SELECT * FROM huotp WHERE email='$email'"; 
$runs = mysqli_query($con,$querys); 
$sqler="DELETE from huotp WHERE email='$email'"; 
$con->query($sqler); 
$email= strtolower($_POST['email']);
$querys="SELECT * FROM hoteluser WHERE email='$email'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
$otps= rand(100000,999999);

while($rows = mysqli_fetch_array($runs))
{

	$fname=$rows['sno'];
	$lname=$rows['hotelname'];

}
$row = mysqli_num_rows($runs);

if($row==1){
	
$mail = new PHPMailer;
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$EMAIL='quizeronline@gmail.com';
$PASS='alhnqonpamhykmsd';



$mail->SMTPDebug = 0;                            // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $EMAIL;                 // SMTP username
$mail->Password = $PASS;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->SMTPAutoTLS = false;
$mail->setFrom('prakashdayalans@gmail.com', 'COdies');
$mail->addAddress($email, 'User');     // Add a recipient


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = ' Hotel Reset Password OTP - COdies';
$mail->Body    = '<div>Hi '.$fname.' '.$lname.', <br/> Your 6-digit OTP for hotel reset password : <b>'.$otps.'</b><br/> This OTP is valid only for 5 minutes<br/><br/> 
<p style="color-red;">Donot share this otp to anyone.<br/><br/><br/><br/><br/><br/><b>Best regards,</b><br/>COdies Team.</div>';
$mail->AltBody = '';

if(!$mail->send()) {
   echo "unable send otp right now try after sometime";
}
else{

	
	$sqler="INSERT INTO huotp VALUES('$email','$otps')";
	$con->query($sqler);
	$mes="Timout or Invalid otp Try Again";
	header("refresh:120; url=../index.php?mes=$mes&id=$email");
			?>
<html>
<head>
<title> Forget Password </title>
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
  .form-control{
	 width:60%;
 }
</style>
</head>
<body>
    

        <center>
        <div class="col-lg-3" style="background-color:#fff5c1;"  >
            <form method ="post" onsubmit="return Validate();" action ="validateotp.php?id=<?php echo $email ?>">
             
                <fieldset>
                
                    <div class="form-row">
                        <h2 style="background-color:green;color:white; width:100%;"> Hotel Reset Password</h2>
                        <h6> OTP sended to <span id="mail"><?php echo $email;?></span></h6> 
                    </div>
                    <div class=" form-row">
                        <input class="form-control" id="otpe" type="text" placeholder="Enter 6 digit OTP" name="otpe" required/><br/>
                        <input class="form-control" type="Password" id="password" name="password"  placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required / ><br/>
                        <input  class="form-control" type="Password" id="confirm_password" name="password"  placeholder="Re-type Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required / >
                    </div>
                    <div class="form-row">
                        <span id='message'></span><br/>
                        <script>
                            $('#password, #confirm_password').on('keyup', function () {
                              if ($('#password').val() == $('#confirm_password').val()) {
                                $('#message').html('Password Matching').css('color', 'green');
                              } else 
                                $('#message').html('Password Does not Matching').css('color', 'red');
                            });
                            </script>
                                <b style="color : #008080">Time Remaining: <b id="countdown" style="color: rgba(255, 0, 0, 0.8);">02:00</b></b>
                                <script src="timers.js"></script><br/><br/>
                            <div class="">
                                <input type="submit" class="btn btn-success" value="submit" />
                            </div>
                    </div>             
                    <br/>
                    <br/>
                    <br/>
                </fieldset>
                
                </form>
                
        </div>
 
</body>
</html	
<?php
	
}
	
	
}else{			
header("refresh:0; url=../signup.php?mes=Entered Mail id is not registered, Kindly register to Continue..."	);
}
?>