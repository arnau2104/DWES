<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  
  <?php if(isset($_SESSION['rols']) && (!in_array("customer",$_SESSION['rols'][0]) || (in_array("admin",$_SESSION['rols'][0]) || in_array("employee",$_SESSION['rols'][0]))))  { ?>

  <main class="container mx-auto py-8">
  

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Customer Searcher</h2>
      <form action="/student067/dwes/pages/db/db_customer_select.php" method="POST">
        <div class="mb-4 flex gap-2 justify-center items-center">
          <input type="text"  id="user_searcher" name="user_searcher" onkeyup = "showHint(this.value)" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Type the customer information">
          <svg onclick="cleanHint()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9 stroke-2 fill-red-600 font-bold hover:size-10 hover:cursor-pointer">
            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
          </svg>

         </div>
      </form>

      <form action="/student067/dwes/pages/db/db_customer_select.php" method="POST">
        <div class="mb-4">
         
          <input type="number"  name="user_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Select a Customer ID" hidden>
         </div>
        <div class="text-center">
          <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">Show all the customers</button>
        </div>
      </form>

    </div>

    <div id="users_match" class="flex flex-wrap gap-2" >
    
    </div>

  </main>
  <?php }else { ?>
    <h1 class="text-red-500 text-2xl text-center mt-4 font-bold">You don't have the permissions to see this page!</h1>
    <?php include ($_SERVER['DOCUMENT_ROOT'] . '/student067/dwes/index.php'); ?>
  <?php }?>
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>

<script> 
   function showHint(str) {
        if(str.length == 0) {
            document.getElementById("users_match").innerHTML = "";
            return;
        } else {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {  
                document.getElementById("users_match").innerHTML = this.responseText;
            }
            xhttp.open("GET", "/student067/dwes/pages/ajax/ajax_get_user_information.php?q=" + str,true);
            xhttp.send();
        }
    }

    function cleanHint() {

      document.getElementById("user_searcher").value= "";
      showHint("");
    }
</script>