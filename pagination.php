<?php
//pagination.php
$connect = mysqli_connect("localhost", "root", "", "iat352_project");
$record_per_page = 5;
$page = '';
$output = '';
if(isset($_POST["page"]))
{
     $page = $_POST["page"];
}
else
{
     $page = 1;
}
$start_from = ($page - 1)*$record_per_page;
$query = "SELECT * FROM games ORDER BY id ASC LIMIT $start_from, $record_per_page";
$result = mysqli_query($connect, $query);
$products = array();
while ($rows = mysqli_fetch_array($result))
{
    $products[] = $rows;
}
foreach ($products as $rows)
{     $output .= '
     <div class="product-item">
       <div class="product-img" name="product_image">
         <a href="detailpage.php?id='.$rows["id"].'">
         <img src="'.$rows["imageurl"].'" /></a>
       </div>
       <div class="review">
       <div class="genre" name="genre">'.$rows["genre"].'</div>
      </div>
       <div class="detail-box">
           <div class="type" name="hidden_name"><a href="#">'.$rows["name"].'</a></div>
         <a href="#" class="price" name="hidden_price">$'.$rows["price"].'</a>
       </div>
       </div>
     ';
}
$page_query = "SELECT * FROM games ORDER BY id DESC";
$page_result = mysqli_query($connect, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);

if($page>=2){
    $output .= "<a href='product_page.php?page=".($page-1)."'>  Prev </a>";
}

for($i=1; $i<=5; $i++){
  if ($i == $page) {
     $output .= "<a class = 'active' href='product_page.php?page=".$i."'>".$i." </a>";
   } else {
     $output .= "<a href='product_page.php?page=".$i."'>
                                  ".$i." </a>";
   }
};

if($page<$total_pages){
    $output .= "<a href='index.php?page=".($page+1)."'>  Next </a>";
}

$output .= '</div><br /><br />';
echo $output;
?>
