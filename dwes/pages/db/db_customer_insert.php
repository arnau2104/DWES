<?php   
   include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_customer_insert.php');

?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main>
    <?php
    if(isset($_POST['submit'])) {
        echo htmlspecialchars($_POST['forename']) . '<br>';
        echo htmlspecialchars($_POST['lastname']) . '<br>';
        echo htmlspecialchars($_POST['nif']) . '<br>';
        echo htmlspecialchars($_POST['username']) . '<br>';
        echo htmlspecialchars($_POST['password']) . '<br>';
        echo htmlspecialchars($_POST['email']) . '<br>';
        echo htmlspecialchars($_POST['phone']) . '<br>';
    };
    ?>
</main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>