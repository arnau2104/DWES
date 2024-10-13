<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
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
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>