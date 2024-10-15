<?php
    //connect to databas
    $conn = mysqli_connect('localhost', 'root', '', 'hotel_managment_system');

    //check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    };

    // write query
    $customer_id = $_POST['customer_id'];
    $sql = "select * from customers where customer_id = '$customer_id'";

    //make query and get result
    $result = mysqli_query($conn, $sql);  
    $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
    print_r($customer);
    
?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
    <main>
       <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700">
            <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Customer Information</h2> 
            <p ><span class="font-bold">Customer ID:</span>  <?php  echo $customer[0]['customer_id'];?></p>
            <p><span class="font-bold">Forename: </span> <?php  echo $customer[0]['forename'];?></p>
            <p><span class="font-bold">Lastname: </span> <?php  echo $customer[0]['lastname'];?></p>
            <p><span class="font-bold"> Username: </span> <?php  echo $customer[0]['username'];?></p>
            <p><span class="font-bold"> Password: </span> <?php  echo $customer[0]['password'];?></p>
            <p><span class="font-bold">NIF: </span> <?php  echo $customer[0]['nif'];?></p>
            <p><span class="font-bold">Email: </span> <?php  echo $customer[0]['email'];?></p>
            <p><span class="font-bold">Phone: </span> <?php  echo $customer[0]['phone'];?></p>
        </div>
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
