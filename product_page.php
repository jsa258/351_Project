<!DOCTYPE html>

<?php
  session_start();
  require 'connection.php'; //connect to database
  $selectorder = "SELECT * FROM games limit 15";
  $result = mysqli_query($connection, $selectorder);
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/products.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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
        if(isset($_SESSION['Name']))
        {
            echo ' Welcome ' . $_SESSION['Name'];
            echo '<a href="logout.php">Logout</a>';
            echo '<li><a href="cart.php"></li>';
        }else {
          echo "<li><a href=\"login.php\">Login</a></li>";
        }
      ?>
      <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
    </ul>
  </nav>
  <!-- NAVIGATION ENDS -->

  <div class="filters">
    <h2>PRODUCTS</h2>
    <h3>Consoles</h3>
   <input type="checkbox" id="all" name="console" value="all" onclick="filterSelection('all')" checked>
   <label for="all">Show All</label><br>
   <input type="checkbox" id="switch" name="console" value="switch" onclick="filterSelection('switch')">
   <label for="switch">Nintendo Switch</label><br>
   <input type="checkbox" id="xbox" name="console" value="xbox"  onclick="filterSelection('xbox')">
   <label for="xbox">XBOX ONE</label><br>
   <input type="checkbox" id="ps4" name="console" value="ps4"  onclick="filterSelection('ps4')">
   <label for="ps4">PS4</label><br>
   <input type="checkbox" id="wiiu" name="console" value="wiiu">
   <label for="wiiu">Wii U</label><br>
   <input type="checkbox" id="otherscon" name="console" value="otherscon">
   <label for="otherscon">Others</label><br>

   <h3>Genres</h3>
   <input type="checkbox" id="action" name="genres" value="action">
   <label for="action">Action</label><br>
   <input type="checkbox" id="adventure" name="genres" value="adventure">
   <label for="adventure">Adventure</label><br>
   <input type="checkbox" id="fighting" name="genres" value="fighting">
   <label for="fighting">Fighting</label><br>
   <input type="checkbox" id="platform" name="genres" value="platform">
   <label for="platform">Platform</label><br>
   <input type="checkbox" id="puzzle" name="genres" value="puzzle">
   <label for="puzzle">Puzzle</label><br>
   <input type="checkbox" id="racing" name="genres" value="racing">
   <label for="racing">Racing</label><br>
   <input type="checkbox" id="rp" name="genres" value="rp">
   <label for="rp">Role-playing</label><br>
   <input type="checkbox" id="shooter" name="genres" value="shooter">
   <label for="shooter">Shooter</label><br>
   <input type="checkbox" id="simulation" name="genres" value="simulation">
   <label for="simulation">Simulation</label><br>
   <input type="checkbox" id="sports" name="genres" value="sports">
   <label for="sports">Sports</label><br>
   <input type="checkbox" id="strategy" name="genres" value="strategy">
   <label for="strategy">Strategy</label><br>
   <input type="checkbox" id="misc" name="genres" value="misc">
   <label for="misc">Misc</label><br>

   <h3>Publishers</h3>
   <input type="checkbox" id="bandai" name="publisher" value="bandai">
   <label for="bandai">Bandai Namco</label><br>
   <input type="checkbox" id="ea" name="publisher" value="ea">
   <label for="ea">Electronic Arts</label><br>
   <input type="checkbox" id="nintendo" name="publisher" value="nintendo">
   <label for="nintendo">Nintendo</label><br>
   <input type="checkbox" id="sega" name="publisher" value="sega">
   <label for="sega">Sega</label><br>
   <input type="checkbox" id="sony" name="publisher" value="sony">
   <label for="sony">Sony</label><br>
   <input type="checkbox" id="se" name="publisher" value="se">
   <label for="se">Square Enix</label><br>
   <input type="checkbox" id="ubisoft" name="publisher" value="ubisoft">
   <label for="ubisoft">Square Ubisoft</label><br>

   <h3>Price Range</h3>
   <input type="checkbox" id="1020" name="pricerange" value="1020">
   <label for="1020">$10~20</label><br>
   <input type="checkbox" id="2040" name="pricerange" value="2040">
   <label for="2040">$20~40</label><br>
   <input type="checkbox" id="4060" name="pricerange" value="4060">
   <label for="4060">$40~60</label><br>
   <input type="checkbox" id="60" name="pricerange" value="60">
   <label for="60">$60+</label><br>

   <h3>Global Sales</h3>
   <input type="checkbox" id="10k" name="sales" value="10k">
   <label for="10k">~10,000</label><br>
   <input type="checkbox" id="50k" name="sales" value="50k">
   <label for="50k">10,000~50,000</label><br>
   <input type="checkbox" id="100k" name="sales" value="100k">
   <label for="100k">50,000~100,000</label><br>
   <input type="checkbox" id="500k" name="sales" value="500k">
   <label for="500k">100,000~500,000</label><br>
   <input type="checkbox" id="1m" name="sales" value="1m">
   <label for="1m">500,000~1,000,000</label><br>
   <input type="checkbox" id="over1m" name="sales" value="over1m">
   <label for="over1m">1,000,000~</label><br>

   <h3>ESRB Rating</h3>
   <input type="checkbox" id="pending" name="rating" value="pending">
   <label for="pending">Rating Pending</label><br>
   <input type="checkbox" id="early" name="rating" value="early">
   <label for="early">Early Childhood</label><br>
   <input type="checkbox" id="everyone" name="rating" value="everyone">
   <label for="everyone">Everyone</label><br>
   <input type="checkbox" id="everyone10" name="rating" value="everyone10">
   <label for="everyone10">Everyone 10+</label><br>
   <input type="checkbox" id="teen" name="rating" value="teen">
   <label for="teen">Teen</label><br>
   <input type="checkbox" id="mature" name="rating" value="mature">
   <label for="mature">Mature</label><br>
   <input type="checkbox" id="adult" name="rating" value="adult">
   <label for="adult">Adults Only</label><br>
</div>

<!-- PRODUCT MENU STARTS -->
<div class="main">
  <?php
  // use foreach loop to display products and echo the information of each product
    $products = array();
      while ($rows = mysqli_fetch_array($result))
      {
          $products[] = $rows;
      }
      foreach ($products as $rows)
      {
  ?>
  <div class="product-item">
    <div class="product-img" name="product_image">
      <a href="detailpage.php?id=<?php echo $rows['id'];?>">
      <img src="<?php echo $rows['imageurl']; ?>" /></a>
    </div>
    <div class="review">
    <div class="genre" name="genre"><?php echo $rows['genre']; ?></div>
   </div>
    <div class="detail-box">
        <div class="type" name="hidden_name"><a href="#"><?php echo $rows['name']; ?></a></div>
      <a href="#" class="price" name="hidden_price">$<?php echo $rows['price']; ?></a>
    </div>
 </div>
 <?php } mysqli_close($connection); ?>
  </div>

  <?php

   ?>

<?php


 ?>

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
