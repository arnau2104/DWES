<?php
session_start();
// print_r($_SESSION['rols']);
print_r($_SESSION['user_image_path']);
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
<header class="bg-blue-600 p-4 z-20 relative">
  <div class="container mx-auto flex justify-between items-center">
    <!-- Logo -->
    <div class="w-24">
      <a href="/student067/dwes/index.php"><img src="/student067/dwes/images/logo.png" alt=""></a>
    </div>

    <!-- Navegación -->
    <nav>
      <ul class="flex space-x-4">
        <li><a href="/student067/dwes/index.php" class="text-white hover:text-gray-300">Inicio</a></li>
        <?php if(isset($_SESSION['rols'])) { ?>
        <li class="relative group">
          <p class="text-white hover:text-gray-300">Customers</p>
          <ul class="absolute left-0 hidden bg-blue-600 space-y-2 p-2 group-hover:block">
            <?php if(!in_array("customer",$_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0]))) { ?>
              <li><a href="/student067/dwes/pages/forms/form_customer_select.php" class="text-white hover:text-gray-300">Select Customer</a></li>
              <li><a href="/student067/dwes/pages/forms/form_customer_insert.php" class="text-white hover:text-gray-300">Insert Customer</a></li>
            <?php } ?>
            <li><a href="/student067/dwes/pages/forms/form_customer_delete.php" class="text-white hover:text-gray-300">Delete Customer</a></li>
            <li><a href="/student067/dwes/pages/forms/form_customer_update_call_id.php" class="text-white hover:text-gray-300">Update Customer</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if(isset($_SESSION['rols'])) { ?>
        <?php if(!in_array("customer",$_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0]))) { ?>
        <li class="relative group">
          <a href="#" class="text-white hover:text-gray-300">Rooms</a>
          <ul class="absolute left-0 hidden bg-blue-600 space-y-2 p-2 group-hover:block">
            <li><a href="/student067/dwes/pages/forms/form_place_select.php" class="text-white hover:text-gray-300">Select Room</a></li>
            <li><a href="/student067/dwes/pages/forms/form_place_insert.php" class="text-white hover:text-gray-300">Insert Room</a></li>
            <li><a href="/student067/dwes/pages/forms/form_place_delete.php" class="text-white hover:text-gray-300">Delete Room</a></li>
            <li><a href="/student067/dwes/pages/forms/form_place_update_call_id.php" class="text-white hover:text-gray-300">Update Room</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php } ?>
        <?php if(isset($_SESSION['rols'])) { ?>
        <li class="relative group">
          <a href="#" class="text-white hover:text-gray-300">Reservations</a>
          <ul class="absolute left-0 hidden bg-blue-600 space-y-2 p-2 group-hover:block">
            <li><a href="/student067/dwes/pages/forms/form_reservation_select.php" class="text-white hover:text-gray-300">Show Reservations</a></li>
            <li><a href="/student067/dwes/pages/forms/form_reservation_choose_date.php" class="text-white hover:text-gray-300">Do Reservations</a></li>
            <?php if(!in_array("customer",$_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0]))) { ?>
            <li><a href="/student067/dwes/pages/forms/form_reservation_delete.php" class="text-white hover:text-gray-300">Delete Reservations</a></li>
            <?php } ?>
            <li><a href="/student067/dwes/pages/forms/form_reservation_call_id.php" class="text-white hover:text-gray-300">Update Reservations</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if(isset($_SESSION['rols'])) { ?>
        <li><a href="/student067/dwes/pages/forms/form_services.php" class="text-white hover:text-gray-300">Services</a></li>
        <?php } ?>
      </ul>
    </nav>

    <!-- Botón -->
    <?php if(empty($_SESSION['username']) == true){ ?>
    <a href="/student067/dwes/pages/forms/form_customer_log_in.php" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200">Iniciar Sesión</a>
    <?php } else { ?>
      <div class="flex flex-col items-center p-4 rounded-lg hover:bg-blue-700">
        <!-- <p class="text-white">Hola <?php //echo $_SESSION['username'];?></p> -->
         <!-- <img src="<?php echo $_SESSION['user_image_path']; ?>" class="w-[50px] h-[50px] rounded-[50%] cursor-pointer mb-2" id="profile_photo"> -->
        <a href="/student067/dwes/pages/db/db_customer_log_out.php"><button class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200 hidden log_out" >Log Out</button></a>
      </div>
    <?php } ?>
  </div>
</header>


<script src="/student067/dwes/js/menu.js"></script>
