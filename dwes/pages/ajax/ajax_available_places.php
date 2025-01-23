<?php
       include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');
       include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php');

    //data come from js
       $date_in = htmlspecialchars($_POST['date_in']);
       $date_out = htmlspecialchars($_POST['date_out']);

       setCookie("date_in" , $date_in, time() + 86400, "/");
        setCookie("date_out" , $date_out, time() + 86400, "/");

       $available_places = "SELECT * 
                        FROM 067_places_view
                        WHERE place_id NOT IN (SELECT place_id
                                                FROM 067_reservations_view
                                                WHERE date_in < '$date_out'
                                                AND date_out > '$date_in') AND status=1
                        
                        GROUP BY place_category_id";
     
     $result = mysqli_query($conn,  $available_places); 
    $places = mysqli_fetch_all($result, MYSQLI_ASSOC); 

         // $hint = "";

    if(count($places) > 0) {
        foreach($places as $place) {
            printPlaces($place);
        }
    }

    // echo count($places) === 0 ? "no suggestion" : $hint;
    // $hint = "";

?>