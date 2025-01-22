<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_place_select_byId.php');   ?>
<main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Place ID <?php echo $place[0]['place_id'] ?> Update Form</h2>
      <form action="/student067/dwes/pages/db/db_place_update.php" method="POST">
      <input type="text"  name="place_id"  value="<?php echo $place[0]['place_id'];?>" hidden>
      <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Place Type ID</label>
          <input type="text"  name="place_type_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your place_type_id" value="<?php echo $place[0]['place_type_id'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Place Category ID</label>
          <input type="text" name="place_category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your place_category_id" value="<?php echo $place[0]['place_category_id'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Place Capacity</label>
          <input type="text" name="place_capacity" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your place_capacity" value="<?php echo $place[0]['place_capacity'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Status</label>
          <input type="text" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your status" value="<?php echo $place[0]['status'];?>">
        </div>
        <div class="text-center">
          <button type="submit" name="submitUpdate" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>
        </div>
      </form>
    </div>
  </main>
   
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
