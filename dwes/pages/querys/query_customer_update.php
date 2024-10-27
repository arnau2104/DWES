<?php
     include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

// write query
   $customer_id = $_POST['customer_id'];
   $forename = $_POST['forename'];
   $lastname = $_POST['lastname'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $nif = $_POST['nif'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];

   $sql = " UPDATE 067_customers SET forename = '$forename', lastname = '$lastname', username = '$username', password = '$password', nif = '$nif', email = '$email', phone = '$phone' WHERE customer_id = '$customer_id' ";
   
   //make query and get result
    $result = mysqli_query($conn,  $sql); 

    //clos connection to the db
    mysqli_close($conn);
    ?>