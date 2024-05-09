<?php

# Incluyendo librerias necesarias #
require "../../backend/pdf/code128.php";

$pdf = new PDF_Code128('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

# Logo de la empresa formato png #
$pdf->Image('../../backend/img/logo.png', 165, 12, 35, 35, 'PNG');

require '../../backend/bd/ctconex.php';

$stmt = $connect->prepare("SELECT * FROM setting");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();

$id = $_GET['id'];
$stmt = $connect->prepare("SELECT servicio.idservc, plan.idplan, plan.foto, plan.prec,plan.nompla, servicio.ini, servicio.fin, clientes.idclie, clientes.numid, clientes.nomcli, clientes.apecli, clientes.naci, clientes.celu, clientes.correo, servicio.estod, servicio.fere, servicio.canc FROM servicio INNER JOIN plan ON servicio.idplan = plan.idplan INNER JOIN clientes ON servicio.idclie = clientes.idclie WHERE servicio.idservc= '$id'");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();

while ($row = $stmt->fetch()) {

    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(32, 100, 210);
    $pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("SMAF - Centro de Acondicionamiento")), 0, 0, 'L');

    $pdf->Ln(9);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(39, 39, 51);
    $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "CUIL: 0000000000"), 0, 0, 'L');

    $pdf->Ln(5);

    $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Direccion Goya, Corrientes"), 0, 0, 'L');

    $pdf->Ln(5);

    $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Teléfono: 3777847394"), 0, 0, 'L');

    $pdf->Ln(5);

    $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Email: sebamontenegro@gmail.com"), 0, 0, 'L');

    $pdf->Ln(10);

    $pdf->Ln(7);

    # Detalles del ticket #
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 7, iconv("UTF-8", "ISO-8859-1", "Fecha de emisión:"), 0, 0);
    $pdf->SetTextColor(97, 97, 97);
    $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", date("d/m/Y h:i A")), 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(39, 39, 51);
    $pdf->Cell(50, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("Ticket Nro:" . $row['idservc'])), 0, 0, 'C');

    $pdf->Ln(7);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(50, 7, iconv("UTF-8", "ISO-8859-1", "Cajero:"), 0, 0, 'L');
    $pdf->SetTextColor(97, 97, 97);
    $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", "Seba Montenegro"), 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(39, 39, 51);
    $pdf->Cell(50, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("1")), 0, 0, 'C');


    $pdf->Ln(10);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(39, 39, 51);
    $pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "Cliente:"), 0, 0);
    $pdf->SetTextColor(97, 97, 97);
    $pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", $row['nomcli'] . " " . $row['apecli']), 0, 0, 'L');
    $pdf->SetTextColor(39, 39, 51);
    $pdf->Cell(8, 7, iconv("UTF-8", "ISO-8859-1", "DNI: "), 0, 0, 'L');
    $pdf->SetTextColor(97, 97, 97);
    $pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", $row['numid']), 0, 0, 'L');
    $pdf->SetTextColor(39, 39, 51);
    $pdf->Cell(7, 7, iconv("UTF-8", "ISO-8859-1", "Tel:"), 0, 0, 'L');
    $pdf->SetTextColor(97, 97, 97);
    $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", $row['celu']), 0, 0);
    $pdf->SetTextColor(39, 39, 51);

    $pdf->Ln(7);

    $pdf->SetTextColor(39, 39, 51);
    $pdf->Cell(6, 7, iconv("UTF-8", "ISO-8859-1", "Dir:"), 0, 0);
    $pdf->SetTextColor(97, 97, 97);
    $pdf->Cell(109, 7, iconv("UTF-8", "ISO-8859-1", "Goya, Corrientes"), 0, 0);

    $pdf->Ln(9);

    # Tabla de productos #
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetFillColor(23, 83, 201);
    $pdf->SetDrawColor(23, 83, 201);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(90, 8, iconv("UTF-8", "ISO-8859-1", "Servicio"), 1, 0, 'C', true);
    $pdf->Cell(15, 8, iconv("UTF-8", "ISO-8859-1", "Cant."), 1, 0, 'C', true);
    $pdf->Cell(25, 8, iconv("UTF-8", "ISO-8859-1", "Precio"), 1, 0, 'C', true);
    $pdf->Cell(19, 8, iconv("UTF-8", "ISO-8859-1", "Desc."), 1, 0, 'C', true);
    $pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Subtotal"), 1, 0, 'C', true);

    $pdf->Ln(8);


    $pdf->SetTextColor(39, 39, 51);



    /*----------  Detalles de la tabla  ----------*/
    $pdf->Cell(90, 7, iconv("UTF-8", "ISO-8859-1", $row['nompla']), 'L', 0, 'C');
    $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", "1"), 'L', 0, 'C');
    $pdf->Cell(25, 7, iconv("UTF-8", "ISO-8859-1", "$" . $row['prec'] . " ARS"), 'L', 0, 'C');
    $pdf->Cell(19, 7, iconv("UTF-8", "ISO-8859-1", "$0.00 ARS"), 'L', 0, 'C');
    $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "$" . $row['prec'] . " ARS"), 'LR', 0, 'C');
    $pdf->Ln(7);
    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->SetFont('Arial', 'B', 9);

    # Impuestos & totales #
    $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
    $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
    $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "SUBTOTAL"), 'T', 0, 'C');
    $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+ $" . $row['prec'] . " ARS"), 'T', 0, 'C');

    $pdf->Ln(7);

    $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
    $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');

    $pdf->Ln(7);

    $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
    $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');


    $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 'T', 0, 'C');
    $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "$" . $row['prec'] . "ARS"), 'T', 0, 'C');

    $pdf->Ln(7);

    $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
    $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
    $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL PAGADO"), '', 0, 'C');
    $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "$" . $row['canc'] . "ARS"), '', 0, 'C');

    $pdf->Ln(7);

    $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
    $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
    $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "USTED AHORRA"), '', 0, 'C');
    $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "$0.00 ARS"), '', 0, 'C');

    $pdf->Ln(12);

    $pdf->SetFont('Arial', '', 9);

    $pdf->SetTextColor(39, 39, 51);
    $pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Para poder realizar un reclamo o devolución debe de presentar esta factura ***"), 0, 'C', false);

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->SetFillColor(39, 39, 51);
    $pdf->SetDrawColor(23, 83, 201);
    $pdf->Code128(72, $pdf->GetY(), "COD000001V0001", 70, 20);
    $pdf->SetXY(12, $pdf->GetY() + 21);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "COD000001V0001"), 0, 'C', false);
}

# Nombre del archivo PDF #
$pdf->Output("I", "Factura_Nro_1.pdf", true);
