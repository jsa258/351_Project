	<?php
	session_start();
	require 'connection.php'; //connect to database

	//when 'add to cart' button is submitted
	if(isset($_POST["add_cart"]))
	{
		if(isset($_SESSION["my_cart"]))
		{
			//returns an array which fetch the values of the product chosen, identified by a product id.
			$product_array_id = array_column($_SESSION["my_cart"], "item_id");
			//check if item is already in cart, if not get name,qty,and price of the product
			if(!in_array($_GET["id"], $product_array_id))
			{
				$count = count($_SESSION["my_cart"]);
				$item_array = array(
					'item_id'			=>	$_GET["id"],
					'item_name' =>	$_POST["hidden_name"],
					'item_price'		=>	$_POST["hidden_price"],
					'item_quantity'		=>	$_POST["quantity"]
				);

				$_SESSION["my_cart"][$count] = $item_array;
			}
			else
			{
				echo '<div class="alerts">Item already added to your cart</div>';
			}
		}
		else
		{
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'	=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["my_cart"][0] = $item_array;
		}

	}
	//when 'remove' is clicked, unset the session
	if(isset($_GET["action"]))
	{
		if($_GET["action"] == "delete")
		{
			foreach($_SESSION["my_cart"] as $keys => $values)
			{
				if($values["item_id"] == $_GET["id"])
				{
					unset($_SESSION["my_cart"][$keys]);
					echo '<div class="alerts">'."&nbsp;".$values["item_name"].' Removed from cart</div>';
				}
			}
		}
	}

	?>
	<html>
	<link rel="stylesheet" href="css/cart.css">
	<link rel="stylesheet" href="css/home.css">
	<link rel="stylesheet" href="css/main.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<body>

	<!-- NAVIGATION STARTS -->
		<nav>
			<div class="logo">
				<a href="index.php">
					<header>XGAMES</header>
				</a>
			</div>
			<ul class="nav-links">
				<li><a href="index.php">Home</a></li>
				<li><a href="product_page.php">Products</a></li>
				<?php
					$file = 'user.txt';
					if($handle = fopen($file, 'r')) { // read this Hello World! from filetest.txt
						 // fill in your own code. Hint! each character is 1 byte
							$content = fread($handle,12);
							fclose($handle);
					}
					if(trim(file_get_contents('user.txt')) == false){

					 echo "<li><a href=\"login.php\">Login</a></li>";
					}else{
						echo "Welcome  $content";
						echo "<li><a href=\"logout.php\">Logout</a></li>";
					}

				?>
			 <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
			</ul>
		</nav>
		<!-- NAVIGATION ENDS -->

		<h1>My Cart</h1>
		<div class="return"><a href="product_page.php">Continue Shopping</a></a></div>
		  <!-- Display product information in table -->
		<div class="table">
			<table class="item-table">
				<tr>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
					<th>Action</th>
				</tr>
				<?php
			// if cart is empty, price is zero
				if(!empty($_SESSION["my_cart"]))
				{
					$total = 0;
					foreach($_SESSION["my_cart"] as $keys => $values)
					{
						// print_r($values);
				?>
				<tr>
					<td><?php echo $values["item_name"]; ?></td>
					<td><input type="number" name="quantity" min="1" max="50" value="<?php echo $values["item_quantity"]; ?>"></td>
					<td>$ <?php echo $values["item_price"]; ?></td>
					<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
					<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
				</tr>
				<?php
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
				?>
				<tr>
					<td class="total" colspan="5" tr style="text-align:right">
						 <!-- Display price with two decimal places -->
						<p>Total: &nbsp; &nbsp; $ <?php echo number_format($total, 2); ?></p><br><br>
						<div class="checkout-btn"><a href="checkout.php" >Proceed to Check Out</a></div>
						<!-- allow users to checkout or go back to product listing to add items-->
				</td>
				</tr>
				<?php
				}
				?>
			</table>
	</div>
	</div>
	<br />

	<!--begin footer-->
  <div class="footer">
    <div class="inner-footer">

      <div class="footer-items">
        <h2> XGAMES </h2>
        <p> Sells The Trendiest Video Games</p>
      </div>
      <div class="footer-items">
        <div class="contact">
          <h3> Contact Us </h3>
          <span><i class="fas fa-envelope"></i>xgames@gmail.com</span>
          <i class="fas fa-phone"></i>604-123-1244
        </div>
      </div>

      <div class="footer-items">
        <div class="social">
          <h3> Social Media </h3>
          <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
          <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
          <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
        </div>
      </div>

      <div class="footer-items">
        <h3> Quick Links </h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      Copyright &copy;
    </div>
  </div>

	</body>
	<html>
