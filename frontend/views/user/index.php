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
    <!-- <div class="loading-wrapper">
        <div class="loading">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div> -->
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
                            case 'new_member':
                                echo '<div class="bg-primary text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                echo 'A new member has been added to the system.';
                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                                break;
                            case 'member_deleted':
                                echo '<div class="bg-secondary text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                echo 'A member has been deleted from the system.';
                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                                break;
                            case 'member_restored':
                                echo '<div class="bg-info text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                echo 'A member has been restored from the system.';
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

                    <!-- <div class="row gutters">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stats-widget">
                                        <div class="stats-widget-header">
                                            <div class="info-graph">
                                                <span id="barOne"></span>
                                            </div>
                                        </div>
                                        <div class="stats-widget-body">

                                            <ul class="row no-gutters">
                                                <li class="col-sm-6 col">
                                                    <h6 class="title">Users</h6>
                                                </li>
                                                <li class="col-sm-6 col">
                                                    <h4 class="total">20</h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stats-widget">
                                        <div class="stats-widget-header">
                                            <div class="info-graph">
                                                <span id="barTwo"></span>
                                            </div>
                                        </div>
                                        <div class="stats-widget-body">
                                            <ul class="row no-gutters">
                                                <li class="col-sm-6 col">
                                                    <h6 class="title">Shares</h6>
                                                </li>
                                                <li class="col-sm-6 col">
                                                    <h4 class="total">3,500</h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stats-widget">
                                        <a href="#" class="stats-label" data-toggle="tooltip" data-placement="top"
                                            title="New Followers">47</a>
                                        <div class="stats-widget-header">
                                            <i class="icon-googleplus"></i>
                                        </div>
                                        <div class="stats-widget-body">
                                            <ul class="row no-gutters">
                                                <li class="col-sm-6 col">
                                                    <h6 class="title">Visits</h6>
                                                </li>
                                                <li class="col-sm-6 col">
                                                    <h4 class="total">2,800</h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stats-widget">
                                        <a href="#" class="stats-label" data-toggle="tooltip" data-placement="top"
                                            title="New Posts">12</a>
                                        <div class="stats-widget-header">
                                            <i class="icon-rss"></i>
                                        </div>
                                        <div class="stats-widget-body">
                                            <ul class="row no-gutters">
                                                <li class="col-sm-6 col">
                                                    <h6 class="title">Blog</h6>
                                                </li>
                                                <li class="col-sm-6 col">
                                                    <h4 class="total">7,000</h4>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="row gutters">
                        <div class="col-sm-12">
                            <div class="card p-5">
                                <div class="card-header d-flex justify-content-between">
                                    <a data-bs-toggle="modal" data-bs-target="#addNewUserModal"
                                        class="btn btn-primary d-flex gap-2 align-items-center"><span
                                            class="icon-plus-outline"></span>New User</a>

                                    <a data-bs-toggle="modal" data-bs-target="#archivedUserModal"
                                        class="btn btn-secondary d-flex gap-2 align-items-center"><span
                                            class="material-symbols-outlined">
                                            settings_backup_restore
                                        </span></span>Archived Users</a>
                                </div>
                                <div class="card-body" style="height: 80vh; overflow-y: auto;">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">PROFILE PICTURE</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">USERNAME</th>
                                                <th scope="col">ROLE</th>
                                                <th scope="col">DEPARTMENT</th>
                                                <th scope="col">CREATED AT</th>
                                                <th scope="col">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody class="p-5">
                                            <?php echo UsersControllerClass::getUsers(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="addNewUserModal" tabindex="-1" aria-labelledby="addNewUserModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class=" modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addNewUserModalLabel">Create new user</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../../../backend/scripts/user/addUsers-script.php" method="post"
                                        enctype="multipart/form-data" class="p-3" style="width: 100%;">
                                        <div class="d-flex flex-wrap">
                                            <div class="col-md-12 d-flex flex-column gap-5">
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100 mx-auto">
                                                        <label for="profile_picture" class="py-2 text-muted">PROFILE
                                                            PICTURE:<span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control h-75 w-100 pt-4 ps-4"
                                                            id="profile_picture" name="profile_picture"
                                                            accept="image/jpeg, image/png, image/webp" required />
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="department" class="py-2 text-muted">DEPARTMENT:<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100"
                                                            id="department" placeholder="Department" name="department"
                                                            required>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="role" class="py-2 text-muted">ROLE:<span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control h-75 w-100"
                                                            aria-label="Default select example" name="role" id="role"
                                                            required>
                                                            <option value="TECHNICIAN" selected>TECHNICIAN</option>
                                                            <option value="MANAGER">MANAGER</option>
                                                            <option value="REQUESTOR">REQUESTOR</option>
                                                            <option value="ADMIN">ADMIN</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="username" class="py-2 text-muted">INITIAL
                                                            USERNAME:<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100" id="username"
                                                            placeholder="Username" name="username" required>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="password" class="py-2 text-muted">INITIAL
                                                            PASSWORD:<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100" id="password"
                                                            placeholder="Password" name="password" required>
                                                    </div>
                                                </div>
                                                <div class="form-text text-secondary">The user is recommended to
                                                    change
                                                    the Initial
                                                    Credentials after
                                                    activating the account.</div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 py-3 px-5 w-auto"
                                            name="add_account">CREATE
                                            ACCOUNT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="archivedUserModal" tabindex="-1"
                        aria-labelledby="archivedUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class=" modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="archivedUserModalLabel">Restore deleted users</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body" style="height: 80vh; overflow-y: auto;">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">PROFILE PICTURE</th>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">USERNAME</th>
                                                    <th scope="col">ROLE</th>
                                                    <th scope="col">DEPARTMENT</th>
                                                    <th scope="col">CREATED AT</th>
                                                    <th scope="col">ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody class="p-5">
                                                <?php echo UsersControllerClass::getDeletedUsers(); ?>
                                            </tbody>
                                        </table>
                                    </div>
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