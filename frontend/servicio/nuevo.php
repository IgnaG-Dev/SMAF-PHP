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

                    <a class="navbar-brand" href="#"> Servicio </a>

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
                            <li class="breadcrumb-item"><a href="../servicio/mostrar.php">Servicios </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
                        </ol>
                    </nav>
                    <div class="card" style="min-height: 485px">
                        <div class="card-header card-header-text">
                            <h4 class="card-title">Servicios recientes</h4>
                            <p class="category">Nuevos servicios reciente añadidos el dia de hoy</p>
                        </div>

                        <div class="card-content table-responsive">
                            <div class="alert alert-warning">
                                <strong>Estimado usuario!</strong> Los campos remarcados con <span class="text-danger">*</span> son necesarios.
                                <br>
                                <strong>Al registrar un servicio en el apartado clientes debes añadir uno nuevo si es primera vez</strong>
                            </div>
                            <form enctype="multipart/form-data" method="POST" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Plan<span class="text-danger">*</span></label>
                                            <select class="form-control" id="plan" required name="txtpln">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6" style="display:none;">
                                        <div class="form-group">
                                            <label for="email">Precio<span class="text-danger">*</span></label>
                                            <select class="form-control" id="total" name="txtprec">

                                            </select>
                                        </div>
                                    </div>

                                    <div>

                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Clientes<span class="text-danger">*</span></label>
                                            <select class="form-control" required name="txtcli">
                                                <option value="">----------Seleccione------------</option>
                                                <?php
                                                require '../../backend/bd/ctconex.php';
                                                $stmt = $connect->prepare("SELECT * FROM clientes where estad='Activo' order by idclie desc");
                                                $stmt->execute();
                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    extract($row);
                                                ?>
                                                    <option value="<?php echo $idclie; ?>"><?php echo $nomcli; ?> <?php echo $apecli; ?></option>
                                                <?php
                                                }
                                                ?>
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Profesor<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" required name="txtprofe" placeholder="Nombre del profesor">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Estado del servicio<span class="text-danger">*</span></label>
                                            <select class="form-control" required name="txtesta">

                                                <option value="Activo">Activo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Fecha de inicio<span class="text-danger">*</span></label>
                                            <input type="date" id="fechaActual" class="form-control" name="txtini" required placeholder="Nombre del producto">

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Fecha de vencimiento<span class="text-danger">*</span></label>
                                            <input type="date" id="fechad" class="form-control" name="txtfin" required placeholder="Nombre del producto">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Metodo de pago<span class="text-danger">*</span></label>
                                            <select class="form-control" required name="txtmeto">
                                                <option value="">----------Seleccione------------</option>
                                                <option value="Efectivo">Efectivo</option>
                                                <option value="Tarjeta">Tarjeta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Abonado<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="txtcanc" required placeholder="">

                                        </div>
                                    </div>




                                </div>

                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button name='staddserv' class="btn btn-success text-white">Guardar</button>
                                        <a class="btn btn-danger text-white" href="../servicio/mostrar.php">Cancelar</a>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../backend/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../backend/js/popper.min.js"></script>
    <script src="../../backend/js/bootstrap.min.js"></script>
    <script src="../../backend/js/jquery-3.3.1.min.js"></script>
    <script src="../../backend/js/sweetalert.js"></script>
    <?php
    include_once '../../backend/php/st_stservic.php'
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
    <script type="text/javascript">
        window.onload = function() {
            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth() + 1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var ano = fecha.getFullYear(); //obteniendo año
            if (dia < 10)
                dia = '0' + dia; //agrega cero si el menor de 10
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10
            document.getElementById('fechaActual').value = ano + "-" + mes + "-" + dia;
        }
    </script>
    <script>
        // Obtener fecha actual
        let fecha = new Date();
        // Agregar 3 días falta
        fecha.setDate(fecha.getDate() + 0);
        // Obtener cadena en formato yyyy-mm-dd, eliminando zona y hora
        let fechaMin = fecha.toISOString().split('T')[0];
        // Asignar valor mínimo
        document.querySelector('#fechad').min = fechaMin;
    </script>
    <script src="../../backend/js/plan.js"></script>



    </body>

    </html>

<?php } else {
    header('Location: ../erro404.php');
} ?>
<?php ob_end_flush(); ?>