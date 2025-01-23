<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

    <main class="flex flex-col flex-wrap">
        <?php 
    
        //include the query
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_available_places.php');
        include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php');
        ?>
        
    <div class="flex flex-wrap justify-center  gap-4">
       <?php foreach($place as $place) {
        printPlaces($place);
         }; ?>
    </div>
        
       
    </main>
    <!-- <script src="/student067/dwes/js/choose_place_to_reservation.js"></script> -->
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
