<?php

include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

  // write query
  $reservation_id = $_POST["reservation_id"];
 
    
  $sql = "DELETE FROM 067_reservations WHERE reservation_id = '$reservation_id'";

  //make query and get result
  $result = mysqli_query($conn, $sql);   

  //clos connection to the db
  mysqli_close($conn);
?>