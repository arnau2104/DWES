<?php 
include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select_byId.php');
$destino = "amarques20733@iesjoanramis.org";
$asunto = "Email de prueba2";

$reservation_id = $reservation[0]['reservation_id'];
$fullName=$reservation[0]['forename'] . ' '. $reservation[0]['lastname'];
$date_in = $reservation[0]['date_in'];
$date_out = $reservation[0]['date_out'];
$place_category_price = $reservation[0]['place_category_price'];
$cuerpo = "
<html>
    <head>
        <title>Reserva en Arnau's Hotel </title>
    </head>
    <body>
        <div class='w-full max-w-4xl mx-auto flex  flex-col items*center'>
            <h1 class='text-center font-bold text-4xl'>Reservation Information</h1>
            <div class='flex flex-row'>
                <table class='min-w-full bg-white border border-gray-200 rounded-lg'>
                    <thead>
                        <tr>
                        <th class='py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b'>Reservationr ID</th>
                        <th class='py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b'>Name</th>
                        <th class='py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b'>Date In</th>
                        <th class='py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b'>Date Out</th>
                        <th class='py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b'>Price Per Day</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class='hover:bg-gray-100'>
                        <td class='py-2 px-4 border-b text-center'><?php echo $reservation_id;?></td>
                        <td class='py-2 px-4 border-b text-center'><?php echo $fullName;?></td>
                        <td class='py-2 px-4 border-b text-center'><?php echo $date_in;?></td>
                        <td class='py-2 px-4 border-b text-center'><?php echo $date_out;?></td>
                        <td class='py-2 px-4 border-b text-center'><?php echo $place_category_price;?></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
    </body>
</html>
";

//para enviar en formato hmtl
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";

//direccion del remitente
$headers .= "From: <armarques@gmail.com>\r\n";

//ruta del mensaje desde origen a destino
$headers .= "Return-Path: $destino\r\n";

// Enviar correo
if(mail($destino, $asunto, $cuerpo, $headers)){
    echo "Email enviado correctamente";
} else {
    echo "Error al enviar el email";
}
?>