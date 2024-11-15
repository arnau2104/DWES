<?php
session_start();
// print_r($_SESSION['rols']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Managment System</title> 
    <script src="https://cdn.tailwindcss.com"></script>
      <link rel="stylesheet" href="/student067/dwes/css/style.css">
   

</head>
<body class="box-border">
<header class="bg-blue-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
      <!-- Logo -->
       <!-- <img src="/student067/dwes/images/logoHotel.png" class="h-28"> -->
      <div class="w-24">
       <img src="/student067/dwes/images/logo.png" alt="">
      </div>

      <!-- Navegación -->
      <nav>
        <ul class="flex space-x-4">
          <li><a href="/student067/dwes/index.php" class="text-white hover:text-gray-300">Inicio</a></li>
          <?php if(isset($_SESSION['rols'])) { ?>
          <li><p class="text-white hover:text-gray-300">Customers</p><ul>
          <?php  if(!in_array("customer",$_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0]) )) {  ?>
            <li><a href="/student067/dwes/pages/forms/form_customer_select.php" class="text-white hover:text-gray-300">Select Customer</a></li>
       
              <li><a href="/student067/dwes/pages/forms/form_customer_insert.php" class="text-white hover:text-gray-300">Insert Customer</a></li>
           <?php } ?>
            <li><a href="/student067/dwes/pages/forms/form_customer_delete.php" class="text-white hover:text-gray-300">Delete Customer</a></li>
            <li><a href="/student067/dwes/pages/forms/form_customer_update_call_id.php"class="text-white hover:text-gray-300" >Update Customer</a></li>
          </ul></li>
          <?php }  ?>
          <?php if(isset($_SESSION['rols'])) { ?>
          <?php  if(!in_array("customer",$_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0]) )) {  ?>
          <li><a href="#" class="text-white hover:text-gray-300">Rooms</a><ul>
            <li><a href="/student067/dwes/pages/forms/form_place_select.php" class="text-white hover:text-gray-300">Select Room</a></li>
            <li><a href="/student067/dwes/pages/forms/form_place_insert.php" class="text-white hover:text-gray-300">Insert Room</a></li>
            <li><a href="/student067/dwes/pages/forms/form_place_delete.php" class="text-white hover:text-gray-300">Delete Room</a></li>
            <li><a href="/student067/dwes/pages/forms/form_place_update_call_id.php" class="text-white hover:text-gray-300">Update Room</a></li>
          </ul></li>
          <?php }} ?> 
          <?php if(isset($_SESSION['rols'])) { ?>
          <li><a href="#" class="text-white hover:text-gray-300">Reservations</a><ul>   
            <li><a href="/student067/dwes/pages/forms/form_reservation_select.php" class="text-white hover:text-gray-300">Show Reservations</a></li> 
            <li><a href="/student067/dwes/pages/forms/form_reservation_choose_date.php" class="text-white hover:text-gray-300">Do Reservations</a></li>
            <?php  if(!in_array("customer",$_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0]) )) {  ?>
            <li><a href="/student067/dwes/pages/forms/form_reservation_delete.php" class="text-white hover:text-gray-300">Delete Reservations</a></li>
            <?php  } ?>
            <li><a href="/student067/dwes/pages/forms/form_reservation_call_id.php" class="text-white hover:text-gray-300">Update Reservations</a></li>
            <?php } ?>
          </ul></li>
        </ul>
      </nav>

      <!-- Botón -->
       <?php if(empty($_SESSION['username']) == true){ ?>
      <a href="/student067/dwes/pages/forms/form_customer_log_in.php" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200">Iniciar Sesión</a>
      <?php } else { ?>
        <div class="flex flex-col">
          <p class="text-white">Hola <?php echo $_SESSION['username'];?></p>
          <a href="/student067/dwes/pages/db/db_customer_log_out.php"><button class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200">Log Out</button></a>
        </div>
    <?php } ?>
    </div>
  </header>
  
</header>