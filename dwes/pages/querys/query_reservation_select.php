<?php
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

// write query
     $reservation_id = $_POST['reservation_id'];
    $sqlOneReservation = "select * from 067_reservations_view where reservation_id = '$reservation_id'";
    $sqlAllReservations =  "select * from 067_reservations_view";
    //make query and get result
    
    if(empty($_POST['reservation_id'])== true) {
        $result = mysqli_query($conn,  $sqlOneReservation);
    }else {
        $result = mysqli_query($conn,  $sqlAllReservations);
    };
     
    $reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
    //print_r($customer);
    ?>