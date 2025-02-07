<?php 
include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');
$json = json_encode(file_get_contents('http://dataservice.accuweather.com/currentconditions/v1/305476?apikey=y9YjUYyZu62bklgymt0NecThs5NQvCq2&language=es-es'));
echo $json;

if($json) {
    $sql = "INSERT INTO 067_weather_api (api_id,doc_json) VALUES
            ('accuWeather', $json)";

    $result = mysqli_query($conn,$sql);

    if($result) {
        echo "insert succesfull";
    }
}

   ?>


