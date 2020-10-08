<!DOCTYPE php>
<?php
 ?>
 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/products.css">
 <link rel="stylesheet" href="css/home.css">
 <link rel="stylesheet" href="css/main.css">
 <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
 <!-- Code retrieved from https://www.w3schools.com/howto/howto_js_filter_elements.asp -->
 </head>
 <body>
   <!-- NAVIGATION STARTS -->
   <nav>
     <!--burger is the icon for the drop down menu-->
     <div class="burger">
       <div class="line1">
       </div>
       <div class="line2">
       </div>
       <div class="line3">
       </div>
     </div>
     <div class="logo">
       <a href="landing.html">
         <header>XGAMES</header>
       </a>
     </div>
     <ul class="nav-links">
       <li><a href="">Home</a></li>
       <li><a href="">Products</a></li>
       <li><a href="">Login</a></li>
     </ul>
   </nav>

<h2>PRODUCTS</h2>

<div class="filters">
 <input type="radio" id="all" name="console" value="all" onclick="filterSelection('all')" checked>
 <label for="all">Show All</label><br>
 <input type="radio" id="switch" name="console" value="switch" onclick="filterSelection('switch')">
 <label for="switch">Nintendo Switch</label><br>
 <input type="radio" id="xbox" name="console" value="xbox"  onclick="filterSelection('xbox')">
 <label for="xbox">XBOX ONE</label><br>
 <input type="radio" id="ps4" name="console" value="ps4"  onclick="filterSelection('ps4')">
 <label for="ps4">PS4</label>
</div>

<!-- MAIN (Center website) -->
<div class="main">
 <!-- Products Grid -->
 <div class="row">
   <div class="column switch">
     <div class="product-item">
       <div class="product-img"><img src="img/switch1.png" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Transistor</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
   </div>
   <div class="column switch">
     <div class="product-item">
       <div class="product-img"><img src="img/switch2.png" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Animal Crossing New Horizon</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
   </div>
   <div class="column switch">
     <div class="product-item">
       <div class="product-img"><img src="img/switch3.png" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Killer Queen Black</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
   </div>

   <div class="column xbox">
     <div class="product-item">
       <div class="product-img"><img src="img/xbox1.jpg" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Crash Bandicoot 4</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
  </div>
   <div class="column xbox">
     <div class="product-item">
       <div class="product-img"><img src="img/xbox2.jpg" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Cyberpunk 2077</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
   </div>
   <div class="column xbox">
     <div class="product-item">
       <div class="product-img"><img src="img/xbox3.jpg" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Call of Duty Black OPS Cold War</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
    </div>

   <div class="column ps4">
     <div class="product-item">
       <div class="product-img"><img src="img/ps41.jpg" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Spider-man Miles Morales</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
  </div>
   <div class="column ps4">
     <div class="product-item">
       <div class="product-img"><img src="img/ps42.jpg" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Sackboy A Big Adventure</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
   </div>
   <div class="column ps4">
     <div class="product-item">
       <div class="product-img"><img src="img/ps43.jpg" alt=""></div>
       <div class="detail-box">
         <div class="type">
           <span>New Arrival</span>
           <a href="#">Star Wars Squadrons</a>
       </div>
       <a href="#" class="price">$50</a>
     </div>
       <div class="review">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <div class="overlaying">
          <a href="#" class="buy-btn1">Buy Now</a>
        </div></div></div>
   </div>
 <!-- END GRID -->
 </div>
 <!--begin footer-->
 <div class="footer">
   <div class="inner-footer">

     <div class="footer-items">
       <h5> XGames </h5>
       <p> Description of the website</p>
     </div>
     <div class="footer-items">
       <div class="contact">
         <h6> Contact Us </h6>
         <span><i class="fas fa-envelope"></i> info@gmail.com</span>
         <i class="fas fa-phone"></i>604-232-3421
       </div>
     </div>

     <div class="footer-items">
       <div class="social">
         <h6> Social Media </h6>
         <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
         <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
         <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
       </div>
     </div>

     <div class="footer-items">
       <h6> Quick Links </h6>
       <ul>
         <li><a href="">Home</a></li>
         <li><a href="">Products</a></li>
       </ul>
     </div>
   </div>
   <div class="footer-bottom">
     Copyright &copy;
   </div>
 </div>
 <!-- END MAIN -->
 </div>

 <script>
 filterSelection("all")
 function filterSelection(c) {
   var x, i;
   x = document.getElementsByClassName("column");
   if (c == "all") c = "";
   for (i = 0; i < x.length; i++) {
     w3RemoveClass(x[i], "show");
     if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
   }
 }

 function w3AddClass(element, name) {
   var i, arr1, arr2;
   arr1 = element.className.split(" ");
   arr2 = name.split(" ");
   for (i = 0; i < arr2.length; i++) {
     if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
   }
 }

 function w3RemoveClass(element, name) {
   var i, arr1, arr2;
   arr1 = element.className.split(" ");
   arr2 = name.split(" ");
   for (i = 0; i < arr2.length; i++) {
     while (arr1.indexOf(arr2[i]) > -1) {
       arr1.splice(arr1.indexOf(arr2[i]), 1);
     }
   }
   element.className = arr1.join(" ");
 }
 </script>

 </body>
 </html>
