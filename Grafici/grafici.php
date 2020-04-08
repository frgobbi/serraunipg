<?php
/**
 * Created by PhpStorm.
 * User: fdieg
 * Date: 16/04/2019
 * Time: 12:02
 */
session_start();
if (!$_SESSION['login']) {
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../componentiBase/header.php";
    headerDashboard();
    ?>
    <!-- Load c3.css -->
    <link href="../Library/c3-0.7.10/c3.css" rel="stylesheet">

    <!-- Load d3.js and c3.js -->
    <script src="../Library/d3/d3.min.js" charset="utf-8"></script>
    <script src="../Library/c3-0.7.10/c3.min.js"></script>
    <script type="text/javascript" src="../GraficiJavascript/grafici.js"></script>
    <style type="text/css">
        .c3-axis-x-label {
            font-size: 15px;
        }
        .c3-axis-y-label {
            font-size: 15px;
        }
        .c3-axis-x-label {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>

<body id="page-top" class="sidebar-toggled">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php
    include "../componentiBase/sideBar.php";
    sideBar();
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php
            include "../componentiBase/navBar.php";
            navBar();
            ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow">
                            <!-- Card Header - Dropdown -->
                            <!--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"></div>-->
                            <!-- Card Body -->
                            <div class="card-body">
                                <form class="form-inline text-center">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-group">
                                        <label for="Din">Data Grafico &nbsp;&nbsp; </label>
                                        <input type="date" id="Dgraph" class="form-control">
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-block" onclick="changeGrafico()">Grafica <i
                                                    class="fas fa-search"></i></button>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-block">Resetta filtro&nbsp;&nbsp;<i
                                                    class="fas fa-times" onclick="reset()"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="row" style="padding-top: 15px">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <!--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"></div>-->
                            <!-- Card Body -->
                            <div class="card-body">
                                <form>
                                    <hr>
                                    <h4 class="title">Tipo Grafico</h4>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="radioLine"
                                               value="line" onchange="changeGrafico()" checked>
                                        <label class="form-check-label" for="radioLine">
                                            Line Chart
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type"
                                               id="radioSpline" onchange="changeGrafico()" value="spline">
                                        <label class="form-check-label" for="radioSpline">
                                            Spline Chart
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type"
                                               id="radioScatter" onchange="changeGrafico()" value="scatter">
                                        <label class="form-check-label" for="radioScatter">
                                            Scatterplot Chart
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type"
                                               id="radioBar" onchange="changeGrafico()" value="bar">
                                        <label class="form-check-label" for="radioBar">
                                            Bar Chart
                                        </label>
                                    </div>
                                    <hr>
                                    <h4 class="title">Nodi</h4>
                                    <?php
                                    include_once "../pdo.php";
                                    $pdo = connessione_normale();
                                    try {
                                        $one = 0;
                                        foreach ($pdo->query("SELECT * FROM vaso") as $row) {
                                            $id_p = $row['id_vaso'];
                                            $nome_pianta = $row['pianta'];
                                            if ($one == 0) {
                                                echo "<div class=\"form-check\">"
                                                    . "<input class=\"form-check-input node\" onchange=\"changeGrafico()\" type=\"checkbox\" value=\"$id_p\" id=\"nodo$id_p\" name='nodi'>"
                                                    . "<label class=\"form-check-label\" for=\"nodo$id_p\">"
                                                    . "$nome_pianta"
                                                    . "</label>"
                                                    . "</div>";
                                                $one = 1;
                                            } else {
                                                echo "<div class=\"form-check\">"
                                                    . "<input class=\"form-check-input node\" onchange=\"changeGrafico()\" type=\"checkbox\" value=\"$id_p\" id=\"nodo$id_p\" name='nodi'>"
                                                    . "<label class=\"form-check-label\" for=\"nodo$id_p\">"
                                                    . "$nome_pianta"
                                                    . "</label>"
                                                    . "</div>";
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        echo $e->getMessage();
                                    }
                                    $pdo = null;
                                    ?>
                                    <hr>
                                    <h4 class="title">Tipo Sensore</h4>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="typeSensor" id="radioHumidity"
                                               value="0" onchange="changeGrafico()" checked>
                                        <label class="form-check-label" for="radioHumidity">
                                            Humidity
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="typeSensor"
                                               id="radioTemperature" onchange="changeGrafico()" value="1">
                                        <label class="form-check-label" for="radioTemperature">
                                            Temperature
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <!--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"></div>-->
                            <!-- Card Body -->
                            <div class="card-body table-responsive">
                                <div class="row">
                                    <div class="col-xl-12" id="chart">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../public/log-out.php">Logout</a>
            </div>
        </div>
    </div>
</div>


</body>

<script type="text/javascript">
    changeGrafico()
</script>
</html>
