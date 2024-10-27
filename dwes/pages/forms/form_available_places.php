<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

    <main class="flex flex-col flex-wrap">
        <?php 
    
        //unclude the query
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_available_places.php');
        

        for($i = 0; $i < count($place); $i++) {?>
        <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700  hover:scale-110 w-96" id="<?php echo $place[$i]['place_id']?>">
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Place Information</h2> 
            <!-- <p ><span class="font-bold">Place ID:</span> <?php echo $place[$i]['place_id'];?></p> -->
            <p><span class="font-bold">Place Type: </span> <?php echo ucfirst($place[$i]['place_type_name']);?> </p> 
            <p><span class="font-bold">Place Capacity: </span>  <?php echo $place[$i]['place_capacity'];?> </p>
            <p><span class="font-bold"> Password: </span> <?php echo ucfirst($place[$i]['place_category_name']); ?></p>
            <p><span class="font-bold"> Place Price : </span> <?php echo $place[$i]['place_category_price'];?> </p>
        </div>
        <?php }; ?>
        
        <div class="flex justify-center">
            <form action="/student067/dwes/pages/db/db_reservation_insert.php" method="POST">
            <input type="number" name="place_id" id="input_id" hidden>
            <input type="date" name="date_in" value="<?php echo $_POST['date_in']?>" hidden>
            <input type="date" name="date_out" value="<?php echo $_POST['date_out']?>" hidden>
            <input type="text" name="username" value="<?php echo $_POST['username']?>" hidden>
            <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>   
        </form>  
        </div>  
    </main>
    <script src=  "/student067/dwes/js/choose_place_to_reservation.js"></script>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
