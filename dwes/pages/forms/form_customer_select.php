<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  
  <?php if(isset($_SESSION['rols']) && (!in_array("customer",$_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0]))))  { ?>

  <main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Customer Select Form</h2>
      <form action="/student067/dwes/pages/db/db_customer_select.php" method="POST">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Customer ID</label>
          <input type="number"  name="user_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Select a Customer ID">
         </div>
        <div class="text-center">
          <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>
        </div>
      </form>

    </div>
  </main>
  <?php }else { ?>
    <h1 class="text-red-500 text-2xl text-center mt-4 font-bold">You don't have the permissions to see this page!</h1>
    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/student067/dwes/index.php'); ?>
  <?php }?>
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
