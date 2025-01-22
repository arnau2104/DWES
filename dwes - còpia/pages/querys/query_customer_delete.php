<?php

include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

  // write query
  if(isset($_SESSION['username']) && (in_array('customer',$_SESSION['rols'][0]) && (!in_array('admin',$_SESSION['rols'][0]) && !in_array('employee', $_SESSION['rols'][0])))) {
   
    $username = $_SESSION['username'];
    
    
}else { 
  
  $username = htmlspecialchars($_POST["username"]);
}
    
  $sql = "UPDATE 067_users SET status = 0 WHERE username = '$username'";

  //make query and get result
  $result = mysqli_query($conn, $sql);   

  //clos connection to the db
  mysqli_close($conn);
?>