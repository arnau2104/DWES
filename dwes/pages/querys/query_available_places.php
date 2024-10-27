<?php
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

// write query
    $date_in = $_POST['date_in'];
    $date_out = $_POST['date_out'];

    $available_places = "SELECT * 
                        FROM 067_places_view
                        WHERE place_id NOT IN (SELECT place_id
                                                FROM 067_reservations_view
                                                WHERE date_in < '$date_out'
                                                AND date_out > '$date_in') AND status=1
                        
                        GROUP BY place_category_id";
     
     $result = mysqli_query($conn,  $available_places); 
    $place = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
    ?>