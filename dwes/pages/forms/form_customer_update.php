

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
 include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_customer_select_byId.php');?>
<main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Customer ID <?php echo $user[0]['user_id'] ?> Update Form</h2>
      <form action="/student067/dwes/pages/db/db_customer_update.php" method="POST" >
      <input type="text"  name="user_id"  value="<?php echo $user[0]['user_id'];?>" hidden>
        <!-- <div class="flex flex-col justify-center items-center">
          <img class="w-[150px] h-[150px]" src="/student067/dwes/images/user_profile_image_default.jpg" alt="">
          <input type="file" name="user_image">
        </div> -->
      <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Forename</label>
          <input type="text"  name="forename" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your forename" value="<?php echo $user[0]['forename'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Lastname</label>
          <input type="text" name="lastname" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your lastname" value="<?php echo $user[0]['lastname'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Username</label>
          <input type="text" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your username" value="<?php echo $user[0]['username'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Password</label>
          <input type="text" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your password" value="<?php echo $user[0]['password'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Nif</label>
          <input type="text" name="nif" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your nif" value="<?php echo $user[0]['nif'];?>">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
          <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your email" value="<?php echo $user[0]['email'];?>">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Phone</label>
          <input type="number"  name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your phone" value="<?php echo $user[0]['phone'];?>">
        </div>
        <div class="text-center">
          <button type="submit" name="submitUpdate" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>
        </div>
      </form>
    </div>
  </main>
   
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
