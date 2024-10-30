<?php
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

// write query
    
    $query = "SELECT * FROM 067_place_type";
   
    //make query and get result
    
   
    $result = mysqli_query($conn,  $query);
  
     
    $place_type = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
    ?>