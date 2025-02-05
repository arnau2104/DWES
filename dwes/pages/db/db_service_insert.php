<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
      include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_service_insert.php');?>

<main>

    <?php if($reservations_services == true) {?>
        <h1>Service booked succesfully</h1>
    <?php }else {?>
        <h1>Error booking this service, try again!</h1>
    <?php } ?>

</main>

<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
