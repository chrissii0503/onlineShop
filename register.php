<?php  
session_start();
include("config.php");

if (isset($_POST['reg'])) {
  // receive all input values from the form
  $FName = $_POST['FirstName'];
  $LName = $_POST['LastName'];
  $Mail = $_POST['Email'];
  $Pass = $_POST['Password'];
  
  if (count($errors) == 0) {
  	$pass = md5($pass);//encrypt the password

if(mysql_connect)
{
	$SQL = "INSERT INTO tbl_user (FName, LName, Email, Password) 
	VALUES ('".$FName."', '".$LName."', '".$Email."' , '".$Pass."')";
	
	$result = mysql_query($SQL);
	mysql_close($conn);
	
}

mysqli_close($conn);
  	header('location: products.php');
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              
              <div id="reg-page" class="row">
                <div class="col-md-6 mx-auto">
                  <div class="box text-center py-5">
                    <p class="text-center"><img src="img/logo-new.png" alt="logo"></p>
                    <h3>Please Register Below</h3>
					<div class="modal-body">
                <form action="products.php" method="post">
				<legend>  
				<fieldset>  
                  <div class="form-group">
                    <input id="FName-modal" name="FirstName" type="text" placeholder="First Name" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="LName-modal" name="LastName" type="text" placeholder="Last Name" class="form-control">
                  </div>
				  <div class="form-group">
                    <input id="Email-modal" name="Email" type="text" placeholder="Email" class="form-control">
                  </div>
				  <div class="form-group">
                    <input id="Password-modal" name="Password" type="password" placeholder="Password" class="form-control">
                  </div>
                  <p class="text-center">
                    <button class="btn btn-primary" name="reg" <i class="fa fa-sign-in"></i> Register</button>
                  </p>
                </form>

              </div>
             
            </div>
          </div>
        </div>
		
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>