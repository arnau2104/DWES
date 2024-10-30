<?php
     include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

// write query
$username = $_POST['username'];
   $sql_customer_id = "SELECT customer_id FROM 067_customers WHERE username ='$username' ;";
   $customer_id_result = mysqli_query($conn,  $sql_customer_id);
   $customer_id_assoc =mysqli_fetch_assoc($customer_id_result); 
   $customer_id =  implode($customer_id_assoc);
   $place_id = $_POST['place_id'];
   $date_in = $_POST['date_in'];
   $date_out = $_POST['date_out'];
   $sql_price_per_day = "SELECT place_category_price
                    FROM 067_places_view
                    WHERE place_id = '$place_id';";
   $price_per_day_result =  mysqli_query($conn,  $sql_price_per_day);
   $price_per_day_assoc = mysqli_fetch_assoc($price_per_day_result);  
   $price_per_day = implode($price_per_day_assoc);
   $sql = "INSERT INTO 067_reservations (customer_id,place_id,date_in,date_out,price_per_day) VALUES
            ('$customer_id', '$place_id', '$date_in', '$date_out', '$price_per_day') ";
   
   //make query and get result
    $result = mysqli_query($conn,  $sql); 
//     $reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //clos connection to the db
    mysqli_close($conn);
    ?>