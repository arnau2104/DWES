
 <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
    <main>
        <h1>Welcome to Arnau's Hotel </h1>
       <?php
        $name = 'Arnau';
        $lastname = 'marques';
        echo ucwords($name) . ' ' . ucfirst($lastname) ;
        echo strcoll($name,$name);
       ?>
       
    </main>
   <?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
