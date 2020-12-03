<?php
    $host         = "localhost";
    $username     = "root";
    $password     = "";
    $dbname       = "iat352_project";

    $result_array = array();
    /* Create connection */
    $conn = new mysqli($host, $username, $password, $dbname);

    /* Check connection  */
    if ($conn->connect_error) {
         die("Connection to database failed: " . $conn->connect_error);
    }
    /* SQL query to get results from database */
    $info = $_POST['info'];


    // Converting the array to comma separated string
    $info = implode(",",$info);

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

    $sql .= "LIMIT 20";

    // $sql .= "('" . $_GET["info"] . "')";
    $result = $conn->query($sql);
    /* If there are results from database push to result array */
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }
    /* send a JSON encded array to client */
    echo json_encode($result_array);

    $conn->close();
