<?php
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');

       
        $sql = "SELECT * FROM 067_reviews_view;";

        $result = mysqli_query($conn,$sql);
        $reviews = mysqli_fetch_all($result,MYSQLI_ASSOC);


       
               
               
               
                
 ?>
        