<?php
  

  if(isset($_POST['stdltprod']))
{
    $idprod = $_POST['txtidc'];
    
    try {

        $query = "UPDATE producto SET  esta='Inactivo' WHERE idprod=:idprod LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
           
            
            ':idprod' => $idprod
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../producto/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../producto/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>