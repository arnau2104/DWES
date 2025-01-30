<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

        $sql = "select * from 067_services";

        $result = mysqli_query($conn, $sql);
        $services = mysqli_fetch_all($result, MYSQLI_ASSOC); 

?>