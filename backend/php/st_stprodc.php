<?php  
require_once('../../backend/bd/ctconex.php');
 if(isset($_POST['staddprod']))
 {
  
    $codba=$_POST['txtcode'];
    $nomprd=$_POST['txtnampr'];
    $idcate=$_POST['txtcate'];
    $precio=$_POST['txtpre'];
    $stock=$_POST['txtstc'];
    $venci=$_POST['txtvenc'];
    $esta=$_POST['txtesta'];


  if(empty($codba)){
   $errMSG = "Please enter your inicio.";
  }

  $stmt = "SELECT * FROM producto  WHERE codba='$codba'";


   if(empty($codba)) {
             echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../producto/mostrar.php";
        });
        </script>';
         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM producto  WHERE codba='$codba'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
   $stmt = $connect->prepare("INSERT INTO producto(codba, nomprd,idcate,precio,stock,foto,venci,esta) VALUES(:codba, :nomprd,:idcate,:precio,:stock,'producto1.png',:venci,:esta)");
   $stmt->bindParam(':codba',$codba);
   $stmt->bindParam(':nomprd',$nomprd);
   $stmt->bindParam(':idcate',$idcate);
   $stmt->bindParam(':precio',$precio);
   $stmt->bindParam(':stock',$stock);
   $stmt->bindParam(':venci',$venci);
   $stmt->bindParam(':esta',$esta);
   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../producto/mostrar.php";
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
            window.location = "../producto/mostrar.php";
        });
        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>