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

   if(!empty($_FILES['user_image_path']['name']) ) {
        $file_extension = explode('.',$_FILES['user_image_path']['name']);
        move_uploaded_file($_FILES['user_image_path']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/student067/dwes/images/users/'. strtolower($username) . "." . $file_extension[1]);
        $user_image_path = "/student067/dwes/images/users/" .  strtolower($username) . "." . $file_extension[1];
   }else if(!empty($_POST['db_user_image_path'])){
        $user_image_path = $_POST['db_user_image_path'];
        
   }else {
        $user_image_path = "";
        echo "sense imatge";
   }
   $sql = " UPDATE 067_users SET forename = '$forename', lastname = '$lastname', username = '$username', password = '$password', nif = '$nif', email = '$email', phone = '$phone',  user_image_path = '$user_image_path' WHERE user_id = '$user_id' ";
   
   //make query and get result
    $result = mysqli_query($conn,  $sql); 

    //clos connection to the db
    mysqli_close($conn);
    ?>