<?php
  

  if(isset($_POST['stupdprof']))
{
    $id = $_POST['txtidadm'];
    $nombre = $_POST['txtnaame'];
    $usuario = $_POST['txtusr'];
    $correo = $_POST['txtcorr'];
    $rol = $_POST['txtcarr'];

    try {

        $query = "UPDATE usuarios SET nombre=:nombre, usuario=:usuario,correo=:correo,rol=:rol WHERE id=:id LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nombre' => $nombre,
            ':usuario' => $usuario,
            ':correo' => $correo,
            ':rol' => $rol,
           
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {

         echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../cuenta/perfil.php";
        });
        </script>';

            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../cuenta/perfil.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>