<?php

   include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

   include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
   include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php');

     // write query
     $username = htmlspecialchars($_POST["username"]);
     $password = htmlspecialchars($_POST["password"]);
    
       
     $sql = "SELECT * FROM 067_users WHERE username = '$username' AND `password` = '$password'";
   
     //make query and get result
     $result = mysqli_query($conn, $sql);   
     $user = mysqli_fetch_assoc($result);
     //clos connection to the db
     

     if(empty($user) == false) {

       $_SESSION['username'] = $user['username'];
       $_SESSION['user_image_path'] = $user['user_image_path'] ? $_SERVER['DOCUMENT_ROOT'].'/student067/dwes/images/users/user_profile_image_default.jpg';
      asingSessionRols($user);
      header('Location: /student067/dwes/index.php');           
    
     }else {
        echo 'error al hacer log in';
     };
    mysqli_close($conn);

     include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');

   
?>