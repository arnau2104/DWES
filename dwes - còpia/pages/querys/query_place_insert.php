<?php
 
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


 // write query
 $place_type_id = htmlspecialchars($_POST["place_type_id"]);
 $place_category_id = htmlspecialchars($_POST["place_category_id"]);
 $place_capacity = htmlspecialchars($_POST["place_capacity"]);


 
 $sql = "INSERT INTO 067_places (place_type_id,place_category_id,place_capacity) VALUES
         ('$place_type_id','$place_category_id','$place_capacity');";

 //make query and get result
 $result = mysqli_query($conn, $sql);        
?>