<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

<style>
    .form-estrellas {
  width: 250px;
  margin: 0 auto;
  height: 50px;
}

.form-estrellas p {
  text-align: center;

}

.form-estrellas label {
  font-size: 30px;
}

.form-estrellas input[type="radio"] {
  display: none;
}

.form-estrellas label {
  color: grey;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

.form-estrellas label:hover,
.form-estrellas label:hover ~ label {
  color: orange;
}

.form-estrellas input[type="radio"]:checked ~ label {
  color: orange;
}

.form-estrellas input[type="radio"]:hover {
    cursor:pointer;
}

</style>

    <main class="relative">
       
    <div class="flex fixed right-0 px-2 py-1 z-20">
    <input type="text" id="search-box" placeholder="Search..." class="border-black border rounded-lg p-2">
    </div>

    <div class="main-content">
            
        <?php 
        include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php'); // include the functions file
    
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select.php');
         include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_show_check_in_check_out.php');
        
         //if the reservation_state is updated, show this message
         if(isset($_POST['submit_update_reservation_state'])) {
            include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_update_reservation_state.php');
            header('Location: /student067/dwes/pages/forms/form_reservation_select.php'); //temporal, change later to db_reservation_select
            exit();
        }else {
            if(empty($reservations)== true) {
                echo '<h1> Any reservation was founded</h1>';
            }elseif($reservations && (!isset($_POST['submit_check_in']))) { ?>
            
                <div class="flex justify-center flex-wrap gap-4 ">
                <?php foreach($reservations as $reservation){ ?>
                    <div class=" my-8 max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96 search-content">
                            <?php printReservation($reservation) ?>
                        <div class="flex gap-2">
                            <?php if(strcasecmp($reservation['reservation_state'],'check-out') == 0) { ?>
                                <form action="/student067/dwes/pages/invoice.php" method="POST">
                                    <input type="number" name="reservation_id" value ="<?php echo $reservation['reservation_id']; ?>" hidden>
                                    <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Show Invoice</button>
                                </form>
                            
                                <?php }; 
                                if(strcasecmp($reservation['reservation_state'],'check-out') != 0 && strcasecmp($reservation['reservation_state'],'cancelled') != 0 ){?>
                                    <form action="/student067/dwes/pages/forms/form_services2.php" method="post">
                                        <input type="text" name="reservation_id" value=" <?php echo $reservation['reservation_id'] ?>" hidden >
                                        <button type="submit" name="submit"  class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Book Services</button>
                                    </form>
                            <?php }; ?>  
                        </div> 
                        <?php if(strcasecmp($reservation['reservation_state'],'check-out') == 0){?>
                                <div class="flex flex-col mt-2 items-center div-review">
                            
                                    <button class=" bg-[#FBBF24] px-4 py-2 rounded-lg hover:bg-[#F59E0B] transition-colors duration-200 mt-2 p-2">Add Review</button>
                                    <div class="showHidde-add-review">
                                        <form class="form-estrellas">
                                            <p class="clasificacion">
                                                <input id="radio5_<?php echo $reservation['reservation_id']; ?>" type="radio" name="estrellas_<?php echo $reservation['reservation_id']; ?>" value="5">
                                                <label for="radio5_<?php echo $reservation['reservation_id']; ?>">★</label>

                                                <input id="radio4_<?php echo $reservation['reservation_id']; ?>" type="radio" name="estrellas_<?php echo $reservation['reservation_id']; ?>" value="4">
                                                <label for="radio4_<?php echo $reservation['reservation_id']; ?>">★</label>

                                                <input id="radio3_<?php echo $reservation['reservation_id']; ?>" type="radio" name="estrellas_<?php echo $reservation['reservation_id']; ?>" value="3">
                                                <label for="radio3_<?php echo $reservation['reservation_id']; ?>">★</label>

                                                <input id="radio2_<?php echo $reservation['reservation_id']; ?>" type="radio" name="estrellas_<?php echo $reservation['reservation_id']; ?>" value="2">
                                                <label for="radio2_<?php echo $reservation['reservation_id']; ?>">★</label>

                                                <input id="radio1_<?php echo $reservation['reservation_id']; ?>" type="radio" name="estrellas_<?php echo $reservation['reservation_id']; ?>" value="1">
                                                <label for="radio1_<?php echo $reservation['reservation_id']; ?>">★</label>
                                            </p>
                                        </form>
                                        <form action="/student067/dwes/pages/querys/query_review_insert.php" method="post" name="form-review" class="form-review">
                                        <input type="number" name="review_reservation_id" value ="<?php echo $reservation['reservation_id']; ?>" hidden>
                                            <textarea class="w-full p-4 rounded-md border" name="review_text" id="reservation_review" placeholder="Write a review about your stay at the hotel" oninput="autoResize(this)" maxlength="300"></textarea>
                                            <input type="text" class="review_score" name="review_score" value="1"  hidden>

                                            <button name="submit_review" class=" bg-[#22C55E] px-4 py-2 w-32 rounded-lg hover:bg-[#16A34A] transition-colors duration-200 mt-2 p-2">Publish</button>

                                        </form>
                                    </div>

                            
                        </div>
                        <?php }?>
                    </div>
               
        <?php } ?>
        </div>
       <?php  }}; ?>
        <?php
         if(isset($_POST['submit_check_in'])) { ?>
           <div class="flex flex-col justify-center">
    <!-- Check-ins for today -->
    <?php if ($reservations_checkin) { ?>
        <h1 class="text-4xl font-semibold text-center my-6 text-gray-800">Check-ins</h1>
        <div class="flex flex-wrap justify-center gap-6">
            <?php foreach ($reservations_checkin as $reservation) { ?>
                <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
                    <?php printReservation($reservation); ?>
                    <div class="mt-4">
                        <form action="/student067/dwes/pages/db/db_reservation_select.php" method="POST">
                            <input type="number" name="reservation_id" value="<?php echo $reservation['reservation_id']; ?>" hidden>
                            <input type="text" name="reservation_state" value="<?php echo $reservation['reservation_state']; ?>" hidden>
                            <button type="submit" name="submit_update_reservation_state" class="bg-blue-500 text-white px-5 py-2 rounded-full hover:bg-blue-600 transition-colors duration-200">Check in</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <h1 class="text-center text-xl text-gray-600 my-4">No check-ins for today</h1>
    <?php } ?>

    <!-- Check-outs for today -->
    <?php if ($reservations_checkout) { ?>
        <h1 class="text-4xl font-semibold text-center my-6 text-gray-800">Check-outs</h1>
        <div class="flex flex-wrap justify-center gap-6">
            <?php foreach ($reservations_checkout as $reservation) { ?>
                <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
                    <?php printReservation($reservation); ?>
                    <div class="mt-4">
                        <form action="/student067/dwes/pages/db/db_reservation_select.php" method="POST">
                            <input type="number" name="reservation_id" value="<?php echo $reservation['reservation_id']; ?>" hidden>
                            <input type="text" name="reservation_state" value="<?php echo $reservation['reservation_state']; ?>" hidden>
                            <button type="submit" name="submit_update_reservation_state" class="bg-red-500 text-white px-5 py-2 rounded-full hover:bg-red-600 transition-colors duration-200">
                                Check out
                            </button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <h1 class="text-center text-xl text-gray-600 my-4">No check-outs for today</h1>
    <?php } ?>
</div>

        <?php }; ?>   
    
        </div>
        
    </main>

   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>

<script>
   function autoResize(textarea) {
    textarea.style.height = 'auto'; // Restablece la altura para evitar acumulación
    textarea.style.height = textarea.scrollHeight + 'px'; // Ajusta la altura según el contenido

   }

   function getScore() {
    const divsReview = document.querySelectorAll(".div-review");

    divsReview.forEach(divReview => {
       

        const formScore = divReview.querySelector(".form-estrellas");
        const formReview = divReview.querySelector(".form-review");

        if (!formScore || !formReview) {  
            return; 
        }

        formScore.addEventListener("change", function (event) {
            if (event.target.type === "radio") {
                const estrellasSeleccionadas = event.target.value;
                const reviewScore = formReview.querySelector(".review_score");

                if (reviewScore) {
                    reviewScore.value = estrellasSeleccionadas + "";
                    console.log("Selected Value:", reviewScore.value);
                } else {
                    console.log("This form don't have score");
                }
            }
        });
    });
}
    document.addEventListener("DOMContentLoaded", function () {
        getScore();
   
    });

    document.querySelectorAll(".showHidde-add-review").forEach((element) => {
    element.addEventListener("click", function () {
        this.classList.toggle("showHidde-add-review"); 
        console.log("Clase showHidde-add-review toggled");
    });
});

</script>