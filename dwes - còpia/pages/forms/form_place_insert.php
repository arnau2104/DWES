<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  <!-- Formulario -->
  <main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Place Insert Form</h2>
      <form action="/student067/dwes/pages/db/db_place_insert.php" method="POST">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Place Type ID</label>
          <select name="place_type_id" id="place_type_id" class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> 
       
         <?php
         include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_place_type_selectGroupBy.php');
         for ($i = 0; $i< count($place_type); $i++) {  ?>
               <option value="<?php echo $place_type[$i]['place_type_id']; ?>"><?php echo ucfirst($place_type[$i]['place_type_name']);?></option>
         <!-- close loop foor    -->
         <?php }; ?>
          </select>
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Place Category ID</label>
          <select name="place_category_id" id="place_category_id" class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"> 
       
         <?php
         include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_place_category_selectGroupBy.php');
         for ($i = 0; $i< count($place_category); $i++) {  ?>
               <option value="<?php echo $place_category[$i]['place_category_id']; ?>"><?php echo ucfirst($place_category[$i]['place_category_name']);?></option>
         <!-- close loop foor    -->
         <?php }; ?>
          </select>
        </div>
        <div class="mb-4">
          <label for="place_capacity" class="block text-gray-700 font-bold mb-2">Place Capacity</label>
          <input type="number" name="place_capacity" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" >
        </div>
       
        <div class="text-center">
          <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>
        </div>
      </form>
    </div>
  </main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
