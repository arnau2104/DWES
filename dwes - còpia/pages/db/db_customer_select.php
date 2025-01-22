

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
    <?php if(isset($_SESSION['rols']) && (!in_array("customer", $_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0])))) { ?>
    <main class="flex flex-row flex-wrap">
        <?php 
    
    
        include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_customer_select_all_customers.php');
        include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php');

        foreach($user as $customer) {
       
            printCustomer($customer);
        
         }; ?>        
    </main>
    <?php }else { ?>
    <h1 class="text-red-500 text-2xl text-center mt-4 font-bold">You don't have the permissions to see this page!</h1>
    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/student067/dwes/index.php'); ?>
  <?php }?>
   <?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
