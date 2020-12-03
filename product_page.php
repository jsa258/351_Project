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
  <!-- Filters -->
  <div class="filters">
    <h2>PRODUCTS</h2>
    <h3>Consoles</h3>
    <input type="checkbox" class="category" id="all" name="console" value="'Wii', 'DS', 'XOne', 'PS4', 'PC', 'NES', 'X360', 'SNES', 'WiiU'" onclick="checkFilter()" checked>
    <label for="all">Show All</label><br>
    <input type="checkbox" class="category" id="Wii" name="console" onclick="checkFilter()" value="'Wii'">
    <label for="Wii">Wii</label><br>
    <input type="checkbox" class="category" id="DS" name="console" onclick="checkFilter()" value="'DS'">
    <label for="DS">Nintendo DS</label><br>
    <input type="checkbox" class="category" id="XOne" name="console" onclick="checkFilter()" value="'XOne'">
    <label for="XOne">XBOX ONE</label><br>
    <input type="checkbox" class="category" id="PS4" name="console" onclick="checkFilter()" value="'PS4'">
    <label for="PS4">PS4</label><br>
    <input type="checkbox" class="category" id="PC" name="console" onclick="checkFilter()" value="'PC'">
    <label for="PC">PC</label><br>
    <input type="checkbox" class="category" id="Other" name="console" onclick="checkFilter()" value="'NES', 'X360', 'SNES', 'WiiU'">
    <label for="Other">Others</label><br>

   <h3>Genres</h3>
   <input type="checkbox" id="action" name="genres" value="'action'" class="category" onclick="checkFilter()">
   <label for="action">Action</label><br>
   <input type="checkbox" id="adventure" name="genres" value="'adventure'" class="category" onclick="checkFilter()" >
   <label for="adventure">Adventure</label><br>
   <input type="checkbox" id="fighting" name="genres" value="'fighting'" class="category" onclick="checkFilter()">
   <label for="fighting">Fighting</label><br>
   <input type="checkbox" id="platform" name="genres" value="'platform'" class="category" onclick="checkFilter()">
   <label for="platform">Platform</label><br>
   <input type="checkbox" id="puzzle" name="genres" value="'puzzle'" class="category" onclick="checkFilter()">
   <label for="puzzle">Puzzle</label><br>
   <input type="checkbox" id="racing" name="genres" value="'racing'" class="category" onclick="checkFilter()">
   <label for="racing">Racing</label><br>
   <input type="checkbox" id="rp" name="genres" value="'rp'" class="category" onclick="checkFilter()">
   <label for="rp">Role-playing</label><br>
   <input type="checkbox" id="shooter" name="genres" value="'shooter'" class="category" onclick="checkFilter()">
   <label for="shooter">Shooter</label><br>
   <input type="checkbox" id="simulation" name="genres" value="'simulation'" class="category" onclick="checkFilter()">
   <label for="simulation">Simulation</label><br>
   <input type="checkbox" id="sports" name="genres" value="'sports'" class="category" onclick="checkFilter()">
   <label for="sports">Sports</label><br>
   <input type="checkbox" id="strategy" name="genres" value="'strategy'" class="category" onclick="checkFilter()">
   <label for="strategy">Strategy</label><br>
   <input type="checkbox" id="misc" name="genres" value="'misc'" class="category" onclick="checkFilter()">
   <label for="misc">Misc</label><br>

   <h3>Publishers</h3>
   <input type="checkbox" id="bandai" name="publisher" value="'bandai', 'Namco Bandai', 'Namco Bandai Games'" class="category" onclick="checkFilter()">
   <label for="bandai">Bandai Namco</label><br>
   <input type="checkbox" id="ea" name="publisher" value="'EA Sports', 'Electronic Arts'" class="category" onclick="checkFilter()">
   <label for="ea">Electronic Arts</label><br>
   <input type="checkbox" id="nintendo" name="publisher" value="'nintendo'" class="category" onclick="checkFilter()">
   <label for="nintendo">Nintendo</label><br>
   <input type="checkbox" id="sega" name="publisher" value="'sega'" class="category" onclick="checkFilter()">
   <label for="sega">Sega</label><br>
   <input type="checkbox" id="sony" name="publisher" value="'Sony Computer Entertainment', 'Sony Computer Entertainment America', 'Sony Interactive Entertainment'" class="category" onclick="checkFilter()">
   <label for="sony">Sony</label><br>
   <input type="checkbox" id="se" name="publisher" value="'Square Enix'" class="category" onclick="checkFilter()">
   <label for="se">Square Enix</label><br>
   <input type="checkbox" id="ubisoft" name="publisher" value="'Ubisoft'" class="category" onclick="checkFilter()">
   <label for="ubisoft">Square Ubisoft</label><br>

   <h3>ESRB Rating</h3>
   <input type="checkbox" id="pending" name="rating" value="'RP'" class="category" onclick="checkFilter()">
   <label for="pending">Rating Pending</label><br>
   <input type="checkbox" id="early" name="rating" value="'EC'" class="category" onclick="checkFilter()">
   <label for="early">Early Childhood</label><br>
   <input type="checkbox" id="everyone" name="rating" value="'E'" class="category" onclick="checkFilter()">
   <label for="everyone">Everyone</label><br>
   <input type="checkbox" id="everyone10" name="rating" value="'E10'" class="category" onclick="checkFilter()">
   <label for="everyone10">Everyone 10+</label><br>
   <input type="checkbox" id="teen" name="rating" value="'T'" class="category" onclick="checkFilter()">
   <label for="teen">Teen</label><br>
   <input type="checkbox" id="mature" name="rating" value="'M'" class="category" onclick="checkFilter()">
   <label for="mature">Mature</label><br>
   <input type="checkbox" id="adult" name="rating" value="'AO'" class="category" onclick="checkFilter()">
   <label for="adult">Adults Only</label><br>
</div>

<div class="main">
  <div id="records"></div>
</div>

<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

      $(document).ready(function(){
        checkFilter();
      });

      function checkFilter() {
        // Consoles
        var categories = [];
        $("input[name='console']:checked").each(function(){
            categories.push(this.value);
        });
        // Genres
        var genres = [];
        $("input[name='genres']:checked").each(function(){
            genres.push(this.value);
        });
        // Publishers
        var publisher = [];
        $("input[name='publisher']:checked").each(function(){
            publisher.push(this.value);
        });
        // ESRB Ratings
        var rating = [];
        $("input[name='rating']:checked").each(function(){
            rating.push(this.value);
        });

        console.log(rating);

      $.ajax({
        method: "POST",
        url: "getProductData.php",
        data: {info:categories,genres:genres,publisher:publisher,rating:rating},

      }).done(function( data ) {
      try {
        var result= $.parseJSON(data);
        console.log(result);
        var string = "";
          /* from result create a string of data and append to the div */
          $.each( result, function( key, value ) {
            var img = value['url'] + value['img_url'];
            img = img.replace(/"/g,"");

            string += "<div class='product-item'> \
            <div class='product-img' name='product_image'> \
            <a href='detailpage.php?id=" +value['id']+ "'> \
            <img src=" +img+ "/></a> \
            </div> \
            <div class='review'> \
            <div class='genre' name='genre'>" +value['genre']+ "</div> \
            </div> \
            <div class='detail-box'> \
            <div class='type' name='hidden_name'><a href='detailpage.php?id=" +value['id']+ "'> " +value['name']+ "</a></div> \
            <a href='#' class='price' name='hidden_price'>$" +value['price']+ "</a> \
            </div></div>";
            });
            $("#records").html(string);
          } catch(err) {
            $("#records").html("<h2>No Products Found</h2>");
          }
            });
    }

</script>
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
