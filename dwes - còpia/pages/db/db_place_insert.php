<?php   
   include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_place_insert.php');

?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main>
    <?php
    if(isset($_POST['submit'])) {
        echo "Place Type ID: " . htmlspecialchars($_POST['place_type_id']) . '<br>';
        echo "Place Category ID: " . htmlspecialchars($_POST['place_category_id']) . '<br>';
        echo "Place Capacity: " . htmlspecialchars($_POST['place_capacity']) . '<br>';
    };
    ?>
</main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>