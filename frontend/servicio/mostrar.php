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
                    <div class="card" style="min-height: 485px">
                        <div class="card-header card-header-text">
                            <h4 class="card-title">Servicios recientes</h4>
                            <p class="category">Nuevos servicios reciente añadidos el dia de hoy</p>
                        </div>
                        <br>
                        <a onclick="eliminar()" class="btn btn-primary text-white mx-3">Enviar Correos</a>
                        <a href="../servicio/nuevo.php" class="btn btn-danger text-white">Nuevo servicio</a>

                        <br>
                        <div class="card-content table-responsive">
                            <?php
                            require '../../backend/bd/ctconex.php';
                            $sentencia = $connect->prepare("SELECT servicio.profe, servicio.idservc, plan.idplan, plan.foto, plan.nompla, servicio.ini, servicio.fin, clientes.idclie, clientes.numid, clientes.nomcli, clientes.apecli, clientes.naci, clientes.celu, clientes.correo, servicio.estod, servicio.fere FROM servicio INNER JOIN plan ON servicio.idplan = plan.idplan INNER JOIN clientes ON servicio.idclie = clientes.idclie order BY idservc DESC;");
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

                                            <th>Plan</th>
                                            <th>Profesor</th>
                                            <th>Cliente</th>
                                            <th>Periodo</th>
                                            <th>Dias restantes</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $g) : ?>
                                            <tr>


                                                <td>

                                                    <?php
                                                    if ($g->idplan == '1') {
                                                        // code...
                                                        echo '<span class="badge badge-primary">' . htmlspecialchars($g->nompla) . '</span>';
                                                    } elseif ($g->idplan == '2') {
                                                        echo '<span class="badge badge-warning">' . htmlspecialchars($g->nompla) . '</span>';
                                                    } else {
                                                        // code...
                                                        echo '<span class="badge badge-danger">' . htmlspecialchars($g->nompla) . '</span>';
                                                    }


                                                    ?>

                                                </td>

                                                <td><?php echo htmlspecialchars($g->profe); ?></td>

                                                <td><?php echo  $g->nomcli; ?>&nbsp;<?php echo  $g->apecli; ?></td>
                                                <?php if ($g->estod == 'Activo') { ?>

                                                    <td style="color: #3e5569;"><strong><?php echo  $g->ini; ?> - <?php echo  $g->fin; ?></strong></td>
                                                <?php  } else { ?>

                                                    <td style="color: #3e5569;">
                                                        <span class="text-dark"><strong>Suscripcion inactiva</strong></span>
                                                    </td>


                                                <?php  } ?>


                                                <td style="color: #3e5569;">
                                                    <?php
                                                    $esta = $g->estod;
                                                    $fechaEnvio = $g->fin;
                                                    $fechaActual = date('Y-m-d');
                                                    $datetime1 = date_create($fechaEnvio);
                                                    $datetime2 = date_create($fechaActual);
                                                    $contador = date_diff($datetime1, $datetime2);
                                                    $differenceFormat = '%a';


                                                    while ($fechaEnvio == '0000-00-00') {
                                                        echo '<span class="label label-success">FREE</span>';
                                                        $fechaEnvio++;
                                                    }
                                                    if ($esta == 'Inactivo') {
                                                        echo '<span class="text-dark"><strong>Cancelado</strong></span>';
                                                    } elseif ($fechaEnvio > $fechaActual) {
                                                        echo $contador->format($differenceFormat);
                                                    } else {

                                                        echo '<span class="text-danger"><strong>Renovar</strong></span>';
                                                    }

                                                    ?>
                                                </td>

                                                <td><?php if ($g->estod == 'Activo') { ?>

                                                        <span class="badge badge-success">Activo</span>
                                                    <?php  } else { ?>
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    <?php  } ?>
                                                </td>
                                                <td>
                                                    <?php if ($g->estod == 'Activo') { ?>
                                                        <a class="btn btn-primary text-white" href="../servicio/ver.php?id=<?php echo  $g->idservc; ?>"><i class='material-icons' data-toggle='tooltip' title='Visualizar'>visibility</i></a>

                                                        <a class="btn btn-warning text-white" href="../servicio/actualizar.php?id=<?php echo  $g->idservc; ?>"><i class='material-icons' data-toggle='tooltip' title='Editar'>edit</i></a>
                                                        <a class="btn btn-danger text-white" href="../servicio/eliminar.php?id=<?php echo  $g->idservc; ?>"><i class='material-icons' data-toggle='tooltip' title='Cancelar'>cancel</i></a>


                                                        <a class="btn btn-secondary text-white" target="_blank" href="https://api.whatsapp.com/send/?phone=<?php echo  $g->celu; ?>&text=Hola🖐,%20SMAF-GYM%20te%20recuerda%20que%20tu%20membresia%20finalizo%20espero%20poder%20contar%20contigo%20un%20mes%20mas%20te%20invito%20a%20renovar%20tu%20membresia%20a%0A%0Atravez%20de%20los%20siguientes%20canales:%20Efectivo%20Tarjeta%20LOS%20ESPERAMOS%0A%0A"><i class='material-icons' data-toggle='tooltip' title='Whatsapp'>smartphone</i></a>

                                                        <a class="btn btn-dark text-white" href="../servicio/correo.php?id=<?php echo  $g->idservc; ?>"><i class='material-icons' data-toggle='tooltip' title='Correo'>mail</i></a>

                                                        <a class="btn btn-info text-white" href="../servicio/ticket.php?id=<?php echo  $g->idservc; ?>"><i class='material-icons' data-toggle='tooltip' title='Ticket'>print</i></a>

                                                    <?php  } else { ?>
                                                        <a class="btn btn-warning text-white" href="../servicio/actualizar.php?id=<?php echo  $g->idservc; ?>"><i class='material-icons' data-toggle='tooltip' title='crear'>edit</i></a>
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



    <script>
        function eliminar() {
            // Mostrar SweetAlert con la lista de correos
            swal({
                title: "¿Seguro que desea enviar los correos?",
                icon: "warning",
                buttons: ["Cancelar", "Enviar"],
            }).then((willSend) => {
                if (willSend) {
                    // Redirigir al siguiente enlace
                    window.location.href = "../../backend/php/mail.php";
                } else {
                    swal("Operación cancelada", {
                        icon: "info"
                    });
                }
            });
        }
    </script>


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