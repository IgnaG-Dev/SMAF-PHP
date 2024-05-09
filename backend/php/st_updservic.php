<?php
  

  if(isset($_POST['stupdserv']))
{
    $idservc = $_POST['txtidc'];
    $idplan = $_POST['txtpln'];
    $ini = $_POST['txtini'];
    $fin = $_POST['txtfin'];
    $idclie = $_POST['txtcli'];
    $estod = $_POST['txtesta'];
    $meto = $_POST['txtmeto'];
    

    try {

        $query = "UPDATE servicio SET idplan=:idplan, ini=:ini,fin=:fin,idclie=:idclie,estod=:estod, meto=:meto WHERE idservc=:idservc LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':idplan' => $idplan,
            ':ini' => $ini,
            ':fin' => $fin,
            ':idclie' => $idclie,
            ':estod' => $estod,
            ':meto' => $meto,
            
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