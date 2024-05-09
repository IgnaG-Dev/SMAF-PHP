<?php
  

  if(isset($_POST['update_qty_compra']))
{
    $idcarco = $_POST['prdt'];
    $quantity = $_POST['p_qty'];
    

    try {

        $query = "UPDATE cart_compra SET quantity=:quantity WHERE idcarco=:idcarco LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':quantity' => $quantity,
            ':idcarco' => $idcarco
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../compra/nuevo.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../compra/nuevo.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>