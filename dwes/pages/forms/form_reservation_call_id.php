<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main class="container mx-auto py-8 flex flex-wrap gap-0.5">
<?php
if(isset($_SESSION['username']) && (in_array('customer',$_SESSION['rols'][0]) && (!in_array('admin',$_SESSION['rols'][0]) && !in_array('employee', $_SESSION['rols'][0])))) {
  include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php');
  include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select.php'); ?>
  <div class="flex flex-wrap justify-center gap-[2px]">
  <?php foreach($reservations as $reservation){?>
      <div class="my-4 max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
              <?php printReservation($reservation) ?>
              <form action="/student067/dwes/pages/forms/form_reservation_update.php" method="POST">
                  <input type="number" name="reservation_id" value ="<?php echo $reservation['reservation_id']; ?>" hidden>
                  <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Update</button>
              </form>
      </div>
    
      <?php }; ?>

    </div>
  
  <?php }else { ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Reservation Update Form</h2>
      <form action="/student067/dwes/pages/forms/form_reservation_update.php" method="POST">
        <div class="mb-4">
          <label for="reservation_id" class="block text-gray-700 font-bold mb-2">Reservation ID</label>
          <input type="number"  name="reservation_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Select a reservation ID to update">
        </div>
        <div class="mb-4">
          <label for="forename" class="block text-gray-700 font-bold mb-2">Forename</label>
          <input type="text"  name="forename" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Put the customer forename">
        </div>
        <div class="mb-4">
          <label for="lastname" class="block text-gray-700 font-bold mb-2">Lastname</label>
          <input type="text"  name="lastname" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Put the customer lastname">
        </div>
        <div class="mb-4">
          <label for="lastname" class="block text-gray-700 font-bold mb-2">Nif</label>
          <input type="text"  name="nif" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Put the customer nif">
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Submit</button>
        </div>
      </form>
    </div>
    <?php }; ?>
  </main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>