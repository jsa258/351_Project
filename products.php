<!DOCTYPE php>
<?php
 ?>
 <html>
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Code retrieved from https://www.w3schools.com/howto/howto_js_filter_elements.asp -->
 <style>
 * {
   box-sizing: border-box;
 }

 body {
   background-color: #f1f1f1;
   padding: 20px;
   font-family: Arial;
 }

 /* Center website */
 .main {
   max-width: 1000px;
   margin: auto;
 }

 .row {
   margin: 10px -16px;
 }

 /* Add padding BETWEEN each column */
 .row,
 .row > .column {
   padding: 8px;
 }

 /* Create three equal columns */
 .column {
   float: left;
   width: 33.33%;
   display: none; /* Hide all elements by default */
 }

 /* Clear floats after rows */
 .row:after {
   content: "";
   display: table;
   clear: both;
 }

 /* Content */
 .content {
   background-color: white;
   padding: 10px;
 }

 /* The "show" class is added to the filtered elements */
 .show {
   display: block;
 }

 .filters {
  margin: 0;
  padding: 0;
  width: 200px;
  position: fixed;
  height: 100%;
  overflow: auto;
}
 </style>
 </head>
 <body>

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
     <div class="content">
       <img src="images/switch1.png" alt="Switch" style="width:100%">
       <h4>Transistor</h4>
       <p>Switch</p>
     </div>
   </div>
   <div class="column switch">
     <div class="content">
     <img src="images/switch2.png" alt="Switch" style="width:100%">
       <h4>Animal Crossing New Horizon</h4>
       <p>Switch</p>
     </div>
   </div>
   <div class="column switch">
     <div class="content">
     <img src="images/switch3.png" alt="Switch" style="width:100%">
       <h4>Killer Queen Black</h4>
       <p>Switch</p>
     </div>
   </div>

   <div class="column xbox">
     <div class="content">
       <img src="images/xbox1.jpg" alt="XBOX" style="width:100%">
       <h4>Crash Bandicoot 4</h4>
       <p>XBOX ONE</p>
     </div>
   </div>
   <div class="column xbox">
     <div class="content">
     <img src="images/xbox2.jpg" alt="XBOX" style="width:100%">
       <h4>Cyberpunk 2077</h4>
       <p>XBOX ONE</p>
     </div>
   </div>
   <div class="column xbox">
     <div class="content">
     <img src="images/xbox3.jpg" alt="XBOX" style="width:100%">
       <h4>Call of Duty Black OPS Cold War</h4>
       <p>XBOX ONE</p>
     </div>
   </div>

   <div class="column ps4">
     <div class="content">
       <img src="images/ps41.jpg" alt="PS4" style="width:100%">
       <h4>Spider-man Miles Morales</h4>
       <p>PS4</p>
     </div>
   </div>
   <div class="column ps4">
     <div class="content">
     <img src="images/ps42.jpg" alt="PS4" style="width:100%">
       <h4>Sackboy A Big Adventure</h4>
       <p>PS4</p>
     </div>
   </div>
   <div class="column ps4">
     <div class="content">
     <img src="images/ps43.jpg" alt="PS4" style="width:100%">
       <h4>Star Wars Squadrons</h4>
       <p>PS4</p>
     </div>
   </div>
 <!-- END GRID -->
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
