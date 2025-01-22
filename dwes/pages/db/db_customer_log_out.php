<?php

 include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
 include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php');


 $log_text = "Username: " . $_SESSION['username'] . " Date: " . date("Y-m-d h:i:sa");
 $file = $_SERVER['DOCUMENT_ROOT'] .'/student067/dwes/logs/log_out_log.txt';

      if(file_exists($file)) {
         writeLogFile($file, $log_text);
      }else {
         echo "El archivo no existe";
      }

 unset($_SESSION['username']);
 unset($_SESSION['rols']);
unset($_SESSION['user_image_path']); 

?>
<script>
window.location.href ='/student067/dwes/index.php';
</script>

<?php
include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');
?>