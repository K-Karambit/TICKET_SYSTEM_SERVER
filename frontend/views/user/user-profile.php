<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../../frontend/auth/index.php');
    exit();
}

include '../../../backend/config/config.php';
include '../../../backend/controllers/user/UsersController.php';
include '../../../backend/controllers/tickets/ticketsController.php';
include '../../../backend/controllers/dashboard/dashboardController.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="../../../frontend/assets/img/CITRMU_Logo.png" />
    <title>Helpdesk Support System - CITRMU</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- Mian and Login css -->
    <link rel="stylesheet" href="../../../frontend\assets\css/main.min.css" />
    <script src="../../../frontend\assets\js/theme.js"></script>

    <!-- Common CSS -->
    <link rel="stylesheet" href="../../../frontend\assets\css\main.min.css" />
    <link rel="stylesheet" href="../../../frontend\assets\fonts/icomoon/icomoon.css" />
    <link rel="stylesheet" href="../../../frontend\assets\css/main.min.css" />

    <!-- Chartist css -->
    <link href="../../../frontend\assets\vendor/chartist/css/chartist.min.css" rel="stylesheet" />
    <link href="../../../frontend\assets\vendor/chartist/css/chartist-custom.css" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body class="login-bg">

    <!-- Loading starts -->
    <div class="loading-wrapper">
        <div class="loading">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Loading ends -->

    <!-- BEGIN .app-wrap -->
    <div class="app-wrap">
        <!-- BEGIN .app-heading -->
        <?php
        include '../../includes/header.php';
        ?>
        <!-- END: .app-heading -->
        <!-- BEGIN .app-container -->
        <div class="app-container">
            <!-- BEGIN .app-side -->
            <?php
            include '../../includes/sidebar.php';
            ?>
            <!-- END: .app-side -->

            <!-- BEGIN .app-main -->
            <div class="app-main">
                <!-- BEGIN .main-heading -->
                <header class="main-heading">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="page-icon">
                                    <span class="material-symbols-outlined fs-1 text-success">
                                        person
                                    </span>
                                </div>
                                <div class="page-title">
                                    <h5>Manage Users</h5>
                                    <h6 class="sub-heading">Manage, Add and Edit Users</h6>
                                </div>
                            </div>
                            <!-- <div class="col-sm-4">
                                <div class="right-actions">
                                    <a href="#" class="btn btn-primary float-right" data-toggle="tooltip"
                                        data-placement="left" title="Download Reports">
                                        <i class="icon-download4"></i>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </header>
                <!-- END: .main-heading -->
                <!-- BEGIN .main-content -->
                <div class="main-content">

                    <?php

                    // Check if the `alert` key is defined in the `$_GET` variable.
                    if (isset($_GET['alert'])) {
                        // Get the value of the `alert` parameter.
                        $alertType = $_GET['alert'];

                        // Display an alert message based on the value of the `alert` parameter.
                        switch ($alertType) {
                            case 'username_updated':
                                echo '<div class="bg-primary text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                echo 'Account username has been updated successfully.';
                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                                break;
                            case 'password_updated':
                                echo '<div class="bg-info text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                echo 'Account password has been updated successfully.';
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

                    <div class="row gutters">
                        <div class="col-sm-12">

                            <div class="card p-5">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h5 class="card-title d-flex align-items-center"><span
                                                class="material-symbols-outlined">
                                                settings
                                            </span> Profile Settings</h5>
                                    </div>
                                </div>
                                <div class="card-body" style="height: 100%; width: 100%;">
                                    <form
                                        action="../../../backend/scripts/user/changeUsername-script.php?id=<?php echo $_SESSION['user_id']; ?>"
                                        method="post" style="width: 75%;" class="bg-light p-5 rounded mb-5">
                                        <div class="d-flex flex-wrap">
                                            <div class="col-md-12 d-flex flex-column gap-5">
                                                <div class="form-group">
                                                    <label for="username" class="py-2 text-muted">NEW USERNAME:<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control h-100 w-50 border border-muted"
                                                        id="username" placeholder="Username" name="username" required>
                                                </div>
                                                <button type="submit" name="submit"
                                                    class="btn btn-success my-3 py-3 w-25 rounded">CHANGE
                                                    USERNAME</button>
                                            </div>
                                        </div>

                                        <small class="text-info">We recommend that you log in again after changing
                                            your username, for changes to take effect.</small>
                                    </form>

                                    <form
                                        action="../../../backend/scripts/user/changePassword-script.php?id=<?php echo $_SESSION['user_id']; ?>"
                                        method="post" style="width: 75%;" class="bg-light p-5 rounded mb-5">
                                        <div class="d-flex flex-wrap">
                                            <div class="col-md-12 d-flex flex-column gap-5">
                                                <div class="form-group">
                                                    <label for="password" class="py-2 text-muted">NEW PASSWORD:<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control h-100 w-50 border border-muted"
                                                        id="password" placeholder="Password" name="password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirmPassword" class="py-2 text-muted">CONFIRM
                                                        PASSWORD:<span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control h-100 w-50 border border-muted"
                                                        id="confirmPassword" placeholder="Confirm Password"
                                                        name="confirmPassword" required>
                                                </div>
                                                <button type="submit" name="submit"
                                                    class="btn btn-success my-3 py-3 w-25 rounded">CHANGE
                                                    PASSWORD</button>
                                            </div>
                                        </div>

                                        <small class="text-info">We recommend that you log in again after changing
                                            your password, for changes to take effect.</small>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- END: .main-content -->
            </div>
            <!-- END: .app-main -->
        </div>
        <!-- END: .app-container -->
        <!-- BEGIN .main-footer -->
        <?php
        include '../../../frontend\includes\footer.php';
        ?>
        <!-- END: .main-footer -->
    </div>
    <!-- END: .app-wrap -->

    <!-- jQuery first, then Tether, then other JS. -->
    <script src="../../../frontend\assets\js/jquery.js"></script>
    <script src="../../../frontend\assets\js/tether.min.js"></script>
    <script src="../../../frontend\assets\js/bootstrap.min.js"></script>
    <script src="../../../frontend\assets\vendor/unifyMenu/unifyMenu.js"></script>
    <script src="../../../frontend\assets\vendor/onoffcanvas/onoffcanvas.js"></script>
    <script src="../../../frontend\assets\js/moment.js"></script>

    <!-- Sparkline JS -->
    <script src="../../../frontend\assets\vendor/sparkline/sparkline-retina.js"></script>
    <script src="../../../frontend\assets\vendor/sparkline/custom-sparkline.js"></script>

    <!-- Slimscroll JS -->
    <script src="../../../frontend\assets\vendor/slimscroll/slimscroll.min.js"></script>
    <script src="../../../frontend\assets\vendor/slimscroll/custom-scrollbar.js"></script>

    <!-- Chartist JS -->
    <script src="../../../frontend\assets\vendor/chartist/js/chartist.min.js"></script>
    <script src="../../../frontend\assets\vendor/chartist/js/chartist-tooltip.js"></script>
    <script src="../../../frontend\assets\vendor/chartist/js/custom/custom-line-chart3.js"></script>
    <script src="../../../frontend\assets\vendor/chartist/js/custom/custom-area-chart.js"></script>
    <script src="../../../frontend\assets\vendor/chartist/js/custom/donut-chart2.js"></script>
    <script src="../../../frontend\assets\vendor/chartist/js/custom/custom-line-chart4.js"></script>

    <!-- Common JS -->
    <script src="../../../frontend\assets\js/common.js"></script>
</body>

</html>