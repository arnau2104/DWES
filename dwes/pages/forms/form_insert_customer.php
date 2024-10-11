<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main>
    <h1 class="center">Register Form <h1>
   <form action="./student067/dwes/pages/bd/bd_insert_customer.php" method="POST">
    <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Forename" id="forename" name="forename" type="text" class="validate">
          <label for="forename">Forename</label>
        </div>
        <div class="input-field col s6">
          <input id="lastname" name="lastname" type="text" class="validate">
          <label for="lastname">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  id="nif" name="nif" type="text" class="validate">
          <label for="nif">NIF</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="username" name="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="phone" name="phone" type="text" class="validate">
          <label for="phone">Phone</label>
        </div>
      </div>
      
      
        </div>
      </div>
    </form>
  </div>
  <button class="btn waves-effect waves-light black" type="submit" name="submit">Submit
  <i class="material-icons right">send</i>
  </form>
</main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>
