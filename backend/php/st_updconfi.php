<?php
  

  if(isset($_POST['stupdconfi']))
{
    $idsett = $_POST['txtidadm'];
    $nomem = $_POST['txtnaame'];
    $ruc = $_POST['txtruc'];
    $decrp = $_POST['txtdesc'];
    $corr = $_POST['txtcorr'];
    $direc1 = $_POST['txtdirc1'];
    $direc2 = $_POST['txtdirec2'];
    $celu = $_POST['txtcel'];
    

    try {

        $query = "UPDATE setting SET nomem=:nomem, ruc=:ruc,decrp=:decrp,corr=:corr,direc1=:direc1,direc2=:direc2,celu=:celu WHERE idsett=:idsett LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nomem' => $nomem,
            ':ruc' => $ruc,
            ':decrp' => $decrp,
            ':corr' => $corr,
            ':direc1' => $direc1,
            ':direc2' => $direc2,
            ':celu' => $celu,
            ':idsett' => $idsett
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../cuenta/configuracion.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../cuenta/configuracion.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>