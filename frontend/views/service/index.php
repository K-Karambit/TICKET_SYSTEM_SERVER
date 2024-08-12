<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../../frontend/auth/index.php');
    exit();
}

include '../../../backend/config/config.php';
include '../../../backend/controllers/user/UsersController.php';
include '../../../backend/controllers/service/serviceController.php';
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
                                    <h5>Manage Service</h5>
                                    <h6 class="sub-heading">Manage, Add and Edit Service</h6>
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
                            case 'new_service':
                                echo '<div class="bg-primary text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                echo 'A new service has been added.';
                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                                break;
                            case 'service_deleted':
                                echo '<div class="bg-secondary text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                echo 'A service has been deleted.';
                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                echo '</div>';
                                break;
                            case 'service_restored':
                                echo '<div class="bg-info text-white border-0 alert alert-success alert-dismissible fade show" role="alert">';
                                echo 'A service has been restored.';
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
                            <div class="card py-5">
                                <div class="card-header d-flex justify-content-between">
                                    <a data-bs-toggle="modal" data-bs-target="#addNewServiceModal"
                                        class="btn btn-primary d-flex gap-2 align-items-center"><span
                                            class="icon-plus-outline"></span>Create a Service</a>

                                    <a data-bs-toggle="modal" data-bs-target="#archivedUserModal"
                                        class="btn btn-transparent d-flex gap-2 align-items-center"><span
                                            class="material-symbols-outlined">
                                            settings_backup_restore
                                        </span></span>Disabled Services</a>
                                </div>
                                <div class="card-body" style="height: 80vh; overflow-y: auto;">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">SERVICE ID</th>
                                                <th scope="col">CREATED BY</th>
                                                <th scope="col">CREATOR'S ID</th>
                                                <th scope="col">CREATOR'S DEPARTMENT</th>
                                                <th scope="col">SERVICES CREATED</th>
                                                <th scope="col">CREATED ON</th>
                                                <th scope="col">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody class="py-5">
                                            <?php echo ServiceControllerClass::getServices(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="addNewServiceModal" tabindex="-1" aria-labelledby="addNewServicerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class=" modal-content">
                                <div class="modal-body">
                                    <form action="../../../backend/scripts/service/addServices-script.php" method="post"
                                        enctype="multipart/form-data" class="p-3" style="width: 100%;">
                                        <div class="d-flex flex-wrap">
                                            <div class="col-md-12 d-flex flex-column gap-5">
                                                <div class="d-flex gap-2">
                                                    <span class="fs-5 text-muted">
                                                        Service Details
                                                    </span>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="service_creator_username"
                                                            class="py-2 text-muted">REQUESTOR
                                                            USERNAME:<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100"
                                                            id="service_creator_username"
                                                            placeholder="<?php echo $_SESSION['user_username']; ?>"
                                                            name="service_creator_username"
                                                            value="<?php echo $_SESSION['user_username']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="service_creator_unique_id"
                                                            class="py-2 text-muted">REQUESTOR
                                                            ID:<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100"
                                                            id="service_creator_unique_id"
                                                            placeholder="<?php echo $_SESSION['unique_id']; ?>"
                                                            name="service_creator_unique_id"
                                                            value="<?php echo $_SESSION['unique_id']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="service_creator_department" class="py-2 text-muted">OFFICE
                                                            /
                                                            DEPARTMENT (REQUESTOR):<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100"
                                                            id="service_creator_department"
                                                            placeholder="<?php echo $_SESSION['user_department']; ?>"
                                                            name="service_creator_department"
                                                            value="<?php echo $_SESSION['user_department']; ?>"
                                                            readonly>
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="service_name" class="py-2 text-muted">SERVICE NAME:<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100"
                                                            id="service_name"
                                                            placeholder="Service Name" name="service_name"
                                                            required>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer mt-5">
                                            <button type="submit" class="btn btn-primary mt-3 py-3 px-5 w-auto"
                                                name="add_account">CREATE SERVICE</button>
                                            <button type="button" class="btn btn-secondary mt-3 py-3 px-5 w-auto"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
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
                                    <h1 class="modal-title fs-5" id="archivedUserModalLabel">Restore deleted services
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body" style="height: 80vh; overflow-y: auto;">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">SERVICE ID</th>
                                                <th scope="col">CREATED BY</th>
                                                <th scope="col">CREATOR'S ID</th>
                                                <th scope="col">CREATOR'S DEPARTMENT</th>
                                                <th scope="col">SERVICES CREATED</th>
                                                <th scope="col">CREATED ON</th>
                                                <th scope="col">ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody class="p-5">
                                                <?php echo ServiceControllerClass::getDeletedService(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql = "SELECT * FROM tbl_tickets";
                    $stmt = ConfigClass::prepareAndExecute($sql, []);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        // Access individual row data
                        $unique_id = $row['unique_id'];
                        $service_creator_username = $row['requestor_username'];
                        $service_creator_unique_id = $row['requestor_unique_id'];
                        $service_creator_department = $row['requestor_department'];
                        $service_request = $row['service_request'];
                        $ticket_subject = $row['ticket_subject'];
                        $ticket_description = $row['ticket_description'];
                        $created_at = $row['created_at'];

                    }
                    ?>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="ratingFormModal" tabindex="-1" aria-labelledby="ratingFormModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class=" modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ratingFormModalLabel">🌟 Rate our Service</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../../../backend/scripts/tickets/updateTickets-script.php" method="post"
                                        enctype="multipart/form-data" class="p-3" style="width: 100%;">
                                        <div class="d-flex flex-wrap">
                                            <div class="col-md-12 d-flex flex-column gap-5">
                                                <div class="d-flex gap-2">
                                                    <span class="fs-5 text-muted">
                                                        Requestor's Details
                                                    </span>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="service_creator_username" class="py-2 text-muted">REQUESTOR
                                                            USERNAME:<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100" id="service_creator_username"
                                                            name="service_creator_username" value="<?php echo $requestor_username; ?>" readonly>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="service_creator_unique_id" class="py-2 text-muted">REQUESTOR
                                                            ID:<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100" id="service_creator_unique_id"
                                                            name="service_creator_unique_id" value="<?php echo $requestor_unique_id; ?>" readonly>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="service_creator_department" class="py-2 text-muted">OFFICE
                                                            /
                                                            DEPARTMENT (REQUESTOR):<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100" id="service_creator_department"
                                                            name="service_creator_department" value="<?php echo $requestor_department; ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                    
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="service_request" class="py-2 text-muted">SERVICE/S
                                                            REQUEST:<span class="text-danger">*</span></label>
                                                        <select class="form-control h-75 w-100" aria-label="Default select example"
                                                            name="service_request" id="service_request" required>
                                                            <option value="<?php echo $service_request; ?>" selected>
                                                                <?php echo $service_request; ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                    
                                                <div class="d-flex gap-2 mt-5">
                                                    <span class="fs-5 text-muted">
                                                        Ticket's Details
                                                    </span>
                                                </div>
                    
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="unique_id" class="py-2 text-muted">TICKET
                                                            ID:<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100" id="unique_id"
                                                            placeholder="<?php echo $unique_id; ?>" name="unique_id"
                                                            value="<?php echo $unique_id; ?>" readonly>
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="ticket_subject" class="py-2 text-muted">SUBJECT:<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control h-75 w-100" id="ticket_subject"
                                                            value="<?php echo $ticket_subject; ?>" name="ticket_subject" readonly>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="ticket_description" class="py-2 text-muted">DESCRIPTION:<span
                                                                class="text-danger">*</span></label>
                                                        <textarea type="text" class="form-control h-100 w-100" id="ticket_description"
                                                            placeholder="The network connectivity issues started at approximately 10:00 AM today. I have tried restarting my modem and router, but this has not resolved the problem. I have also tried connecting to different networks, but I am still unable to connect. I am able to connect to other devices on my local network, but I am unable to access the internet."
                                                            name="ticket_description" readonly><?php echo $ticket_description; ?></textarea>
                                                    </div>
                                                </div>
                    
                                                <div class="d-flex gap-2 mt-5">
                                                    <span class="fs-5 text-muted">
                                                        Rating Details
                                                    </span>
                                                </div>
                    
                                                <div class="d-flex flex-column gap-5">
                                                    <div class="form-group w-100">
                                                        <label for="ticket_timeliness" class="py-2 text-muted">TIMELINESS<span
                                                                class="text-danger">*</span> <br>
                                                        </label>
                                                        <input type="number" class="form-control h-75 w-100" id="ticket_timeliness"
                                                            name="ticket_timeliness" required min="1" max="5"
                                                            placeholder="PLEASE RATE THE SERVICE DONE WITH 5 BEING THE HIGHEST & 1 BEING THE LOWEST.">
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="ticket_effectiveness" class="py-2 text-muted">EFFECTIVENESS<span
                                                                class="text-danger">*</span> <br>
                                                        </label>
                                                        <input type="number" class="form-control h-75 w-100" id="ticket_effectiveness"
                                                            name="ticket_effectiveness" required min="1" max="5"
                                                            placeholder="PLEASE RATE THE SERVICE DONE WITH 5 BEING THE HIGHEST & 1 BEING THE LOWEST.">
                                                    </div>
                                                    <div class="form-group w-100">
                                                        <label for="ticket_overall_rate" class="py-2 text-muted">OVERALL
                                                            HOW WOULD
                                                            YOU RATE THE QUALITY OF
                                                            SERVICE?<span class="text-danger">*</span> <br>
                                                        </label>
                                                        <input type="number" class="form-control h-75 w-100" id="ticket_overall_rate"
                                                            name="ticket_overall_rate" required min="1" max="5"
                                                            placeholder="PLEASE RATE THE SERVICE DONE WITH 5 BEING THE HIGHEST & 1 BEING THE LOWEST.">
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2">
                                                    <div class="form-group w-100">
                                                        <label for="ticket_feedback" class="py-2 text-muted">FEEDBACK
                                                            & SUGGESTIONS:<span class="text-danger">*</span></label>
                                                        <textarea type="text" class="form-control h-100 w-100" id="ticket_feedback"
                                                            placeholder="I am very impressed with the services provided by the City Information Technology and Records Management Unit (CITRMU). They are very efficient, reliable, and responsive to the IT needs of the city government. They handle troubleshooting, repair, maintenance, and evaluation of various IT equipment and systems. They also manage the CCTV footage and records of the city. They are always ready to assist and accommodate the inquiries and requests of their clients. They demonstrate a high level of professionalism, competence, and dedication in their work. Thank you, CITRMU, for your excellent IT support!"
                                                            name="ticket_feedback"></textarea>
                                                    </div>
                                                </div>
                    
                                                <div class="text-info py-3">WE APPRECIATE YOUR RATING, THANK YOU.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary mt-3 py-3 px-5 w-auto" name="update_ticket">RATE
                                                TICKET</button>
                                            <button type="button" class="btn btn-secondary mt-3 py-3 px-5 w-auto"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
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