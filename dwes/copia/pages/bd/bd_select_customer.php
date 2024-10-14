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
    print_r($customer);
    
?>