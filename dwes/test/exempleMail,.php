<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 //import the phpmailer files
 require $_SERVER['DOCUMENT_ROOT'].'/student067/dwes/PHPMailer/Exception.php';
 require $_SERVER['DOCUMENT_ROOT'].'/student067/dwes/PHPMailer/PHPMailer.php';
 require $_SERVER['DOCUMENT_ROOT'].'/student067/dwes/PHPMailer/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.remotehost.es';                     //direccion del servidor SMTP
    $mail->SMTPAuth   = true;                                   //Necesario para poder enviar correos a gmail, ya que la requierien
    $mail->Username   = 'no-reply@remotehost.es';                     //SMTP username usuario para autenticar
    $mail->Password   = 'Test1234.';                               //SMTP password
    $mail->SMTPSecure = 'ssl'           ////verificar si dominio te protocolo ssl sino poner tls 
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
     $mail->setFrom('no-reply@remotehost.es', "Arnau's Hotel");
     $mail->addAddress('amarques20733@iesjoanramis.org');     //Add a recipient

    //Attachments
    $mail->addAttachment($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/images/logo.png');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}