<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

        if(isset($_POST['submit_review'])) {
                $review_text = htmlspecialchars($_POST['review_text']);
                $review_reservation_id = htmlspecialchars($_POST['review_reservation_id']);
                $review_score = htmlspecialchars($_POST['review_score']);

                $sql = "INSERT INTO 067_reviews (review_reservation_id,review_text,review_score,status) VALUES
                        ('$review_reservation_id','$review_text','$review_score',1);";

                $result = mysqli_query($conn,$sql);
               
               
                 if($result) {  ?>
                        <script>
                                window.location.href = "/student067/dwes/index.php";
                        </script>
                 <?php } else {
                        echo "Error on review insert";
                 } 
                
        } ?>
        