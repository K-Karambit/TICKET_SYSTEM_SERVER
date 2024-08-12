<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: ../../frontend/views/dashboard/index.php');
    exit();
}
include '../../backend/config/config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="../assets/img/CITRMU_Logo.png" />
    <title>Helpdesk Support System - CITRMU</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Mian and Login css -->
    <link rel="stylesheet" href="../assets/css/main.min.css" />
    <script src="../frontend/assets/js/theme.js"></script>

</head>

<body class="login-bg">

    <div class="container">
        <div class="login-screen row align-items-center">
            <div class="col-sm-12">
                <form action="../../backend/scripts/auth/login-script.php" method="POST">
                    <div class="login-container">
                        <div class="d-flex no-gutters shadow" style="height: 80vh; width: 100%;">
                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12" style="width: 40%;">
                                <div class="login-box d-flex flex-column justify-content-center" style="height: 80vh;">
                                    <?php

                                    // Check if the `alert` key is defined in the `$_GET` variable.
                                    if (isset($_GET['alert'])) {
                                        // Get the value of the `alert` parameter.
                                        $alertType = $_GET['alert'];

                                        // Display an alert message based on the value of the `alert` parameter.
                                        switch ($alertType) {
                                            case 'user_not_found':
                                                echo '<div class="bg-secondary text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                                echo 'USER NOT FOUND.';
                                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                echo '</div>';
                                                break;
                                            default:
                                                echo '<div class="bg-secondary text-white alert alert-danger alert-dismissible fade show" role="alert">';
                                                echo 'Unknown Alert Type.';
                                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                echo '</div>';
                                                break;
                                        }
                                    }

                                    ?>
                                    <div class="d-flex gap-3 align-items-center pb-5 w-100">
                                        <img src="..\assets\img\CITRMU_Logo.png" alt="CITRMU Brand"
                                            style="width: 7rem; height: auto;" />

                                        <h1 class="fs-5"> <code class="text-success">CITRMU</code><br /> HELPDESK
                                            SUPPORT
                                            SYSTEM</h1>
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="username">
                                                <span class="material-symbols-outlined">
                                                    account_circle
                                                </span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username"
                                            aria-label="username" id="username" name="username">
                                    </div>
                                    <div class="input-group mb-4 pb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="password">
                                                <span class="material-symbols-outlined">
                                                    verified_user
                                                </span>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Password"
                                            aria-label="Password" id="password" name="password">
                                    </div>
                                    <div class="actions">
                                        <!-- <a href="forgot-pwd.html">Lost password?</a> -->
                                        <button type="submit" class="btn btn-primary" name="btn_SignIn">Login</button>
                                    </div>
                                    <!-- <div class="or"></div> -->
                                    <!-- <div class="mt-4">
                                        <a href="signup.html" class="additional-link">Don't have an Account?
                                            <span>Create Now</span></a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12" style="width: 60%;">
                                <!-- <div class="login-slider"></div> -->

                                <!-- <iframe width="100%" height="100%" frameborder="0" scrolling="no"
                                    src="https://mars.nasa.gov/gltf_embed/25042" allowfullscreen=""></iframe> -->

                                <iframe width="100%" height="100%" frameborder="0" scrolling="no"
                                    src="https://www.google.com/maps/embed?pb=!4v1696219640974!6m8!1m7!1sIQIQTumuUZPRV1xY00YXOw!2m2!1d14.38968191996038!2d120.9188493665715!3f68.02743982117457!4f4.5016099297166505!5f0.7820865974627469"
                                    allowfullscreen=""></iframe>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    // include '../../frontend/includes/footer.php';
    ?>

</body>

</html>