<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  <!-- Formulario -->
  <main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Place Delete Form</h2>
      <form action="/student067/dwes/pages/db/db_place_delete.php" method="POST">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Place ID</label>
          <input type="text"  name="place_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Put the place_id for the place do you want delete">
        </div>
        <div class="text-center">
        <button name="disable" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-1">Disable</button>
        </div>
        <div class="text-center mt-2">
          <button type="submit" name="delete" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Delete</button>
        </div>
      </form>
    </div>
  </main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
