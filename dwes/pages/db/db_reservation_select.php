<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

    <main class="relative">
        
        <?php 
        // if(isset($_POST['submit_update_reservation_state'])) {
        //     include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_update_reservation_state.php');
        //     echo "Update done";
        // }
        ?>
        
        
        
        <?php 
        include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php'); // include the functions file
    
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select.php');
         include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_show_check_in_check_out.php');
        
         //if the reservation_state is updated, show this message
         if(isset($_POST['submit_update_reservation_state'])) {
            include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_update_reservation_state.php');
            echo "Update done";
        }else {
            if(empty($reservations)== true) {
                echo '<h1> Any reservation was founded</h1>';
            }elseif($reservations && (!isset($_POST['submit_check_in']))) { ?>
            
                <div class="flex justify-center flex-wrap gap-4">
                <?php foreach($reservations as $reservation){ ?>
                    <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
                            <?php printReservation($reservation) ?>
                        <div class="flex gap-2">
                            <?php if(strcasecmp($reservation['reservation_state'],'check-out') == 0) { ?>
                                <form action="/student067/dwes/pages/invoice.php" method="POST">
                                    <input type="number" name="reservation_id" value ="<?php echo $reservation['reservation_id']; ?>" hidden>
                                    <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Show Invoice</button>
                                </form>
                            
                                <?php }; ?>
                            <form action="/student067/dwes/pages/forms/form_services.php" method="post">
                                <input type="number" name="reservation_id" value= <?php echo $reservation['reservation_id'] ?> hidden>
                                <button type="submit" name="submit"  class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Book Services</button>
                            </form>
                        </div> 
                    </div>
               
        <?php } ?>
        </div>
       <?php  }}; ?>
        <?php
         if(isset($_POST['submit_check_in'])) { ?>
           <div class="flex flex-col justify-center">
    <!-- Check-ins for today -->
    <?php if ($reservations_checkin) { ?>
        <h1 class="text-4xl font-semibold text-center my-6 text-gray-800">Check-ins</h1>
        <div class="flex flex-wrap justify-center gap-6">
            <?php foreach ($reservations_checkin as $reservation) { ?>
                <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
                    <?php printReservation($reservation); ?>
                    <div class="mt-4">
                        <form action="/student067/dwes/pages/db/db_reservation_select.php" method="POST">
                            <input type="number" name="reservation_id" value="<?php echo $reservation['reservation_id']; ?>" hidden>
                            <input type="text" name="reservation_state" value="<?php echo $reservation['reservation_state']; ?>" hidden>
                            <button type="submit" name="submit_update_reservation_state" class="bg-blue-500 text-white px-5 py-2 rounded-full hover:bg-blue-600 transition-colors duration-200">Check in</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <h1 class="text-center text-xl text-gray-600 my-4">No check-ins for today</h1>
    <?php } ?>

    <!-- Check-outs for today -->
    <?php if ($reservations_checkout) { ?>
        <h1 class="text-4xl font-semibold text-center my-6 text-gray-800">Check-outs</h1>
        <div class="flex flex-wrap justify-center gap-6">
            <?php foreach ($reservations_checkout as $reservation) { ?>
                <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
                    <?php printReservation($reservation); ?>
                    <div class="mt-4">
                        <form action="/student067/dwes/pages/db/db_reservation_select.php" method="POST">
                            <input type="number" name="reservation_id" value="<?php echo $reservation['reservation_id']; ?>" hidden>
                            <input type="text" name="reservation_state" value="<?php echo $reservation['reservation_state']; ?>" hidden>
                            <button type="submit" name="submit_update_reservation_state" class="bg-red-500 text-white px-5 py-2 rounded-full hover:bg-red-600 transition-colors duration-200">
                                Check out
                            </button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <h1 class="text-center text-xl text-gray-600 my-4">No check-outs for today</h1>
    <?php } ?>
</div>

        <?php }; ?>   
    

        
    </main>
   
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
