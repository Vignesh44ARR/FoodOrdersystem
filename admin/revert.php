<?php
//require("../dbfood.php"); 
session_start();
if ($_SESSION['adminemail'])
{
require("../database/dbfood.php"); 
require '../phpmailer/PHPMailerAutoload.php';
require '../phpmailer/class.PHPMailer.php';
require '../phpmailer/class.smtp.php';

$id= $_GET['email'];
$no="no";
$visit="Your account has been rejected. Kindly visit with all the documents sent to your mail to our office for futher approach..";
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
$mail->addAddress($id, 'User');     // Add a recipient

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'COdies - Hotel Account rejected..';
$mail->Body    = '<div>Hello,<br/><br/> 
<p style="color-red;">'.$visit.'</p><br/><br/><br/><br/><br/><br/><b>Best regards,</b><br/>COdies Team.</div>';
$mail->AltBody = '';
if(!$mail->send()) {
   echo "unable to send otp right now. Please try after sometime";
} else {
	$querys="update hoteluser set status='$no' where email ='$id'";
	$runs=(mysqli_query($con,$querys));
	$m="A Mail has been sent to hotel user to regarding the rejection";
	header("refresh:0; url=adminhome.php?mes=$m");
}
}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");

}
?>
