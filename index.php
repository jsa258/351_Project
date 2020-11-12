<!DOCTYPE php>
<?php
session_start();
require 'connection.php'; //connect to database
  $selectorder = "SELECT * FROM games limit 5";
	$result = mysqli_query($connection, $selectorder);
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
      <form method="post" action="cart.php?action=add&id=<?php echo $rows["id"]; ?>">
      <div class="product-img" name="product_image">
        <a href="detailpage.php?id=<?php echo $rows['id'];?>">
        <img src="<?php echo $rows['imageurl']; ?>" /></a>
      </div>
      <div class="review">
      <div class="genre" name="genre"><?php echo $rows['genre']; ?></div>
     </div>
      <div class="detail-box">
          <div class="type" name="hidden_name"><a href="#"><?php echo $rows['name']; ?></a></div>
          <input hidden type="text" name="hidden_name" value="<?php echo $rows['name']; ?>">
        <a href="#" class="price" name="hidden_price">$<?php echo $rows['price']; ?></a>
      </div>

      <input hidden type="text" name="hidden_price" value="<?php echo $rows['price']; ?>">
      <input hidden type="number" name="quantity" value="<?php echo $rows['quantity']; ?>">
     </form>
   </div>
   <?php } mysqli_close($connection); ?>
    </div>
 <!-- FEATURE ITEMS ENDS -->

  <!-- PRODUCT SLIDER STARTS -->
  <!--slider-->
 <section class="subheading">
  <h1>Your Favorite Items</h1>
 </section>
 <section class="favproduct">
  <!--item1-->
  <section class="fav-item">
    <div class="box">
      <div class="slide-img">
        <img src="img/2-1.jpg">
        <div class="overlay">
          <a href="#" class="buy-btn">Remove</a>
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div>
      <div class="detail-box">
        <div class="type">
          <a href="#">Animal Crossing</a>
      </div>
      <a href="#" class="price">$50</a>
    </div>
  </section>
  <!--item2-->
  <section class="fav-item">
    <div class="box">
      <div class="slide-img">
        <img src="img/ps41.jpg">
        <div class="overlay">
          <a href="#" class="buy-btn">Remove</a>
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div>
      <div class="detail-box">
        <div class="type">
          <a href="#">Spider-man Miles Morales</a>
      </div>
      <a href="#" class="price">$50</a>
    </div>
    </div>
  </section>
  <!--item3-->
  <section class="fav-item">
    <div class="box">
      <div class="slide-img">
        <img src="img/ps43.jpg">
        <div class="overlay">
          <a href="#" class="buy-btn">Remove</a>
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div>
      <div class="detail-box">
        <div class="type">
          <a href="#">Star Wars Squadrons</a>
      </div>
      <a href="#" class="price">$50</a>
    </div>
    </div>
  </section>
  <!--item4-->
  <section class="fav-item">
    <div class="box">
      <div class="slide-img">
        <img src="img/xbox3.jpg">
        <div class="overlay">
          <a href="#" class="buy-btn">Remove</a>
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div>
      <div class="detail-box">
        <div class="type">
          <a href="#">Call of duty</a>
      </div>
      <a href="#" class="price">$50</a>
    </div>
    </div>
  </section>
</section>
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
