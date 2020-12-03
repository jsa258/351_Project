<?php
session_start();
require 'connection.php'; //connect to database
$result_array = array();
$condition_arr = array();
$selectProduct = "SELECT * FROM games WHERE games.platform IN";

if (!empty($_POST['categories'])) {
  array_push($condition_arr, "'" . $_POST["categories"] . "'");
  }

if (count($condition_arr) > 0){
  $condition_str = implode(",", $condition_arr);
  $selectProduct .=  "(" . $condition_str . ") LIMIT 15";
  // $selectProduct .= "('Wii') LIMIT 5";
}

$result = mysqli_query($connection, $selectProduct);

$results_rows = mysqli_num_rows($result);

if ($results_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($result_array, $row);
    }
}

echo json_encode($result_array);

?>
