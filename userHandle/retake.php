<?php
session_start();
include "../dbconn.php";
  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    echo $decode['retook'];
    if($decode['retook'] == 'yes') {
      $user = $_SESSION['user'];
      $sql = "DELETE FROM `quiz_answers` WHERE `quiz_answers`.`user_id` = '$user'";
      $result = mysqli_query($conn,$sql);

      if(!$result) {
          echo "Sorry! technical issue".mysqli_error($conn);
        }
    }
}

?>