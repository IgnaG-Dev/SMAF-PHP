<?php
  

  if(isset($_POST['stdltcate']))
{
    $idcate = $_POST['txtidc'];
    
    try {

        $query = "UPDATE categoria SET  estado='Inactivo' WHERE idcate=:idcate LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
           
            
            ':idcate' => $idcate
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../categoria/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../categoria/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>