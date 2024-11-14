<?php
include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
    unset($_SESSION['username']);
    unset($_SESSION['rols']);

header('Location: /student067/dwes/index.php');
    

     include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');

     ?>