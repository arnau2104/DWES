<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

        if(isset($_POST['submit'])) {

        $reservation_id = $_POST['reservation_id'];
        $service_id = $_POST['service_id'];
        $qty = $_POST['qty'];
        $rs_date = $_POST['rs_date'];
        $rs_time = $_POST['rs_time'];
        $rs_unit_price = $_POST['rs_unit_price'];

        $sql = "INSERT INTO 067_reservationS_services (reservation_id,service_id,qty,rs_unit_price,rs_date,rs_time,rs_state) VALUES
                ('$reservation_id','$service_id','$qty','$rs_unit_price','$rs_date','$rs_time','booked'); ";

        $result = mysqli_query($conn, $sql);

        if($result) {
                if(mysqli_affected_rows($conn) > 0) {
                        $reservations_services = true;
                }
        }
        
}

?>