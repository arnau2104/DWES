<?php
       include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
     $place_id = $_POST['place_id'];
    $sqlOnePlace = "SELECT * FROM 067_places_view WHERE place_id = '$place_id'";
    $sqlAllPlaces =  "select * from 067_places_view";
    //make query and get result
    
    if(empty($_POST['place_id'])== true) {
        $result = mysqli_query($conn,  $sqlAllPlaces);
    }else {
        $result = mysqli_query($conn,  $sqlOnePlace);
    };
     
    $place = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
    //print_r($customer);
    ?>