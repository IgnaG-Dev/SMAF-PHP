 <?php 
 require '../../backend/bd/ctconex.php';
 echo '<option value="0">----------Seleccione------------</option>';
 $stmt = $connect->prepare("SELECT * FROM plan where estp='Activo' order by idplan desc");

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idplan; ?>"><?php echo $nompla; ?></option>

            <?php
        }

  ?>
