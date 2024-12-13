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
<!-- <h1 data-reservation="<?php// htmlspecialchars(print_r($reservation));?>" class="hidden"></h1> -->
   <h2 data-reservation="<?php print_r($reservation);?>"  class="text-2xl font-bold text-center text-blue-600 mb-4">Reservation Information</h2> 
   <p ><span class="font-bold">Reservation ID:</span class="reservation_content"> <span><?php echo $reservation['reservation_id'];?><span></p>
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
?>
 



