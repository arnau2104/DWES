<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

    <main class="flex flex-row flex-wrap">
        <?php 
    
    
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select.php');
         include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_show_check_in_check_out.php');
        
        if(empty($reservations)== true) {
            echo '<h1> Any reservation was founded with this ID</h1>';
        }elseif(isset($_POST['submit'])) {
        for($i = 0; $i < count($reservations); $i++) {?>
        <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700  hover:scale-110 w-96">
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Reservation Information</h2> 
            <p ><span class="font-bold">Reservation ID:</span> <?php echo $reservations[$i]['reservation_id'];?></p>
            <p><span class="font-bold">Forename: </span> <?php echo $reservations[$i]['forename'];?> </p> 
            <p><span class="font-bold">Lastname: </span>  <?php echo $reservations[$i]['lastname'];?> </p>
            <p><span class="font-bold"> Place Type Name: </span> <?php echo $reservations[$i]['place_type_name'];?> </p>
            <p><span class="font-bold"> Place Category Name: </span> <?php echo $reservations[$i]['place_category_name']; ?></p>
            <p><span class="font-bold">Place Category Price: </span> <?php echo $reservations[$i]['place_category_price']; ?> </p>
            <p><span class="font-bold">Date In: </span> <?php echo $reservations[$i]['date_in']; ?> </p>
            <p><span class="font-bold">Date Out: </span> <?php echo $reservations[$i]['date_out']; ?> </p>
            <p><span class="font-bold">Reservation State: </span> <?php echo $reservations[$i]['reservation_state']; ?> </p>
            <div class="flex gap-2">
                <?php if(strcasecmp($reservations[$i]['reservation_state'],'check-out') == 0) { ?>
                    <form action="/student067/dwes/pages/invoice.php" method="POST">
                        <input type="number" name="reservation_id" value ="<?php echo $reservations[$i]['reservation_id']; ?>" hidden>
                        <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Show Invoice</button>
                    </form>
                
                    <?php }; ?>
            <form action="/student067/dwes/pages/forms/form_services.php" method="post">
                    <input type="number" name="reservation_id" value= <?php echo $reservations[$i]['reservation_id'] ?> hidden>
                    <button type="submit" name="submit"  class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Book Services</button>
            </form>
           </div> 
        </div>
        <?php }}; ?>
        <?php
        //checkins for today
        foreach($reservations_checkin as $reservation) {?>
            <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700  hover:scale-110 w-96">
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
                
            </div>
            <?php }; ?>    
            
            
            <?php
        //checkouts for today
        foreach($reservations_checkout as $reservation) {?>
            <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700  hover:scale-110 w-96">
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
                
            </div>
            <?php }; ?>   
    

        
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
