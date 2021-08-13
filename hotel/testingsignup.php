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
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
   <link rel="stylesheet" href="../css/stylecss.css"> 
	
    <link rel="stylesheet" href="../css/main.css">
	</script>
    <style>
		
.border-md {
    border-width: 2px;
}

.btn-facebook {
    background: #405D9D;
    border: none;
}

.btn-facebook:hover, .btn-facebook:focus {
    background: #314879;
}

.btn-twitter {
    background: #42AEEC;
    border: none;
}

.btn-twitter:hover, .btn-twitter:focus {
    background: #1799e4;
}

body {
    min-height: 100vh;
}

.form-control:not(select) {
    padding: 1.5rem 0.5rem;
}

select.form-control {
    height: 52px;
    padding-left: 0.5rem;
}

.form-control::placeholder {
    color: #ccc;
    font-weight: bold;
    font-size: 0.9rem;
}
.form-control:focus {
    box-shadow: none;
}

<!--	#userforgotpasswordbtn,#hotelforgotpasswordbtn{
		font-size:20px;
		background-color:none;
	}
	#userforgotpasswordbtn:hover, #hotelforgotpasswordbtn:hover{
		font-size:22px;
		color:black;
		background-color:none;
	}
	.dd{
		width:100%;
		font-size:24px;
		margin-top:20px;
	}
	
	.cd{
		width:350px;
		color:black;
		font-weigth:bold;
		font-size:18px;
		background-color:white;
	}
	
	.cols{
		margin-left:25%;
	}

	.im {
            width: 50%;
            height: 50%;
            border-radius: 40%;
        }
        
        .ind {
            background-color: rgba(255, 229, 190, 0.644);
            width: 100%;
            color: navy;
            border: 3px soild green;
        }
        
        .ins {
            width: 50%;
        }
        
     
		.is {
            background-image: url("../foods/man-eating-food-removebg-preview.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        b {
            color: rgb(14, 26, 97);
        }
        
        .is2 {
            background-image: url("../foods/adm-removebg-preview.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .is1 {
            background-image: url("../foods/sds-removebg-preview.png");
            background-size: 110%;
            background-repeat: no-repeat;
        }-->
		
</style>
</head>
<body>
<header>
<script>
$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
});
</script>
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


<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Create an Account</h1>
            <p class="font-italic text-muted mb-0">Create a minimal registeration page using Bootstrap 4 HTML form elements.</p>
            <p class="font-italic text-muted">Snippet By <a href="https://bootstrapious.com" class="text-muted">
                <u>Bootstrapious</u></a>
            </p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form method="post" name="hotelreg" onsubmit="return Validate();" action="hotelotp.php" enctype="multipart/form-data">
                <div class="row">

                    
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted" style="height:20px;"></i>
                            </span>
                        </div>
						<input id="ins" type="text" name="hname" placeholder="Hotel name" style="height:10px; width:50px;" class="form-control bg-white border-left-0 border-md" Required />
                        
                    </div>

                    <!-- Last Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
						 <input id=ins type="text" name="ownername" placeholder="Owner name" class="form-control bg-white border-left-0 border-md" Required /></div>
                 
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
						<input type="text" id="usernames" name="usernames" placeholder="Email ID" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control bg-white border-left-0 border-md" required />
                        <br/><span id = "Result" align = "center"></span>
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                        <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                            <option value="">+91</option>
                        
                        </select>
                        <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                    </div>.


                    <!-- Job -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                        </div>
                        <select id="job" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md">
                            <option value="">Choose your job</option>
                            <option value="">Designer</option>
                            <option value="">Developer</option>
                            <option value="">Manager</option>
                            <option value="">Accountant</option>
                        </select>
                    </div>

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <a href="#" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Create your account</span>
                        </a>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Social Login -->
                    <div class="form-group col-lg-12 mx-auto">
                        <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                            <i class="fa fa-facebook-f mr-2"></i>
                            <span class="font-weight-bold">Continue with Facebook</span>
                        </a>
                        <a href="#" class="btn btn-primary btn-block py-2 btn-twitter">
                            <i class="fa fa-twitter mr-2"></i>
                            <span class="font-weight-bold">Continue with Twitter</span>
                        </a>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Already Registered? <a href="#" class="text-primary ml-2">Login</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
