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
                <li>
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

                <li class="">
                    <a href="../graficos/mostrar.php"><i class="material-icons">grain</i><span>Graficos</span></a>
                </li>

            </ul>

        </nav>