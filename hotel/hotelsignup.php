<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hotel Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/stylecss.css">
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel = "icon" href =  "foods/brand.png" type = "image/x-icon">
</script>
    <style>
	#userforgotpasswordbtn,#hotelforgotpasswordbtn{
		font-size:20px;
		background-color:none;
	}
	#userforgotpasswordbtn:hover, #hotelforgotpasswordbtn:hover{
		font-size:22px;
		color:black;
		background-color:none;
	}
	.cols{
		margin-left:25%;
	}
    button[type=submit],button[type=reset]{
		width:100%;
		font-size:24px;
		margin-top:20px;
	}
     
		
</style>
</head>
<body>
<header>
        <!-- Nav Bar-->
        <nav class="navbar navbar-expand-sm fixed-top  nav  ">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link" href="../index.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
				
<li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="droplogin" data-toggle="dropdown">
					<i class="fa fa-fw fa-user"></i>
                Login
            </a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" id="userloginbtn" href="#userlogin" style="width:150px;">User</a>
                        <a class="dropdown-item" id="hotelloginbtn" href="#hotelloginmodal" style="width:150px;">Hotel</a>
                        <a class="dropdown-item" id="adminloginbtn" href="#adminloginmodal" style="width:150px;">Admin</a>
                    </div>
                </li>
				 <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle act" href="#" id="dropregister" data-toggle="dropdown">
                <i class="fa fa-fw fa-user-plus"> </i>&nbsp;Sign-up
            </a>
                    <div class="dropdown-menu">
                        <a style="width:150px;" class="dropdown-item" id="hsbtn" href="hotelsignup.php">Hotel</a>
                        <a class="dropdown-item " id="aabtn" href="../signup.php" style="width:150px;">User</a>
                    </div>
                </li>
				<li class="navbar-item">
                    <a class="nav-link " href="../complaint.php"><i class="fa fa-fw fa-envelope"></i>Complaint</a>
                </li>
				 <li class="navbar-item">
                    <a  class="nav-link " href="../about.php"><i class="fa fa-fw fa-info"></i>About us</a>
                </li>
         
            </ul>
        </nav>
</header>     
<br><br><br>
<?php 
require("../database/dbfood.php"); 
if(isset($_GET["mes"])){
	if(isset($_GET["id"])){
$email= $_GET['id'];	
$sqler="DELETE from hotp WHERE email='$email'";
$con->query($sqler);
$mes = $_GET['mes'];
echo "<h3>";
echo "<font color='red'>"; 
echo $mes;
echo "</font>";
echo "</h3>";	
	}
}
?>
        <div class="col-lg-12 cols" style="width:50%;" >
    
            <form class="form1" method="post" name="hotelreg" onsubmit="return Validate();" action="hotelotp.php" enctype="multipart/form-data">

<h1 id="no3" >&nbsp;&nbsp; Hotel registeration</h1>

  <div class="row" >

                    <div class="col-lg-1 "></div>
                    <div class="col-lg-4">
                        <b>Hotel Name : <b style="color:red">*</b></b> <br>
                        <input id=ins type="text" name="hname" placeholder="Hotel name" Required  autofocus /></div>
                    <div class="col-lg-1 "></div>
                    <div class="col-lg-4"> <b>Owner Name : <b style="color:red">*</b></b><br>
                        <input id=ins type="text" name="ownername" placeholder="Owner name" Required /></div>
                    <div class="col-lg-1 "></div>
                </div><br>
                <div class="row">
                    <div class="col-lg-1 "></div>
                    <div class="col-lg-4">
                    <b>Email : <b style="color:red">*</b></b> <br>
                        <input type="text" id="usernames" name="usernames" placeholder="Email ID" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required /><br/>
                        <span id = "Result" align = "center"></span><br/>
                       </div>
                       <div class="col-lg-1 "></div>

                    <div class="col-lg-4">
                    <b>Type : <b style="color:red">*</b></b><br>
                        <input type="radio" name="hoteltype" value="Veg" checked> <b>Veg</b>
                        <input type="radio" name="hoteltype" value="Non Veg"> <b>Non Veg</b>
                    </div>
                    <div class="col-lg-1 "></div>
                </div>
                <div class="row">
                    <div class="col-lg-1 " ></div>
                    <div class="col-lg-3">
                    <b>Hotel Description <b style="color:red">*</b></b> <br>
                        <textarea id="description" name="desc"  cols = "70"></textarea>
                       </div>
                       </div>
                       <div class="row">
                    <div class="col-lg-1 "></div>
                    <div class="col-lg-2">
                    <b>Phone No : <b style="color:red">*</b></b><br>
                        <input id="phone" type="text" name="phone" placeholder="Phone No" pattern ="[1-9]{1}[0-9]{9}" Required title=" 10 number required"/>
                       <br>
                       </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2">
                   <b> Door No :</b> <b style="color:red">*</b></b> <br><input id=ins type="text" name="door" placeholder="Door no: " id="door" title="Min 1 character required" pattern=".{1,}" required/>
					<!--<b>Street / Area: <b style="color:red">*</b></b> <br> <input id=ins type="text" name="street" placeholder="Street/Area: " id="area" pattern=".{3,}" title="Min 3 characters required" required/>-->
                    <br></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
					<b>Street / Area: <b style="color:red">*</b></b> <br> <input id=ins type="text" name="street" placeholder="Street/Area: " id="area" pattern=".{3,}" title="Min 3 characters required" required/>
                    <br></div>
                    
                </div>
                 <br/>
                 <div class="row">
                    <div class="col-lg-1 "></div>
                    <div class="col-lg-2">
                    <b>Town : <b style="color:red">*</b></b> <br><input id=ins type="text" name="town" placeholder="Town: " pattern=".{3,}" title="Min 3 characters required" required/>
                       </div>
                    <div class="col-lg-1 "></div>
                    <div class="col-lg-2">
                    <b>Zip Code : <b style="color:red">*</b></b>  <br><input  type="text" name="pin" placeholder="zip code:" pattern="[1-9]{1}[0-9]{5}" id="zip" title="Must contain 6 numerics" required/>

                    </div>
                    <div class="col-lg-1 "></div>
                </div><br>
                <div class="row">
                    <div class="col-lg-1 "></div>
                    <div class="col-lg-3">
                    <b>Password : <b style="color:red">*</b></b> <br><input type="Password" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                       </div>
                   
                    <div class="col-lg-3">
                    <b>Confirm Password : <b style="color:red">*</b></b> <br> <input type="Password" id="confirm_password" name="password" placeholder="Re-Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required /> 
                           <br/> <span id='message'></span>
                            <script>
$('#password, #confirm_password').on('keyup', function () {
	if($('#password').val() !='' && $('#confirm_password').val()!=''){
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Password Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
}else{
	$('#message').html('').css('color', 'red');	
}
});
</script> <br/>
                    </div>
                    <div class="col-lg-1 "></div>
                </div>
                <div class="row">
                    <div class="col-lg-1 "></div>
                    <div class="col-lg-4">
                    <b>Hotel permit certificate : <b style="color:red">*</b></b> <br>

        <input type="file"  name="file" value=""  /> 
                       </div>
            
                    <div class="col-lg-4 ">
                    <br>
					<br>
                    <a href="../index.php#hotelloginmodal" id="hotellogin">Already Registered? Login</a><br><br>
                    </div>
                    <div class="col-lg-4 offset-lg-5">
					
                    <input type="submit" value="Signup" class="btn btn-success">
                    </div>
                    <div class="col-lg-1 "></div>
                </div>
                  
            </form>
			</div>
			<br/><br/>
			 <footer>
            <div>

                <div id=fot class="row fot">
                    <hr>
                    <div class="col-lg-2 "></div>
                    <div class="col-lg-1 "></div>
                    <div class="col-lg-4 ">
                        <a href=" "><img src="../bootstrap/icons/social_media_web_network_logo-07-128.png " alt=" "></a>
                        <a href=" "><img src="../bootstrap/icons/social_media_web_network_logo-10-128.png " alt=" "></a>
                        <a href=" "><img src="../bootstrap/icons/yy.png " alt=" "></a>
                        <a href=" "><img src="./bootstrap/icons/twi.png " alt=" "></a>
                        <a href=" "><img src="../bootstrap/icons/gm.png " alt=" "></a>
                        <a href=" "><img src="../bootstrap/icons/social_media_web_network_logo-19-128.png " alt=" "></a>
                        <a href=" "><img src="../bootstrap/icons/social_media_web_online-09-128.png " alt=" "></a>
                    </div>

                    <div class="col-lg-2 ">
                        <address class="h6 text-lg-end ">
                                No:55 Gandhi Street, <br>
                                Annanagar, Chennai <br>
                                Tamilnadu  695 343. 

                        </address>
                    </div>
                </div>
            </div>
        </footer>
			
<!-- below lines script is manditory-->		

<script type="text/javascript">
		$(document).ready(function() {
			$('#usernames').keyup(function(){
		      $.post("check.php", {
		        username: $('#usernames').val()
		      }, function(response){
		        $('#Result').fadeOut();
		        setTimeout("finishAjax('Result', '"+escape(response)+"')", 400);
		      });
		    	return false;
			});
		});
		function finishAjax(id, response) {
		  $('#Result').hide();
		  $('#'+id).html(unescape(response));
		  $('#'+id).fadeIn();
		} 
</script>
<script lang="javascript">
        $(document).ready(function() {
            $('#hotellogin').click(function() {
                $('#hotelloginmodal').modal('show');
            });
           
            $('#hsbtn').click(function() {
                $('#hosign').modal('show');
            }); 
        });

</script>
<!-- above lines script is manditory-->
<!-- User Login Form -->

    <div id="userloginmodal" class="modal fade " role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md"  role="contentinfo" >
		
            <div class="modal-content modaltitle" style="height:500px; width:500px;" >
                <div class="modal-header" id="no2">
				                   <h1 class="h1"style="text-align:center;  width:500px;"><i class="fa fa-fw fa-user"></i>User Login</h1>
                    <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
				
				
                <div class="modal-body" style="width:100%;background-color:rgb(255, 255, 255,.8); ">
				
                    <div class="card" id="userlogincard" style="background-color:rgb(255, 255, 255,0); width:100%"> <!-- form -->
					
                        <div class="row " >
                            <div class="col-sm-10 " >
                                <div class="card-body " style="margin-left:65px" >
								
                                    <form id="userloginform " action="../otp/loginvalidate.php" method="post" class="main-form needs-validation">
                                        <div class="form-group row">
                                            <input  style="width:100%;" type="email" class=" ins form-control cd" name="email" placeholder="abc@email.com" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                                            
                                        </div>
                                        <br>
                                        <div class="form-group row ">
                                            <input style="width:100%;" type="password" class=" ins form-control cd" name="password" placeholder="password" required/>
                                        </div>
                                      

                                        <div class="form-group row ">
                                            <div class="offset sm-4 ">
                                                <button type="submit" class="btn btn-primary btn-success dd">Login</button><br/>
                                                <button type="reset"  class="btn btn-secondary btn-danger dd">Clear</button><br/> <br/>
                                                <a href="#forgotemail" id="userforgotpasswordbtn">Forgot Password ?</a> 

                                            </div>

                                        </div>
                                    </form>
									

                                </div>
                            </div>
                            <!--<div class="col-sm-5 is "></div>-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
      <!-- Hotel Login Form -->
    <div id="hotelloginmodal" class="modal fade " role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="contentinfo">
             <div class="modal-content modaltitle" style="height:500px; width:500px;" >
                <div class="modal-header" id="no2">
                     <h1 class="h1"style="text-align:center;  width:500px;"><i class="fa fa-fw fa-user"></i>Hotel Login</h1>
                    <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="width:100%;background-color:rgb(255, 255, 255,.8); ">
				
                    <div class="card" id="userlogincard" style="background-color:rgb(255, 255, 255,0); width:100%"> <!-- form -->
					
                        <div class="row " >
                            <div class="col-sm-10 " >
                                <div class="card-body " style="margin-left:65px" >
                                    <form id="hotelloginform " action="loginvalidate.php" method="POST" class="main-form needs-validation ">
                                        <div class="form-group row ">
                                            <input style="width:100%;" type="email" class=" ins form-control cd" name="email" placeholder="abc@email.com " required >
                                            
                                        </div>
                                        <br>
                                        <div class="form-group row ">
                                            <input style="width:100%;" type="password" class=" ins form-control cd" name="password" placeholder="password " required>
                                           
                                        </div>
                                        <br>

                                        <div class="form-group row ">
                                            <div class="offset sm-4 ">
                                                <button type="submit" class="btn btn-primary btn-success dd">Login</button><br/>
                                                <button type="reset"  class="btn btn-secondary btn-danger dd">Clear</button><br/> <br/>
                                                <a href="#forgotemail" id="hotelforgotpasswordbtn">Forgot Password ?</a> 

                                            </div>

                                        </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Admin login form -->

    <div id="adminloginmodal" class="modal fade " role="dialog ">
        <div class="modal-dialog modal-dialog-centered modal-md " role="contentinfo ">
              <div class="modal-content modaltitle" style="height:500px; width:500px;" >
                <div class="modal-header" id="no2">
                     <h1 class="h1"style="text-align:center;  width:500px;"><i class="fa fa-fw fa-user"></i>Admin Login</h1>
                    <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="width:100%;background-color:rgb(255, 255, 255,.8); ">
                     <div class="card" id="userlogincard" style="background-color:rgb(255, 255, 255,0); width:100%"> <!-- form -->
					
                        <div class="row " >
                            <div class="col-sm-10 " >
                                <div class="card-body " style="margin-left:65px" >
                                    <form id="adminloginform" action="../admin/adminlogin.php" method ="POST" class="main-form needs-validation " >
                                        <div class="form-group row ">
                                            <input style="width:100%;" type="text" class=" ins form-control cd" name="email" placeholder="abc@email.com " required autofocus>
                                            
                                        </div>
                                        <br>
                                        <div class="form-group row ">
                                            <input style="width:100%;" type="password" class=" ins form-control cd" name="adminpassword" placeholder="password " required>
                                           
                                        </div>
                                        <br>

                                        <div class="form-group row ">
                                            <div class="offset sm-4 ">
                                               <button type="submit" class="btn btn-primary btn-success dd">Login</button><br/>
                                                <button type="reset"  class="btn btn-secondary btn-danger dd">Clear</button><br/> <br/>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
	
    <!---- forgotmodal-->
 <!---- user forgotmodal-->
    <div id="forgotemail" class="modal fade " role="dialog " >
        <div class="modal-dialog modal-dialog-centered  modal-md " role="contentinfo ">
            <div class="modal-content modaltitle">
                <div class="modal-header" style="border: none;" >
                    <h1 class="h1"><i class="fa fa-fw fa fa-key" ></i>Enter email address</h1>
                    <br>
              <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body " style="border: none;" >
                    <div class="card " id="userlogincard " style=" border:1px; background-color :#fee9d9 ">
                        <div class="row ">
                            <div class="col-sm-12 col-lg-12 ">
                                <div class="card-body  ">
                                    <form name="forgot" action="../otp/forgotpassword.php" method="post" class="main-form needs-validation">
                                        <div class="form-group row ">
                                        <input style="width:100%;" type="email" id="usernamer" class="ins form-control cd" name="email" placeholder="abc@email.com " required />
										<span id = "Results" align = "center"></span><br/>
				
                                            <input type="submit" class="btn btn-primary btn-success cc" value="Send otp">

                                        </div>

                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Hotel forgotModel-->
    <div id="hotelforgotemail" class="modal fade " role="dialog ">
        <div class="modal-dialog modal-dialog-centered  modal-md " role="contentinfo ">
		<div class="modal-content modaltitle">
           <div class="modal-header" style="border: none;" >
                    <h1 class="h1" ><i class="fa fa-fw fa fa-key" ></i>Enter email address</h1>
                    <br>
              <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body " style="border: none;" >
                    <div class="card " id="userlogincard " style=" border:1px; background-color :#fee9d9 ">
                        <div class="row ">
                            <div class="col-sm-12 col-lg-12 ">
                                <div class="card-body  ">
                                    <form name="forgot" action="forgotpassword.php" method="post" class="main-form needs-validation">
                                        <div class="form-group row ">
                                        <input type="email" style="width:100%"id="hotelname" class="ins form-control cd" name="email" placeholder="abc@email.com " required />
										<span id = "resp" align = "center"></span><br/>
                                            <input style="width:100%;" type="submit" class="btn btn-primary btn-success cc" value="Send otp">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			$('#usernamer').keyup(function(){
		      $.post("../otp/check.php", {
		        username: $('#usernamer').val()
		      }, function(response){
		        $('#Results').fadeOut();
		        setTimeout("finishAjax('Results', '"+escape(response)+"')", 400);
		      });
		    	return false;
			});
		});
		function finishAjax(id, response) {
		  $('#Results').hide();
		  $('#'+id).html(unescape(response));
		  $('#'+id).fadeIn();
		} 
</script>

<!--2-->
<script type="text/javascript">
		$(document).ready(function() {
			$('#hotelname').keyup(function(){
		      $.post("hotelcheck.php", {
		        hotelname: $('#hotelname').val()
		      }, function(response){
		        $('#resp').fadeOut();
		        setTimeout("finishAjax('resp', '"+escape(response)+"')", 400);
		      });
		    	return false;
			});
		});
		function finishAjax(id, response) {
		  $('#resp').hide();
		  $('#'+id).html(unescape(response));
		  $('#'+id).fadeIn();
		} 
</script>


    <!--js query for modal show-->

    <script lang="javascript">
        $(document).ready(function() {
            $('#userloginbtn').click(function() {
                $('#userloginmodal').modal('show');
            });
            $('#hotelloginbtn').click(function() {
                $('#hotelloginmodal').modal('show');
            });
            $('#adminloginbtn').click(function() {
                $('#adminloginmodal').modal('show');
            });
            $('#aabtn').click(function() {
                $('#assign').modal('show');
            });
            $('#hsbtn').click(function() {
                $('#hosign').modal('show');
            });
            $("#forgotpasswordbtn").on('hide.bs.modal', function (e) {
                $("#adminloginmodal").modal("toggle");
              });
            $('#forgotpasswordbtn').click(function()
            {
               
                $('#forgotemail').modal('show');
              //  for admin   
            });
            $("#hotelforgotpasswordbtn").on('hide.bs.modal', function (e) {
                $("#hotelloginmodal").modal("toggle");
              });
            $('#hotelforgotpasswordbtn').click(function()
            {
               
                $('#hotelforgotemail').modal('show');
              // for hotel   
            });
            $("#userforgotpasswordbtn").on('hide.bs.modal', function (e) {
                $("#userloginmodal").modal("toggle");
              });
            $('#userforgotpasswordbtn').click(function()
            {
               
                $('#forgotemail').modal('show');
              //  for user    
            })
            
        });
    </script>
</body>

</html>