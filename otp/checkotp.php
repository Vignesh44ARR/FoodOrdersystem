
<?php
require("../database/dbfood.php"); 

require '../phpmailer/PHPMailerAutoload.php';
require '../phpmailer/class.PHPMailer.php';
require '../phpmailer/class.smtp.php';

$email= $_POST['email']; 
$querys="SELECT * FROM user WHERE email='$email'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
$otps= rand(100000,999999);
while($rows = mysqli_fetch_array($runs))
{

	$fname=$rows['firstname'];
	$lname=$rows['lastname'];

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
$mail->setFrom('prakashdayalans@gmail.com', 'Codies');
$mail->addAddress($email, 'User');     // Add a recipient


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Reset Password OTP - Codies';
$mail->Body    = '<div>Hi '.$fname.' '.$lname.', <br/> Your 6-digit OTP for reset password : <b>'.$otps.'</b><br/> This OTP is valid only for 5 minutes<br/><br/> 
<p style="color-red;">Donot share this otp to anyone.<br/><br/><br/><br/><br/><br/><b>Best regards,</b><br/>Codies Team.</div>';
$mail->AltBody = '';

if(!$mail->send()) {
   echo "unable send otp right now try after sometime";
}
else{
	$querys="Delete FROM fuotp WHERE email='$email'";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
	
	$sqler="INSERT INTO fuotp(email,otp) VALUES('$email','$otps')";
	$con->query($sqler);
			header("refresh:0; url=checkotp.php?id=$email");
}
}else{
	
			header("refresh:0; url=signup.php?mes=Entered Mail id is not registered, Kindly register to Continue...");	
}
?>
<html>
<head>
<title> Forget Password </title>

</script>
</head>

<body>
<form method ="post"  action ="validateotp.php?id=<?php echo $email ?>">
<BR/>
<?php 
if(isset($_GET["mes"])){

$mes= $_GET["mes"];
echo "<h3>";
echo "<font color='red'>"; 
echo $mes;
echo "</font>";
echo "</h3>";
	
}
?>

<h2>Reset Password</h2>
<H3> OTP has been sent to: <font color="blue"><?php echo $email; ?></font> </h3>
<input id="otpe" type="text" placeholder="Enter 6 digit OTP" name="otpe" required/>
 <input type="Password" id="password" name="password"  placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required / >
<input type="Password" id="confirm_password" name="password"  placeholder="Re-type Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required / >
  <span id='message'></span>
					<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Match').css('color', 'green');
  } else 
    $('#message').html('Not Match').css('color', 'red');
});
</script>  
<input type="submit" value="submit" />
<br/>
<br/>
<br/>
</form>
</body>
</html>