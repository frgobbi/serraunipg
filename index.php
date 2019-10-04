<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../Img/favicon.png" rel="icon">
    <title>Serra Unipg</title>
    <?php
    include_once "componentiBase/header.php";
    headerIndex();
    ?>
    <script type="text/javascript">
        function Login() {
            var id_utente = $('#usernameU').val();
            var pwd = $('#pwdU').val();
            var remember = 0;
            if ($('#customCheck').is(":checked")) {
                remember = 1;
            }
            $.ajax({
                type: "POST",
                url: "public/log-in.php",
                data: "id_utente=" + id_utente + "&pwd=" + pwd + "&remember=" + remember,
                dataType: "html",
                success: function (risposta) {
                    if (risposta == 0) {
                        $('#AlertNoPWD').hide();
                        $('#AlertNoUser').hide();
                        window.location.href = "Dashboard/dashboard.php"
                    } else {
                        if (risposta == 1){
                            $('#AlertNoPWD').show();
                            $('#AlertNoUser').hide();

                        } else {
                            if(risposta == 2){
                                $('#AlertNoUser').show();
                                $('#AlertNoPWD').hide();
                            }
                        }
                    }
                },
                error: function () {
                    alert("Chiamata fallita!!!");
                }
            });
        }

        function tastoEnter() {
            var tasto = window.event.keyCode;
            console.log(tasto);
            if (tasto === 13) {
                Login();
            }
        }
    </script>
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Benvenuto in Serra Unipg!</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                               id="usernameU" aria-describedby="emailHelp" value="<?php if(isset($_COOKIE['id_utente'])) { echo $_COOKIE['id_utente']; } ?>"
                                               placeholder="Enter Username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" onkeyup="tastoEnter()"
                                               class="form-control form-control-user"
                                               value="<?php if(isset($_COOKIE['pwd_utente'])) { echo $_COOKIE['pwd_utente']; } ?>"
                                               id="pwdU" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" value="1" class="custom-control-input"
                                                   id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="button" onclick="Login();" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <br>
                                    <div class="alert alert-danger alert-dismissible messaggi" id="AlertNoPWD">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Errore!</strong> Password non corretta!
                                    </div>
                                    <div class="alert alert-warning alert-dismissible messaggi" id="AlertNoUser">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Attenzione!</strong><br>Utente non presente nel sistema!
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="public/forgot-password.php"><br>Forgot Password?</a>
                                </div>
                                <!--
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</body>

</html>
