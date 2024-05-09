<?php
  

  if(isset($_POST['stupdcst']))
{
    $idclie = $_POST['txtidc'];
    $numid = $_POST['txtnum'];
    $nomcli = $_POST['txtnaame'];
    $apecli = $_POST['txtape'];
    $naci = $_POST['txtnaci'];
    $correo = $_POST['txtema'];
    $celu = $_POST['txtcel'];
    $estad = $_POST['txtesta'];

    try {

        $query = "UPDATE clientes SET numid=:numid, nomcli=:nomcli,apecli=:apecli,naci=:naci,correo=:correo,celu=:celu,estad=:estad WHERE idclie=:idclie LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':numid' => $numid,
            ':nomcli' => $nomcli,
            ':apecli' => $apecli,
            ':naci' => $naci,
            ':correo' => $correo,
            ':celu' => $celu,
            ':estad' => $estad,
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