<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query


   
    $sql = "select * from 067_reservations_view WHERE reservation_id = '$reservation_id'";
    
    //make query and get result
    
     $result = mysqli_query($conn,  $sql);

     $reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);  
     //user = mysqli_fetch_assoc($result); cuando solo hay un valor  

     
     ?>