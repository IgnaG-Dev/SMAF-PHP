<?php
ob_start();
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../erro404.php');
}
?>
<?php if (isset($_SESSION['id'])) { ?>

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


        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link rel="icon" type="image/png" href="../../backend/img/favicon.webp" />
    </head>

    <body>

        <div class="wrapper">

            <div class="body-overlay"></div>
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><img src="../../backend/img/favicon.webp" class="img-fluid" /><span>SMAF GYM</span></h3>
                </div>
                <ul class="list-unstyled components">
                    <li class="active">
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

                    <li class="dropdown ">
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



                    <li class="dropdown">
                        <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">point_of_sale</i><span>Ventas</span></a>
                        <ul class="collapse list-unstyled menu" id="pageSubmenu6">
                            <li>
                                <a href="../venta/mostrar.php">Mostrar</a>
                            </li>
                            <li>
                                <a href="../venta/nuevo.php">Nuevo</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#pageSubmenu09" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">shopping_basket</i><span>Compras</span></a>
                        <ul class="collapse list-unstyled menu" id="pageSubmenu09">
                            <li>
                                <a href="../compra/mostrar.php">Mostrar</a>
                            </li>
                            <li>
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
                    <img class='loading-gif' alt='loading' src="https://media.giphy.com/media/TPFdnUyWNNQYMke6gU/giphy.gif" />
                </div>
                <div class="top-navbar">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">

                            <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                                <span class="material-icons">arrow_back_ios</span>
                            </button>

                            <a class="navbar-brand" href="#"> Configuracion </a>

                            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

                                            <img src="../../backend/img/reere.png">

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
                        <div class="col-lg-12 col-md-12">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../administrador/escritorio.php">Panel administrativo</a></li>
                                    <li class="breadcrumb-item"><a href="../cuenta/mostrar.php">Configuracion </a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Actualizar </li>
                                </ol>
                            </nav>
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Configuracion del sistema</h4>
                                    <p class="category">actualizar sistema</p>
                                </div>

                                <div class="card-content table-responsive">

                                    <?php
                                    require '../../backend/bd/ctconex.php';
                                    $sentencia = $connect->prepare("SELECT * FROM setting;");
                                    $sentencia->execute();

                                    $data =  array();
                                    if ($sentencia) {
                                        while ($r = $sentencia->fetchObject()) {
                                            $data[] = $r;
                                        }
                                    }
                                    ?>
                                    <?php if (count($data) > 0) : ?>
                                        <?php foreach ($data as $d) : ?>
                                            <form enctype="multipart/form-data" method="POST" autocomplete="off">
                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="email">CUIT de la empresa<span class="text-danger">*</span></label>
                                                            <input type="text" maxlength="14" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo  $d->ruc; ?>" class="form-control" name="txtruc" required placeholder="CUIT de la empresa">

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="email">Nombre de la empresa<span class="text-danger">*</span></label>
                                                            <input type="text" value="<?php echo  $d->nomem; ?>" class="form-control" name="txtnaame" required placeholder="Nombre de la empresa">
                                                            <input type="hidden" value="<?php echo  $d->idsett; ?>" name="txtidadm">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="email">Correo de la empresa<span class="text-danger">*</span></label>
                                                            <input type="text" value="<?php echo  $d->corr; ?>" class="form-control" name="txtcorr" required placeholder="Correo de la empresa">

                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="email">Direccion 1<span class="text-danger">*</span></label>
                                                            <input type="text" value="<?php echo  $d->direc1; ?>" class="form-control" name="txtdirc1" required placeholder="ejm: Direccion">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="email">Direccion 2</label>
                                                            <input type="text" value="<?php echo  $d->direc2; ?>" class="form-control" name="txtdirec2" placeholder="ejm: Direccion">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-lg-4">
                                                        <div class="form-group">
                                                            <label for="email">Celular<span class="text-danger">*</span></label>
                                                            <input maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" value="<?php echo  $d->celu; ?>" class="form-control" name="txtcel" placeholder="ejm: Celular">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label for="email">Descripcion<span class="text-danger">*</span></label>

                                                            <textarea class="form-control" name="txtdesc" required><?php echo  $d->decrp; ?></textarea>

                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button name='stupdconfi' class="btn btn-success text-white">Guardar</button>
                                                        <a class="btn btn-danger text-white" href="../cuenta/configuracion.php">Cancelar</a>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="alert alert-warning" role="alert">
                                            No se encontró ningún dato!
                                        </div>

                                    <?php endif; ?>
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
        include_once '../../backend/php/st_updconfi.php'
        ?>
        <?php
        include_once '../../backend/php/st_updconfcf.php'
        ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                    $('#content').toggleClass('active');
                });

                $('.more-button,.body-overlay').on('click', function() {
                    $('#sidebar,.body-overlay').toggleClass('show-nav');
                });

            });
        </script>
        <script src="../../backend/js/loader.js"></script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

    </body>

    </html>





<?php } else {
    header('Location: ../erro404.php');
} ?>
<?php ob_end_flush(); ?>