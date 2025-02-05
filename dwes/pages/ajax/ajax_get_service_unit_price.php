<?php

include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

       $serviceId = $_POST['serviceId'];

    $sql = "SELECT service_unit_price FROM 067_services WHERE service_id = '$serviceId'";
    $result = mysqli_query($conn,$sql);
    $service_unit_price = mysqli_fetch_assoc($result);
      
    echo $service_unit_price['service_unit_price'] ?? 'undefined';

?>