<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  
    <main class="flex flex-row flex-wrap">
        <?php 
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_review_select.php');
        include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php');  ?>


        <div class="flex gap-2 items-center justify-center">
            <?php  foreach ($reviews as $review) { 
                $stars="";
                ?>
                
                <div class="p-4 shadow-lg rounded-lg">
                    <div><p><?php echo $review['forename'] . ' ' . $review['lastname']; ?></p></div>
                    <p><?php for($i = 0; $i < $review['review_score']; $i++) {
                            $stars.= '★';
                    } ;
                    echo $stars?></p>
                    <p><?php echo $review['review_text']; ?></p>
                </div>
            <?php } ?>
        </div>
              
    </main>
   

   <?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
