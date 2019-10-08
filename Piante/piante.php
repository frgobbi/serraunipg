<?php
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
    <script type="text/javascript" src="../PianteJavascript/piante.js"></script>
    <!-- Load c3.css -->
    <link href="../Library/c3-0.7.10/c3.css" rel="stylesheet">

    <!-- Load d3.js and c3.js -->
    <script src="https://d3js.org/d3.v5.js" charset="utf-8"></script>
    <script src="../Library/c3-0.7.10/c3.min.js"></script>
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
                <?php
                include_once "../pdo.php";
                $pdo = connessione_normale();
                try {
                    foreach ($pdo->query("SELECT * FROM vaso") as $row) {
                        $id_p = $row['id_vaso'];
                        $nome_pianta = $row['pianta'];
                        echo "<div class=\"col-xl-3 col-md-6 mb-4\">"
                            . "<a href=\"#\" onclick=\"visualizza_pianta('$id_p')\">"
                            . "<div class=\"card border-left-success border-bottom-success shadow h-100 py-2\">"
                            . "<div class=\"card-body\">"
                            . "<div class=\"row no-gutters align-items-center\">"
                            . "<div class=\"col mr-2\">"
                            . "<!--<div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Piante</div>-->"
                            . "<div class=\"h5 mb-0 font-weight-bold text-gray-800\">$nome_pianta</div>"
                            . "</div>"
                            . "<div class=\"col-auto\">"
                            . "<i class=\"fas fa-seedling fa-3x text-gray-300\"></i>"
                            . "</div>"
                            . "</div>"
                            . "</div>"
                            . "</div>"
                            . "</a>"
                            . "</div>";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                $pdo = null;
                ?>

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
                        <labe for="username">Usernome</labe>
                        <input type="text" class="form-control form-control-user"
                               id="username" placeholder="mauro_rossi">
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
<div class="modal fade" id="modalPianta">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="bodyModalRealTime">
                <div class='row'>
                    <div class='col-lg-6 col-md-6 col-sm-12' id='chart'></div>
                    <div class='col-lg-6 col-md-6 col-sm-12' id='chart'></div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
</body>

<script type="text/javascript">
    var chart = c3.generate({
        data: {
            columns: [
                ['data', 0]
            ],
            type: 'gauge'
        },
        gauge: {
//        label: {
//            format: function(value, ratio) {
//                return value;
//            },
//            show: false // to turn off the min/max labels.
//        },
//    min: 0, // 0 is default, //can handle negative min e.g. vacuum / voltage / current flow / rate of change
//    max: 100, // 100 is default
//    units: ' %',
//    width: 39 // for adjusting arc thickness
        },
        color: {
            pattern: ['#54aedb', '#54aedb', '#54aedb', '#54aedb'], // the three color levels for the percentage values.
            threshold: {
//            unit: 'value', // percentage is default
//            max: 200, // 100 is default
                values: [30, 60, 90, 100]
            }
        },
        size: {
            height: 180
        }
    });

    var chart2 = c3.generate({
        data: {
            columns: [
                ['data', 15]
            ],
            type: 'gauge'
        },
        gauge: {
//        label: {
//            format: function(value, ratio) {
//                return value;
//            },
//            show: false // to turn off the min/max labels.
//        },
//    min: 0, // 0 is default, //can handle negative min e.g. vacuum / voltage / current flow / rate of change
//    max: 100, // 100 is default
//    units: ' %',
//    width: 39 // for adjusting arc thickness
        },
        color: {
            pattern: ['#54aedb', '#54aedb', '#54aedb', '#54aedb'], // the three color levels for the percentage values.
            threshold: {
//            unit: 'value', // percentage is default
//            max: 200, // 100 is default
                values: [30, 60, 90, 100]
            }
        },
        size: {
            height: 180
        }
    });
</script>
</html>
