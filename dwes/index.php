<?php 
  $referer = $_SERVER['HTTP_REFERER'] ?? 'fuera';
  

include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
if(isset($_COOKIE['067_user_logged']) && !isset($_SESSION['username']) && $referer == 'fuera') {?>
    <script>
      console.log("redirecting...");
       window.location.href = '/student067/dwes/pages/forms/form_customer_log_in.php';
      
    </script>
  <?php }?>
    <main>
        <div class="float-right max-w-3xl p-4">
          <button id="showWeather" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-600 transition-colors duration-300">
          
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
            </svg>
            
          </button>
          <div id="weather-div">
            <?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/067_accu_weather_panel.php'); ?> 
          </div>
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

      <div class="flex flex-col  items-center gap-4">
        <h2 class="font-bold text-2xl">Reviews from our clients</h2>
        <hr class="border-t-2 border-gray-200 w-full">
      <?php include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/db/db_review_select.php') ?>
      </div>

        </div>
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>

   <script>
    document.getElementById("showWeather").addEventListener('click',function () {
      document.getElementById("weather-div").classList.toggle("hidden");

      if(document.getElementById("weather-div").classList.contains("hidden")) {
        this.innerHTML =`<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>`;

      }else if (!document.getElementById("weather-div").classList.contains("hidden")) {
        this.innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
            </svg>
`;
      }

    })
   </script>