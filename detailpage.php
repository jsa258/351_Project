<?php
session_start();
require 'connection.php'; //connect to database
$id = $_GET["id"];
$productDetails = "SELECT * FROM games WHERE id = '$id'";
$result = mysqli_query($connection, $productDetails);

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/detail1.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

  <title>IAT351-Project</title>
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
        if(isset($_SESSION['Name']))
        {
            echo ' Welcome ' . $_SESSION['Name'];
            echo '<a href="logout.php">Logout</a>';
        }else {
          echo "<li><a href=\"login.php\">Login</a></li>";
        }
      ?>
      <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
    </ul>
  </nav>


  <!-- NAVIGATION ENDS -->
  <?php
  // use array to display products and echo the information of each product
    $products = array();
      while ($rows = mysqli_fetch_array($result))
      {
          $products[] = $rows;
      }
      foreach ($products as $rows)
      {
  ?>
  <!-- PRODUCT DESCRIPTION STARTS -->
  <div class="info-section">
    <div class="img-section">
      <?php
      $url = $rows['url'];
      $img = $rows['img_url'];
      $imgurl = $url.$img;
      ?>
    <img src="<?php echo $imgurl ?>" alt=" " class="img-placeholder" style="width:75%">
    <!-- <div class="small-img">
          <div class="img-row">
            <img src="img/1-2.jpg" class="simg-placeholder">
          </div>
          <div class="img-row">
            <img src="img/1-3.jpg" class="simg-placeholder">
          </div>
          <div class="img-row">
            <img src="img/1-4.jpg" class="simg-placeholder">
          </div>
          <div class="img-row">
            <img src="img/1-6.jpg" class="simg-placeholder">
          </div>
          <div class="img-row">
            <img src="img/1-5.jpg" class="simg-placeholder">
          </div>
      </div> -->
  </div>
<!--
-->
    <div class="text-section">
      <p class="collection-title">NEW ARRIVALS</p>
    <div class="top-section">
      <p class="product-title"><?php echo $rows['name']; ?></p>
      <div class="review">
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="fas fa-star"></i>
       <i class="far fa-star"></i>
       <p class="reviews">Rating: <?php echo $rows['critic_score']; ?></p>
     </div>
    </div>
     <p class="product-price">$<?php echo $rows['price']; ?></p>
     <p class="product-description"><?php echo $rows['genre']; ?></p>

      <p class="product-description"><?php echo $rows['description']; ?></p>

      <div class="info-logo">
         <div class="check">
           <i class="far fa-check-circle"></i>
           <p class="delivery">Home Delivery</p>
         </div>
         <div class="check">
           <i class="fas fa-shipping-fast"></i>
           <p class="delivery">Free Shipping</p>
        </div>
        <div class="check">
          <i class="fas fa-undo-alt"></i>
          <p class="delivery">10 day return</p>
       </div>
     </div>
      <div class="quantity">
        <p class="product-text">QTY:</p>
        <select class="drop-list">
          <option value="1">1</option>
          <!-- <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option> -->
        </select>
      </div>

   <form method="post" action="cart.php?action=add&id=<?php echo $rows["id"]; ?>">
     <input hidden type="text" name="hidden_name" value="<?php echo $rows['name']; ?>">
     <input hidden type="text" name="hidden_price" value="<?php echo $rows['price']; ?>">
     <input hidden type="number" name="quantity" value="1">

      <div class="product-btn">
      <input type="submit" name="add_cart" class="buy-button" value="ADD TO CART" />
   </form>

   <?php 
        if(isset($_SESSION['ID'])){
           $checkQuery = "SELECT * FROM favorites WHERE id='".$rows['id']."' AND user_id='".$_SESSION['ID']."'";
           $checkFav=mysqli_query($connection,$checkQuery);
           //Checks if user have already added this item to their favorite
            if(mysqli_fetch_assoc($checkFav)){
              ?>
             <form method="post">
             <input hidden type="text" name="item_id" value="<?php echo $rows['id']; ?>">
             <input type="submit" name="remove_fav"  class="buy-button" value="Remove" />
             </form>
             <?php
             //Removes the item from favorite when button is submitted
             if(isset($_POST['remove_fav'])){
              $itemID = addslashes($_POST['item_id']);
              $removeQuery = "DELETE FROM favorites WHERE id='$itemID' AND user_id='".$_SESSION['ID']."'";
              $removeFav = mysqli_query($connection,$removeQuery);   
              echo "<meta http-equiv='refresh' content='0'>";
             }
            }else{
              ?>
              <form method="post">
             <input hidden type="text" name="item_id" value="<?php echo $rows['id']; ?>">
             <input type="submit" name="add_fav" class="buy-button" value="Favorite" />
             </form>
              <?php
              //Add the item to favorite when button is submitted
              if(isset($_POST['add_fav'])){
                $itemID = addslashes($_POST['item_id']);
                $addQuery = "INSERT INTO favorites (id, user_id) VALUES ('$itemID', '".$_SESSION['ID']."')";
                $addFav = mysqli_query($connection,$addQuery);   
                echo "<meta http-equiv='refresh' content='0'>";
               }
            }
        }else{
            echo '<a href="login.php" class="buy-button">Favourite</a>';
        }
        ?>
    </div>
  </div>
  </div>

<?php } mysqli_close($connection); ?>


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
