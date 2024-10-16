<?php
    //connect to databas
    $conn = mysqli_connect('localhost', 'root', '', 'hotel_managment_system');

    //check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    };

    // write query
    $customer_id = $_POST['customer_id'];
    $sqlOneCustomer = "select * from customers where customer_id = '$customer_id'";
    $sqlAllCustomers =  "select * from customers";
    //make query and get result
    
    if(empty($_POST['customer_id'])== true) {
        $result = mysqli_query($conn,  $sqlAllCustomers);
    }else {
        $result = mysqli_query($conn,  $sqlOneCustomer);
    };
     
    $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
    //print_r($customer);
    
?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
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
