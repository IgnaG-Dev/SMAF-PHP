<?php  
require_once('../../backend/bd/ctconex.php');
 if(isset($_POST['staddcate']))
 {
  
    $nomca=$_POST['txtnaame'];
    $estado=$_POST['txtesta'];
    
  if(empty($nomca)){
   $errMSG = "Please enter your inicio.";
  }

  $stmt = "SELECT * FROM categoria  WHERE nomca='$nomca'";


   if(empty($nomca)) {
             echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../categoria/mostrar.php";
        });
        </script>';
         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM categoria  WHERE nomca='$nomca'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
   $stmt = $connect->prepare("INSERT INTO categoria(nomca, estado) VALUES(:nomca, :estado)");
   $stmt->bindParam(':nomca',$nomca);
   $stmt->bindParam(':estado',$estado);
   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../categoria/mostrar.php";
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
            window.location = "../categoria/mostrar.php";
        });
        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>