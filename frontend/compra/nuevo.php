<?php
ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../erro404.php');
  }
?>
<?php if(isset($_SESSION['id'])) { ?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>SMAF GYM</title>
         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../backend/css/bootstrap.min.css">
         <!----css3---->
        <link rel="stylesheet" href="../../backend/css/custom.css">
        <link rel="stylesheet" href="../../backend/css/loader.css">


                     <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="../../backend/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/buttonsdataTables.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/font.css">

          <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
     
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
     <!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
      <link rel="icon" type="image/png" href="../../backend/img/favicon.webp"/>
  </head>
  <body>
  
<div class="wrapper">
   
<div class="body-overlay"></div>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../../backend/img/favicon.webp" class="img-fluid"/><span>SMAF GYM</span></h3>
            </div>
            <ul class="list-unstyled components">
               <li  class="">
                    <a href="../administrador/escritorio.php" class="dashboard"><i class="material-icons">dashboard</i><span>Panel administrativo</span></a>
                </li>
          
               
               
                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">group</i><span>Clientes</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li>
                            <a href="../clientes/mostrar.php">Mostrar</a>
                        </li>
                        <li>
                            <a href="../clientes/nuevo.php">Nuevo</a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">dataset</i><span>Planes</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                        <li>
                            <a href="../plan/mostrar.php">Mostrar</a>
                        </li>
                        <li>
                            <a href="../plan/nuevo.php">Nuevo</a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="../servicio/mostrar.php"><i class="material-icons">view_timeline</i><span>Servicio</span></a>
                </li>
                    
                     <li class="dropdown">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">manage_accounts</i>
                    
                         
                         <span>Usuarios</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                        <li>
                            <a href="../usuario/mostrar.php">Mostrar</a>
                        </li>
                       
                    </ul>
                </li>
                      <li class="dropdown">
                    <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">conveyor_belt</i><span>Productos</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                        <li>
                            <a href="../producto/mostrar.php">Mostrar</a>
                        </li>
                        <li>
                            <a href="../producto/nuevo.php">Nuevo</a>
                        </li>
                    </ul>
                </li>
                    
                    <li class="dropdown">
                    <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">category</i><span>Categorias</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                        <li class="">
                            <a href="../categoria/mostrar.php">Mostrar</a>
                        </li>
                        <li>
                            <a href="../categoria/nuevo.php">Nuevo</a>
                        </li>
                    </ul>
                </li>
               
                  
                  
                  <li class="dropdown ">
                    <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">point_of_sale</i><span>Ventas</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu6">
                        <li class="">
                            <a href="../venta/mostrar.php">Mostrar</a>
                        </li>
                        <li>
                            <a href="../venta/nuevo.php">Nuevo</a>
                        </li>
                    </ul>
                </li>

                 <li class="dropdown active">
                    <a href="#pageSubmenu09" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">shopping_basket</i><span>Compras</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu09">
                        <li>
                            <a href="../compra/mostrar.php">Mostrar</a>
                        </li>
                        <li class="active">
                            <a href="../compra/nuevo.php">Nuevo</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#pageSubmenu010" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">savings</i><span>Gastos</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu010">
                        <li>
                            <a href="../gastos/mostrar.php">Mostrar</a>
                        </li>
                        <li>
                            <a href="../gastos/nuevo.php">Nuevo</a>
                        </li>
                    </ul>
                </li>
               
                  
                    <li class="dropdown">
                    <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                         <i class="material-icons">signal_cellular_alt</i><span>Reportes</span></a>
                    <ul class="collapse list-unstyled menu" id="pageSubmenu7">
                        <li>
                            <a href="../reporte/productos.php">Productos</a>
                        </li>
                        <li>
                            <a href="../reporte/clientes.php">Clientes</a>
                        </li>
                        <li>
                            <a href="../reporte/ventas.php">Ventas</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="../graficos/mostrar.php"><i class="material-icons">grain</i><span>Graficos</span></a>
                </li>
               <li class="">
                    <a href="../cuenta/configuracion.php"><i class="material-icons">settings</i><span>Configuracion</span></a>
                </li>
                   
            </ul>

        </nav>
          
        <!-- Page Content  -->
        <div id="content">
          <div class='pre-loader'>
    <img class='loading-gif' alt='loading' src="https://media.giphy.com/media/TPFdnUyWNNQYMke6gU/giphy.gif"/>
</div>
          <div class="top-navbar">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>
                         
                         <a class="navbar-brand" href="#"> Compras </a>
                         
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                         data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-icons">more_vert</span>
                    </button>

                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">  
                         <li class="nav-item">
                                <a class="nav-link" href="../cuenta/configuracion.php">
                                        <span class="material-icons">settings</span>
                                        </a>
                            </li> 
                            <li class="dropdown nav-item active">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                   
                                   <img src="../../backend/img/reere.png" >
                                           
                               </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="../cuenta/perfil.php">Mi perfil</a>
                                    </li>
                                    <li>
                                        <a href="../cuenta/salir.php">Salir</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
         </div>
               
               
               <div class="main-content">
               
                         <div class="row ">
                        <div class="col-lg-6 col-md-6">

                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Compras</h4>
                                    <p class="category">Nuevas compras</p>
                                </div>
                                <br>
                             
                               <div class="card-content table-responsive">
                                  <table class="table table-hover" id="example1">
                                      <thead class="text-primary"> 
                                          <tr>
                                              <th>Articulo</th>
                                              <th>Precio</th>
                                              <th>Stock</th>
                                              <th>Cantidad</th>
                                              <th>Subtotal</th>
                                              <th></th>
                                          </tr>

                                      </thead>
                                      <tbody>
                                        <?php
      require_once('../../backend/bd/ctconex.php');
      $grand_total = 0;
      $select_cart = $connect->prepare("SELECT cart_compra.idcarco, usuarios.id, usuarios.nombre, producto.idprod, producto.codba, producto.nomprd, producto.precio, producto.stock, cart_compra.name, cart_compra.price, cart_compra.quantity FROM cart_compra INNER JOIN usuarios ON cart_compra.user_id = usuarios.id INNER JOIN producto ON cart_compra.idprod = producto.idprod");
       $select_cart->execute();
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){ 
   ?>
                                          <td><?= $fetch_cart['nomprd']; ?></td>
                                          <td><?= $fetch_cart['precio']; ?></td>
                                          <td><?= $fetch_cart['stock']; ?></td>
                                          <td>
                                              <form action="" method="POST">
                  <div class="form-group">
                     <input type="hidden" name="prdt" value="<?= $fetch_cart['idcarco']; ?>">
                       <input type="number" name="p_qty" value="<?= $fetch_cart['quantity']; ?>" style="width:100px;" min="1" max="99" class="form-control" placeholder="Cantidad">
                     </div>
                <button type="submit" name="update_qty_compra" class="btn btn-danger"> <i class='material-icons' data-toggle='tooltip' title='crear'>refresh</i></button>
               </form>
                                          </td>
                                          <td><span><?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></span></td>
                                          <td>
                                          <a class="btn btn-danger" onclick="return confirm('Eliminar del carrito?');" href="../compra/eliminar.php?id=<?= $fetch_cart['idcarco']; ?>"><i class='material-icons' data-toggle='tooltip' title='crear'>close</i></a>    
                                          </td>
                                      </tbody>
                                      <?php
      $grand_total += $sub_total;
      }
   }else{
      echo '<p class="alert alert-warning">Tu carrito esta vació</p>';
   }
   ?>
                                  </table> 
                               </div>
                               

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Articulo</h4>
                                    <p class="category">Agrega un articulo</p>
                                </div>
                                <br>
                             
                               <div class="card-content table-responsive">
                                <?php 

$sentencia = $connect->prepare("SELECT producto.idprod, producto.codba, producto.nomprd, categoria.idcate, categoria.nomca, producto.precio, producto.stock, producto.foto, producto.venci, producto.esta, producto.fere FROM producto INNER JOIN categoria ON producto.idcate = categoria.idcate order BY codba DESC;");
 $sentencia->execute();
$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
                                     ?>
                                     <?php if(count($data)>0):?>
                                   <table class="table table-hover" id="example">
                                       <thead class="text-primary">
                                          <tr>
                                              <th>Nombre</th>
                                              <th>Precio</th>
                                              
                                              <th>Foto</th>
                                              <th>Stock</th>
                                              <th>Opcion</th>
                                          </tr> 
                                       </thead>
                                       <tbody>
                                        <?php foreach($data as $d):?>
                                           <tr>
                                               <td><?php echo  $d->nomprd; ?></td>
                                               <td><?php echo  $d->precio; ?></td>
                                                <td><img src="../../backend/img/subidas/<?php echo $d->foto ?>" width='50' height='50'></td>
                                               <?php 

if ($d->stock <= 0) {
  
    echo '<td><span class="badge badge-danger">stock vacio</span></td>';
}elseif ($d->stock <= 5) {
    echo '<td><span class="badge badge-warning">Está por acabarse</span></td>';
   
}else {
    echo '<td><span class="badge badge-success">' . $d->stock . '</span></td>';
}
                                                 ?>
                                                 <td>
   
    <form class="form-inline" method="post" action="">
    <input type="hidden" name="prdt" value="<?php echo $d->idprod; ?>">
    <input type="hidden" name="pdrus" value="<?php echo $_SESSION['id']; ?>">
    <input type="hidden" name="name" value="<?php echo $d->nomprd; ?>">
    <input type="hidden" name="prec" value="<?php echo $d->precio; ?>">
   
      <div class="form-group">
        <input type="number" name="p_qty" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
      </div>
      <button type="submit" name="add_to_cart_compra" class="btn btn-success"> <i class='material-icons' data-toggle='tooltip' title='crear'>shopping_cart</i></button>
    </form> 

                                                 </td>
                                           </tr>
                                           <?php endforeach; ?>
                                       </tbody>
                                   </table>
                                   <?php else:?>
        <!-- Warning Alert -->
<div class="alert alert-warning" role="alert">
  No se encontró ningún dato!
</div>

    <?php endif; ?>
                               </div>
                               

                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="card" style="min-height: 485px">
                               <div class="card-header card-header-text">
                                    <h4 class="card-title">Compras recientes</h4>
                                    <p class="category">Finalizar compras reciente añadidos el dia de hoy</p>
                                </div> 

                                <div class="card-content table-responsive">
                                  <div class="alert alert-warning">
  <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
  <br>
  
</div> 
<form enctype="multipart/form-data" method="POST"  autocomplete="off">
    <div class="row">
        <div class="col-md-0 col-lg-0">
   <div class="form-group">
   
    <input type="hidden" name="pdrus" value="<?php echo $_SESSION['id']; ?>">
    <input type="hidden" value="<?php $d->stock ?>" name="st">
    <input type="hidden" value="<?php $d->idprod ?>" name="stpro">
    <input type="hidden" name="quantity" value="<?php $fetch_cart['quantity'] ?> ">
  
</div>   
  </div>
  <div class="col-md-6 col-lg-6">
   <div class="form-group">
    <label for="email">Comprobante<span class="text-danger">*</span></label>
    <select class="form-control" required name="cxcom">
          <option value="">----------Seleccione------------</option>  
            <option value="Ticket">Ticket</option>                         
    </select>
</div>   
  </div>

  <div class="col-md-6 col-lg-6">
   <div class="form-group">
    <label for="email">Tipo de pago<span class="text-danger">*</span></label>
    <select class="form-control" required name="cxtcre">
          <option value="">----------Seleccione------------</option>  
            <option value="Yape">Tarjeta</option> 
            <option value="Efectivo">Efectivo</option>                         
    </select>
</div>   
  </div>

    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12">
      <div class="form-group">
    <label for="email">Fecha<span class="text-danger">*</span></label>
    <input type="date"  id="fechaActual" class="form-control"   name="txtdate" required >
   
</div>
  </div>  
    </div>

    <div class="row">
        <?php
    //require_once('../../backend/config/Conexion.php');
        $user_id = $_SESSION['id'];
      $cart_grand_total = 0;
      $select_cart_items = $connect->prepare("SELECT cart_compra.idcarco, usuarios.id, usuarios.nombre, producto.idprod, producto.codba, producto.nomprd, producto.precio, producto.stock, cart_compra.name, cart_compra.price, cart_compra.quantity FROM cart_compra INNER JOIN usuarios ON cart_compra.user_id = usuarios.id INNER JOIN producto ON cart_compra.idprod = producto.idprod WHERE user_id = ?");
      $select_cart_items->execute([$user_id]);
      if($select_cart_items->rowCount() > 0){
         while($fetch_cart_items = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
            $cart_total_price = ($fetch_cart_items['precio'] * $fetch_cart_items['quantity']);
            $cart_grand_total += $cart_total_price;
   ?>
       <div class="col-md-12 col-lg-12">
   <div class="form-group">
    <label for="email">Mis productos<span class="text-danger">*</span></label>
    
   <input type="hidden" value="<?= $fetch_cart_items['idprod']; ?>" name="product1[]">
   <input type="hidden" value="<?= $fetch_cart_items['quantity']; ?>" name="canti[]">
   <input type="hidden" value="<?= $fetch_cart_items['idcarco']; ?>" name="idcart">

   
    <input readonly class="form-control" type="text" value="<?= $fetch_cart_items['name']; ?> (<?= 'S/'.$fetch_cart_items['precio'].'/- x '. $fetch_cart_items['quantity']; ?>)" name="">
</div>   
  </div>
  <?php
    }
   }else{
      echo '<p class="empty"><p class="alert alert-warning">Tu carrito esta vació</p></p>';

   }
   ?>

    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
        
            <h1 style="font-size:42px; color:#000000;"><strong>Precio Total :S/<?php echo number_format($cart_grand_total, 2); ?> </strong></h1>
                                                </div>

        <input type="hidden" value="<?php  echo $cart_grand_total ?>" name="txtprrc">
        </div>

         <hr>
<div class="form-group">
        <div class="col-sm-12">
            <button name="order-compra" type="submit" class="btn btn-success text-white <?= ($cart_grand_total > 1)?'':'disabled'; ?>">Guardar</button>                       
            <a class="btn btn-danger text-white" href="../compra/mostrar.php">Cancelar</a>
        </div>
    </div>
</form>
    </div>

     
                                </div>
                            </div>
                        </div>
                      
                    </div>

                         </div>

        </div>
    </div>

  
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../../backend/js/jquery-3.3.1.slim.min.js"></script>
   <script src="../../backend/js/popper.min.js"></script>
   <script src="../../backend/js/bootstrap.min.js"></script>
   <script src="../../backend/js/jquery-3.3.1.min.js"></script>
  
  <script src="../../backend/js/sweetalert.js"></script>
   <?php
    include_once '../../backend/php/st_add_cart_compra.php'
?>
  <?php
    include_once '../../backend/php/st_updcart_compra.php'
?>

<?php
    include_once '../../backend/php/st_addcheck_compra.php'
?>
  <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('active');
            });
               
                $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
               
        });

</script>
<script src="../../backend/js/loader.js"></script>
<!-- Data Tables -->
    <script type="text/javascript" src="../../backend/js/datatable.js"></script>
    <script type="text/javascript" src="../../backend/js/datatablebuttons.js"></script>
    <script type="text/javascript" src="../../backend/js/jszip.js"></script>
    <script type="text/javascript" src="../../backend/js/pdfmake.js"></script>
    <script type="text/javascript" src="../../backend/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../backend/js/buttonshtml5.js"></script>
    <script type="text/javascript" src="../../backend/js/buttonsprint.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    </script>

    <script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    </script>
        <script type="text/javascript">
            window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
}
        </script>
  </body>
  </html>





<?php }else{ 
    header('Location: ../erro404.php');
 } ?>
 <?php ob_end_flush(); ?>     