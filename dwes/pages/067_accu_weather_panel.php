<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
 
 include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_weather_api_select.php');
 include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php'); 
//  json_decode($weathers,true);
?>

<main>

<div>
    <?php foreach($weathers as $weather) { 
        $decodedWeather = json_decode($weather['doc_json'], true);
       
        $temperature = $decodedWeather[0]["Temperature"]["Metric"]["Value"];
        echo $temperature;
         printWeather($weather);

     } ?>
</div>

</main>
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
