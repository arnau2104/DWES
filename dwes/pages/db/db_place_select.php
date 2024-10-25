<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

    <main class="flex flex-row flex-wrap">
        <?php 
    
        //unclude the query
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_place_select.php');
        

        for($i = 0; $i < count($place); $i++) {?>
        <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700  hover:scale-110 w-96">
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">place Information</h2> 
            <p ><span class="font-bold">Place ID:</span> <?php echo $place[$i]['place_id'];?></p>
            <p><span class="font-bold">Place Type: </span> <?php echo $place[$i]['place_type_name'];?> </p> 
            <p><span class="font-bold">Place Capacity: </span>  <?php echo $place[$i]['place_capacity'];?> </p>
            <p><span class="font-bold"> Password: </span> <?php echo $place[$i]['place_category_name']; ?></p>
            <p><span class="font-bold"> Place Price : </span> <?php echo $place[$i]['place_category_price'];?> </p>
        </div>
        <?php }; ?>        
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
