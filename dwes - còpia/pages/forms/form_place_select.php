<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  <!-- Formulario -->
  <main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Room Select Form</h2>
      <form action="/student067/dwes/pages/db/db_place_select.php" method="POST">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Room ID</label>
          <input type="number"  name="place_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Select a Room ID">
        <div class="text-center">
          <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>
        </div>
      </form>
      <button class="bg-blue-600 rounded text-white h-10 w-48 flex justify-center">Show all the rooms</button>
    </div>
  </main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
