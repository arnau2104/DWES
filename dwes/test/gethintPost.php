<?php
       include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

       $forename = $_POST['firstName'];
       $sqlAllCustomers =  "select * from 067_users WHERE status=1 AND INSTR(rols, 'customer') AND CONCAT(forename, ' ', lastname) LIKE '%$forename%';";
       $result = mysqli_query($conn,  $sqlAllCustomers);
       $users = mysqli_fetch_all($result, MYSQLI_ASSOC);  

       $hint = "";

       if(!empty($forename)) {
        foreach($users as $user) {
            
            if($hint === "") {
                $hint = $user['forename']." ".$user['lastname'];
            }else {
                $hint .= " , ". $user['forename']." ".$user['lastname'];
            }
        }
       }

       // Output "no suggestion" if no hint was found or output correct values
echo count($users) === 0 ? "no suggestion" : $hint;
$hint = "";
?>