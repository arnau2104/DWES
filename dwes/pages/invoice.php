<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main>


<?php
    if(isset($_POST['submit'])){ 
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select_byId.php');?>?>

<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <!-- Encabezado de la Factura -->
    <header class="flex justify-between items-center border-b pb-4 mb-6">
      <h1 class="text-3xl font-bold text-gray-700">Factura</h1>
      <div class="text-right">
        <p class="text-sm text-gray-500">Número de Factura:</p>
        <p class="text-xl font-semibold text-gray-700">#00123</p>
      </div>
    </header>

    <!-- Información del Cliente y de la Empresa -->
    <section class="mb-8">
      <div class="flex justify-between">
        <div>
          <h2 class="text-lg font-bold text-gray-700">Información de la Empresa</h2>
          <p class="text-gray-500">Nombre de la Empresa</p>
          <p class="text-gray-500">Dirección de la Empresa</p>
          <p class="text-gray-500">Teléfono: 123-456-7890</p>
          <p class="text-gray-500">Email: contacto@empresa.com</p>
        </div>
        <div class="text-right">
          <h2 class="text-lg font-bold text-gray-700">Información del Cliente</h2>
          <p class="text-gray-500">Nombre del Cliente</p>
          <p class="text-gray-500">Dirección del Cliente</p>
          <p class="text-gray-500">Teléfono: 098-765-4321</p>
          <p class="text-gray-500"><span class="font-bold">Email:</span> <?php echo $reservation[0]['email']?></p>
        </div>
      </div>
    </section>

    <!-- Tabla de Productos/Servicios -->
    <table class="w-full mb-8">
      <thead>
        <tr>
          <th class="text-left text-gray-600 font-semibold">Descripción</th>
          <th class="text-right text-gray-600 font-semibold">Cantidad</th>
          <th class="text-right text-gray-600 font-semibold">Precio Unitario</th>
          <th class="text-right text-gray-600 font-semibold">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-t">
          <td class="py-2 text-gray-700">Producto/Servicio 1</td>
          <td class="py-2 text-right text-gray-700">2</td>
          <td class="py-2 text-right text-gray-700">$50.00</td>
          <td class="py-2 text-right text-gray-700">$100.00</td>
        </tr>
        <tr class="border-t">
          <td class="py-2 text-gray-700">Producto/Servicio 2</td>
          <td class="py-2 text-right text-gray-700">1</td>
          <td class="py-2 text-right text-gray-700">$150.00</td>
          <td class="py-2 text-right text-gray-700">$150.00</td>
        </tr>
      </tbody>
    </table>

    <!-- Resumen y Total -->
    <section class="flex justify-end">
      <div class="text-right">
        <div class="flex justify-between">
          <span class="text-gray-500">Subtotal:</span>
          <span class="text-gray-700 font-semibold">$250.00</span>
        </div>
        <div class="flex justify-between mt-2">
          <span class="text-gray-500">Impuesto (10%):</span>
          <span class="text-gray-700 font-semibold">$25.00</span>
        </div>
        <div class="flex justify-between mt-4 border-t pt-2">
          <span class="text-xl font-bold text-gray-700">Total:</span>
          <span class="text-xl font-bold text-gray-700">$275.00</span>
        </div>
      </div>
    </section>
  </div>

    <?php }else {
        echo "nada enviado";
    } ?>

</main>
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>