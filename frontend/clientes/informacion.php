<?php
ob_start();
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../erro404.php');
}
?>
<?php if (isset($_SESSION['id'])) { ?>

    <?php include_once "../templates/header.php" ?>

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

                    <a class="navbar-brand" href="#"> Clientes </a>

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
                            <li class="breadcrumb-item"><a href="../clientes/mostrar.php">Clientes </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Informacion</li>
                        </ol>
                    </nav>
                    <div class="card" style="min-height: 485px">
                        <div class="card-header card-header-text">
                            <h4 class="card-title">Clientes reciente</h4>
                            <p class="category">Informacion del cliente reciente añadido el dia de hoy</p>
                        </div>

                        <div class="card-content table-responsive">

                            <?php
                            require '../../backend/bd/ctconex.php';
                            $id = $_GET['id'];
                            $sentencia = $connect->prepare("SELECT * FROM clientes  WHERE clientes.idclie= '$id';");
                            $sentencia->execute();

                            $data =  array();
                            if ($sentencia) {
                                while ($r = $sentencia->fetchObject()) {
                                    $data[] = $r;
                                }
                            }
                            ?>
                            <?php if (count($data) > 0) : ?>
                                <?php foreach ($data as $f) : ?>
                                    <form enctype="multipart/form-data" method="POST" autocomplete="off">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <center><img src="../../backend/img/4d.png"></center>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">DNI del cliente<span class="text-danger">*</span></label>
                                                    <input type="text" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" class="form-control" value="<?php echo  $f->numid; ?>" name="txtnum" required placeholder="DNI del cliente">
                                                    <input type="hidden" value="<?php echo  $f->idclie; ?>" name="txtidc">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Nombres del cliente<span class="text-danger">*</span></label>
                                                    <input type="text" value="<?php echo  $f->nomcli; ?>" class="form-control" name="txtnaame" required placeholder="Nombre de la cliente">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Apellidos del cliente<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="<?php echo  $f->apecli; ?>" name="txtape" required placeholder="Apellido del cliente">

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Celular del cliente<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo  $f->celu; ?>" name="txtcel" required placeholder="Celular de la cliente">

                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Correo del cliente</label>
                                                    <input type="email" class="form-control" value="<?php echo  $f->correo; ?>" name="txtema" placeholder="Correo del cliente">

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Nacimiento del cliente</label>
                                                    <input type="date" class="form-control" value="<?php echo  $f->naci; ?>" name="txtnaci" placeholder="">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="email">Estado del cliente<span class="text-danger">*</span></label>
                                                    <select class="form-control" required name="txtesta">

                                                        <option value="<?php echo  $f->estad; ?>"><?php echo  $f->estad; ?></option>
                                                        <option>--------Seleccione---------</option>
                                                        <option value="Activo">Activo</option>
                                                        <option value="Inactivo">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <a class="btn btn-danger text-white" href="../clientes/mostrar.php">Cancelar</a>
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


    </body>

    </html>





<?php } else {
    header('Location: ../erro404.php');
} ?>
<?php ob_end_flush(); ?>