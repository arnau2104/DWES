<?php
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');
    $sql = "SELECT * FROM 067_weather_api WHERE api_id = 'accuWeather' LIMIT 5";

    $result = mysqli_query($conn,$sql);
    $weathers = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>