<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
   $reservation_id = $_POST['reservation_id'];
   $customer_id = $_POST['customer_id'];
   $place_id = $_POST['place_id'];
   $date_in = $_POST['date_in'];
   $date_out = $_POST['date_out'];
   $price_per_day = $_POST['price_per_day'];

   $sql = " UPDATE 067_reservations SET customer_id = '$customer_id', place_id = '$place_id', date_in = '$date_in', date_out = '$date_out', price_per_day = '$price_per_day' WHERE reservation_id = '$reservation_id' ";
   
   //make query and get result
    $result = mysqli_query($conn,  $sql); 

    //clos connection to the db
    mysqli_close($conn);
    ?>