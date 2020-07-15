<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "task1");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "ID");
		if(!in_array($_GET["ID"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'ID'			=>	$_GET["hidden_id"],
				'Name'			=>	$_POST["hidden_name"],
				'Price'		    =>	$_POST["hidden_price"],
				'Quantity'		=>	$_POST["hidden_quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'ID'			=>	$_GET["hidden_id"],
			'Name'			=>	$_POST["hidden_name"],
			'Price'		    =>	$_POST["hidden_price"],
			'Quantity'		=>	$_POST["hidden_quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["ID"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				//echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="products.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>eShop</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
        <div class="container"><a href="index.php" class="navbar-brand home"><img src="img/logo-new.png" alt="logo"></a>		
		</div>

	</br>
		<br />
		<div class="container">
			<br /><br />
			<?php
				$query = "SELECT * FROM item ORDER BY ID ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="products.php?action=add&hidden_id=<?php echo $row["ID"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="images/<?php echo $row["Image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["Name"]; ?></h4>

						<h4 class="text-danger">R <?php echo $row["Price"]; ?></h4>

						<input type="text" name="hidden_quantity" value="" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" class="form-control" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["Name"]; ?></td>
						<td><?php echo $values["Quantity"]; ?></td>
						<td>R <?php echo $values["Price"]; ?></td>
						<td>R <?php echo number_format($values["Quantity"] * $values["Price"], 2);?></td>
						<td><a href="products.php?action=delete&id=<?php echo $values["ID"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["Quantity"] * $values["Price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">R <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>					
				</table>
			</div>
			<p class="text-center">
			<form method="post" action="order-confirm.php" />
                   <input type="submit" name="check-out" style="margin-top:5px;" class="btn btn-success" value="Checkout" />
				   
                  </p>
		</div>
	</div>
	<br />
	</body>
</html>