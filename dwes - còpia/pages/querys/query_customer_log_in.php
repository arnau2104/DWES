<?php

include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

  // write query
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);
 
    
  $sql = "SELECT * FROM 067_users WHERE username = '$username' AND `password` = '$password'";

  //make query and get result
  $result = mysqli_query($conn, $sql);   
  $user = mysqli_fetch_assoc($result);
  //clos connection to the db
  mysqli_close($conn);
?>