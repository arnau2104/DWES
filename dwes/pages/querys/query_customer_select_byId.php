 <?php
     include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_local_connection.php')

// write query
    $customer_id = $_POST['customer_id'];
    $sql = "select * from customers where customer_id = '$customer_id'";
    
    //make query and get result
    
     $result = mysqli_query($conn,  $sql);

     $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);  
     //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
     
     ?>