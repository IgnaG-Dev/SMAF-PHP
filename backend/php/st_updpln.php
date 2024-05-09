<?php
  

  if(isset($_POST['stupdplan']))
{
    $idplan = $_POST['txtidc'];
    $nompla = $_POST['txtnampla'];
    $estp = $_POST['txtesta'];
    $prec = $_POST['txtprepl'];
    

    try {

        $query = "UPDATE plan SET nompla=:nompla, estp=:estp,prec=:prec WHERE idplan=:idplan LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nompla' => $nompla,
            ':estp' => $estp,
            ':prec' => $prec,
           
           
            ':idplan' => $idplan
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../plan/mostrar.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../plan/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>