    <?php 
require_once('../../backend/bd/ctconex.php');
if(isset($_POST['staddgast']))
{

    $detall=trim($_POST['detta']);
    $total=trim($_POST['montoot']);
    $fec=trim($_POST['feat']);
   

       $d3 = $connect->prepare("INSERT INTO gastos (detall,total,fec) VALUES('$detall','$total','$fec')");

             $inserted = $d3->execute();

             if($inserted>0){

         echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../gastos/mostrar.php";
        });
        </script>';
}else{
    
        echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador!", "error").then(function() {
            window.location = "../gastos/mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
    


    }

?>