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

                    <a class="navbar-brand" href="#"> Graficos </a>

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
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <div class="icon icon-warning">
                                <span class="material-icons">price_check</span>
                            </div>
                        </div>
                        <div class="card-content">
                            <?php
                            require '../../backend/bd/ctconex.php'; // Include database connection file once

                            // Fetch total expenses and total income in a single query
                            $sql = "SELECT
    (SELECT SUM(total) FROM gastos) AS total_gas,
    (SELECT SUM(total) FROM ingresos) AS total_price
";
                            $stmt = $connect->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);

                            // Calculate total profit
                            $total_profit = $result['total_price'] - $result['total_gas'];
                            ?>

                            <div class="card-content">
                                <p class="category"><strong>Ingresos totales</strong></p>
                                <h3 class="card-title">S/<?php echo number_format($result['total_price'], 2); ?></h3>
                            </div>

                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Recién actualizado
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <div class="icon icon-rose">
                                <span class="material-icons">savings</span>
                            </div>
                        </div>
                        <div class="card-content">
                            <?php

                            $sql = "SELECT SUM(total) total_gas FROM gastos ";
                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                            $total_gas = $result->fetchColumn();

                            ?>
                            <p class="category"><strong>Gastos totales</strong></p>
                            <h3 class="card-title">S/<?php echo  $total_gas; ?></h3>
                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Recién actualizado
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <div class="icon icon-success">
                                <span class="material-icons">price_change</span>
                            </div>
                        </div>
                        <div class="card-content">
                            <?php

                            $sql = "SELECT SUM(total) total_gas FROM gastos ";
                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                            $total_gas = $result->fetchColumn();

                            ?>

                            <?php
                            $sql = "SELECT SUM(total) total_price FROM ingresos ";
                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                            $total_price = $result->fetchColumn();

                            ?>
                            <p class="category"><strong>Ganancias totales</strong></p>
                            <h3 class="card-title">S/<?php echo number_format($total_price - $total_gas, 2); ?></h3>


                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Recién actualizado
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <div class="icon icon-info">
                                <span class="material-icons">attach_money</span>
                            </div>
                        </div>
                        <div class="card-content">
                            <?php

                            $sql = "SELECT SUM(total) total_price, fec FROM ingresos where fec = CURDATE()";
                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                            $total_in = $result->fetchColumn();

                            ?>

                            <p class="category"><strong>Ingresos hoy</strong></p>
                            <h3 class="card-title">S/<?php echo  $total_in; ?></h3>
                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Recién actualizado
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <div class="icon icon-info">
                                <span class="material-icons">attach_money</span>
                            </div>
                        </div>
                        <div class="card-content">
                            <?php

                            $sql = "SELECT  SUM(total) AS total, WEEK(fec) AS fec
FROM ingresos GROUP BY WEEK(fec)
ORDER BY fec ASC";
                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                            $total_in = $result->fetchColumn();

                            ?>

                            <p class="category"><strong>Ingresos semanal</strong></p>
                            <h3 class="card-title">S/<?php echo  $total_in; ?></h3>
                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Recién actualizado
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header">
                            <div class="icon icon-info">
                                <span class="material-icons">attach_money</span>
                            </div>
                        </div>
                        <div class="card-content">
                            <?php

                            $sql = "SELECT  SUM(total) AS total, MONTH(fec) AS fec
FROM ingresos GROUP BY MONTH(fec)
ORDER BY fec ASC";
                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                            $total_inme = $result->fetchColumn();

                            ?>

                            <p class="category"><strong>Ingresos mensual</strong></p>
                            <h3 class="card-title">S/<?php echo  $total_inme; ?></h3>
                        </div>

                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Recién actualizado
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row ">
                <div class="col-lg-6 col-md-6">
                    <div class="card" style="min-height: 485px">

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Grafico de ingresos</h4>
                        </div>
                        <div class="card-content">
                            <div id="chart_div" class="tcentrado"></div>
                        </div>
                    </div>
                </div>
                <?php

                // Inicializamos la variable `hay_datos` a `true`
                $hay_datos = true;

                // Obtenemos los datos de los gastos
                $sql = "SELECT total FROM gastos";
                $stmt = $connect->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();

                // Si no hay datos, la variable `hay_datos` será `false`
                if (count($result) == 0) {
                    $hay_datos = false;
                }

                // Si no hay datos, mostramos un texto
                if (!$hay_datos) { ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="card" style="min-height: 485px">

                            <div class="card-header card-header-text">
                                <h4 class="card-title">Grafico de gastos</h4>
                            </div>
                            <div class="card-content">
                                <?php echo "<p>No hay datos</p>"; ?>
                            </div>

                        </div>
                    </div>

                <?php }

                // Si hay datos, generamos el gráfico
                else { ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="card" style="min-height: 485px">

                            <div class="card-header card-header-text">
                                <h4 class="card-title">Grafico de gastos</h4>
                            </div>
                            <div class="card-content">
                                <div id="gas_div" class="tcentrado"></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>





            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card" style="min-height: 485px">

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Resumen de las ventas de servicios de planes</h4>
                        </div>
                        <div class="card-content">
                            <div id="curve_chart" class="tcentrado"></div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-6 col-md-6">
                    <div class="card" style="min-height: 485px">

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Resumen de las ventas de productos</h4>
                        </div>
                        <div class="card-content">
                            <div id="venta_chart" class="tcentrado"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card" style="min-height: 485px">

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Resumen de las compras de los productos</h4>
                        </div>
                        <div class="card-content">
                            <div id="compra_chart" class="tcentrado"></div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6">
                    <div class="card" style="min-height: 485px">

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Resumen de los productos por stock</h4>
                        </div>
                        <div class="card-content">
                            <div id="product_3d" class="tcentrado"></div>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../../backend/js/chart/Chart.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Fecha', 'Ingresos'],
                <?php

                $stmt = $connect->prepare("SELECT SUM(total) total_price , fec FROM ingresos where month(fec) and year(fec) GROUP BY ingresos.fec ORDER BY ingresos.fec aSC");

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    echo "['" . $row['fec'] . "', " . $row['total_price'] . "],";
                }

                ?>
            ]);

            var options = {
                title: '',
                hAxis: {
                    title: 'Fecha',
                    titleTextStyle: {
                        color: '#333'
                    }
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Fecha', 'Gastos'],
                <?php

                $stmt = $connect->prepare("SELECT SUM(total) total_gas , fec FROM gastos where month(fec) and year(fec) GROUP BY gastos.fec ORDER BY gastos.fec aSC");

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    echo "['" . $row['fec'] . "', " . $row['total_gas'] . "],";
                }

                ?>
            ]);

            var options = {
                title: '',
                hAxis: {
                    title: 'Fecha',
                    titleTextStyle: {
                        color: '#333'
                    }
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('gas_div'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Fecha', 'Ventas'],

                <?php

                $stmt = $connect->prepare("SELECT servicio.idservc, plan.idplan, plan.prec,plan.foto, plan.nompla, servicio.ini, servicio.fin, clientes.idclie, clientes.numid, clientes.nomcli, clientes.apecli, clientes.naci, clientes.celu, clientes.correo, servicio.estod, servicio.fere, SUM(prec) as prec FROM servicio INNER JOIN plan ON servicio.idplan = plan.idplan INNER JOIN clientes ON servicio.idclie = clientes.idclie where month(ini) and year(ini) GROUP BY servicio.ini ORDER BY servicio.ini aSC");

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    echo "['" . $row['ini'] . "', " . $row['prec'] . "],";
                }

                ?>

            ]);

            var options = {
                title: '',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Fecha', 'Ventas'],

                <?php

                $stmt = $connect->prepare("SELECT SUM(total_price) total_price,placed_on FROM orders where month(placed_on) and year(placed_on) GROUP BY orders.placed_on ORDER BY orders.placed_on aSC");

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    echo "['" . $row['placed_on'] . "', " . $row['total_price'] . "],";
                }

                ?>

            ]);

            var options = {
                title: '',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('venta_chart'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Fecha', 'Compra'],

                <?php

                $stmt = $connect->prepare("SELECT SUM(total_price) total_price,placed_on FROM compra where month(placed_on) and year(placed_on) GROUP BY compra.placed_on ORDER BY compra.placed_on aSC");

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    echo "['" . $row['placed_on'] . "', " . $row['total_price'] . "],";
                }

                ?>


            ]);

            var options = {
                title: '',
                hAxis: {
                    title: 'Fecha',
                    minValue: 0,
                    maxValue: 15
                },
                vAxis: {
                    title: 'Compra',
                    minValue: 0,
                    maxValue: 15
                },
                legend: 'none'
            };

            var chart = new google.visualization.ScatterChart(document.getElementById('compra_chart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Producto', 'Stock'],
                <?php

                $stmt = $connect->prepare("SELECT producto.idprod, producto.codba, producto.nomprd, categoria.idcate, categoria.nomca, producto.precio, producto.stock, producto.foto, producto.venci, producto.esta, producto.fere FROM producto INNER JOIN categoria ON producto.idcate = categoria.idcate");

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    echo "['" . $row['nomprd'] . "', " . $row['stock'] . "],";
                }

                ?>
            ]);

            var options = {
                title: '',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('product_3d'));
            chart.draw(data, options);
        }
    </script>



    </body>

    </html>





<?php } else {
    header('Location: ../erro404.php');
} ?>
<?php ob_end_flush(); ?>