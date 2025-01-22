<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
   $reservation_id = htmlspecialchars($_POST['reservation_id']);
   $user_id = htmlspecialchars($_POST['user_id']);
   $place_id = htmlspecialchars($_POST['place_id']);
   $date_in = htmlspecialchars($_POST['date_in']);
   $date_out = htmlspecialchars($_POST['date_out']);
   $price_per_day = htmlspecialchars($_POST['price_per_day']);
   $reservation_state = htmlspecialchars($_POST['reservation_state']);

   $sql = " UPDATE 067_reservations SET user_id = '$user_id', place_id = '$place_id', date_in = '$date_in', date_out = '$date_out', price_per_day = '$price_per_day' , reservation_state = '$reservation_state'  WHERE reservation_id = '$reservation_id' ";
   
   //make query and get result
    $result = mysqli_query($conn,  $sql); 

    //clos connection to the db
    mysqli_close($conn);
    ?>