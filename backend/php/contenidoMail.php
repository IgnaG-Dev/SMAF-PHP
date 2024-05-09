<?php
require '../../backend/bd/ctconex.php';

$stmt_setting = $connect->prepare("SELECT * FROM setting");
$stmt_setting->setFetchMode(PDO::FETCH_ASSOC);
$stmt_setting->execute();

// Obtener detalles del usuario y el servicio
$id = $_GET['id'];
$stmt_servicio = $connect->prepare("SELECT servicio.idservc, plan.idplan, plan.foto, plan.prec,plan.nompla, servicio.ini, servicio.fin, clientes.idclie, clientes.numid, clientes.nomcli, clientes.apecli, clientes.naci, clientes.celu, clientes.correo, servicio.estod, servicio.fere, servicio.canc FROM servicio INNER JOIN plan ON servicio.idplan = plan.idplan INNER JOIN clientes ON servicio.idclie = clientes.idclie WHERE servicio.idservc= '$id'");
$stmt_servicio->setFetchMode(PDO::FETCH_ASSOC);
$stmt_servicio->execute();

while ($row = $stmt_servicio->fetch()) : 
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>¡Atención! Pago pendiente para SMAF - Última oportunidad</title>
        <style>
            /* Estilos del correo electrónico */
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
        <div class="container">
            <div class="header">
                <a href="#">
                    <img src="cid:logo" class="logo">
                </a>
                <div></div>
            </div>
            <div class="content">
                <h1 class="title">¡Atención! Pago pendiente para SMAF - Última oportunidad</h1>
                <p class="message">Estimado/a <?php echo $row["apecli"] . " " . $row["nomcli"] ?> ,</p>
                <p class="message">Le informamos que su pago para el servicio SMAF aún está pendiente. La fecha límite de pago es el <strong><?php echo $row['fin'] ?>.</strong> </p>
                <p class="message">Detalles de su servicio:</p>
                <ul>
                    <li class="message">Plan: <?php echo $row['nompla']; ?></li>
                    <li class="message">Precio: <?php echo $row['prec']; ?></li>
                    <li class="message">Fecha de inicio: <?php echo $row['ini']; ?></li>
                    <li class="message">Fecha de fin: <?php echo $row['fin']; ?></li>
                </ul>
                <p class="message"><strong>Si no realiza el pago a tiempo, su servicio podría ser cancelado.</strong> Para evitar inconvenientes y asegurar la continuidad del servicio, le solicitamos que realice el pago a la brevedad posible.</p>
                <p class="reminder">¡Su satisfacción es nuestra prioridad!</p>
                <a href="https://smafsebamontenegro.site/" class="button">Realizar pago ahora</a>
                
                <p>Se adjunta la última factura a este correo electrónico.</p>
              
            </div>
            <a href="#">
                    <img src="cid:nico" class="nico">
                </a>
            <div class="footer">
                <p class="signature">Atentamente, El equipo de SMAF</p>
                <p>Contacto: info@smaf.com / Teléfono: +54 11 4567-8901</p>
                <p><a href="https://smafsebamontenegro.site/">www.smafsebamontenegro.site</a></p>
            </div>

            <p class="claro">Si ya ha realizado el pago, puede ignorar este correo electrónico.</p>
        </div>
    </body>

    </html>

<?php endwhile; ?>