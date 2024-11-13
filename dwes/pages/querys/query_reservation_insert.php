<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        unset($_SESSION['log_in_message']);
    } else {
        // Manejo en caso de que no esté definido (puedes redirigir o mostrar un mensaje)
        $_SESSION['log_in_message'] = "Inicia Session para poder hacer una reserva!";
        header('Location: /student067/dwes/pages/forms/form_customer_log_in.php');
         exit;
    }
// $username =  $_SESSION['username']; // htmlspecialchars($_POST['username']);
   $sql_user_id = "SELECT user_id FROM 067_users WHERE username ='$username' ;";
   $user_id_result = mysqli_query($conn,  $sql_user_id);
   $user_id_assoc =mysqli_fetch_assoc($user_id_result); 
   $user_id =  $user_id_assoc['user_id'];
   if(isset($_POST['place_id']) && !$_POST['place_id']==null) {
   
    $place_id = htmlspecialchars($_POST['place_id']);
   }else {
    print_r("Place Id no introduit");
    exit;
   }
   $date_in = htmlspecialchars($_POST['date_in']);
   $date_out = htmlspecialchars($_POST['date_out']);
   $sql_price_per_day = "SELECT place_category_price
                    FROM 067_places_view
                    WHERE place_id = '$place_id';";
   $price_per_day_result =  mysqli_query($conn,  $sql_price_per_day);
   $price_per_day_assoc = mysqli_fetch_assoc($price_per_day_result);   
    $price_per_day = $price_per_day_assoc['place_category_price'];
   $sql = "INSERT INTO 067_reservations (user_id,place_id,date_in,date_out,price_per_day) VALUES
            ('$user_id', '$place_id', '$date_in', '$date_out', '$price_per_day') ";

   $query = "SELECT * FROM 067_reservations_view WHERE  user_id = '$user_id' AND date_in = '$date_in' AND date_out = '$date_out' ";         
   
   //make query and get result
    $result = mysqli_query($conn,  $sql);
    $resultSelect = mysqli_query($conn,$query); 
    $reservation = mysqli_fetch_assoc($resultSelect);  
    
    //clos connection to the db
    mysqli_close($conn);
    ?>