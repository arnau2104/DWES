<?php
    //connect to databas
    $conn = mysqli_connect('localhost', 'root', '', 'hotel_managment_system');

    //check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    };

    // write query
    $username = $_POST["username"];
 
    
    $sql = "DELETE FROM customers WHERE username = '$username'";

    //make query and get result
    $result = mysqli_query($conn, $sql);        


?>






<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/copia/header.php');?>
<main>
<h1>Action file delete</h1>
</main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/copia/footer.php');?>