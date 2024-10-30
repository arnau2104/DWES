 <?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');


// write query
    $customer_id = $_POST['customer_id'];
    $sql = "select * from 067_customers where customer_id = '$customer_id' AND status=1";
    
    //make query and get result
    
     $result = mysqli_query($conn,  $sql);

     $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);  
     //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
     
     ?>