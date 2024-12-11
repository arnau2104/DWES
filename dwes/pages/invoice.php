<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main>


<?php
    if(isset($_POST['submit'])){ 
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select_byId.php');
    include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/functions/functions.php');

     $extras = json_decode($reservation[0]['extras_json'],true);
     print_r($extras);
?>
  
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <!-- Encabezado de la Factura -->
    <header class="flex justify-between items-center border-b pb-4 mb-6">
      <h1 class="text-3xl font-bold text-gray-700">Invoice</h1>
      <div class="text-right">
        <p class="text-sm text-gray-500">Invoice Number:</p>
        <p class="text-xl font-semibold text-gray-700"><?php echo '#'. $reservation[0]['reservation_id'] . str_replace('-','',$reservation[0]['date_in']) . str_replace('-','',$reservation[0]['date_out']) ?></p>
      </div>
    </header>

    <!-- Información del Cliente y de la Empresa -->
    <section class="mb-8">
      <div class="flex justify-between">
        <div>
          <h2 class="text-lg font-bold text-gray-700">Información de la Empresa</h2>
          <p class="text-gray-500"><span class="font-bold">Hotel Name:</span> <?php echo $reservation[0]['hotel_name'] ?></p>
          <p class="text-gray-500"><span class="font-bold">Hotel Address</span> <?php echo $reservation[0]['hotel_address']?></p>
          <p class="text-gray-500"><span class="font-bold">Phone Number: </span> 123-456-7890</p>
          <p class="text-gray-500">Email: <?php echo strtolower(str_replace(' ', '', trim($reservation[0]['hotel_name']))).'@info.com'; ?></p>
        </div>
        <div class="text-right">
          <h2 class="text-lg font-bold text-gray-700">Información del Cliente</h2>
          <p class="text-gray-500"><span class="font-bold">Customer Name: </span> <?php echo $reservation[0]['forename']." ". $reservation[0]['lastname']?></p>
          <p class="text-gray-500"><span class="font-bold">NIF:</span> <?php echo $reservation[0]['nif'] ?></p>
          <p class="text-gray-500"><span class="font-bold">Phone Number:</span> <?php echo $reservation[0]['phone'] ?></p>
          <p class="text-gray-500"><span class="font-bold">Email:</span> <?php echo $reservation[0]['email']?></p>
        </div>
      </div>
    </section>

    <!-- Tabla de Productos/Servicios -->
    <table class="w-full mb-8">
      <thead>
        <tr>
          <th class="text-left text-gray-600 font-semibold">Description</th>
          <th class="text-right text-gray-600 font-semibold">Quantity</th>
          <th class="text-right text-gray-600 font-semibold">Price per Day</th>
          <th class="text-right text-gray-600 font-semibold">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-t">
          <td class="py-2 text-gray-700"><?php echo ucfirst($reservation[0]['place_category_name']) ?> Room</td>
          <td class="py-2 text-right text-gray-700"> <?php echo $reservation[0]['total_days']; ?></td>
          <td class="py-2 text-right text-gray-700"><?php echo $reservation[0]['price_per_day']?>€</td>
          <td class="py-2 text-right text-gray-700"><?php echo $reservation[0]['subtotal'] ?>€</td>
        </tr>

        <?php foreach($extras as $extra) { ?>
          <?php print_r($extra); echo '<br>' ?>
          <tr class="border-t">
            <td class="py-2 text-gray-700"><?php echo array_keys($extra) .': '. ucfirst($extra['concept']); ?> </td>
            <td class="py-2 text-right text-gray-700">1</td>
            <td class="py-2 text-right text-gray-700"><?php echo $extra['unitPrice'];?>€</td>
            <td class="py-2 text-right text-gray-700"><?php echo $extra['unitPrice']; ?>€</td>
          </tr>
        <?php };?>  
    
      </tbody>
    </table>

    <!-- Resumen y Total -->
    <section class="flex justify-end">
      <div class="text-right">
        <div class="flex justify-between mt-2">
          <span class="text-gray-500">IVA(is included in the price) :</span>
          <span class="text-gray-700 font-semibold">21%</span>
        </div>
        <div class="flex justify-between mt-4 border-t pt-2">
          <span class="text-xl font-bold text-gray-700">Total: </span>
          <span class="text-xl  text-gray-700"> <?php echo  $reservation[0]['subtotal'] ?>€</span>
        </div>
      </div>
    </section>
  </div>

    <?php }else {
        echo "nada enviado";
    } ?>

</main>
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>