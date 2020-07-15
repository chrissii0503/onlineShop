<?php
session_start();
?>


<?php
include('config.php'); //connection

$itemID="";
$itemName="";
$itemPrice="";
$itemImage="";
if (isset($_POST['btnSave']))//saving the information into the databse for a new item with a email, password that is hashed into MD5 and the user type
	{	
		$itemID = $_POST['item_id'];
		$itemName = $_POST['item_name'];
		$itemPrice = $_POST['item_price'];
		$itemImage = $_POST['item_image'];
	
	if ($db_found) 
		{
			$SQL = "INSERT INTO item(ID, Name, Price, Image) VALUES ('".$itemID."', '".$itemName."', '".$itemPrice."' , '".$itemImage."')";//the 3 variables
			$result = mysql_query($SQL);
			mysql_close($db_handle);//closing the mysql
			print "<br><font color = 'red'>New Item Added</font>";//output of a result of success
			$itemID =$_POST[''];
			$itemName =$_POST[''];
			$itemPrice =$_POST[''];
			$itemImage =$_POST[''];

		}
		else 
		{
			print "<font color = 'red'>Database NOT Found </font>";
			mysql_close($db_handle);
		}
	}
	if (isset($_POST['btnUpdate']))//able to update the item
	{
		$itemID = $_POST['txtID'];
		$itemPrice = $_POST['txtPrice'];
		$itemImage = $_POST['fileToUpload'];

		if ($db_found)
		{
			$SQL = "Update item set ItemPrice='".$itemPrice."' where ItemID = '".$itemID."'";//replace the old information and overwriting new information for an update
			
			$result = mysql_query($SQL);
			mysql_close($db_handle);
			print "<font color = 'red'>Item updated for ".$itemID."</font>";
			$itemID =$_POST[''];
			$itemPrice =$_POST[''];
		}
		else
		{
			print "<font color = 'red'>Database NOT Found</font>";
			mysql_close($db_handle);
		}
	}
	if (isset($_POST['btnDelete']))//deleteing this record from the database
	{
		$itemID = $_POST['txtID'];
		$itemName = $_POST['txtItem'];
		$itemPrice = $_POST['txtPrice'];
		$itemImage = $_POST['fileToUpload'];

	
		if ($db_found)
		{
			$SQL = "Delete from item where ItemID = '".$itemID."'";//where the username is equal to the user table record row
			$result = mysql_query($SQL);
			mysql_close($db_handle);
			print "<font color = 'red'>Database records deleted!</font>";
			$itemID =$_POST[''];
			$itemName =$_POST[''];
			$itemPrice = $_POST[''];
			$itemImage = $_POST[''];
		}
		else
		{
			print "<font color = 'red'>Database NOT Found </font>";
			mysql_close($db_handle);
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gadgets 4 U</title>
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
    <!-- navigation-->
    <header class="header mb-3">    
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index.php" class="navbar-brand home"><img src="img/logo-new.png" alt="Gadget logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Gadgets 4 U</span></a>         
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
			   <li class="nav-item"><a href="products.php" class="nav-link active">Shop</a></li>
			   <li class="nav-item dropdown menu-small"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">User<b class="caret"></b></a>
                <ul class="dropdown-menu minimenu">
			   <div class="col-md-6 col-lg-3">
                        <h5>User</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="customer-settings.php" class="nav-link">Customer Settings</a></li>
						  						  <li class="nav-item"><a href="history.php" class="nav-link">Customer History</a></li>
						  li class="nav-item"><a href="admin-login.php" class="nav-link">Admin</a></li>
                        </ul>
                      </div>
                    </div>      
          </div>
        </div>
      </nav>
    </header>
    <form action = "admin.php" method="post">
    <table align="center" class="auto-style1">
        <tr>
            <td class="auto-style2">Item ID:</td>
            <td class="auto-style5">
                <input name="txtID" type="text" value="<?php echo $itemID;?>" class="form-control"/></td>
            <td>&nbsp;</td>
        </tr>
		</br>
        <tr>
            <td class="auto-style2">Item Name:</td>
            <td class="auto-style5">
                <input name="txtItem" type="text" width="100px" value="<?php echo $itemName;?>" class="form-control"/></td>
            <td>&nbsp;</td>
        </tr>
		</br>
		<tr>
            <td class="auto-style2">Price:</td>
            <td class="auto-style5">
                <input name="txtPrice" type="text" width="100px" value="<?php echo $itemPrice;?>" class="form-control"/></td>
            <td>&nbsp;</td>
        </tr>
		<tr>
		<td><input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $itemImage;?>"></td>
        <td><input type="submit" button class="btn btn-primary" value="Upload Image" name="submit"></td>
		</tr>
        
    </table>
    <table align="center" class="auto-style2">
        <tr>
            <td><input type = "submit" button class="btn btn-primary" name = "btnSave" value = "Save" class="controlWidth"></td>
            <td><input type = "submit" button class="btn btn-primary" name = "btnUpdate" value = "Update" class="controlWidth"></td>
            <td><input type = "submit" button class="btn btn-primary" name = "btnDelete" value = "Delete" class="controlWidth"></td>
            <td>
        </tr>      
    </table>

</form>
	
	
    
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>