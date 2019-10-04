<?php
$userCrypt = filter_input(INPUT_GET, "hhere", FILTER_SANITIZE_STRING);
include_once "../pdo.php";
$pdo = connessione_normale();
$utente = null;
include "../Classi/Utente.php";
try {
    foreach ($pdo->query("SELECT * FROM utenti") as $row) {
        $stringaUser = "user:" . $row['username'] . "__";
        if (password_verify($stringaUser, $userCrypt)) {
            $utente = new utente($row['username']);
            $utente->setDati();
        }
    }
    if ($utente == null || $utente->getFlagP() == 0) {
        echo "<script type='text/javascript'>window.location.href='../index.php'</script>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
$pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../Img/favicon.png" rel="icon">
    <title>Serra Unipg</title>
    <?php
    include_once "../componentiBase/header.php";
    headerPublic();
    ?>
    <script type="text/javascript">

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
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Change Password</h1>
                                    <p class="mb-4"></p>
                                </div>
                                <form class="user" id="formForgotpwd">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="pwd1"
                                               placeholder="Enter Password...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="pwd2"
                                               placeholder="Repeat Password...">
                                    </div>
                                    <button type="button" onclick="changePwd()"
                                            class="btn btn-primary btn-user btn-block">
                                        Change Password
                                    </button>
                                </form>
                                <hr>
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


