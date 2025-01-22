<?php
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


    if(isset($_POST['submit_update_reservation_state'])){

// write query
    $reservation_id = htmlspecialchars($_POST['reservation_id']);
    if($_POST['reservation_state'] == 'check-in') {
        $reservation_state = 'check-out';
    }elseif ($_POST['reservation_state'] == 'book') {
        $reservation_state = 'check-in';
    }

    $sql = " UPDATE 067_reservations SET  reservation_state = '$reservation_state'  WHERE reservation_id = '$reservation_id' ";
    
    //make query and get result
        $result = mysqli_query($conn,  $sql); 

        //clos connection to the db
        mysqli_close($conn);
    }
    ?>