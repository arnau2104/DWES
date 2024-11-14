<?php
       include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
    $user_id = htmlspecialchars($_POST['user_id']);
    $sqlOneCustomer = "select * from 067_users where user_id = '$user_id' AND status=1 AND rols = 'customer' ";
    $sqlAllCustomers =  "select * from 067_users WHERE status=1 AND rols = 'customer'";
    //make query and get result
    
    if(empty(htmlspecialchars($_POST['user_id']))== true) {
        $result = mysqli_query($conn,  $sqlAllCustomers);
    }else {
        $result = mysqli_query($conn,  $sqlOneCustomer);
    };
     
    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //user = mysqli_fetch_assoc($result); cuando solo hay un valor  
    //print_r(user);
    ?>