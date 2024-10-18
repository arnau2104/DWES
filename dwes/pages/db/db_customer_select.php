

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<?php
    
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_customer_select_all_customers.php');
    
?>
    <main class="flex flex-row flex-wrap">
        <?php 
        for($i = 0; $i < count($customer); $i++) {?>
        <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700  hover:scale-110 w-96">
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Customer Information</h2> 
            <p ><span class="font-bold">Customer ID:</span> <?php echo $customer[$i]['customer_id'];?></p>
            <p><span class="font-bold">Forename: </span> <?php echo $customer[$i]['forename'];?> </p> 
            <p><span class="font-bold">Lastname: </span>  <?php echo $customer[$i]['lastname'];?> </p>
            <p><span class="font-bold"> Username: </span> <?php echo $customer[$i]['username'];?> </p>
            <p><span class="font-bold"> Password: </span> <?php echo $customer[$i]['password']; ?></p>
            <p><span class="font-bold">NIF: </span> <?php echo $customer[$i]['nif']; ?> </p>
            <p><span class="font-bold">Email: </span>  <?php echo $customer[$i]['email']; ?></p>
            <p><span class="font-bold">Phone: </span> <?php echo $customer[$i]['phone']; ?> </p>
        </div>
        <?php }; ?>        
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
