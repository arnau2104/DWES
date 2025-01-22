<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
   $place_id = htmlspecialchars($_POST['place_id']);
   $place_type_id = htmlspecialchars($_POST['place_type_id']);
   $place_category_id = htmlspecialchars($_POST['place_category_id']);
   $place_capacity = htmlspecialchars($_POST['place_capacity']);
   $status = htmlspecialchars($_POST['status']);

  
   

   $sql = " UPDATE 067_places SET place_type_id = '$place_type_id', place_category_id = '$place_category_id', place_capacity = '$place_capacity', status = '$status' WHERE place_id = '$place_id' ";
   
   //make query and get result
    $result = mysqli_query($conn,  $sql); 

    //clos connection to the db
    mysqli_close($conn);
    ?>