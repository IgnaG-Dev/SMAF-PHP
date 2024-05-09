<?php
require_once('../../backend/bd/ctconex.php');
if (isset($_POST['staddplan'])) {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email

  $nompla = trim($_POST['txtnampla']);
  $estp = trim($_POST['txtesta']);
  $prec = trim($_POST['txtprepl']);



  if (empty($nompla)) {
    $errMSG = "Please enter number.";
  } else {
    $upload_dir = '../../backend/img/subidas/'; // upload directory

  }


  $stmt = "SELECT * FROM plan WHERE nompla ='$nompla'";
  if (empty($nompla)) {
    echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../plan/nuevo.php";
        });
        </script>';
  } else {  // Validaremos primero que el document no exista
    $sql = "SELECT * FROM plan WHERE nompla ='$nompla'";


    $stmt = $connect->prepare($sql);
    $stmt->execute();

    if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
    {
      if (!isset($errMSG)) {
        $stmt = $connect->prepare("INSERT INTO plan(nompla, estp,prec) VALUES(:nompla,:estp,:prec)");
        $stmt->bindParam(':nompla', $nompla);
        $stmt->bindParam(':estp', $estp);
        $stmt->bindParam(':prec', $prec);

        if ($stmt->execute()) {
          echo '<script type="text/javascript">
swal("¡Registrado!", "Se agrego correctamente", "success").then(function() {
            window.location = "../plan/mostrar.php";
        });
        </script>';
        } else {
          $errMSG = "error while inserting....";
        }
      }
    } else {

      echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../plan/nuevo.php";
        });
        </script>';

      // if no error occured, continue ....

    }
  }
}
