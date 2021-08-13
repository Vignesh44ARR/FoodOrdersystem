<?php
//require("../dbfood.php"); 
require("../database/dbfood.php"); 
require '../phpmailer/PHPMailerAutoload.php';
require '../phpmailer/class.PHPMailer.php';
require '../phpmailer/class.smtp.php';

$hotel= $_POST['hname'];
$email1=  strtolower($_POST['usernames']);
$ownername = $_POST['ownername'];
$desc= $_POST['desc'];
$hoteltype=$_POST['hoteltype'];
$door=$_POST['door'];
$street=$_POST['street'];
$town=$_POST['town'];
$pin=$_POST['pin'];
$password=password_hash($_POST['password'],  
          PASSWORD_DEFAULT);
$phone=$_POST['phone'];
$msg = '';
$targetDir = "doc/";
$fileName = basename($_FILES["file"]["name"]); // get the filename
	$temp = explode(".", $_FILES["file"]["name"]); //get extension and filename removed
		$path_parts = pathinfo($fileName);
		$fil= $path_parts['filename'];  //get the original filename
		$newfilename = round(microtime(true)) . '.' . end($temp);
		$fi=$fil . $newfilename;
$targetFilePath = $targetDir.$fi;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$querys="delete  FROM hotp WHERE email='$email1'";
$runs=(mysqli_query($con,$querys));

$querys="SELECT * FROM hoteluser WHERE email='$email1'";
$runs=(mysqli_query($con,$querys));
if(mysqli_num_rows($runs)==0){
$otps= rand(100000,999999);
$mail = new PHPMailer;
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$EMAIL='quizeronline@gmail.com';
//$EMAIL='codiesfoodies@gmail.com';
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
$mail->setFrom('prakashdayalans@gmail.com', 'Quizer');
$mail->addAddress($email1, 'User');     // Add a recipient

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'COdies One-Time-Password Registration';
$mail->Body    = '<div>Hello '.$hotel.', <br/> Your 6-digit OTP for Hotel registeration : <b>'.$otps.'</b><br/> This OTP is valid only for 2 minutes<br/><br/> 
<p style="color-red;">Do not share this otp to anyone.<br/><br/><br/><br/><br/><br/><b>Best regards,</b><br/>COdies Team.</div>';
$mail->AltBody = '';

if(!$mail->send()){
   echo "unable to send otp right now. Please try after sometime";
} else {
	if(isset($email1)){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
	
		//move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sqler="INSERT INTO hotp VALUES('$email1','$ownername','$hotel','$desc','$password','$hoteltype','$door','$street','$town','$pin','$phone','$fi','$otps')";
	$insert=$con->query($sqler) or die(mysqli_error($con));
	
            if($insert){
				$msg="Time-out Try again";
				header("refresh:120; url=hotelsignup.php?mes=$msg");
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
<CenteR>
        
       <div class="col-lg-4" style="background-color:white; border:1px solid;"  >
            
            <form method ="post" action ="hotelotp2.php?id=<?php echo $email1 ?>">
            
                <fieldset >
    
                    <div class="form-row" >
					<h1 style="background-color:black;color:white; width:100%;"> Hotel Registeration</h1>
                        <h6> OTP sended to <span id="mail"><?php echo $email1;?></span></h6>
                    </div>
                    <div class=" form-row">
                        <input class="form-control" style="width:50%;" id="otpe" type="text" placeholder="Enter 6 digit OTP" name="otpe" required/>
 
                       </div>
                    <div class="form-row">
                        <span id='message'></span>
    
                                <b style="color : #008080">Time Remaining: <b id="countdown" style="color: rgba(255, 0, 0, 0.8);">02:00</b></b>
                                <script src="timers.js"></script>
                            <div class="">
                                <input class="btn btn-success" type="submit" value="submit" method="post" />
                            </div>
                    </div>          
                    <br/>
                </fieldset>
                </form>
        
    </div>
</body>
</html
	<?php
				
				
            }else{
                $msg = "Image upload failed, please try again.";
				header("refresh:0; url=hotelsignup.php?mes=$msg");
            } 
        }else{
            $msg = "Sorry, there was an error uploading your file.";
			header("refresh:0; url=hotelsignup.php?mes=$msg");
        }
    }else{
        $msg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
		header("refresh:0; url=hotelsignup.php?mes=$msg");
    }
}else{
    $msg = 'Please select a file to upload.';
	header("refresh:0; url=hotelsignup.php?mes=$msg");
}


}		
}
else{
	$msg="Email id :- .$email1. already registered...login to proceed";
	header("refresh:0; url=../index.php?mes=$msg");
}
?>

	