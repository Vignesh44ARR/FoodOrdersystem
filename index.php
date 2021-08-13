<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 <link rel="stylesheet" href="css/stylecss.css"> 
<link rel="stylesheet" href="css/main.css"> 
<link rel = "icon" href =  "foods/brand.png" type = "image/x-icon">
   </script>
	
    <style>
        h2
        {
            color:red;
            background-color:#bfbebd;
             width: max-content;
             padding: 0 1rem;
        }

	#userforgotpasswordbtn,#hotelforgotpasswordbtn{
		font-size:20px;
		background-color:none;
	}
	#userforgotpasswordbtn:hover, #hotelforgotpasswordbtn:hover{
		font-size:22px;
		color:black;
		background-color:none;
	}
	button[type=submit],button[type=reset]{
		width:100%;
		font-size:24px;
		margin-top:20px;
	}
	input[type=text],input[type=password],input[type=email]{
		width:350px;
		color:black;
		font-weight:bold;
		font-size:18px;
		background-color:white;
		
	} 
		.h4{
            background-color: rgb(226, 194, 134);
		color: black; 
	}
	#ids{
		color:black;
		background-color:transparent;
	}
	
	.ps{
		background-color: rgb(226, 194, 134);
		color: black; 
        padding: 1rem;

	}

	
    </style>
	    <script type="text/javascript"> 
        $(document).ready(function() { 
            $('#username').keyup(function() { 
                $.post("check.php", { 
                    username: $('#username').val() 
                }, function(response) { 
                    $('#Result').fadeOut(); 
                    setTimeout("finishAjax('Result', '" + escape(response) + "')", 400); 
                }); 
                return false; 
            }); 
        }); 
 
        function finishAjax(id, response) { 
            $('#Result').hide(); 
            $('#' + id).html(unescape(response)); 
            $('#' + id).fadeIn(); 
        } 
    </script>
</head>
<body>

    <header>
        <!-- Nav Bar-->
        <nav class="navbar navbar-expand-sm fixed-top  nav">
            <!-- Brand -->
            <img id="brand" src="./foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link act" href="index.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="droplogin" data-toggle="dropdown">
					<i class="fa fa-fw fa-user"></i>
                Login
            </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="userloginbtn" href="#userlogin" style="width:150px;">User</a>
                        <a class="dropdown-item" id="hotelloginbtn" href="#hotelloginmodal" style="width:150px;">Hotel</a>
                        <a class="dropdown-item" id="adminloginbtn" href="#adminloginmodal" style="width:150px;">Admin</a>
                    </div>
                </li>
                <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropregister" data-toggle="dropdown">
					<i class="fa fa-fw fa-user-plus"></i>
                Sign-up
            </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="hsbtn" href="hotel/hotelsignup.php" style="width:150px;">Hotel</a>
                        <a class="dropdown-item " id="aabtn" href="signup.php" style="width:150px;">User</a>
                    </div>
                </li>
				<li class="navbar-item">
                    <a class="nav-link" href="complaint.php"><i class="fa fa-fw fa-envelope"></i>Complaint</a>
                </li>
				 <li class="navbar-item">
                    <a  class="nav-link " href="about.php"><i class="fa fa-fw fa-info"></i>About us</a>
                </li>

            </ul>
        </nav>
    </header>
	<br/>
	<br/>
	<br/>
	
	
	<section>

	<?php
require("database/dbfood.php");
if(isset($_GET["mes"]))
{
$mes = $_GET['mes'];
?>



<?php
}
if(isset($_GET["id"])){
$email= strtolower($_GET['id']);
$sqler="DELETE from fuotp WHERE email='$email'"; 
$con->query($sqler); 
}
?>
	<center><h2><?php if(isset($_GET["mes"])){ echo $mes;}?></h2><center>

  

    <!--  popular Food -->
    <div class="container">
        <div class="row text-center">
            <legend>
                <h3 id="ids ">Popular Foods</h3>

            </legend>
            <div class="col-lg-3 col-sm-12 text-center">
                <div class="h4">Biriyani</div>
                <img class="img-thumbnail img-responsive im" src="./foods/images-26.jpg " alt="images-26.jpg">
                <p class="ps">Biriyani, Ain't no love like the love of a biryani. If ever you need to brave winter cold, try eating really spicy food and then see if the cold can stop you.</p>
            </div>

            <div class="col-lg-3  col-sm-12 text-center ">
                <div class="h4 ">Burger</div> <img class="img-responsive img-thumbnail im " src="./foods/ms2.jpg" alt=" ">
                <p class="ps">Hamburger (also burger for short) is a Western hot sandwich consisting of meat, usually beef, placed inside a sliced bread roll or bun. </p>
            </div>
            <div class="col-lg-3  col-sm-12 text-center ">
                <div class="h4 ">Tomoto Dosa</div> <img class="img-responsive img-thumbnail im " src="./foods/images-12.jpg " alt=" ">
                <p class="ps"> Tomato Dosa is a unique South Indian Dosa recipe. Here the batter used to make the Dosa is mixed with tomato puree and urad dal.</p>
            </div>
            <div class="col-lg-3  col-sm-12 text-center ">
                <div class="h4 ">Masala vada</div> <img class="img-responsive img-thumbnail im " src="./foods/ms1.jpg " alt=" ">
                <p class="ps">Masala Vada, a crispy and savory deep fried fritter made from chana dal and spices, is a popular street food of South Indian cuisine.</p>
            </div>
        </div>

        <br><br>
        <hr><br>

        <!-- Discription-->

        <div class="row ">
            <div class="col-lg-4 sd  col-sm-12 ">
                <p class="pp">Food Delivery, a place where you can order your favorite restaurant dishes, drinks, and desserts at affordable price. We are glad to offer you the best food in the area to everyone.</p>
                <p class="pp">Our site is easy to place your food Restaurant dishes in our site, A multiple Restaurant site safe and hygienic foods Best deal and offiers are avilible</p>
                <p class="pp">Our menu you cabrn find lots of tasty and interesting dishes, including pizzas of all kinds. We also offer a wide range of seafood dishes, even if you are just looking for an affordable snack. </p>
                <p class="pp">Delivery king, Chennai's favourite delivery app gets you Food, Grocery, Medicine, Pet Supplies, Fruits & Vegetables, Meat & Fish, Health & Wellness, Gifts and Send Packages from one end of the city to the other.</p>
            </div>
            <div class="col-lg-8 sd  col-sm-12 ">
                <img height=85% width=100% src="./foods/s1.jpeg" alt="">
            </div>
        </div>

        <!-- International chief -->

        <hr>
        <div class="row text-center">

            <legend>
                <h3>International Chief</h3>
            </legend>
            <div class="row">
                <div class="col-5"></div>
            </div>

            <div class="col-lg-3 text-center">
                <div class="h4">Indian</div>
                <img class="img-thumbnail img-responsive im" id="ir" src="./foods/chief//cook-baker-logo-.jpg" alt=" ">
                <p class="ps">Ain't no love like the love of a biryani. If ever you need to brave winter cold, try eating really spicy food and then see if the cold can stop you.</p>
            </div>

            <div class="col-lg-3 text-center ">
                <div class="h4 ">Italian</div> <img class="img-responsive img-thumbnail im " id="ir" src="./foods/chief/cook-clipart-cheif-1.jpg " alt=" ">
                <p class="ps">A hamburger (also burger for short) is a Western hot sandwich consisting of meat, usually beef, placed inside a sliced bread roll or bun. </p>
            </div>
            <div class="col-lg-3 text-center ">
                <div class="h4 ">Chinese</div> <img class="img-responsive img-thumbnail im " id="ir" src="./foods/chief/cute-baker.jpg " alt=" ">
                <p class="ps"> Tomato Dosa is a unique South Indian Dosa recipe and Here is the batter used to make the Dosa is mixed with tomato puree and urad dal.</p>
            </div>
            <div class="col-lg-3 text-center ">
                <div class="h4 ">Chettinad</div> <img class="img-responsive img-thumbnail im " id="ir" src="./foods/chief/cc.jpg " alt=" ">
                <p class="ps">'Idiyappam', 'Paal Payasam', 'Chicken Chettinad', 'Palkatti Chettinadu', 'Paniyaram', 'Urlai Roast', 'Vellai Paniyaram', 'Kozhakattai', </p>
            </div>
        </div>
        <br><br><br><br>
    </div>
    <!-- Footer -->
    <footer>
        <div id="fot">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <br>

                    <a href=""><img src="./bootstrap/icons/social_media_web_network_logo-07-128.png" alt=""></a>
                    <a href=""><img src="./bootstrap/icons/social_media_web_network_logo-10-128.png" alt=""></a>
                    <a href=""><img src="./bootstrap/icons/yy.png" alt=""></a>
                    <a href=""><img src="./bootstrap/icons/twi.png" alt=""></a>
                    <a href=""><img src="./bootstrap/icons/gm.png" alt=""></a>
                    <a href=""><img src="./bootstrap/icons/social_media_web_network_logo-19-128.png" alt=""></a>
                    <a href=""><img src="./bootstrap/icons/social_media_web_online-09-128.png" alt=""></a>
                </div>
                <div class="col-lg-5">
                    <h6></h6>
                    <address class="text-lg-end">
                                No:55,Gandhi Street, <br>
                                Annanagar, Chennai , <br>
                                Tamilnadu, PinCode:695 343. <br>  
                        </address>
                </div>

            </div>

        </div>
    </footer>

    <!-- Cards -->
    <!-- User Login Form -->

    <div id="userloginmodal" class="modal fade " role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md"  role="contentinfo" >
		
            <div  class="modal-content modaltitle" style="height:500px; width:500px;">
                <div class="modal-header" >
				                   <h1 class="h1" style="text-align:center; width:500px;"><i class="fa fa-fw fa-user"></i>User Login</h1>
                    <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
				
				
                <div class="modal-body" >
				
                    <div class="card" id="userlogincard" style="background-color:rgb(255, 255, 255,0); width:100%"> <!-- form -->
					
                        <div class="row " >
                            <div class="col-sm-10 " >
                                <div class="card-body " style="margin-left:65px" >
								
                                    <form id="userloginform " action="otp/loginvalidate.php" method="post" class="main-form needs-validation">
                                        <div class="form-group row ">
                                            <input type="email" class=" ins form-control " name="email" placeholder="abc@email.com" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                                            
                                        </div>
                                        <br>
                                        <div class="form-group row ">
                                            <input type="password" class=" ins form-control " name="password" placeholder="password" required/>
                                        </div>
                                      

                                        <div class="form-group row ">
                                            <div class="offset sm-4 ">
                                                <button type="submit" class="btn btn-primary btn-success ">Login</button><br/>
                                                <button type="reset"  class="btn btn-secondary btn-danger ">Clear</button><br/> <br/>
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
             <div  class="modal-content modaltitle" style="height:500px; width:500px;">
                <div class="modal-header" >
                     <h1 class="h1"style="text-align:center;  width:500px;"><i class="fa fa-fw fa-user"></i>Hotel Login</h1>
                    <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
				
                    <div class="card" id="userlogincard" style="background-color:rgb(255, 255, 255,0); width:100%"> <!-- form -->
					
                        <div class="row " >
                            <div class="col-sm-10 " >
                                <div class="card-body " style="margin-left:65px" >
                                    <form id="hotelloginform " action="hotel/loginvalidate.php" method="POST" class="main-form needs-validation ">
                                        <div class="form-group row ">
                                            <input type="email" class=" ins form-control " name="email" placeholder="abc@email.com " required >
                                            
                                        </div>
                                        <br>
                                        <div class="form-group row ">
                                            <input type="password" class=" ins form-control " name="password" placeholder="password " required>
                                           
                                        </div>
                                        <br>

                                        <div class="form-group row ">
                                            <div class="offset sm-4 ">
                                                <button type="submit" class="btn btn-primary btn-success ">Login</button><br/>
                                                <button type="reset"  class="btn btn-secondary btn-danger ">Clear</button><br/> <br/>
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
              <div  class="modal-content modaltitle" style="height:500px; width:500px;">
                <div class="modal-header" >
                     <h1 class="h1"style="text-align:center;  width:500px;"><i class="fa fa-fw fa-user"></i>Admin Login</h1>
                    <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                     <div class="card" id="userlogincard" style="background-color:rgb(255, 255, 255,0); width:100%"> <!-- form -->
					
                        <div class="row " >
                            <div class="col-sm-10 " >
                                <div class="card-body " style="margin-left:65px" >
                                    <form id="adminloginform" action="admin/adminlogin.php" method ="POST" class="main-form needs-validation " >
                                        <div class="form-group row ">
                                            <input type="text" class=" ins form-control " name="email" placeholder="abc@email.com " required autofocus>
                                            
                                        </div>
                                        <br>
                                        <div class="form-group row ">
                                            <input type="password" class=" ins form-control " name="adminpassword" placeholder="password " required>
                                           
                                        </div>
                                        <br>

                                        <div class="form-group row ">
                                            <div class="offset sm-4 ">
                                               <button type="submit" class="btn btn-primary btn-success ">Login</button><br/>
                                                <button type="reset"  class="btn btn-secondary btn-danger ">Clear</button><br/> <br/>
                                                
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
                <div class="modal-header" style="border: none;"  >
                    <h1 class="h1" style="color:White"><i class="fa fa-fw fa fa-key" ></i>Enter email address</h1>
                    <br>
              <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body " style="border: none;" >
                    <div class="card " id="userlogincard " style=" border:1px; background-color :#fee9d9 ">
                        <div class="row ">
                            <div class="col-sm-12 col-lg-12 ">
                                <div class="card-body  ">
                                    <form name="forgot" action="otp/forgotpassword.php" method="post" class="main-form needs-validation">
                                        <div class="form-group row ">
                                        <input style="width:100%;" type="email" id="username" class="ins form-control" name="email" placeholder="abc@email.com " required />
										<span id = "Result" align = "center"></span><br/>
				
                                            <input type="submit" class="btn btn-primary btn-success" value="Send otp">

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
           <div class="modal-header" style="border: none;"  >
                    <h1 class="h1" style="color:white"><i class="fa fa-fw fa fa-key" ></i>Enter email address</h1>
                    <br>
              <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body " style="border: none;" >
                    <div class="card " id="userlogincard " style=" border:1px; background-color : #fee9d9 ">
                        <div class="row ">
                            <div class="col-sm-12 col-lg-12 ">
                                <div class="card-body  ">
                                    <form name="forgot" action="hotel/forgotpassword.php" method="post" class="main-form needs-validation">
                                        <div class="form-group row ">
                                        <input type="email" id="hotelname" class="ins form-control" name="email" placeholder="abc@email.com " required />
										<span id = "res" align = "center"></span><br/>
                                            <input style="width:100%" type="submit" class="btn btn-primary btn-success" value="Send otp">
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
    $('.carousel').carousel({
  interval: 5000
})
		$(document).ready(function() {
			$('#username').keyup(function(){
		      $.post("otp/check.php", {
		        username: $('#username').val()
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

<!--2-->
<script type="text/javascript">
		$(document).ready(function() {
			$('#hotelname').keyup(function(){
		      $.post("hotel/hotelcheck.php", {
		        hotelname: $('#hotelname').val()
		      }, function(response){
		        $('#res').fadeOut();
		        setTimeout("finishAjax('res', '"+escape(response)+"')", 400);
		      });
		    	return false;
			});
		});
		function finishAjax(id, response) {
		  $('#res').hide();
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
	</section>
</body>

</html>
