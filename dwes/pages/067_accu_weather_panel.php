 <?php  //include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php'); 
 
 include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_weather_api_select.php');
 include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php'); 
//  json_decode($weathers,true);
?>


<?php if($weathers){?>
    <div class="flex gap-2 p-2 m-4  max-w-lg rounded-lg">
        <?php foreach($weathers as $weather) { 
            $decodedWeather = json_decode($weather['doc_json'], true);
        
            $temperature = $decodedWeather[0]["Temperature"]["Metric"]["Value"]; ?>
        
        
                <?php printWeather($decodedWeather,false,true); ?>
            

        <?php } ?>
    </div>
<?php } ?>



