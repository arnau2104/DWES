<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
   $user_id = htmlspecialchars($_POST['user_id']);
   $forename = htmlspecialchars($_POST['forename']);
   $lastname = htmlspecialchars($_POST['lastname']);
   $username = htmlspecialchars($_POST['username']);
   $password = htmlspecialchars($_POST['password']);
   $nif = htmlspecialchars($_POST['nif']);
   $email = htmlspecialchars($_POST['email']);
   $phone = htmlspecialchars($_POST['phone']);

   $sql = " UPDATE 067_users SET forename = '$forename', lastname = '$lastname', username = '$username', password = '$password', nif = '$nif', email = '$email', phone = '$phone' WHERE user_id = '$user_id' ";
   
   //make query and get result
    $result = mysqli_query($conn,  $sql); 

    //clos connection to the db
    mysqli_close($conn);
    ?>