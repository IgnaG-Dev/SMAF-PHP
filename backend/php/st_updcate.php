<?php
  

  if(isset($_POST['stupdcate']))
{
    $idcate = $_POST['txtidc'];
    $nomca = $_POST['txtnaame'];
    $estado = $_POST['txtesta'];
   

    try {

        $query = "UPDATE categoria SET nomca=:nomca, estado=:estado WHERE idcate=:idcate LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nomca' => $nomca,
            ':estado' => $estado,
           
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