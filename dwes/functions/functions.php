<?php
function asingSessionRols ($user) {
         // if rolss is not empty
         if(!empty($user['rols'])) {
            $rols =  explode(',', $user['rols']);
            // for($i = 0; $i < count($rols); $i++) {
               $_SESSION['rols'][] = $rols;
            // }
         }else {
            echo "This user don't have any role";
         };
         };

function datediff ($date_in,$date_out) {
   $dateIn = new DateTime($date_in);
   $dateOut = new DateTime($date_out); 
   $diff = $dateIn->diff($dateOut);
   return $diff->d;
 };
?>
<?php
function printReservation ($reservation) { ?>
   <h2  data-reservation="<?php echo htmlspecialchars(json_encode($reservation), ENT_QUOTES, 'UTF-8')?>"  class="reservation-title text-2xl font-bold text-center text-blue-600 mb-4">Reservation Information</h2> 
   <p><span class="font-bold">Reservation ID:</span class="reservation_content"> <span><?php echo $reservation['reservation_id'];?></span></p>
   <p><span class="font-bold">Forename: </span> <span class="reservation_content"> <?php echo $reservation['forename'];?> </span></p> 
   <p><span class="font-bold">Lastname: </span> <span class="reservation_content">  <?php echo $reservation['lastname'];?> </span></p>
   <p><span class="font-bold"> Place Type Name: </span> <span class="reservation_content"> <?php echo $reservation['place_type_name'];?></span> </p>
   <p><span class="font-bold"> Place Category Name: </span> <span class="reservation_content"> <?php echo $reservation['place_category_name']; ?> </span></p>
   <p><span class="font-bold">Place Category Price: </span> <?php echo $reservation['place_category_price']; ?> </p>
   <p><span class="font-bold">Date In: </span> <span class="reservation_content"> <?php echo $reservation['date_in']; ?> </span> </p>
   <p><span class="font-bold">Date Out: </span> <span class="reservation_content"> <?php echo $reservation['date_out']; ?> </span></p>
   <p><span class="font-bold">Reservation State: </span> <span class="reservation_content"> <?php echo $reservation['reservation_state']; ?> </span></p>
   <?php
   
}

function printCustomer($customer) { ?>
   <div class="flex flex-col gap-2 my-8 max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
   <div class="">
       <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Customer Information</h2> 
       <p ><span class="font-bold">Customer ID:</span> <?php echo $customer['user_id'];?></p>
       <p><span class="font-bold">Forename: </span> <?php echo $customer['forename'];?> </p> 
       <p><span class="font-bold">Lastname: </span>  <?php echo $customer['lastname'];?> </p>
       <p><span class="font-bold"> Username: </span> <?php echo $customer['username'];?> </p>
       <p><span class="font-bold"> Password: </span> <?php echo $customer['password']; ?></p>
       <p><span class="font-bold">NIF: </span> <?php echo $customer['nif']; ?> </p>
       <p><span class="font-bold">Email: </span>  <?php echo $customer['email']; ?></p>
       <p><span class="font-bold">Phone: </span> <?php echo $customer['phone']; ?> </p>
   </div>
   <form action="/student067/dwes/pages/forms/form_customer_update.php" method="post">
       <input type="number" name="user_id" value= <?php echo $customer['user_id'] ?> hidden>
       <button type="submit" name="submit"  class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Update Customer</button>
   </form>
</div>
<?php
}


function printPlaces($place) { ?>
   <div class="flex items-center m-4">
           
   <img class="w-96 h-64 rounded-lg" <?php echo "src='/student067/dwes/images/" . $place['place_category_name'] ."_room.jpg'" ?> alt="">

<div class="w-full h-full choose_place  max-w-md  bg-white p-6 rounded-lg shadow-md  shadow-gray-700  hover:scale-110 w-96">
   <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Place Information</h2> 
   <!-- <p ><span class="font-bold">Place ID:</span> <?php /*echo $place[$i]['place_id'];*/?></p> -->
   <p><span class="font-bold">Place Type: </span> <?php echo ucfirst($place['place_type_name']);?> </p> 
   <p><span class="font-bold">Place Capacity: </span>  <?php echo $place['place_capacity'];?> </p>
   <p><span class="font-bold"> Password: </span> <?php echo ucfirst($place['place_category_name']); ?></p>
   <p><span class="font-bold"> Place Price : </span> <?php echo $place['place_category_price'];?> </p>
   <div class="flex justify-center">
       <form action="/student067/dwes/pages/db/db_reservation_insert.php" method="POST">
           <input type="number" name="place_id" id="place_id_input" value ="<?php echo $place['place_id']?>" hidden>
           <input type="date" name="date_in" value="<?php echo htmlspecialchars($_POST['date_in'])?>" hidden>
           <input type="date" name="date_out" value="<?php echo htmlspecialchars($_POST['date_out'])?>" hidden>                        
           <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>   
       </form>  
   </div>  
</div>
</div>
<?php
}


function writeLogFile($file, $text) {

   $handle =  fopen($file, 'a+');

   fwrite($handle, $text."\n");

   fclose($handle);
}


function printWeather($wheather, $onlyShowToday,$showAlldays) { 
   $date = new DateTime();
   $date = date_timestamp_set($date,$wheather[0]["EpochTime"]);
   $date = date_format($date, 'Y-m-d'); 
   $icon = "";
   if($wheather[0]["WeatherIcon"] <=4 && $wheather[0]["WeatherIcon"] >= 1 ) {
      $icon = "wi-day-sunny";
   }else if($wheather[0]["WeatherIcon"] == 5) {
      $icon = "wi-day-cloudy";
   }elseif (($wheather[0]["WeatherIcon"] >=6 && $wheather[0]["WeatherIcon"] <=11) || $wheather[0]["WeatherIcon"] >= 20 && $wheather[0]["WeatherIcon"] <=26 || $wheather[0]["WeatherIcon"] == 32 )   {
      $icon = "wwi-cloudy";
   }elseif ($wheather[0]["WeatherIcon"] >= 12 && $wheather[0]["WeatherIcon"] <=17) {
      $icon = "wi-day-rain-mix";
   }elseif($wheather[0]["WeatherIcon"] == 18 || $wheather[0]["WeatherIcon"] == 29 ){
      $icon = "wi-rain";
   }elseif($wheather[0]["WeatherIcon"] >= 33 && $wheather[0]["WeatherIcon"] <= 38) {
      $icon = "wi-night-alt-cloudy";
   }elseif ($wheather[0]["WeatherIcon"] >= 39 && $wheather[0]["WeatherIcon"] <= 44) {
      $icon = "wi-night-alt-slee";
   }else {
      $icon = "";
   }

   $today = new DateTime();
   $today = date_format($today, "Y-m-d");

   if($onlyShowToday && $date == $today){?>
   <div class="  max-w-md  bg-white shadow-lg rounded-lg overflow-hidden">
         <div class="px-6 py-4">
               <h1 class="text-xl font-semibold text-gray-800">Date: <?php echo $date; ?></h1>
               <div class="flex items-center mt-4">
                  <i class="wi <?php echo $icon;?> text-4xl text-blue-500 ml-2"></i>
               </div>
               <h1 class="text-lg text-gray-600 mt-2"><span class="font-bold">Temperature:</span> <?php echo $wheather[0]["Temperature"]["Metric"]["Value"] . $wheather[0]["Temperature"]["Metric"]["Unit"];?></h1>
               <h1 class="text-lg text-gray-600 mt-2"><span class="font-bold">Precipitations:</span> <?php echo $wheather[0]["PrecipitationType"] ?? " no rain expected" ;?> </h1>
         </div>
   </div> 
<?php }elseif(!$onlyShowToday && $showAlldays) { ?>
   <div class="  max-w-md  bg-white shadow-lg rounded-lg overflow-hidden">
         <div class="px-6 py-4">
               <h1 class="text-xl font-semibold text-gray-800">Date: <?php echo $date; ?></h1>
               <div class="flex items-center mt-4">
                  <i class="wi <?php echo $icon;?> text-4xl text-blue-500 ml-2"></i>
               </div>
               <h1 class="text-lg text-gray-600 mt-2"><span class="font-bold">Temperature:</span> <?php echo $wheather[0]["Temperature"]["Metric"]["Value"] . $wheather[0]["Temperature"]["Metric"]["Unit"];?></h1>
               <h1 class="text-lg text-gray-600 mt-2"><span class="font-bold">Precipitations:</span> <?php echo $wheather[0]["PrecipitationType"] ?? " no rain expected" ;?> </h1>
         </div>
   </div> 
<?php }
 }
 
?>


 