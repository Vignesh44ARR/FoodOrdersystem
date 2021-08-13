<!DOCTYPE html>
<?php
session_start();
require("../database/dbfood.php"); 
if(isset($_SESSION["useremail"])){
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codies-Admin</title>
	<link rel="stylesheet" href=  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/stylecss.css">
	 <link rel="stylesheet" href="../css/main.css">
    <script src="../js/inactivity.js"></script>
	
   
<style>
       span {
            color: red;
        }
        
        .h4 {
            color: brown;
        }
        
        p {
            color: rgb(5, 61, 9);
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .chec {
            margin-left: 2.9rem;
        }
        
        input {
            margin-bottom: 1.4rem;
        }
        
 
        
        .lef {
            margin: 10px;
        }
        
        .seac {
            font-size: 1.7rem;
        }
        
        .lab {
            font-size: 1.8rem;
            color: navy;
            font-weight: bold;
        }
        
        .row {
            border: none;
        }
        
        .rig {
            border-right: 2px solid rgb(0, 0, 0);
            height: 65%;
        }
        
        label {
            font-size: 1.1rem;
            font-weight: bold;
            text-align: right;
            padding-left: 6px;
        }
        
        .ah {
            color: white;
            background-color: rgb(63, 72, 150);
            text-decoration: none;
            padding: 5px;
        }
        nav a
        {
            color: #000000;
        }
		
        #abc{
			height:40px;
			width:100px;
		}
        #hotelist :hover
        {
            font-size : 36px;
        }
		input,
textarea {
  border: 1px solid #eeeeee;
  box-sizing: border-box;
  margin: 0;
  outline: none;
  padding: 10px;
}

input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
}

.input-group input[type='button'] {
  background-color: #eeeeee;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
}

.input-group .button-minus,
.input-group .button-plus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 38px;
  position: relative;
}

.input-group .quantity-field {
  position: relative;
  height: 38px;
  left: -6px;
  text-align: center;
  width: 62px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}

.button-plus {
  left: -13px;
}

input[type="number"] {
  -moz-appearance: textfield;
  -webkit-appearance: none;
}

    </style>
</head>
<body>
<header>
<!-- Nav Bar-->
<nav class="navbar navbar-expand-sm fixed-top  nav  ">
            <!-- Brand -->
            <img src="../foods/brand.png" alt="brand.png" width="155px" height="40px">
            <!--Links-->
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link act" href="userhome.php"><i class="fa fa-fw fa-home"></i>Home</a>
                </li>	
                <li class="navbar-item">
                    <a class="nav-link " href="userprofile.php"><i class="fa fa-fw fa-user"></i>View Profile</a>
                </li>
               <!-- <li class="navbar-item">
                    <a class="nav-link" href="#">Complaint</a>
                </li> -->
				<li class="navbar-item">
                    <a class="nav-link" href="../bookingpage/logoff.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </nav>
</header>
	
    <section> 
	
        <br><br><br><br> 
<Center> <h1 style=" color:white;background-color:black; width:47%;">Food Details</h1></center>		
		<center>
                <div class="col-lg-5 col-sm-12" style="width:65%">
                <?php    
        

        $id=$_GET['id'];
$sql = "Select * from food where foodid = '$id'";
$result = $con->query($sql);
$sno=0;
while($row = $result ->fetch_assoc())
    {
        $foodname=$row['foodname'];
        $cost=$row['cost'];
        $type = $row['foodtype'];
        $cuisines=$row['cuisines'];
        $available=$row['available'];
        $description= $row['fooddesc'];
        $keyword=$row['keyword'];
        $fname=$row['foodimage'];
    }
    ?>
	<table style="background-color:white; border:1px solid;">
                <td><img id="image" src="../hotel/foodimage/<?php echo $fname ?>"  alt="<?php echo $fname ?>" style="width:400px;height:600px" >
             </td> 
		
        
                   <td> <Table  style="font-size:30px;"><form action="" method="POST">
						
					
                        <tr><td ><h6>Food Name :</td><td> <span class="ans" style="text-transform:Capitalize;"> <?php echo $foodname ?></span>  </h6></td></tr>
                        <tr><td><h6>Cost  : </td><td> <span class="ans"><?php echo $cost ?></span>  </h6></td></tr>
                        <tr><td><h6>Type:</td><td>  <span class="ans"><?php echo $type ?></span>  </h6></td></tr>
                        <tr><td><h6>Cuisines : </td><td> <span class="ans"><?php echo $cuisines ?></span>  </h6></td></tr>
                        <tr><td><h6>Available : </td><td> <span class="ans"><?php echo $available ?></span>  </h6></td></tr>
                        <tr><td><h6>Description : </td><td> <span class="ans"><?php echo $description ?></span>  </h6></td></tr>
                        <Tr><td><h6>Item quantity</h6></td><td><div class="input-group">
  <input type="button" value="-" class="button-minus" data-field="quantity" style="color:red; font-size:30px;">
  <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field" style="color:blue; font-size:30px;">
  <input type="button" value="+" class="button-plus" data-field="quantity" style="color:green; font-size:30px;">
  
</div></td></tr>
 <tr><td><h6>customization : </td><td><br/><p> <Textarea rows='5' style="border:2px solid" >Enter customization</textarea></p> </h6></td></tr> 
 
<script>function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal<10) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(10);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 1) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(1);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});
</script>

                    </form></table>
					</td></tr></table>
                </div>
            
    </section>
</body>
</html>

<?php

}else{
	header("refresh:0; url=../index.php?mes=Login to proceed");
}

?>