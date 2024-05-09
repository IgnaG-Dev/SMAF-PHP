<?php

   # Incluyendo librerias necesarias #
    require "../../backend/pdf/code128.php";

    $pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
    # Encabezado y datos de la empresa #
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    
     require '../../backend/bd/ctconex.php';

    $stmt = $connect->prepare("SELECT * FROM setting");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
while($a = $stmt->fetch()){

    $pdf->MultiCell(0,5,utf8_decode(strtoupper($a['nomem'])),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("RUC: ".$a['ruc']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Direccion: ".$a['direc1']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono:".$a['celu']),0,'C',false);


   }

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

   
    $pdf->MultiCell(0,5,utf8_decode("Fecha:".date("d/m/Y") ),0,'C',false);

     $id = $_GET['id'];
    $stmt = $connect->prepare("SELECT orders.idord, orders.user_id, clientes.idclie,clientes.numid, clientes.nomcli, clientes.apecli, clientes.celu, orders.method, orders.total_products, orders.total_price, orders.placed_on, orders.payment_status, orders.tipc FROM orders INNER JOIN clientes on orders.user_cli = clientes.idclie WHERE orders.idord= '$id'");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
while($row = $stmt->fetch()){

    $pdf->MultiCell(0,5,utf8_decode("Caja Nro: 1"),0,'C',false);


    $pdf->MultiCell(0,5,utf8_decode("Cajero: administrador"),0,'C',false);
    $pdf->SetFont('Arial','B',10);

    
  
    $pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro:". $row['idord'] )),0,'C',false);
    $pdf->SetFont('Arial','',9);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);


    $pdf->MultiCell(0,5,utf8_decode("Cliente:". $row['nomcli'] ."\n". $row['apecli']),0,'C',false);

    $pdf->MultiCell(0,5,utf8_decode("Telefono:". $row['celu']),0,'C',false);
    

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
   
    $pdf->Cell(70,5,utf8_decode("Productos"),0,0,'C');
    

    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);


    /*----------  Detalles de la tabla  ----------*/
   
    
   
    $pdf->MultiCell(0,4,utf8_decode($row['total_products'] ),0,'C',false);
  
    $pdf->Ln(4);
   
    /*----------  Fin Detalles de la tabla  ----------*/



    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

        $pdf->Ln(5);

    # Impuestos & totales #
    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("SUBTOTAL"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("S/".$row['total_price']),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("IVA (0%)"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("S/".$row['total_price']),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');

    $pdf->Ln(5);

    $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
    $pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
    $pdf->Cell(32,5,utf8_decode("S/".$row['total_price']),0,0,'C');

    
    $pdf->Ln(10);

    $pdf->MultiCell(0,5,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***"),0,'C',false);

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(0,7,utf8_decode("Gracias por su compra"),'',0,'C');

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Code128(5,$pdf->GetY(),"COD000001V000".$row['idord'],70,20);
    $pdf->SetXY(0,$pdf->GetY()+21);
    $pdf->SetFont('Arial','',14);
    $pdf->MultiCell(0,5,utf8_decode("COD000001V000".$row['idord']),0,'C',false);
}
    # Nombre del archivo PDF #
   
    $pdf->Output('ticket.pdf', 'D');