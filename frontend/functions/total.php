  
  <?php 
  require '../../backend/bd/ctconex.php'; 
  $el_continente = $_POST['continente'];
  $stmt = $connect->query("SELECT * FROM plan WHERE idplan = $el_continente");


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

  echo '<option value="' . $row['prec']. '">' . $row['prec'] . '</option>' . "\n";
}

   ?>

  