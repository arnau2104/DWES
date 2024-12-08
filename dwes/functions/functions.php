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
   <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Reservation Information</h2> 
   <p ><span class="font-bold">Reservation ID:</span> <?php echo $reservation['reservation_id'];?></p>
   <p><span class="font-bold">Forename: </span> <?php echo $reservation['forename'];?> </p> 
   <p><span class="font-bold">Lastname: </span>  <?php echo $reservation['lastname'];?> </p>
   <p><span class="font-bold"> Place Type Name: </span> <?php echo $reservation['place_type_name'];?> </p>
   <p><span class="font-bold"> Place Category Name: </span> <?php echo $reservation['place_category_name']; ?></p>
   <p><span class="font-bold">Place Category Price: </span> <?php echo $reservation['place_category_price']; ?> </p>
   <p><span class="font-bold">Date In: </span> <?php echo $reservation['date_in']; ?> </p>
   <p><span class="font-bold">Date Out: </span> <?php echo $reservation['date_out']; ?> </p>
   <p><span class="font-bold">Reservation State: </span> <?php echo $reservation['reservation_state']; ?> </p>
   <?php
   
}
?>
 



