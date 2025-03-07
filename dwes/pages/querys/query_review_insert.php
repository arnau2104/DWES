<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/BadWordsFilter.php');

        $bad_words_filter = new BadWordsFilter();

        if(isset($_POST['submit_review'])) {
                $review_text = htmlspecialchars($_POST['review_text']);
                $review_reservation_id = htmlspecialchars($_POST['review_reservation_id']);
                $review_score = htmlspecialchars($_POST['review_score']);
                $review_status = $bad_words_filter->check($review_text) ? 1 : 0;

                // echo "Status: $status";

                $sql = "INSERT INTO 067_reviews (review_reservation_id,review_text,review_score,review_status) VALUES
                        ('$review_reservation_id','$review_text','$review_score',$review_status);";

                $result = mysqli_query($conn,$sql);
               
               
                 if($result) {  ?>
                        <script>
                                window.location.href = "/student067/dwes/index.php";
                        </script>
                 <?php } else {
                        echo "Error on review insert";
                 } 
                
        } ?>
        