<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
    $place_id = htmlspecialchars($_POST['place_id']);
    $sql = "select * from 067_places where place_id = '$place_id'";
    
    //make query and get result
    
     $result = mysqli_query($conn,  $sql);

     $place = mysqli_fetch_all($result, MYSQLI_ASSOC);  
     //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
     
     ?>