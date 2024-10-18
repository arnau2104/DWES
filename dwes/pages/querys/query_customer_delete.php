<?php

include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php')

  // write query
  $username = $_POST["username"];
 
    
  $sql = "DELETE FROM customers WHERE username = '$username'";

  //make query and get result
  $result = mysqli_query($conn, $sql);   

  //clos connection to the db
  mysqli_close($conn);
?>