<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="stylecss.css">
</head>
<style>
    body {
        background-image: linear-gradient(rgba(255, 255, 255, 0.075), rgba(255, 255, 255, 0.137)), url(/foods/b1.jpg);
    }
</style>

<body>
    <!-- Nav Bar-->
    <header>
        <!-- Nav Bar-->
        <nav class="navbar navbar-expand-sm fixed-top  nav  ">
            <!-- Brand -->
            <img src="./foods/brand.png" alt="" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link " href="userregistrationform.html">Home</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="#">About US</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link" href="#">Complaint</a>
                </li>


            </ul>
        </nav>
    </header>

    <div class="container ">
        <div class="row ">

            <div class="col-lg-6 ">
                <br><br><br>

                <br>
                <center> <img width=90% height="100% " src="/foods/forge.jpeg" alt=" "></center>

            </div>
            <div class="col-lg-1 "></div>
            <div class="col-lg-4 ">
                <form action=" ">
                    <br><br><br><br>
                    <br><br><br>

                    <center>
                        <h1 class=" ">Enter OTP</h1>
                        <br>
                        <div>
                            <input class="text-center " id=ins type=" password " required placeholder="OTP" /><br><br>

                            <button class="btn-success ">submit</button>
                            <br><br>
                        </div>
                    </center>

                </form>
            </div>
        </div>
    </div>


</body>

</html>