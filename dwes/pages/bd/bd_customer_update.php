<?php
    //connect to databas
    $conn = mysqli_connect('localhost', 'root', '', 'hotel_managment_system');

    //check connection
    if(!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    };

    // write query
    $customer_id = $_POST['customer_id'];
    $sql = "select * from customers where customer_id = '$customer_id'";
    
    //make query and get result
    
     $result = mysqli_query($conn,  $sql);
   
     
    $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);  
    //$customer = mysqli_fetch_assoc($result); cuando solo hay un valor  
   print_r($customer);

   //update

   if(isset($_POST['submitUpdate'])) {
    $sqlUpdate = "UPDATE customers SET forename = $_POST['forename'], lastname = $_POST['lastname'], username = $_POST['username'], password = $_POST['password'], nif = $_POST['nif'], email = $_POST['email'] ,phone = $_POST['phone'] WHERE customer_id = $customer[0]['customer_id'] ";
    $resultUpdate = mysqli_query($conn, $sqlUpdate);
   };

   //tancar connexio
   mysqli_close($conn);
    
?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Customer ID <?php echo $customer[0]['customer_id'] ?> Update Form</h2>
      <form action="/student067/dwes/pages/bd/bd_customer_update.php" method="POST">
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Forename</label>
          <input type="text"  name="forename" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your forename" value="<?php echo $customer[0]['forename'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Lastname</label>
          <input type="text" name="lastname" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your lastname" value="<?php echo $customer[0]['lastname'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Username</label>
          <input type="text" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your username" value="<?php echo $customer[0]['username'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Password</label>
          <input type="text" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your password" value="<?php echo $customer[0]['password'];?>">
        </div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-bold mb-2">Nif</label>
          <input type="text" name="nif" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your nif" value="<?php echo $customer[0]['nif'];?>">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
          <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your email" value="<?php echo $customer[0]['email'];?>">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Phone</label>
          <input type="number"  name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Your phone" value="<?php echo $customer[0]['phone'];?>">
        </div>
        <div class="text-center">
          <button type="submit" name="submitUpdate" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Submit</button>
        </div>
      </form>
    </div>
  </main>
   
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
