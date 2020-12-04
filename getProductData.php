
    <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/products.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    </head>
    </html>


<?php
    $host         = "localhost";
    $username     = "root";
    $password     = "";
    $dbname       = "iat352_project";

    $result_array = array();

    $record_per_page = 10;
    $page = '';
    $output = '';
    $sql = '';
    $info ='';

    if(isset($_POST["page"]))
    {
         $page = $_POST["page"];
    }
    else
    {
         $page = 1;
    }

    $start_from = ($page - 1)*$record_per_page;

    /* Create connection */
    $conn = new mysqli($host, $username, $password, $dbname);

    /* Check connection  */
    if ($conn->connect_error) {
         die("Connection to database failed: " . $conn->connect_error);
    }
    /* SQL query to get results from database */
    if(isset($_POST["info"])){
    $info = $_POST['info'];
    // Converting the array to comma separated string
    $info = implode(",",$info);
  } else {
    $output = "<h2>No products found</h2>";
  }


    $sql = "SELECT * FROM games WHERE games.platform IN (".$info.")";
    if( isset($_POST['genres']) ){
      $genres = $_POST['genres'];
      $genres = implode(",",$genres);
      $sql .= "AND games.genre IN (".$genres.")";
    }
    if( isset($_POST['publisher']) ){
      $publisher = $_POST['publisher'];
      $publisher = implode(",",$publisher);
      $sql .= "AND games.publisher IN (".$publisher.")";
    }
    if( isset($_POST['rating']) ){
      $rating = $_POST['rating'];
      $rating = implode(",",$rating);
      $sql .= "AND games.ESRB_rating IN (".$rating.")";
    }

    $sql .= "LIMIT $start_from, $record_per_page";
    $result = $conn->query($sql);

    $page_query = "SELECT * FROM games ORDER BY id DESC";
    $page_result = $conn->query($page_query);
    $total_records = mysqli_num_rows($page_result);
    $total_pages = ceil($total_records/$record_per_page);

    /* If there are results from database push to result array */
    if(isset($_POST["info"])){
    if ($result->num_rows > 0) {
      while ($rows = mysqli_fetch_array($result))
      {
          $products[] = $rows;
      }
      foreach ($products as $rows)
      {
        $url = $rows['url'];
        $img = $rows['img_url'];
        $imgurl = $url.$img;
         $output .= '
           <div class="product-item">
             <div class="product-img" name="product_image">
               <a href="detailpage.php?id='.$rows["id"].'">
               <img src="'.$imgurl.'" /></a>
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
      for($i=1; $i<=3; $i++)
      {
           $output .= "<span class='pagination_link' style='cursor: pointer;'id='".$i."'>".$i."</span>";
      }
      $output .= '</div>';
    }
  } else {
      $output = "<h2>No products found</h2>";
  }

    /* send a JSON encded array to client */
    echo $output;

    $conn->close();
?>
