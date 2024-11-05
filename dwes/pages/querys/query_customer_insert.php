<?php
 
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


 // write query
 $forename = htmlspecialchars($_POST["forename"]);
 $lastname = htmlspecialchars($_POST["lastname"]);
 $username = htmlspecialchars($_POST["username"]);
 $password = htmlspecialchars($_POST["password"]);
 $nif = htmlspecialchars($_POST["nif"]);
 $email = htmlspecialchars($_POST["email"]);
 $phone = htmlspecialchars($_POST["phone"]);
 
 $sql = "INSERT INTO 067_customers (forename,lastname,username,password,nif,email,phone) VALUES
         ('$forename','$lastname','$username','$password','$nif','$email','$phone');";

 //make query and get result
 $result = mysqli_query($conn, $sql);        
?>