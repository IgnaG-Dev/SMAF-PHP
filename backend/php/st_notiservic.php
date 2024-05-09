<?php

use PHPMailer\PHPMailer\PHPmailer;
use PHPMailer\PHPMailer\SMTP;

if ($_POST) {

    //SMTP needs accurate times, and the PHP time zone MUST be set
    //This should be done in your php.ini, but this is how to do it if you don't have access to that
    date_default_timezone_set('Etc/UTC');

    require '../../vendor/autoload.php';

    $error = false;

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Verificar 
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 587;
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    $mail->SMTPKeepAlive = true; 
    //Username to use for SMTP authentication
    $mail->Username = 'ignaciogauto14@gmail.com';
    $mail->Password = 'bvxorfdgvndunwso';
    $mail->CharSet = 'UTF-8';
    //Set who the message is to be sent from
    $mail->setFrom('ignaciogauto14@gmail.com', 'SMAF - Acondicionamiento Físico');
    $mail->addReplyTo('ignaciogauto14@gmail.com', 'SMAF - Acondicionamiento Físico');
    //Set who the message is to be sent to
    $mail->addAddress($f->correo, $f->nomcli);

    
    //Agregar adjunto
    $ruta_archivo = "http://localhost/smaf/frontend/servicio/ticket.php?id=$f->idservc";
    $fichero = file_get_contents($ruta_archivo);
    $mail->addStringAttachment($fichero, "factura.pdf");
    //Set the subject line
    $mail->Subject = '¡Atención! Pago pendiente para SMAF - Última oportunidad';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //Replace the plain text body with one created manually
    $mail->AltBody = '¡Para ver el mensaje, por favor usa un email combatible para ver HTML!';
    $mail->addEmbeddedImage('C:/xampp/htdocs/smaf/backend/img/logo.png', 'logo', 'logo', 'base64', 'image/png');
    $mail->addEmbeddedImage('C:/xampp/htdocs/smaf/backend/img/nico.webp', 'nico', 'nico', 'base64', 'image/webp');

    $mail->Body = "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
            <title>¡Atención! Pago pendiente para SMAF - Última oportunidad</title>
            <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .header {
                background-color: #0652DD;
                color: #fff;
                padding: 10px;
                text-align: center;
            }

            .logo {
                max-width: 150px;
                display: block;
                margin: 0 auto;
            }

            .content {
                padding: 20px;
            }

            .title {
                font-size: 20px;
                font-weight: bold;
                color: #333;
                margin-bottom: 10px;
            }

            .message {
                font-size: 16px;
                color: #555;
                line-height: 1.5;
            }

            .reminder {
                color: #f00;
                font-weight: bold;
            }

            .button {
                background-color: #333;
                color: #fff;
                padding: 10px 20px;
                font-size: 16px;
                font-weight: bold;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 10px;
                display: inline-block;
            }

            .nico {
                max-width: 100%;
                display: block;
                margin-bottom: 10px;
            }

            .claro {
                color: grey;
            }

            .footer {
                background-color: #0652DD;
                color: #fff;
                padding: 10px;
                text-align: center;
            }

            .signature {
                font-style: italic;
            }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <a href='#'>
                        <img src='cid:logo' class='logo'>
                    </a>
                    <div></div>
                </div>
                <div class='content'>
                    <h1 class='title'>¡Atención! Pago pendiente para SMAF - Última oportunidad</h1>
                    <p class='message'>Estimado/a {$f->apecli} {$f->nomcli},</p>
                    <p class='message'>Le informamos que su pago para el servicio SMAF aún está pendiente. La fecha límite de pago es el <strong>{$f->fin}</strong>.</p>
                    <p class='message'>Detalles de su servicio:</p>
                    <ul>
                        <li class='message'>Plan: {$f->nompla}</li>
                        <li class='message'>Precio: {$f->prec}</li>
                        <li class='message'>Fecha de inicio: {$f->ini}</li>
                        <li class='message'>Fecha de fin: {$f->fin}</li>
                    </ul>
                    <p class='message'><strong>Si no realiza el pago a tiempo, su servicio podría ser cancelado.</strong> Para evitar inconvenientes y asegurar la continuidad del servicio, le solicitamos que realice el pago a la brevedad posible.</p>
                    <p class='reminder'>¡Su satisfacción es nuestra prioridad!</p>
                    <a href='https://smafsebamontenegro.site/' class='button'>Realizar pago ahora</a>
                    
                    <p>Se adjunta la última factura a este correo electrónico.</p>
                </div>
                <a href='#'>
                    <img src='cid:nico' class='nico'>
                </a>
                <div class='footer'>
                    <p class='signature'>Atentamente, El equipo de SMAF</p>
                    <p>Contacto: info@smaf.com / Teléfono: +54 11 4567-8901</p>
                    <p><a href='https://smafsebamontenegro.site/'>www.smafsebamontenegro.site</a></p>
                </div>
                <p class='claro'>Si ya ha realizado el pago, puede ignorar este correo electrónico.</p>
            </div>
        </body>
        </html>
    ";

    //SMTP XCLIENT attributes can be passed with setSMTPXclientAttribute method
    //$mail->setSMTPXclientAttribute('LOGIN', 'yourname@example.com');
    //$mail->setSMTPXclientAttribute('ADDR', '10.10.10.10');
    //$mail->setSMTPXclientAttribute('HELO', 'test.example.com');

    //send the message, check for errors
    if (!$mail->send()) {
        $error = true;
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }

    if ($error != 1) {
        echo '<script type="text/javascript">
        swal("Enviado!", "El mensaje fue enviado con éxito!", "success").then(function() {
            window.location = "../servicio/mostrar.php";
        });
        </script>';
    } else {
        $error_message = error_get_last()['message'];
        echo '<script type="text/javascript">
        swal("Error!", "Se produjo un error y su mensaje no pudo ser enviado. Error: ' . $error_message . '", "error").then(function() {
            window.location = "../servicio/mostrar.php";
        });
        </script>';
    }
}
