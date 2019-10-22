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
    <script src="../Library/gauge/justgage.js"></script>
    <script src="../Library/gauge/raphael-2.1.4.min.js"></script>
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
                        echo "<div class=\"col-xl-4 col-md-6 mb-4\">"
                            . "<div class=\"card border-left-success border-bottom-success shadow h-100 py-2\">"
                            . "<div class='card-head text-center'><div class=\"h3 mb-0 font-weight-bold text-gray-800\">$nome_pianta</div></div>"
                            . "<div class=\"card-body\">"
                            . "<div class=\"row align-items-center\">"
                            . "<div class='col-xl-6 col-md-6 col-sm-12' id='chartHumidity'></div>"
                            . "<div class='col-xl-6 col-md-6 col-sm-12' id='chartTemperature'></div>"
                            . "</div>"
                            . "</div>"
                            . "</div>"
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
</body>

<script type="text/javascript">
        var gNode1 = document.createElement('div');
        gNode1.setAttribute("class", "gauge");


        var gauge1 = new JustGage({
            id: "chartTemperature",
            title: "Temperature (°C)",
            value: 50,
            min: 0,
            max: 100,
            humanFriendly: false,
            decimals: 0,
            counter: true
        });

        var gauge2 = new JustGage({
            id: "chartHumidity",
            title: "Humidity (%)",
            value: 5,
            min: 0,
            max: 100,
            humanFriendly: false,
            decimals: 0,
            levelColors : ['#806517','#57FEFF','#5CB3FF','#3BB9FF'],
            counter: true
        });

        var timeLeft = 3;
        var timerId = setInterval(countdown, 1000);

        function countdown() {
            if (timeLeft == -1) {
                clearTimeout(timerId);
                aggiornaDati();
            } else {
                console.log(3 - timeLeft);
                var width = ((3 - timeLeft)*100)/3;
                timeLeft--;
            }
        }
        function aggiornaDati(){
            $.ajax({
                type: "POST",
                url: "../PianteDati/realtimePianta.php",
                data : "pianta=1",
                dataType: "html",
                success: function(msg)
                {
                    var ogg = $.parseJSON(msg);

                    gauge2.refresh(ogg.humidity,100);
                    gauge1.refresh(ogg.temperature,100);
                },
                error: function()
                {
                    alert("Chiamata fallita, si prega di riprovare...");
                }
            });
            timeLeft = 3;
            timerId = setInterval(countdown, 1000);
        }



</script>
</html>
