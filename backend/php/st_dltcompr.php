<?php
  

  if(isset($_POST['stdltcompr']))
{
    $idcomp = $_POST['txtidc'];
    
    try {

        $query = "UPDATE compra SET  payment_status='Inactivo' WHERE idcomp=:idcomp LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
           
            
            ':idcomp' => $idcomp
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../compra/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../compra/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>