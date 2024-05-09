<?php 

include('../../backend/bd/ctconex.php');
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require_once ('../../backend/vendor/autoload.php');

if(isset($_POST['importar']))
{
  
  $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["exceldata"]["type"], $allowedFileType)) {
  $filename=$_FILES['exceldata']['name'];
  $tempname=$_FILES['exceldata']['tmp_name'];
  
  move_uploaded_file($tempname,'../../backend/uploads/'.$filename);
  
  
 $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
 $spreadSheet = $Reader->load('../../backend/uploads/'.$filename);
 $excelSheet = $spreadSheet->getActiveSheet();
 $spreadSheetAry = $excelSheet->toArray();
 $sheetCount = count($spreadSheetAry);
 
 for($i=1;$i<$sheetCount;$i++)
 {
   //$sql="insert into enquiry (name,email,mobile,message) values ('".$spreadSheetAry[$i][0]."','".$spreadSheetAry[$i][1]."','".$spreadSheetAry[$i][2]."','".$spreadSheetAry[$i][3]."')";
   
  // mysqli_query($conn,$sql);


  $d4 = $connect->prepare("INSERT INTO enquiry (numid, nomcli,apecli,naci,correo,celu,estad) VALUES('".$spreadSheetAry[$i][0]."','".$spreadSheetAry[$i][1]."','".$spreadSheetAry[$i][2]."','".$spreadSheetAry[$i][3]."','".$spreadSheetAry[$i][4]."','".$spreadSheetAry[$i][5]."', '".$spreadSheetAry[$i][6]."')"); 

    $inserted = $d4->execute();

    if ($inserted>0) {
      // code...
      echo '<script type="text/javascript">
swal("¡Registrado!", "Se agrego correctamente", "success").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';
    }

             
 }
  }
  
  else 
  {
    echo 'Please Upload Excel File; Check File Extenstion';
  }
}


?>
