<?php  
    if (!isset($_GET['id'])) {
        exit();
    }

    $id = $_GET['id'];
    include '../../backend/bd/ctconex.php';

    $sentencia = $connect->prepare("DELETE FROM cart WHERE idv = ?;");
    $resultado = $sentencia->execute([$id]);

    if ($resultado === TRUE) {
        

            header('Location: ../venta/nuevo.php');

    }else{
        

         echo '<script type="text/javascript">
swal("Error!", "No se pueden eliminar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../venta/nuevo.php;
        });
        </script>';
    }

?>