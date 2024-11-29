<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main class="container mx-auto py-8 flex flex-wrap gap-0.5">
<?php
if(isset($_SESSION['username']) && (in_array('customer',$_SESSION['rols'][0]) && (!in_array('admin',$_SESSION['rols'][0]) && !in_array('employee', $_SESSION['rols'][0])))) {
  include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select.php');
  for($i = 0; $i < count($reservation); $i++) {?>
    <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700  hover:scale-110 w-96">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Reservation Information</h2> 
        <p ><span class="font-bold">Reservation ID:</span> <?php echo $reservation[$i]['reservation_id'];?></p>
        <p><span class="font-bold">Forename: </span> <?php echo $reservation[$i]['forename'];?> </p> 
        <p><span class="font-bold">Lastname: </span>  <?php echo $reservation[$i]['lastname'];?> </p>
        <p><span class="font-bold"> Place Type Name: </span> <?php echo $reservation[$i]['place_type_name'];?> </p>
        <p><span class="font-bold"> Place Category Name: </span> <?php echo $reservation[$i]['place_category_name']; ?></p>
        <p><span class="font-bold">Place Category Price: </span> <?php echo $reservation[$i]['place_category_price']; ?> </p>
        <p><span class="font-bold">Date In: </span> <?php echo $reservation[$i]['date_in']; ?> </p>
        <p><span class="font-bold">Date Out: </span> <?php echo $reservation[$i]['date_out']; ?> </p>
        <p><span class="font-bold">Reservation State: </span> <?php echo $reservation[$i]['reservation_state']; ?> </p>
            <form action="/student067/dwes/pages/forms/form_reservation_update.php" method="POST">
                <input type="number" name="reservation_id" value ="<?php echo $reservation[$i]['reservation_id']; ?>" hidden>
                <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Update</button>
            </form>
    </div>
  
    <?php };}else { ?>

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