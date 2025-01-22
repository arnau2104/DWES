 <?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
if(isset($_SESSION['username']) && (in_array('customer',$_SESSION['rols'][0]) && (!in_array('admin',$_SESSION['rols'][0]) && !in_array('employee', $_SESSION['rols'][0])))) {
    $sqlSessionUser = "SELECT * FROM 067_users WHERE username = '" .  $_SESSION['username'] . "';" ;

    
} else {
    $user_id = htmlspecialchars($_POST['user_id']);
    $sql = "select * from 067_users where user_id = '$user_id' AND status=1 ";
}
    //make query and get result

    if(!empty($sqlSessionUser)) {
        $result = mysqli_query($conn, $sqlSessionUser);
    }else {
     $result = mysqli_query($conn,  $sql);
    }
     $user = mysqli_fetch_all($result, MYSQLI_ASSOC);  
     //user = mysqli_fetch_assoc($result); cuando solo hay un valor  
     
     ?>