<?php
       include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
    $customer_id = htmlspecialchars($_POST['customer_id']);
    $sqlOneCustomer = "select * from 067_customers where customer_id = '$customer_id' AND status=1 ";
    $sqlAllCustomers =  "select * from 067_customers WHERE status=1";
    //make query and get result
    
    if(empty(htmlspecialchars($_POST['customer_id']))== true) {
        $result = mysqli_query($conn,  $sqlAllCustomers);
    }else {
        $result = mysqli_query($conn,  $sqlOneCustomer);
    };
     
    $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
    //print_r($customer);
    ?>