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

        <!-- Data Tables -->
        <link rel="stylesheet" type="text/css" href="../../backend/css/datatable.css">
        <link rel="stylesheet" type="text/css" href="../../backend/css/buttonsdataTables.css">
        <link rel="stylesheet" type="text/css" href="../../backend/css/font.css">
        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!--google material icon-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="icon" type="image/png" href="../../backend/img/favicon.webp" />

        <style>
            /* Estilos personalizados para los botones de exportación */
            .dataTables_wrapper .btn-warning {
                background-color: #ff9800;
                /* Cambia el color de fondo */
                border-color: #ff9800;
                /* Cambia el color del borde */
                color: #ffffff !important;
                /* Cambia el color del texto (important para sobrescribir estilos de DataTables) */
            }

            .dataTables_wrapper .btn-warning:hover {
                background-color: #ff7700;
                /* Cambia el color de fondo al pasar el mouse */
                border-color: #ff7700;
                /* Cambia el color del borde al pasar el mouse */
            }

            /* Estilos para el botón CSV */
            .dataTables_wrapper .btn-csv {
                background-color: #4caf50;
                border-color: #4caf50;
                color: #ffffff !important;
            }

            .dataTables_wrapper .btn-csv:hover {
                background-color: #388e3c;
                border-color: #388e3c;
            }

            /* Estilos para el botón Excel */
            .dataTables_wrapper .btn-excel {
                background-color: #2196f3;
                border-color: #2196f3;
                color: #ffffff !important;
            }

            .dataTables_wrapper .btn-excel:hover {
                background-color: #1565c0;
                border-color: #1565c0;
            }

            /* Estilos para el botón PDF */
            .dataTables_wrapper .btn-pdf {
                background-color: #e91e63;
                border-color: #e91e63;
                color: #ffffff !important;
            }

            .dataTables_wrapper .btn-pdf:hover {
                background-color: #c2185b;
                border-color: #c2185b;
            }

            /* Estilos para el botón Imprimir */
            .dataTables_wrapper .btn-print {
                background-color: #607d8b;
                border-color: #607d8b;
                color: #ffffff !important;
            }

            .dataTables_wrapper .btn-print:hover {
                background-color: #455a64;
                border-color: #455a64;
            }
        </style>
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
                    <li class="">
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

                    <li class="dropdown active">
                        <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">dataset</i><span>Planes</span></a>
                        <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                            <li class="active">
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

                            <a class="navbar-brand" href="#"> Planes </a>

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
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Planes recientes</h4>
                                    <p class="category">Nuevos planes reciente añadidos el dia de hoy</p>
                                </div>
                                <br>
                                <a href="../plan/nuevo.php" class="btn btn-danger text-white">Nuevo plan</a>
                                <br>
                                <div class="card-content table-responsive">
                                    <?php
                                    require '../../backend/bd/ctconex.php';
                                    $sentencia = $connect->prepare("SELECT * FROM plan order BY idplan DESC;");
                                    $sentencia->execute();

                                    $data =  array();
                                    if ($sentencia) {
                                        while ($r = $sentencia->fetchObject()) {
                                            $data[] = $r;
                                        }
                                    }
                                    ?>
                                    <?php if (count($data) > 0) : ?>
                                        <table class="table table-hover" id="example">
                                            <thead class="text-primary">
                                                <tr>

                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data as $g) : ?>
                                                    <tr>


                                                        <td><?php echo  $g->nompla; ?></td>
                                                        <td><?php echo  $g->prec; ?></td>
                                                        <td><?php if ($g->estp == 'Activo') { ?>

                                                                <span class="badge badge-success">Activo</span>
                                                            <?php  } else { ?>
                                                                <span class="badge badge-danger">Inactivo</span>
                                                            <?php  } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($g->estp == 'Activo') { ?>
                                                                <a class="btn btn-warning text-white" href="../plan/actualizar.php?id=<?php echo  $g->idplan; ?>"><i class='material-icons' data-toggle='tooltip' title='crear'>edit</i></a>
                                                                <a class="btn btn-danger text-white" href="../plan/eliminar.php?id=<?php echo  $g->idplan; ?>"><i class='material-icons' data-toggle='tooltip' title='crear'>cancel</i></a>


                                                                <a class="btn btn-dark text-white" href="../plan/informacion.php?id=<?php echo  $g->idplan; ?>"><i class='material-icons' data-toggle='tooltip' title='crear'>info</i></a>


                                                            <?php  } else { ?>
                                                                <a class="btn btn-warning text-white" href="../plan/actualizar.php?id=<?php echo  $g->idplan; ?>"><i class='material-icons' data-toggle='tooltip' title='crear'>edit</i></a>
                                                            <?php  } ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php else : ?>
                                        <!-- Warning Alert -->
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
                var table = $('#example').DataTable({
                    dom: 'Bfrtip',
                    language: {
                        url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-MX.json',
                    },
                    // Añadiendo botón para exportar a Excel
                    "buttons": [{
                            "extend": "copy",
                            "text": "<span class=\"material-symbols-outlined\">content_paste</span>",
                            "titleAttr": "Copiar",
                            "className": "btn btn-warning"
                        },
                        {
                            "extend": "csv",
                            "text": "<span class=\"material-symbols-outlined\">csv</span>",
                            "titleAttr": "Exportar en CSV",
                            "className": "btn btn-excel",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            },
                        },
                        {
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            },
                            "extend": "excel",
                            "text": "<span class=\"material-symbols-outlined\">draft</span>",
                            "titleAttr": "Exportar en Excel",
                            "className": "btn btn-csv",
                        },

                        {
                            "extend": "pdf",
                            "text": "<span class=\"material-symbols-outlined\">picture_as_pdf</span>",
                            "titleAttr": "Exportar en PDF",
                            "className": "btn btn-pdf",
                            "exportOptions": {
                                modifier: {
                                    page: 'current',
                                    rows: function(node, data) {
                                        return data.length;
                                    }
                                }
                            },
                            // Evento customize para ocultar la última columna al exportar en PDF
                            customize: function(doc) {
                                doc.content[1].table.body.forEach(function(row) {
                                    row.splice(-1, 1);
                                });
                            }
                        },
                        {
                            // Evento beforePrint para ocultar la última columna al imprimir
                            customize: function(win) {
                                $(win.document.body).find('table').find('td:last-child, th:last-child').remove();
                            },
                            // Callback después de imprimir para restaurar la tabla original
                            title: '',
                            messageTop: function() {
                                table.columns.adjust().draw();
                            },
                            "extend": "print",
                            "text": "<span class=\"material-symbols-outlined\">print</span>",
                            "titleAttr": "Imprimir",
                            "className": "btn btn-print",

                        },
                    ],
                });
            });
        </script>


    </body>

    </html>





<?php } else {
    header('Location: ../erro404.php');
} ?>
<?php ob_end_flush(); ?>