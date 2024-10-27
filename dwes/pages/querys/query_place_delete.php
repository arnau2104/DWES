<?php

include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

  // write query
  $place_id = $_POST["place_id"];
 
    
  $delete = "DELETE FROM 067_places WHERE place_id = '$place_id'";
  $disable = "UPDATE 067_places SET status = 0 WHERE place_id = '$place_id'";  
  //make query and get result
  if(isset($_POST['disable'])) {
    $result = mysqli_query($conn, $disable);   
  }else {
    $result = mysqli_query($conn, $delete);   
  };
 

  //clos connection to the db
  mysqli_close($conn);
?>