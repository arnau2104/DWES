<?php
       include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

       $serviceId = $_POST['serviceId'];
       $rsDate = $_POST['rsDate'];
       $qty = $_POST['qty'];

       $sql = "SELECT * FROM 067_service_availability_view WHERE service_id = '$serviceId' AND rs_date = '$rsDate' AND available_capacity < $qty";

       $result = mysqli_query($conn, $sql);
       $notAvailableHours = mysqli_fetch_all($result, MYSQLI_ASSOC);

       $sql2 = "SELECT * FROM 067_services WHERE service_id = '$serviceId'";

       $result2 = mysqli_query($conn, $sql2);
       $service = mysqli_fetch_assoc($result2); 
       $serviceHours = json_decode($service['schedule_json'], true);
     

    foreach ($serviceHours as $serviceHour) {
        $available = true;
    
       
        foreach ($notAvailableHours as $notAvailableHour) {
            if ($serviceHour == $notAvailableHour['rs_time']) {
                $available = false;
                break;
            }
        }
    
       
        if ($available) { 
            echo "<option value='$serviceHour'>$serviceHour</option>";
        }
    }
       


?>