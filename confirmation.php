<?php
session_start();
require 'connection.php';
$fullname = $_SESSION['fullname'];
$lastname = $_SESSION['email'];
$address = $_SESSION['address'];
$city = $_SESSION['city'];
$country = $_SESSION['country'];
$province = $_SESSION['province'];
$postalcode = $_SESSION['postalcode'];
$email = $_SESSION['email'];
$pnumber = $_SESSION['pnumber'];

?>

 <html>
 <link rel="stylesheet" href="css/cart.css">
 <link rel="stylesheet" href="css/home.css">
 <link rel="stylesheet" href="css/main.css">
 <link rel="stylesheet" href="css/confirm_page.css">
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
         if(isset($_SESSION['Name']))
         {
             echo ' Welcome ' . $_SESSION['Name'];
             echo '<a href="logout.php">Logout</a>';
             echo '<li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>';
         }else {
           echo "<li><a href=\"login.php\">Login</a></li>";
         }
       ?>
     </ul>
   </nav>
   <!-- NAVIGATION ENDS -->

   <!-- Display user name and order date -->
  <div class="order-confirm">
    <i class="far fa-check-circle"></i>
   <p class="confirm"><?php echo "Thank you!"."&nbsp;". $fullname.","."&nbsp;". "your order has been placed!";?> <br><br>
   <?php  date_default_timezone_set("America/Vancouver")?>
   <?php  echo "Order Placed: " . date("Y/m/d") . "&nbsp;" . date("h:i:sa"); ?></p>
 </div>


<div class="summary-box">

  <!-- Display billing and user information, echo from checkout form -->
   <!-- align left-->
<div class="delivery-detail">
  <p class="heading">Delivery For</p>
  <div class="customer-detail">
      <?php echo $fullname;?><br>
      <?php echo $email;?><br>
      <?php echo $pnumber;?>
   </div><br>

  <p class="heading">Billing Details</p>
    <div class="billing-detail">
        <?php echo $address;?><br>
        <?php echo $city. "&nbsp;" . $province;?><br>
        <?php echo $country. "&nbsp;" . $postalcode;?>
     </div>

</div>

<!-- Display order summary  -->
 <!-- align right-->
 	<div class="table">
    <p class="heading">Order Details</p>
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
 </div>
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
 <html>
