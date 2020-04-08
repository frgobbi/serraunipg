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
    <script type="text/javascript" src="../DashboardJavascript/dashboard.js"></script>
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


            <div class="row" style="padding-left: 15px; padding-right: 15px;">

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="../Piante/piante.php">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <!--<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Piante</div>-->
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Piante</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-seedling fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="#">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <!--<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Piante</div>-->
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Serra</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-home fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <?php
                if ($_SESSION['flag_admin'] == 1) {
                    echo "<div class=\"col-xl-3 col-md-6 mb-4\">"
                        . "<a href=\"#\" onclick=\"$('#modalAdd').modal('show');\">"
                        . "<div class=\"card border-left-primary shadow h-100 py-2\">"
                        . "<div class=\"card-body\">"
                        . "<div class=\"row no-gutters align-items-center\">"
                        . "<div class=\"col mr-2\">"
                        . "<!--<div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Piante</div>-->"
                        . "<div class=\"h5 mb-0 font-weight-bold text-gray-800\">Add utente</div>"
                        . "</div>"
                        . "<div class=\"col-auto\">"
                        . "<i class=\"fas fa-user-plus fa-3x text-gray-300\"></i>"
                        . "</div>"
                        . "</div>"
                        . "</div>"
                        . "</div>"
                        . "</a>"
                        . "</div>";

                    echo "<div class=\"col-xl-3 col-md-6 mb-4\">"
                        . "<a href=\"#\" onclick=\"$('#modalAddP').modal('show');\">"
                        . "<div class=\"card border-left-danger shadow h-100 py-2\">"
                        . "<div class=\"card-body\">"
                        . "<div class=\"row no-gutters align-items-center\">"
                        . "<div class=\"col mr-2\">"
                        . "<!--<div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Piante</div>-->"
                        . "<div class=\"h5 mb-0 font-weight-bold text-gray-800\">Add pianta</div>"
                        . "</div>"
                        . "<div class=\"col-auto\">"
                        . "<i class=\"fas fa-plus fa-3x text-gray-300\"></i>"
                        . "</div>"
                        . "</div>"
                        . "</div>"
                        . "</div>"
                        . "</a>"
                        . "</div>";
                }
                ?>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="../Grafici/grafici.php">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <!--<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Piante</div>-->
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Grafici</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-line fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="#">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <!--<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Piante</div>-->
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Profilo</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-3x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

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
<!-- The Modal -->
<div class="modal" id="modalAdd">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Nuovo Utente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <labe for="name">Nome</labe>
                        <input type="text" class="form-control form-control-user"
                               id="name" placeholder="Mauro">
                    </div>
                    <div class="form-group">
                        <labe for="surname">Cognome</labe>
                        <input type="text" class="form-control form-control-user"
                               id="surname" placeholder="Rossi">
                    </div>
                    <div class="form-group">
                        <labe for="username">Username</labe>
                        <input type="text" class="form-control form-control-user"
                               id="username" placeholder="mauro_rossi">
                        <p class="text-danger" id="alertUtenteP" style="display:none">Username gi&agrave; presente!</p>
                    </div>
                    <div class="form-group">
                        <labe for="email">Email</labe>
                        <input type="email" class="form-control form-control-user"
                               id="email" placeholder="mauro.rossi@serraunipg.it">
                    </div>
                    <div class="form-group">
                        <labe for="pwd">Password</labe>
                        <input type="password" class="form-control form-control-user"
                               id="pwd" placeholder="Mauro">
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="" class="btn btn-primary btn-user btn-block">
                            Iscrivi
                        </button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="modalAddP">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Nuova Pianta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <labe for="nameP">Nome Pianta</labe>
                        <input type="text" class="form-control form-control-user"
                               id="nameP" placeholder="Margerita">
                    </div>
                    <div class="form-group">
                        <labe for="surname">Descrizione</labe>
                        <input type="text" class="form-control form-control-user"
                               id="descrizioneP" placeholder="descrizione della painta">
                    </div>
                    <div class="form-group">
                        <labe for="Device EUI"></labe>
                        <input type="text" class="form-control form-control-user"
                               id="username" placeholder="mauro_rossi">
                        <p class="text-danger" id="alertUtenteP" style="display:none">Username gi&agrave; presente!</p>
                    </div>
                    <div class="form-group">
                        <labe for="email">Application EUI</labe>
                        <input type="email" class="form-control form-control-user"
                               id="email" placeholder="mauro.rossi@serraunipg.it">
                    </div>
                    <div class="form-group">
                        <labe for="email">Device Address</labe>
                        <input type="text" class="form-control form-control-user"
                               id="email" placeholder="mauro.rossi@serraunipg.it">
                    </div>
                    <div class="form-group">
                        <labe for="email">Nettwork key</labe>
                        <input type="text" class="form-control form-control-user"
                               id="email" placeholder="mauro.rossi@serraunipg.it">
                    </div>
                    <div class="form-group">
                        <labe for="email">Application key</labe>
                        <input type="text" class="form-control form-control-user"
                               id="email" placeholder="mauro.rossi@serraunipg.it">
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="" class="btn btn-primary btn-user btn-block">
                            Aggiugi Pianta
                        </button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
</body>

<script type="text/javascript">
    var gauge1 = loadLiquidFillGauge("fillgauge1", 0);


    var timeLeft = 2;
    var timerId = setInterval(countdown, 1000);

    function countdown() {
        if (timeLeft == -1) {
            clearTimeout(timerId);
            aggiornaDati();
        } else {
            //console.log(timeLeft);
            timeLeft--;
        }
    }

    function aggiornaDati() {
        $.ajax({
            type: "POST",
            url: "./Dati/umiditarealtime.php",
            dataType: "html",
            success: function (risposta) {
                gauge1.update(risposta);
            },
            error: function () {
                alert("Chiamata fallita, si prega di riprovare...");
            }
        });
        timeLeft = 2;
        timerId = setInterval(countdown, 1000);
    }


</script>
</html>
