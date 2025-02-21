<?php 


include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
if(!empty($_COOKIE['067_user_logged']) && empty($_SESSION['username'])) {?>
    <script>
      console.log("redirecting...");
      window.location.href = '/student067/dwes/pages/forms/form_customer_log_in.php';
      
    </script>
  <?php }?>
    <main>
        <div class="float-right max-w-3xl">
          <?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/067_accu_weather_panel.php'); ?>
        </div>
        <div class="flex flex-col items-center">
          <div class="flex flex-col justify-center content w-6/12 justify-self-center mt-6">
              <img src="/student067/dwes/images/hotel.jpg" class="rounded-lg" >
              <p class="pt-2">Welcome to Arnau's Hotel !! 
              We are delighted to welcome you to our beautiful hotel, located by the serene shores of Menorca. Here, you’ll find the perfect blend of comfort, tranquility, and breathtaking coastal views.
              Our dedicated team is here to ensure your stay is nothing short of extraordinary. Whether you’re here to relax, explore the island, or simply enjoy the sea breeze, we are at your service to meet any needs or special requests.
              Take some time to unwind in our facilities, savor the flavors of our local cuisine, and immerse yourself in the charm of Menorca’s coastline.</p>
          </div>
          <div class="mt-6 w-full">
            <?php include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/forms/form_reservation_choose_date.php') ?>
          </div>
        </div>
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>