<?php
  

  if(isset($_POST['stdltserv']))
{
    $idservc = $_POST['txtidc'];
    
    try {

        $query = "UPDATE servicio SET  estod='Inactivo' WHERE idservc=:idservc LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':idservc' => $idservc
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../servicio/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../servicio/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>