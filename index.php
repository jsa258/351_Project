<!DOCTYPE php>
<?php
session_start();
require 'connection.php'; //connect to database
  $selectorder = "SELECT * FROM games limit 5";
  $result = mysqli_query($connection, $selectorder);

  if(isset($_SESSION['ID'])){
    echo $_SESSION['ID'];
  }

  
  
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

  <title>IAT352-Project</title>
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

 <!-- BANNER STARTS -->
 <div class="HomeBanner">
   <div class="banner-img">
    <img src="img/banner.jpg" alt=""> <!-- image obtained from https://www.ebgames.ca/Views/Locale/Content/Images/flyers/2018/theamayzingsale/English/images/page1/row4_banner.jpg-->
   </div>
 </div>
 <!-- BANNER ENDS -->

 <!-- FEATURE ITEMS START -->
 <section class="subheading">
    <h1>Featured Items</h1>
  </section>
  <!-- Products -->
  <div class="main">
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
    <div class="product-item">
      <div class="product-img slide-img" name="product_image">
        <a href="detailpage.php?id=<?php echo $rows['id'];?>">
        <img src="<?php echo $rows['imageurl']; ?>" /></a>
        <div class="overlay">
        <?php 
        if(isset($_SESSION['ID'])){
           $checkQuery = "SELECT * FROM favorites WHERE id='".$rows['id']."' AND user_id='".$_SESSION['ID']."'";
           $checkFav=mysqli_query($connection,$checkQuery);


            if(mysqli_fetch_assoc($checkFav)){
              ?>
             <form method="post">
             <input hidden type="text" name="item_id" value="<?php echo $rows['id']; ?>">
             <input type="submit" name="remove_fav"  class="buy-btn" value="Remove" />
             </form>
             <?php
             
             if(isset($_POST['remove_fav'])){
              $itemID = addslashes($_POST['item_id']);
              $removeQuery = "DELETE FROM favorites WHERE id='$itemID' AND user_id='".$_SESSION['ID']."'";
              $removeFav = mysqli_query($connection,$removeQuery);   
              
             }
            }else{
              ?>
              <form method="post">
             <input hidden type="text" name="item_id" value="<?php echo $rows['id']; ?>">
             <input type="submit" name="add_fav" class="buy-btn" value="Favorite" />
             </form>
              <?php
              if(isset($_POST['add_fav'])){
                $itemID = addslashes($_POST['item_id']);
                $addQuery = "INSERT INTO favorites (id, user_id) VALUES ('$itemID', '".$_SESSION['ID']."')";
                $addFav = mysqli_query($connection,$addQuery);   
               }
            }
        }else{
            echo '<a href="login.php" class="buy-btn">Favourite</a>';
        }
        ?>
          
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div>
      <div class="review">
      <div class="genre" name="genre"><?php echo $rows['genre']; ?></div>
     </div>
      <div class="detail-box">
          <div class="type" name="hidden_name"><a href="#"><?php echo $rows['name']; ?></a></div>
        <a href="#" class="price" name="hidden_price">$<?php echo $rows['price']; ?></a>
      </div>
   </div>

   <?php }  ?>
    </div>
 <!-- FEATURE ITEMS ENDS -->

  <!-- PRODUCT SLIDER STARTS -->
  <!--slider-->
  <?php if(isset($_SESSION['ID'])){
    ?>
  <section class="subheading">
  <h1>Your Favorite Items</h1>
  </section>
  <section class="favproduct">
  </section>
  <!-- Products -->
  <div class="main">
    <?php
    // use array to display products and echo the information of each product
    // $showQuery = "SELECT * FROM favorites WHERE user_id='".$_SESSION['ID']."' limit 5";
    $showQuery = "SELECT favorites.id, favorites.user_id, games.imageurl, games.genre, games.name, games.price
                  FROM games
                  INNER JOIN favorites ON games.id = favorites.id WHERE user_id='".$_SESSION['ID']."' limit 5";
    
    $showFav = mysqli_query($connection,$showQuery);
    
      $favorites = array();

        while ($rows = mysqli_fetch_array($showFav))
        {
            $favorites[] = $rows;
            
        }
        foreach ($favorites as $rows)
        {
    ?>
    <div class="product-item">
      <div class="product-img slide-img" name="product_image">
        <a href="detailpage.php?id=<?php echo $rows['id'];?>">
        <img src="<?php echo $rows['imageurl']; ?>" /></a>
        <div class="overlay">
        <?php 
        if(isset($_SESSION['ID'])){
           $checkQuery = "SELECT * FROM favorites WHERE id='".$rows['id']."' AND user_id='".$_SESSION['ID']."'";
           $checkFav=mysqli_query($connection,$checkQuery);


            if(mysqli_fetch_assoc($checkFav)){
              ?>
             <form method="post">
             <input hidden type="text" name="item_id" value="<?php echo $rows['id']; ?>">
             <input type="submit" name="remove_fav"  class="buy-btn" value="Remove" />
             </form>
             <?php
             
             if(isset($_POST['remove_fav'])){
              $itemID = addslashes($_POST['item_id']);
              $removeQuery = "DELETE FROM favorites WHERE id='$itemID' AND user_id='".$_SESSION['ID']."'";
              $removeFav = mysqli_query($connection,$removeQuery);   
              
             }
            }else{
              ?>
              <form method="post">
             <input hidden type="text" name="item_id" value="<?php echo $rows['id']; ?>">
             <input type="submit" name="add_fav" class="buy-btn" value="Favorite" />
             </form>
              <?php
              if(isset($_POST['add_fav'])){
                $itemID = addslashes($_POST['item_id']);
                $addQuery = "INSERT INTO favorites (id, user_id) VALUES ('$itemID', '".$_SESSION['ID']."')";
                $addFav = mysqli_query($connection,$addQuery);   
               }
            }
        }else{
            echo '<a href="login.php" class="buy-btn">Favourite</a>';
        }
        ?>
          
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div>
      <div class="review">
      <div class="genre" name="genre"><?php echo $rows['genre']; ?></div>
     </div>
      <div class="detail-box">
          <div class="type" name="hidden_name"><a href="#"><?php echo $rows['name']; ?></a></div>
        <a href="#" class="price" name="hidden_price">$<?php echo $rows['price']; ?></a>
      </div>
   </div>
  <?php }} ?>
  <!-- PRODUCT SLIDER ENDS -->



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
