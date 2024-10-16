<?php
    //connect to databas
    $conn = mysqli_connect('localhost', 'root', '', 'hotel_managment_system');

    //check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    };

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






<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/copia/header.php');?>
<main>
    <?php
    if(isset($_POST['submit'])) {
        echo $_POST['forename'] . '<br>';
        echo $_POST['lastname'] . '<br>';
        echo $_POST['nif'] . '<br>';
        echo $_POST['username'] . '<br>';
        echo $_POST['password'] . '<br>';
        echo $_POST['email'] . '<br>';
        echo $_POST['phone'] . '<br>';
    };
    ?>
</main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/copia/footer.php');?>