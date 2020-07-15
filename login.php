<?php  function controlLogin($email,$pass)
{
include('config.php');

$success = "false";
		
		if ($db_found)
		{
			$SQL = "SELECT * FROM tbl_user";
			//opening the user table to check the connection 
			$result = mysql_query($SQL);
			while ($db_field = mysql_fetch_assoc($result))
			{
		
				$email =  $db_field['mail'];
				$pass = $db_field['password'];
				
				$password = md5($pass);
			}
			mysql_close($db_handle);//closing the database
		}
		return $success;// and return the return of the message
}?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
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
              
              <div id="login-page" class="row">
                <div class="col-md-6 mx-auto">
                  <div class="box text-center py-5">
                    <p class="text-center"><img src="img/logo-new.png" alt="logo"></p>
                    <h3>Please Login Below</h3>
					<div class="modal-body">
                <form action="products.php" method="post">
				
			<?php 

	$msg = "";
	$valid = "false";
	include("config.php"); //connection to the php conenction page of the database
	if (isset($_POST['btnValidate'])) //validating the user login
	{
		$email = $_POST['txtUser'];
		$pass = $_POST['txtPass'];
		$valid = controlLogin($email, $pass);//sending the variables of the user input an password to check if the match the database
		
		if ($valid == "true")//if it is true the admin here will go to the main page
		{
			$email = $_POST['txtUser'];
			$_SESSION["one"] = $user;
			header("Location: products.php");
			exit();
		}

		else
		{
			$msg = "Invalid username or password!";

		}
	}
?>
	
<!-- creating the style and the layout form with text and button and input -->
                  <div class="form-group">
                    <input type="email" name="txtUser" placeholder="Email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <input type="password"input name="txtPass" placeholder="Password" class="form-control" required>
                  </div>
                  <p class="text-center">
                    <button class="btn btn-primary" name ="btnValidate"><i class="fa fa-sign-in"></i> Log in</button>
                  </p>
                </form>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
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