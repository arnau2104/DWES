<?php
 
 include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php');

 // write query
 $forename = $_POST["forename"];
 $lastname = $_POST["lastname"];
 $username = $_POST["username"];
 $password = $_POST["password"];
 $nif = $_POST["nif"];
 $email = $_POST["email"];
 $phone = $_POST["phone"];
 
 $sql = "INSERT INTO customers (forename,lastname,username,password,nif,email,phone) VALUES
         ('$forename','$lastname','$username','$password','$nif','$email','$phone');";

 //make query and get result
 $result = mysqli_query($conn, $sql);        
?>