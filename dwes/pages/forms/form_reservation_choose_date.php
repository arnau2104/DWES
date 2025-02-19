<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  <!-- Formulario -->
  <main class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Do a Reservation</h2>
      <form action="/student067/dwes/pages/forms/form_available_places.php" method="POST" name="form_reservation_dates" class="form_reservation_dates">
        <div class="mb-4">
        <!-- <label for="name" class="block text-gray-700 font-bold mb-2">Username</label> -->
        <!-- <input type="text"  name="username" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" value=<?php $_SESSION['username'];?>  placeholder="Put your username here" hidden> -->
          <label for="name" class="block text-gray-700 font-bold mb-2">Date In</label>
          <input type="date"  name="date_in" id="date_in" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" onblur="showAvailableRooms()" placeholder="Select a date In" <?php if(!empty($_COOKIE['date_in'])) {echo 'value=' . $_COOKIE['date_in'] ;}; ?> required>
          <label for="name" class="block text-gray-700 font-bold mb-2">Date Out</label>
          <input type="date"  name="date_out" id="date_out" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" onblur="showAvailableRooms()" placeholder="Select a date Out" <?php if(!empty($_COOKIE['date_out'])) {echo 'value=' . $_COOKIE['date_out'] ;}; ?> requierde>
        <div class="text-center">
          <button type="submit" name="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 mt-2" hidden>Submit</button>
        </div>
       
      </form>  
    </div>
    
  </div>
  
  <div class="flex flex-col justify-center items-center my-4" id="div_avaiable_places">
 
  </div>
  

  </main>

 
  <?php
    if ($_SERVER['SCRIPT_NAME'] != "/student067/dwes/index.php") {
      include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');
  }?>
 

 <script>

  function showAvailableRooms() {
    let dateIn = document.form_reservation_dates.date_in.value ?? '';
    let dateOut = document.form_reservation_dates.date_out.value ?? '';

    if(dateIn === "" || dateOut ==="") {
      
      console.log('dates empty')

    }else {
     
      console.log("dates not empty");
      
       
        let dataToSend = `date_in=${dateIn}&date_out=${dateOut}`;
        console.log(dataToSend);

        
        const xhttp = new XMLHttpRequest();

        xhttp.onload = function () {
              // console.log(this.responseText); // Manejo de la respuesta
              document.getElementById("div_avaiable_places").innerHTML = this.responseText;
          }


            xhttp.open('POST', '/student067/dwes/pages/ajax/ajax_available_places.php', true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(dataToSend);
    }

  }

 </script> 