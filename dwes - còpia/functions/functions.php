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


function writeLogFile($file, $text) {

   $handle =  fopen($file, 'a+');

   fwrite($handle, $text."\n");

   fclose($handle);
}
?>
 



 