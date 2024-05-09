<?php
  

  if(isset($_POST['stdltvent']))
{
    $idord = $_POST['txtidc'];
    
    try {

        $query = "UPDATE orders SET  payment_status='Inactivo' WHERE idord=:idord LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
           
            
            ':idord' => $idord
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../venta/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../venta/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>