<?php
include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

if(isset($_POST['submit_check_in'])) {
    $date_in = htmlspecialchars($_POST['date_in']);
    $date_out = htmlspecialchars($_POST['date_out']);

    // $sql = "SELECT * FROM 067_reservations 
    //         WHERE reservation_state = 'book' OR reservation_state = 'check-in' 
    //         AND date_in BETWEEN $date_in AND $date_out 
    //         AND date_out BETWEEN $date_in AND $date_out;";

    // $result = mysqli_query($conn,$sql);
    // $reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Clientes que entran hoy
    $sql = "SELECT * FROM 067_reservations_view 
    WHERE reservation_state = 'book' 
    AND date_in BETWEEN '$date_in' AND '$date_out' ;";

    $result = mysqli_query($conn,$sql);
    $reservations_checkin = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //  print_r($reservations_checkin);
    //  echo '<hr>';

    //Clientes que salen hoy
    $sql = "SELECT * FROM 067_reservations_view 
    WHERE reservation_state = 'check-in' 
    AND date_out BETWEEN '$date_in' AND '$date_out';";

    $result = mysqli_query($conn,$sql);
    $reservations_checkout = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //  print_r($reservations_checkout);
    //  echo '<hr>';
    
}


?>