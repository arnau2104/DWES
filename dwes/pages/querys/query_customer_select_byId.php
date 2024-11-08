 <?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
    $user_id = htmlspecialchars($_POST['user_id']);
    $sql = "select * from 067_users where user_id = '$user_id' AND status=1 AND rol = 'customer'";
    
    //make query and get result
    
     $result = mysqli_query($conn,  $sql);

     $user = mysqli_fetch_all($result, MYSQLI_ASSOC);  
     //user = mysqli_fetch_assoc($result); cuando solo hay un valor  
     
     ?>