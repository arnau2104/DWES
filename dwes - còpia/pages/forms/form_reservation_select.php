<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  <!-- Formulario -->
  <main class="container mx-auto py-8">
    <?php if(isset($_SESSION['username']) && (in_array('customer',$_SESSION['rols'][0]) && (!in_array('admin',$_SESSION['rols'][0]) && !in_array('employee', $_SESSION['rols'][0])))) { 
        header("Location: /student067/dwes/pages/db/db_reservation_select.php");
      }?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Reservation Select Form</h2>
      <form action="/student067/dwes/pages/db/db_reservation_select.php" method="POST">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Reservation ID</label>
          <input type="number"  name="reservation_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Select a reservation ID">
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>
        </div>
      </form>

      <form action="/student067/dwes/pages/db/db_reservation_select.php" method="POST">
        <div class="mb-4">
          <label for="date_in" class="block text-gray-700 font-bold mb-2">Date In</label>
          <input type="date" name="date_in" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" value="<?php echo (new \DateTime())->format('Y-m-d') ?>">
        </div>
        <div class="mb-4">
          <label for="date_out" class="block text-gray-700 font-bold mb-2">Date Out</label>
          <input type="date" name="date_out" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" value="<?php echo (new \DateTime())->format('Y-m-d') ?>">
        </div>
        <div class="text-center">
          <button type="submit" name="submit_check_in" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Showh check-ins/check-outs</button>
        </div>
      </form>
      
    </div>
  </main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
