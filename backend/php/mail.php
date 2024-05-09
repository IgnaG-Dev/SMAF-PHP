 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="/smaf/backend/js/jquery-3.3.1.slim.min.js"></script>
 <script src="/smaf/backend/js/popper.min.js"></script>
 <script src="/smaf/backend/js/bootstrap.min.js"></script>
 <script src="/smaf/backend/js/jquery-3.3.1.min.js"></script>
 <script src="/smaf/backend/js/sweetalert.js"></script>

 <style>
     main,
     body,
     header {
         background-color: black;
     }
 </style>

 <?php

    /**
     * This example shows how to send a message to a whole list of recipients efficiently.
     */

    //Import the PHPMailer class into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    error_reporting(E_STRICT | E_ALL);

    date_default_timezone_set('Etc/UTC');

    $error = false;

    require '../../vendor/autoload.php';

    //Passing `true` enables PHPMailer exceptions
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPKeepAlive = true; //SMTP connection will not close after each email sent, reduces SMTP overhead
    $mail->Port = 587;
    $mail->Username = 'ignaciogauto14@gmail.com';
    $mail->Password = 'bvxorfdgvndunwso';
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('smaf@gmail.com', 'SMAF - Acondicionamiento Físico');
    $mail->addReplyTo('smaf@gmail.com', 'SMAF - Acondicionamiento Físico');
    $mail->addCustomHeader(
        'Este es un header',
        '<mailto:ignaciogauto14@gmail.com>, <https://www.example.com/unsubscribe.php>'
    );
    $mail->Subject = '¡Atención! Pago pendiente para SMAF - Última oportunidad';

    //Same body for all messages, so set this before the sending loop
    //If you generate a different body for each recipient (e.g. you're using a templating system),
    //set it inside the loop

    //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
    $mail->AltBody = '¡Para ver el mensaje, por favor usa un email combatible para ver HTML!';
    $mail->addEmbeddedImage('C:/xampp/htdocs/smaf/backend/img/logo.png', 'logo', 'logo', 'base64', 'image/png');
    $mail->addEmbeddedImage('C:/xampp/htdocs/smaf/backend/img/nico.webp', 'nico', 'nico', 'base64', 'image/webp');

    require '../../backend/bd/ctconex.php';
    $sentencia = $connect->prepare("SELECT servicio.profe, servicio.idservc, plan.idplan, plan.foto, plan.nompla, servicio.ini, servicio.fin, clientes.idclie, clientes.numid, clientes.nomcli, clientes.apecli, clientes.naci, clientes.celu, clientes.correo, servicio.estod, servicio.fere FROM servicio INNER JOIN plan ON servicio.idplan = plan.idplan INNER JOIN clientes ON servicio.idclie = clientes.idclie order BY idservc DESC;");
    $sentencia->execute();

    $data = array();
    if ($sentencia) {
        while ($r = $sentencia->fetchObject()) {
            $data[] = $r;
        }
    }

    if (count($data) == 0){
        $error = true;
    }

    foreach ($data as $f) {
        if ($f->estod == "Activo") {
            try {
                $mail->addAddress($f->correo, $f->nomcli);
            } catch (Exception $e) {
                echo 'Email invalido, continuando: ' . htmlspecialchars($f->correo) . '<br>';
                continue;
            }

            $ruta_archivo = "http://localhost/smaf/frontend/servicio/ticket.php?id=$f->idservc";
            $fichero = file_get_contents($ruta_archivo);
            $mail->addStringAttachment($fichero, "factura.pdf");

            $ruta_archivo = "http://localhost/smaf/backend/php/contenidoMail.php?id=$f->idservc";
            $body = file_get_contents($ruta_archivo);
            $mail->msgHTML($body);

            $mail->replaceCustomHeader(
                'otro HEader',
                '<mailto:unsubscribes@example.com>, <https://www.example.com/unsubscribe.php?email=' .
                    rawurlencode($f->correo) . '>'
            );

            try {
                $mail->send();

            } catch (Exception $e) {
                echo 'Mailer Error (' . htmlspecialchars($f->correo) . ') ' . $mail->ErrorInfo . '<br>';
                $error = true;
                //Reset the connection to abort sending this message
                //The loop will continue trying to send to the rest of the list
                $mail->getSMTPInstance()->reset();
            }
            //Clear all addresses and attachments for the next iteration
            $mail->clearAddresses();
            $mail->clearAttachments();
        }
    }

    echo "Enviado";

    if ($error != 1) {
        $correosNombresEnviados = array();
    
        foreach ($data as $f) {
            if ($f->estod == "Activo") {
                $correosNombresEnviados[] = $f->correo . ' - ' . $f->nomcli;
            }
        }
    
        $correosNombresEnviadosStr = implode('\n ', $correosNombresEnviados);
    
        echo '<script type="text/javascript">
            swal({
                title: "¡Enviado!",
                text: "Se enviaron los correos correctamente a:\n\n ' . htmlspecialchars($correosNombresEnviadosStr) . '",
                icon: "success"
            }).then(function() {
                window.location = "/smaf/frontend/servicio/mostrar.php";
            });
        </script>';
    } else {
        echo '<script type="text/javascript">
            swal("¡Error!", "No se enviaron los correos", "error").then(function() {
                window.location = "/smaf/frontend/servicio/mostrar.php";
            });
        </script>';
    }
    
