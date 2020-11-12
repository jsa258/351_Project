<?php
ob_start();
session_start();
require 'connection.php';
?>
<html>
<head>
    <link rel="stylesheet" href="css/check_out.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
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

  <!--beginning of checkout form-->
  <div class="container">
    <div class="column1">
      <div class="billing_info">
        <h2>CHECKOUT</h2>
        <p>Billing Details</p>
      </div>
      <p><span class="error">* required field</span></p>
      <form class="form-group" method="POST">
          <div class="row-1">
           <label for="fullname">Full Name <span class="error">*</span></label>
           <input type="name" class="form-control" name="fullname" placeholder="Full Name">
          </div>
          <div class="row-1">
           <label for="Email">Email</label>
           <input type="email" class="email" name="email" placeholder="email">
          </div>
          <div class="row-1">
           <label for="pnumber">Phone Number</label>
           <input type="pnumber" class="pnumber" name="pnumber" placeholder="phone number">
          </div>
          <div class="row-1">
           <label for="address">Address <span class="error">*</span></label>
           <input type="Address" class="form-control" name="address" placeholder="1032 Oak Street">
          </div>
          <div class="row-1">
           <label for="city">City/state <span class="error">*</span></label>
           <input type="city" class="form-control" name="city" placeholder="City or State">
          </div>
          <div class="row-1">
           <label for="country">Country <span class="error">*</span></label>
           <input type="text" class="form-control" name="country" placeholder="country">
          </div>
          <div class="row-1">
           <label for="province">Province <span class="error">*</span></label>
          <input type="province" class="form-control" name="province" placeholder="Province">
          </div>
          <div class="row-1">
           <label for="postalcode">Postal Code <span class="error">*</span></label>
           <input type="postalcode" class="form-control" name="postalcode" placeholder="Postal Code">
          </div>

  <!--beginning of payment information-->
      <div class="payment_info">
        <h4> Payment </h4>
        <label for="name">Accepted Payment </label><br>
        <i class="fab fa-apple-pay"></i>
        <i class="fab fa-cc-visa"></i>

      <div class="form-group">
        <div class="row-1">
          <label for="cname">Name on Card</label>
          <input type="text" class="form-control" name="cname" placeholder="John Smith">
        </div>
        <div class="row-1">
          <label for="Cardnumber">Card Number</label>
          <input type="text" class="form-control" name="cnumber" placeholder="1234-2345-3456-4567">
        </div>
        <div class="card-info">
          <div class="row-1">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="October">
          </div>
          <div class="row-1">
            <label for="expyear">Exp Year</label>
            <input type="text" id="expyear" name="expyear" placeholder="2030">
          </div>
          <div class="row-1">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="242">
          </div>
         </div>
        </div>
       </div>
      </div>

  <!--beginning of order summary-->
    <div class="order-summary">
      <p class="summary">Order Summary <a href="cart.php">Edit Order</a></a> </p>
      <table class="product-table" width="95%"; margin="0" >
        <tr>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>SubTotal</th>
        </tr>
        <?php
        if(!empty($_SESSION["my_cart"]))
        {
          $total = 0;
          foreach($_SESSION["my_cart"] as $keys => $values)
          {
        ?>
        <tr>
          <td class="item-details"><?php echo $values["item_name"]; ?></td>
          <td class="item-details"><?php echo $values["item_quantity"]; ?></td>
          <td class="item-details">$ <?php echo $values["item_price"]; ?></td>
          <td class="item-details">$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
        </tr>
        <?php $total = $total + ($values["item_quantity"] * $values["item_price"]); }?>
        <tr>
        <td><p class="total-price" name="tprice">Total Price:      $<?php echo number_format($total, 2); ?></p></td>
      </tr>
    <?php
    }
    ?>
    </table>
      <div class="options">
        <input type="submit" name="submit" value="Check Out" class="buy-btn2">
      </div>
  </div>
</form>
</div>
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
        <li><a href="product_page.php">Products</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    Copyright &copy;
  </div>
</div>
</body>
</html>

<?php
if(!isset($_POST['submit'])) exit();
//when user submit form, check if required fields are filled
  $require = array('fullname','address','city','country','province','postalcode');
  $filled= TRUE;
  foreach($require as $field) {
   if(!isset($_POST[$field]) || empty($_POST[$field])) {
      $filled = FALSE;
   }
}
  if($filled) {
    //if fields are filled, check if true and insert user and order info into database
    $fullname = $_POST['fullname'];
    $ordertime = date("Y-m-d H:i:s");
    $ordernum = rand(10000,11000);
    $address = $_POST['address'].$_POST['city'].$_POST['province'].$_POST['country'].$_POST['postalcode'];
    $itemname = $values["item_name"];
    $itemquantity = $values["item_quantity"];
    $totalprice = number_format($total, 2);

    $insert_sql = "INSERT into orders (full_name,order_time,order_num, address,item_name,item_qty,total_price) VALUES ('$fullname','$ordertime','$ordernum','$address','$itemname','$itemquantity','$totalprice')";

//if data successfully entered, direct to confirmation page
    if ($connection->query($insert_sql) === TRUE) {
      echo "New record created successfully";
      header("Location:confirmation.php");
      $_SESSION['fullname'] = $_POST['fullname'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['address'] = $_POST['address'];
      $_SESSION['country'] = $_POST['country'];
      $_SESSION['city'] = $_POST['city'];
      $_SESSION['province'] = $_POST['province'];
      $_SESSION['postalcode'] = $_POST['postalcode'];
      $_SESSION['pnumber'] = $_POST['pnumber'];

    } else {
      //if data not successfully entered, display error
      echo "Error: " . $insert_sql . "<br>" . $connection->error;
    }
//close connection
    $connection->close();

    exit();
}
  else {
    //display alert if user did not fill out all required fields
    echo '<div class="alert">please fill out required information</div>';
    die();
}
