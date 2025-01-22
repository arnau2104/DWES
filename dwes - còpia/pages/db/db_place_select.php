<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

    <main class="flex flex-row flex-wrap">
        <?php 
    
        //unclude the query
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_place_select.php');
        

        for($i = 0; $i < count($place); $i++) {?>
        <div class="flex flex-col gap-2 my-8 max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
            <div>
                <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">place Information</h2> 
                <p ><span class="font-bold">Place ID:</span> <?php echo $place[$i]['place_id'];?></p>
                <p><span class="font-bold">Place Type: </span> <?php echo $place[$i]['place_type_name'];?> </p> 
                <p><span class="font-bold">Place Capacity: </span>  <?php echo $place[$i]['place_capacity'];?> </p>
                <p><span class="font-bold"> Password: </span> <?php echo $place[$i]['place_category_name']; ?></p>
                <p><span class="font-bold"> Place Price : </span> <?php echo $place[$i]['place_category_price'];?> </p>
            </div>
            <form action="/student067/dwes/pages/forms/form_place_update.php" method="post">
                <input type="number" name="place_id" value= <?php echo $place[$i]['place_id'] ?> hidden>
                <button type="submit" name="submit"  class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Update Place</button>
            </form>
        </div>
        <?php }; ?>        
    </main>


   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
