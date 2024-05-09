<?php  
require_once('../../backend/bd/ctconex.php');
 if(isset($_POST['staddcust']))
 {
  
    $numid=$_POST['txtnum'];
    $nomcli=$_POST['txtnaame'];
    $apecli=$_POST['txtape'];
    $naci=$_POST['txtnaci'];
    $correo=$_POST['txtema'];
    $celu=$_POST['txtcel'];
    $estad=$_POST['txtesta'];
    
  if(empty($numid)){
   $errMSG = "Please enter your inicio.";
  }

  $stmt = "SELECT * FROM clientes  WHERE numid='$numid'";


   if(empty($numid)) {
             echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';
         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM clientes  WHERE numid='$numid'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
   $stmt = $connect->prepare("INSERT INTO clientes(numid, nomcli,apecli,naci,correo,celu,estad) VALUES(:numid, :nomcli,:apecli,:naci,:correo,:celu,:estad)");
   $stmt->bindParam(':numid',$numid);
   $stmt->bindParam(':nomcli',$nomcli);
   $stmt->bindParam(':apecli',$apecli);
   $stmt->bindParam(':naci',$naci);
   $stmt->bindParam(':correo',$correo);
   $stmt->bindParam(':celu',$celu);
   $stmt->bindParam(':estad',$estad);
   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';
   }
   else
   {
    $errMSG = "error while inserting....";
   }

  } 
            }

                else{

                     echo '<script type="text/javascript">
swal("Error!", "ya existe el registro!", "error").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>