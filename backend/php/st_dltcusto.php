<?php
  

  if(isset($_POST['stdltcst']))
{
    $idclie = $_POST['txtidc'];
    
    try {

        $query = "UPDATE clientes SET  estad='Inactivo' WHERE idclie=:idclie LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
           
            
            ':idclie' => $idclie
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>