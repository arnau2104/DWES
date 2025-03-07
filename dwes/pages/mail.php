<?php 
  //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if(isset($_POST['reservation_id'])){
    include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select_byId_for_email.php');
}else {
    echo "no se ha recibido ID dde reserva";
}

if (!empty($reservation) && is_array($reservation)) {
    $destino = $reservation[0]['email'];
    $asunto = "Confirmacion de Reserva Arnau's Hotel";

    $reservation_id = $reservation[0]['reservation_id'];
    $fullName=$reservation[0]['forename'] . ' '. $reservation[0]['lastname'];
    $date_in = $reservation[0]['date_in'];
    $date_out = $reservation[0]['date_out'];
    $place_category_price = $reservation[0]['place_category_price'];
    $cuerpo = "
        <html>
            <head>
                <title>Reserva en Arnau's Hotel</title>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        width: 100%;
                        background-color: #f9fafb;
                    }
                    .container {
                        width: 100%;
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        box-sizing: border-box;
                    }
                    table {
                        width: 100%;
                        background-color: white;
                        border: 1px solid #e5e7eb;
                        border-radius: 8px;
                        border-collapse: collapse;
                    }
                    th, td {
                        padding: 8px 16px;
                        text-align: center;
                        border-bottom: 1px solid #d1d5db;
                    }
                    th {
                        background-color: #e5e7eb;
                        color: #4b5563;
                        font-weight: bold;
                    }
                    td {
                        background-color: #ffffff;
                    }
                    p {
                        text-align: center;
                        margin-top: 20px;
                        font-size: 16px;
                        color: #374151;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1 style='text-align: center; font-weight: bold; font-size: 32px;'>Reservation Information</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Reservation ID</th>
                                <th>Name</th>
                                <th>Date In</th>
                                <th>Date Out</th>
                                <th>Price Per Day</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$reservation_id</td>
                                <td>$fullName</td>
                                <td>$date_in</td>
                                <td>$date_out</td>
                                <td>$place_category_price</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>Gracias por reservar en Arnau's Hotel.</p>
                </div>
            </body>
        </html>
        ";





    //import the phpmailer files
    require $_SERVER['DOCUMENT_ROOT'].'/student067/dwes/PHPMailer/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'].'/student067/dwes/PHPMailer/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'].'/student067/dwes/PHPMailer/SMTP.php';


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output  //0 debug desactivado 2 activado
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.remotehost.es';                     //Direccion del servidor SMTP
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication, Necesario para poder enviar correos a gmail, ya que la requierien
        $mail->Username   = 'no-reply@remotehost.es';                     //SMTP username
        $mail->Password   = 'Test1234.';                               //SMTP password
        $mail->SMTPSecure = 'ssl';                                  //Verificar si dominio te protocolo ssl sino poner tls           
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('no-reply@remotehost.es', "Arnau's Hotel");
        $mail->addAddress($reservation[0]['email']);     //Add a recipient
    
        

        //Attachments
         $mail->addAttachment($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/images/logo.png');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Reservation in Arnau's Hotel"; //asunto de email
        $mail->Body    = $cuerpo; //contenido del correo
        

        $mail->send();
    //    echo 'Enviado correctamente';
        ?>
        <script> window.location.href= "/student067/dwes/pages/db/db_reservation_select.php"</script>
   <?php } catch (Exception $e) {
        echo "Eror al enviar: {$mail->ErrorInfo}";
    }
}else {
    echo "need all the camps";
}


?>