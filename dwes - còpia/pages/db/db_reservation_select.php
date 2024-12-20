<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

    <main class="flex flex-row flex-wrap">
        <?php 
    
    
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select.php');
        
        if(empty($reservation)== true) {
            echo '<h1> Any reservation was founded with this ID</h1>';
        }else {
        for($i = 0; $i < count($reservation); $i++) {?>
        <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700  hover:scale-110 w-96">
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Reservation Information</h2> 
            <p ><span class="font-bold">Reservation ID:</span> <?php echo $reservation[$i]['reservation_id'];?></p>
            <p><span class="font-bold">Forename: </span> <?php echo $reservation[$i]['forename'];?> </p> 
            <p><span class="font-bold">Lastname: </span>  <?php echo $reservation[$i]['lastname'];?> </p>
            <p><span class="font-bold"> Place Type Name: </span> <?php echo $reservation[$i]['place_type_name'];?> </p>
            <p><span class="font-bold"> Place Category Name: </span> <?php echo $reservation[$i]['place_category_name']; ?></p>
            <p><span class="font-bold">Place Category Price: </span> <?php echo $reservation[$i]['place_category_price']; ?> </p>
        </div>
        <?php };}; ?>      
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
