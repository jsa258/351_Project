<?php
session_start();
require 'connection.php';

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name' =>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '"Item Already Added"';
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
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '"Item Removed"';
			}
		}
	}
}

?>
<html>
<body>
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
					// print_r($values);
			?>
			<tr>
				<td><?php echo $values["item_name"]; ?></td>
				<td><?php echo $values["item_quantity"]; ?></td>
				<td>$ <?php echo $values["item_price"]; ?></td>
				<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
				<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
			</tr>
			<?php
					$total = $total + ($values["item_quantity"] * $values["item_price"]);
				}
			?>
			<tr>
				<td colspan="3" align="right">Total</td>
				<td align="right">$ <?php echo number_format($total, 2); ?></td>
				<td></td>
			</tr>
			<?php
			}
			?>
      <p><a href="product_page.php">Back to Home Page</a></p>
		</table>
	</div>
</div>
</div>
<br />

</body>
<html>
