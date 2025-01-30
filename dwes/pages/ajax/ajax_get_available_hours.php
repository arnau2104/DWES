<?php
       include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

       $serviceId = $_POST['serviceId'];
       $rsDate = $_POST['rsDate'];
       $qty = $_POST['qty'];

       $sql = "SELECT * FROM 067_service_availability_view WHERE service_id = '$serviceId' AND rs_date = '$rsDate' AND available_capacity < $qty";

       $result = mysqli_query($conn, $sql);
       $notAvailableHours = mysqli_fetch_all($result, MYSQLI_ASSOC)

       $sql2 = "SELECT * FROM 067_services WHERE service_id = '$serviceId'";

       $result2 = mysqli_query($conn, $sql);
       $serviceHours = mysqli_fetch_all($result, MYSQLI_ASSOC);

       foreach ($serviceHours as $serviceHour) {
        $available = true;
        if($notAvailableHours) {
            foreach($serviceHour as $notAvailableHour) {
                if(in_array($serviceHour, $notAvailableHour['rs_time'])) {
                    $available = false;
                }
            }
        }

            if($available == true) { ?>
                <option value="<?php echo $serviceHour ?>"><?php echo $serviceHour ?></option>
          <?php  } 
       }
       
       


?>