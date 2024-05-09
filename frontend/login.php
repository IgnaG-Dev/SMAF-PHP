<?php
session_start();
    if (isset($_SESSION['id'])){
        header('Location: administrador/escritorio.php');
    } 
include_once '../backend/php/ctlogx.php'
 ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAF GYM</title>
    <link rel="stylesheet" href="../backend/css/style.css">
    <link rel="icon" type="image/png" href="../backend/img/favicon.webp"/>
</head>
<body>
    <div class="login-wrapper">

        <div class=" box-image box-col">
 <img src="../backend/img/sideimage.webp" alt="sideimage"> 
        </div>
        <div class="box-col">
           <div class="box-form">
               <div class="inner">
                   <div class="form-head">
                       <div class="title">
                           Bienvenido de nuevo
                       </div>
                       <br>
                       <?php 
                            if (isset($errMsg)) {
                                echo '
    <div style="color:#FF0000;text-align:center;font-size:20px; font-weight:bold;">'.$errMsg.'</div>
    ';  ;
                            }

                        ?>
                       <form class="login-form" autocomplete="off" method="post"  role="form">
                       <div class="form-group">
                           <div class="label-text">Nombre de usuario</div>
                           <input type="text" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>"  autocomplete="off" required class="form-control" placeholder="Ingrese su usuario">
                       </div>
                       <div class="form-group">
                           <div class="label-text">Contraseña</div>
                           <input name="clave" value="<?php if(isset($_POST['clave'])) echo MD5($_POST['clave']) ?>" type="password" required class="form-control" placeholder="Ingrese su contraseña">
                       </div>
                       <div class="actions">
                           <button name='ctglog' type="submit" class="btn btn-submit">Acceder</button>
                       </div>
                       </form>
                   </div>
               </div>
           </div>

        </div>
    </div>
  <script src="../backend/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../backend/js/reenvio.js"></script>
</body>
</html>