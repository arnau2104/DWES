<?php
   include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select_byId.php');        
?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Reservation ID <?php echo $reservation[0]['reservation_id'] ?> Update Form</h2>
      <form action="/student067/dwes/pages/db/db_reservation_update.php" method="POST">
      <input type="text"  name="reservation_id"  value="<?php echo $reservation[0]['reservation_id'];?>" hidden>
      <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Customer ID</label>
          <input type="text"  name="customer_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" reservationholder="Your customer_id" value="<?php echo $reservation[0]['customer_id'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Place ID</label>
          <input type="text" name="place_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" reservationholder="Your place_id" value="<?php echo $reservation[0]['place_id'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Date In</label>
          <input type="date" name="date_in" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" reservationholder="Your date_in" value="<?php echo $reservation[0]['date_in'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Date Out</label>
          <input type="date" name="date_out" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" reservationholder="Your date_out" value="<?php echo $reservation[0]['date_out'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Price Per Day</label>
          <input type="number" name="price_per_day" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" reservationholder="Your price_per_day" value="<?php echo $reservation[0]['price_per_day'];?>">
        </div>
        <div class="text-center">
          <button type="submit" name="submitUpdate" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>
        </div>
      </form>
    </div>
  </main>
   
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
