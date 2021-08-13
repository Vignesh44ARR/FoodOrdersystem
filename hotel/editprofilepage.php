<html>
<head>
<title> Hotel HomePage </title>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/stylecss.css">
    <style>
        .home
        {
            background-image: linear-gradient(rgba(255, 255, 255, 0.075), rgba(255, 255, 255, 0.137)), url(./foods/b1.jpg);

        }
        .mas {
            font-size: 2rem;
            color: brown;
        }
        
        .bac {
            background-color: bisque;
        }
        
        a {
            color: blue;
            font-size: 1rem;
        }
        
        #dj {
            color: rgb(77, 51, 119);
            font-size: 2.5rem;
        }
        
        h2 {
            color: black;
        }
        
        a:hover {
            background-color: white;
            color: green;
            font-size: 1.3rem;
        }
        
        h4 {
            font-style: italic;
            color: rgb(131, 85, 17);
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
                    <a class="nav-link act" href="userregistrationform.html">My Hotel</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="#">Add Food</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="#">Delete Food</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="#">Edit Food</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="#">order Details</a>
                </li>
            </ul>
        </nav>
    </header>
    <br><br>
        <hr>
        <ul class="nav nav-tabs" style="background-color: transparent;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#editprofile">Edit Profie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#complaints">Check Complaints</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Delete Profile</a>
            </li>
          </ul>
          <!--This is hotel homePage -->
          <div id="home">
              <h1 class="text-center">Taj Coromandel</h1>
              <h2 class="text-center"> Owner :<span id="dj"> Arjundas.T </span></h2>
                <h4 class="text-center"> Rain or Shine, its time to dine. Eat Drink and Love<br>Healthy and Hygienic</h4>
                <br><br><br>
                <div class="row text-center">
                    <div class="col-lg-1"> </div>
                    <div class="col-lg-10">
                        <div class="row text-center">
                            <div class="col-lg-3">
                                <h1 class="mas"><img src="../foods/varies.png" height="100px" width="100" alt=""> <span>394</span>
                                </h1>
                                <h4>Food items</h4>
                            </div>
                            <div class="col-lg-3 ">
                                <h1 class="mas"><img src="../foods/price.png" height="100px" width="100px" alt="">2394</h1>
                                <h4>Successful Orders</h4>
                            </div>
                            <div class="col-lg-3 ">
                                <h1 class="mas"><img src="../foods/wait.png" height="100px" width="100px" alt="">23</h1>
                                <h4>Pending Orders</h4>
                            </div>
                            <div class="col-lg-3 ">
                                <h1 class="mas"><img src="../foods/rat.png" height="100px" width="100px" alt="">4.2</h1>
                                <h4>Ratting</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"> </div>
          </div>
          <!--Edit Profile Page-->
          <div id="editprofile">
               <h1>Edit Profile</h1>
          </div>
          <!--Complaints Page-->
          <div id="complaints">
            <h1>Complaints</h1>
          </div>
          
        
        </body>
        </html>