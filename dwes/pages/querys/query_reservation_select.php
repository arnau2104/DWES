<?php
       include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query

    if(isset($_SESSION['username']) && (in_array('customer',$_SESSION['rols'][0]) && (!in_array('admin',$_SESSION['rols'][0]) && !in_array('employee', $_SESSION['rols'][0])))) {
        $sqlSessionReservation = "SELECT * FROM 067_reservations_view WHERE username = '" .  $_SESSION['username'] . "';" ;
        $result = mysqli_query($conn, $sqlSessionReservation);
        
    } elseif(isset($_POST['submit']) && !empty($_POST['reservation_id'])) {

    
    $reservation_id = htmlspecialchars($_POST['reservation_id']);
    $sqlOneReservation = "SELECT * FROM 067_reservations_view WHERE reservation_id = '$reservation_id'";
    $result = mysqli_query($conn,   $sqlOneReservation);
   
    }else {
    $sqlAllReservations =  "SELECT * FROM 067_reservations_view ORDER BY reservation_id";
    $result = mysqli_query($conn, $sqlAllReservations);
    //make query and get result
    };
    // if(!empty($sqlSessionReservation)) {
    //     $result = mysqli_query($conn, $sqlSessionReservation);

    // }else {
    // if(empty(htmlspecialchars($_POST['reservation_id']))== true) {
    //     $result = mysqli_query($conn, $sqlAllReservations);
    // }else {
    //     $result = mysqli_query($conn,   $sqlOneReservation);
    // }};
     
    $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC); 

    //user = mysqli_fetch_assoc($result); cuando solo hay un valor  
    //print_r(user);
    ?>