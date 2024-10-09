<?php

  // if(isset($_POST['submit'])) {
  //   echo $_POST['date_in']. '<br>';
  //   echo $_POST['date_out']. '<br>';
  //   echo $_POST['personsNumber'];
  // };

?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
    <main>
      
        <section class="card-content container grey lighten-2" id="form_section">
        <h1 class="center">Reservations</h1>
          <form class="center" action="reservations.php" method="POST">
            <input type="date" name="date_in" >
            <input type="date" name="date_out">
            <input type="number" name="personsNumber">
            <button class="btn waves-effect waves-light black" type="submit" name="submit">Submit
    <i class="material-icons right">send</i>
  </button>
          </form>
        </section>
        
    
       
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
