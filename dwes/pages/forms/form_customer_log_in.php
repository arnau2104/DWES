<?php 
include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');

if(isset($_COOKIE['067_user_logged']) && empty($_SESSION['username'])) {  ?>
<script>src="/student067/dwes/js/cookie_log_in.js"</script>

<?php }?>
  <!-- Formulario -->
  <main class="container mx-auto py-8">
    <?php if(isset($_SESSION['log_in_message'])) { ?>
      <h2 class="text-red-600 text-center text-xl pb-8"> <?php echo $_SESSION['log_in_message'] ?></h2>
   <?php } ?>
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Log In</h2>
      <form action="/student067/dwes/pages/db/db_customer_log_in.php" method="POST" name="log_in_form" id="log_in_form">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Username</label>
          <input type="text" id="username"  name="username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Put your username here">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Password</label>
          <input type="password"  name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Put your password here" >
          <p class="text-blue-500">Forgot password?</p>
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Log in</button>
        </div>
        <div class="text-center">
          <p>Don't have an account? <a href="/student067/dwes/pages/forms/form_customer_insert.php" class="text-green-500">Register here!</a></p>
        </div>
      </form>
    </div>
  </main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
