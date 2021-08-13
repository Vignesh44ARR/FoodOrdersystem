<?php
require("database/dbfood.php"); 

require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.PHPMailer.php';
require 'phpmailer/class.smtp.php';

$subject= $_POST['subject'];
$email= $_POST['email']; 
$querys="SELECT * FROM contactus";
$runs=(mysqli_query($con,$querys)) or die(mysqli_error($con));
$row = mysqli_num_rows($runs)+1;
$a="Codies";
$id = $a.$row;  // id as no of rows+1 as SNO
$status="open";

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
$mail->Subject = 'Ticket registered - '.$id.' - COdies';
$mail->Body    = '<div>Dear Customer, <br/><br/> We have registered your complaint/query <b><br/> Complaint id: '.$id.'</b><br/> We will get back to you in 2 working days.
<br/><br/><br/><br/><br/><br/><b>Best regards,</b><br/>COdies Team.</div>';
$mail->AltBody = '';

if(!$mail->send()) {
   echo "unable register your complaint right now try after sometime";
} else {
$sqler="INSERT INTO contactus(id,email, query, status) VALUES('$id','$email','$subject','$status')";
	$con->query($sqler);
			header("refresh:0; url=complaint.php?mes=Your Complaint/Query have been successfully registered");
}
?>