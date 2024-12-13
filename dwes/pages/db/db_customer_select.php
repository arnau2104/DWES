

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
    <?php if(isset($_SESSION['rols']) && (!in_array("customer", $_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0])))) { ?>
    <main class="flex flex-row flex-wrap">
        <?php 
    
    
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_customer_select_all_customers.php');
        

        for($i = 0; $i < count($user); $i++) {?>
        <div class="flex flex-col gap-2 my-8 max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform transition-transform duration-300 hover:scale-105 w-96">
            <div class="">
                <h2 class="text-2xl font-bold text-center text-blue-600 mb-4">Customer Information</h2> 
                <p ><span class="font-bold">Customer ID:</span> <?php echo $user[$i]['user_id'];?></p>
                <p><span class="font-bold">Forename: </span> <?php echo $user[$i]['forename'];?> </p> 
                <p><span class="font-bold">Lastname: </span>  <?php echo $user[$i]['lastname'];?> </p>
                <p><span class="font-bold"> Username: </span> <?php echo $user[$i]['username'];?> </p>
                <p><span class="font-bold"> Password: </span> <?php echo $user[$i]['password']; ?></p>
                <p><span class="font-bold">NIF: </span> <?php echo $user[$i]['nif']; ?> </p>
                <p><span class="font-bold">Email: </span>  <?php echo $user[$i]['email']; ?></p>
                <p><span class="font-bold">Phone: </span> <?php echo $user[$i]['phone']; ?> </p>
            </div>
            <form action="/student067/dwes/pages/forms/form_customer_update.php" method="post">
                <input type="number" name="user_id" value= <?php echo $user[$i]['user_id'] ?> hidden>
                <button type="submit" name="submit"  class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2">Update Customer</button>
            </form>
        </div>
        
        <?php }; ?>        
    </main>
    <?php }else { ?>
    <h1 class="text-red-500 text-2xl text-center mt-4 font-bold">You don't have the permissions to see this page!</h1>
    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/student067/dwes/index.php'); ?>
  <?php }?>
   <?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
