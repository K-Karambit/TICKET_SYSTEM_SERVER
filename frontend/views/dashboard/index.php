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

	<!-- Data Tables -->
	<link rel="stylesheet" href="../../../frontend\assets\vendor/datatables/dataTables.bs4.css" />
	<link rel="stylesheet" href="../../../frontend\assets\vendor/datatables/dataTables.bs4-custom.css" />

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
									<i class="icon-laptop_windows"></i>
								</div>
								<div class="page-title">
									<h5>Dashboard</h5>
									<h6 class="sub-heading">Overview</h6>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="right-actions d-flex align-items-center h-100">
									<span id="currentDateTime"></span>

									<script>
										function getCurrentDateTime() {
											// Get the current date and time
											const now = new Date();

											// Get the current day of the week
											const day = now.getDay();
											const days = [
												"Sunday",
												"Monday",
												"Tuesday",
												"Wednesday",
												"Thursday",
												"Friday",
												"Saturday",
											];

											// Get the current month
											const month = now.getMonth() + 1;
											const months = [
												"January",
												"February",
												"March",
												"April",
												"May",
												"June",
												"July",
												"August",
												"September",
												"October",
												"November",
												"December",
											];

											// Get the current year
											const year = now.getFullYear();

											// Get the current time
											const hours = now.getHours();
											const minutes = now.getMinutes();
											const seconds = now.getSeconds();

											// Format the time to 12-hour format with AM/PM
											const ampm = hours >= 12 ? "PM" : "AM";
											const formattedHours = (hours % 12 || 12).toString().padStart(2, "0");
											const formattedMinutes = minutes.toString().padStart(2, "0");
											const formattedSeconds = seconds.toString().padStart(2, "0");

											// Return the current date and time in a formatted string
											return `${days[day]}, ${months[month - 1]} ${now.getDate()}, ${year} ${formattedHours}:${formattedMinutes}:${formattedSeconds} ${ampm}`;
										}

										// Update the current date and time every second
										setInterval(function () {
											const currentDateTime = getCurrentDateTime();
											document.getElementById("currentDateTime").textContent = currentDateTime;
										}, 1000);
									</script>
								</div>
							</div>
						</div>
					</div>
				</header>

				<div class="main-content">
					<?php if ($_SESSION['user_role'] === 'ADMIN' || $_SESSION['user_role'] === 'MANAGER') { ?>
						<div class="row gutters">
							<div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<a href="#" class="stats-label" data-toggle="tooltip" data-placement="top"
												title="Just a Number">1</a>
											<div class="stats-widget-header">
												<span class="material-symbols-outlined fs-1 text-success">
													group
												</span>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-sm-6 col">
														<h6 class="title">OVERALL SYSTEM USERS COUNT</h6>
													</li>
													<li class="col-sm-6 col">
														<h4 class="total">
															<?php echo DashboardControllerClass::getUsersCount(); ?>
														</h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card" data-bs-toggle="modal" data-bs-target="#technicianStatisticsModal">
									<div class="card-body">
										<div class="stats-widget">
											<a href="#" class="stats-label" data-toggle="tooltip" data-placement="top"
												title="Just a Number">2</a>
											<div class="stats-widget-header">
												<span class="material-symbols-outlined fs-1 text-success">
													settings_accessibility
												</span>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-sm-6 col">
														<h6 class="title">OVERALL CITRMU PERSONEL</h6>
													</li>
													<li class="col-sm-6 col">
														<h4 class="total">
															<?php echo DashboardControllerClass::getTechnician(); ?>
														</h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<a href="#" class="stats-label" data-toggle="tooltip" data-placement="top"
												title="Just a Number">2</a>
											<div class="stats-widget-header">
												<span class="material-symbols-outlined fs-1 text-success">
													settings_accessibility
												</span>
											</div>
											<div class="stats-widget-body">
												<ul class="row no-gutters">
													<li class="col-sm-6 col">
														<h6 class="title">OVERALL OPEN TICKETS</h6>
													</li>
													<li class="col-sm-6 col">
														<h4 class="total">
															<?php echo DashboardControllerClass::getOverallTickets(); ?>
														</h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div> -->
							<div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<a href="#" class="stats-label" data-toggle="tooltip" data-placement="top"
												title="Just a Number">3</a>
											<div class="stats-widget-header">
												<span class="material-symbols-outlined text-success fs-1">
													construction
												</span>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-sm-6 col">
														<h6 class="title">CITRMU SERVICES OFFERED</h6>
													</li>
													<li class="col-sm-6 col">
														<h4 class="total">
															<?php echo DashboardControllerClass::getServices(); ?>
														</h4>
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
												title="Just a Number">4</a>
											<div class="stats-widget-header">
												<span class="material-symbols-outlined fs-1 text-success">
													work
												</span>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-sm-6 col">
														<h6 class="title">OVERALL TICKETS COMPLETED</h6>
													</li>
													<li class="col-sm-6 col">
														<h4 class="total">
															<?php echo DashboardControllerClass::getTicketsCompleted(); ?>
														</h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php if ($_SESSION['user_role'] === 'ADMIN') { ?>
						<div class="row gutters">
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header py-3 d-flex justify-content-between">Overview<a
											href="widgets.html" class="fs-6 btn btn-success" data-bs-toggle="modal"
											data-bs-target="#addNewTicketModal">Create
											a ticket</a>
									</div>
									<div class="card-body">
										<!-- Row start -->
										<div class="row gutters">
											<div
												class="col-lg-6 col-sm-12 d-flex align-items-center justify-content-center">
												<h1 class="card-title mt-0 fs-1 fw-bold">OUR MONTHLY TICKETS</h1>
												<!-- <div class="chartist custom-one">
												<div class="line-chart3"></div>
											</div>
											<div class="download-details">
												<p>21<sup>%</sup> more visitors than last month</p>
											</div> -->
											</div>
											<div class="col-lg-2 col-sm-4">
												<div class="monthly-avg">
													<h6>Monthly<br />Tickets</h6>
													<div class="avg-block">
														<h4 class="avg-total text-secondary">000</h4>
														<h6 class="avg-label">
															Created
														</h6>
													</div>
													<div class="avg-block">
														<h4 class="avg-total text-primary">000</h4>
														<h6 class="avg-label">
															Completed
														</h6>
													</div>
												</div>
											</div>
											<div class="col-lg-2 col-sm-4">
												<div class="monthly-avg">
													<h6>Weekly<br />Tickets</h6>
													<div class="avg-block">
														<h4 class="avg-total text-secondary">000</h4>
														<h6 class="avg-label">
															Created
														</h6>
													</div>
													<div class="avg-block">
														<h4 class="avg-total text-primary">000</h4>
														<h6 class="avg-label">
															Completed
														</h6>
													</div>
												</div>
											</div>
											<div class="col-lg-2 col-sm-4">
												<div class="monthly-avg">
													<h6>Daily<br />Tickets</h6>
													<div class="avg-block">
														<h4 class="avg-total text-secondary">000</h4>
														<h6 class="avg-label">
															Created
														</h6>
													</div>
													<div class="avg-block">
														<h4 class="avg-total text-primary">000</h4>
														<h6 class="avg-label">
															Completed
														</h6>
													</div>
												</div>
											</div>
										</div>
										<!-- Row end -->
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

					<!-- Modal -->
					<div class="modal fade" id="technicianStatisticsModal" tabindex="-1"
						aria-labelledby="technicianStatisticsModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg">
							<div class=" modal-content">
								<div class=" modal-header">
									<h1 class="modal-title fs-5 d-flex align-items-center"
										id="technicianStatisticsModalLabel"><span class="material-symbols-outlined">
											monitoring
										</span> Statistics
									</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<?php echo DashboardControllerClass::getTechnicianOverallTicketCount(); ?>
									<!-- <iframe loading="lazy"
										style="position: absolute; width: 100%; height: 90vh; top: 0; left: 0; border: none; padding: 0;margin: 0;"
										src="https://cityofimus.gov.ph/docs/Citizen's%20Charter/2023_Citizen's_Charter_LGU_Imus.pdf?navpanes=0&toolbar=0"
										allowfullscreen="allowfullscreen" allow="fullscreen">
									</iframe> -->
								</div>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="addNewTicketModal" tabindex="-1"
						aria-labelledby="addNewTicketModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg">
							<div class=" modal-content">
								<div class=" modal-header">
									<h1 class="modal-title fs-5" id="addNewTicketModalLabel">Create new ticket</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action=" ../../../backend/scripts/tickets/addTickets-script.php" method="post"
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
														<label for="requestor_username"
															class="py-2 text-muted">REQUESTOR
															USERNAME:<span class="text-danger">*</span></label>
														<input type="text" class="form-control h-75 w-100"
															id="requestor_username"
															placeholder="<?php echo $_SESSION['user_username']; ?>"
															name="requestor_username"
															value="<?php echo $_SESSION['user_username']; ?>" readonly>
													</div>
													<div class="form-group w-100">
														<label for="requestor_unique_id"
															class="py-2 text-muted">REQUESTOR
															ID:<span class="text-danger">*</span></label>
														<input type="text" class="form-control h-75 w-100"
															id="requestor_unique_id"
															placeholder="<?php echo $_SESSION['unique_id']; ?>"
															name="requestor_unique_id"
															value="<?php echo $_SESSION['unique_id']; ?>" readonly>
													</div>
													<div class="form-group w-100">
														<label for="requestor_department" class="py-2 text-muted">OFFICE
															/
															DEPARTMENT (REQUESTOR):<span
																class="text-danger">*</span></label>
														<input type="text" class="form-control h-75 w-100"
															id="requestor_department"
															placeholder="<?php echo $_SESSION['user_department']; ?>"
															name="requestor_department"
															value="<?php echo $_SESSION['user_department']; ?>"
															readonly>
													</div>
												</div>

												<div class="d-flex gap-2">
													<div class="form-group w-100">
														<label for="service_request" class="py-2 text-muted">SERVICE/S
															REQUEST:<span class="text-danger">*</span></label>
														<select class="form-control h-75 w-100"
															aria-label="Default select example" name="service_request"
															id="service_request" required>
															<option
																value="<?php echo TicketsControllerClass::getServices(); ?>"
																selected></option>
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
														<label for="ticket_subject"
															class="py-2 text-muted">SUBJECT:<span
																class="text-danger">*</span></label>
														<input type="text" class="form-control h-75 w-100"
															id="ticket_subject" placeholder="Network Connectivity Issue"
															name="ticket_subject" required>
													</div>
												</div>
												<div class="d-flex gap-2">
													<div class="form-group w-100">
														<label for="ticket_description"
															class="py-2 text-muted">DESCRIPTION:<span
																class="text-danger">*</span></label>
														<textarea type="text" class="form-control h-100 w-100"
															id="ticket_description"
															placeholder="The network connectivity issues started at approximately 10:00 AM today. I have tried restarting my modem and router, but this has not resolved the problem. I have also tried connecting to different networks, but I am still unable to connect. I am able to connect to other devices on my local network, but I am unable to access the internet."
															name="ticket_description" required></textarea>
													</div>
												</div>

												<div class="text-secondary py-3">After you create a ticket, IT
													support will come to help you at the earliest opportunity. Please
													wait patiently.</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary mt-3 py-3 px-5 w-auto"
												name="add_account">CREATE TICKET</button>
											<button type="button" class="btn btn-secondary mt-3 py-3 px-5 w-auto"
												data-bs-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="row gutters">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">TICKETS</div>
								<div class="card-body" style="height: 80vh; overflow-y: auto;">
									<table class="table table-striped table-hover">
										<thead>
											<tr class="text-center">
												<th scope="col">TICKET ID</th>
												<th scope="col">REQUESTED BY</th>
												<th scope="col">REQUESTED FROM</th>
												<th scope="col">ASSIGNED TO</th>
												<th scope="col">SERVICE REQUEST</th>
												<th scope="col">TICKET SUBJECT</th>
												<th scope="col">TICKET DESCRIPTION</th>
												<th scope="col">TICKET ISSUED ON</th>
												<!-- <th scope="col">ACTIONS</th> -->
											</tr>
										</thead>
										<tbody class="py-5">
											<?php echo TicketsControllerClass::getTicketsDashboardIndex(); ?>
										</tbody>
									</table>
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
									<h1 class="modal-title fs-5" id="archivedUserModalLabel">Restore deleted tickets
									</h1>
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


					<?php if ($_SESSION['user_role'] === 'TECHNICIAN') { ?>
						<!-- Modal -->
						<div class="modal fade" id="myRateModal" tabindex="-1" aria-labelledby="myRateModalLabel"
							aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-xl">
								<div class=" modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="myRateModalLabel">My Ratings
										</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="card-body" style="height: 80vh; overflow-y: auto;">
											<table class="table table-striped table-hover">
												<thead>
													<tr class="text-center">
														<th scope="col">TICKET ID</th>
														<th scope="col">TICKET SUBJECT</th>
														<th scope="col">TICKET DESCRIPTION</th>
														<th scope="col">TICKET ISSUED ON</th>
														<th scope="col">TICKET TIMELINESS</th>
														<th scope="col">TICKET EFFECTIVENESS</th>
														<th scope="col">TICKET OVERALL RATE</th>
														<th scope="col">TICKET FEEDBACK</th>
													</tr>
												</thead>
												<tbody class="py-5">
													<?php echo TicketsControllerClass::technicianRate(); ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php
					$sql = "SELECT * FROM tbl_tickets";
					$stmt = ConfigClass::prepareAndExecute($sql, []);

					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						// Access individual row data
						$unique_id = $row['unique_id'];
						$requestor_username = $row['requestor_username'];
						$requestor_unique_id = $row['requestor_unique_id'];
						$requestor_department = $row['requestor_department'];
						$service_request = $row['service_request'];
						$ticket_subject = $row['ticket_subject'];
						$ticket_description = $row['ticket_description'];
						$created_at = $row['created_at'];

					}
					?>

					<!-- Modal -->
					<div class="modal fade" id="ratingFormModal" tabindex="-1" aria-labelledby="ratingFormModalLabel"
						aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg">
							<div class=" modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="ratingFormModalLabel">🌟 Rate our Service</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="../../../backend/scripts/tickets/updateTickets-script.php"
										method="post" enctype="multipart/form-data" class="p-3" style="width: 100%;">
										<div class="d-flex flex-wrap">
											<div class="col-md-12 d-flex flex-column gap-5">
												<div class="d-flex gap-2">
													<span class="fs-5 text-muted">
														Requestor's Details
													</span>
												</div>
												<div class="d-flex gap-2">
													<div class="form-group w-100">
														<label for="requestor_username"
															class="py-2 text-muted">REQUESTOR
															USERNAME:<span class="text-danger">*</span></label>
														<input type="text" class="form-control h-75 w-100"
															id="requestor_username" name="requestor_username"
															value="<?php echo $requestor_username; ?>" readonly>
													</div>
													<div class="form-group w-100">
														<label for="requestor_unique_id"
															class="py-2 text-muted">REQUESTOR
															ID:<span class="text-danger">*</span></label>
														<input type="text" class="form-control h-75 w-100"
															id="requestor_unique_id" name="requestor_unique_id"
															value="<?php echo $requestor_unique_id; ?>" readonly>
													</div>
													<div class="form-group w-100">
														<label for="requestor_department" class="py-2 text-muted">OFFICE
															/
															DEPARTMENT (REQUESTOR):<span
																class="text-danger">*</span></label>
														<input type="text" class="form-control h-75 w-100"
															id="requestor_department" name="requestor_department"
															value="<?php echo $requestor_department; ?>" readonly>
													</div>
												</div>

												<div class="d-flex gap-2">
													<div class="form-group w-100">
														<label for="service_request" class="py-2 text-muted">SERVICE/S
															REQUEST:<span class="text-danger">*</span></label>
														<select class="form-control h-75 w-100"
															aria-label="Default select example" name="service_request"
															id="service_request" required>
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
														<input type="text" class="form-control h-75 w-100"
															id="unique_id" placeholder="<?php echo $unique_id; ?>"
															name="unique_id" value="<?php echo $unique_id; ?>" readonly>
													</div>
													<div class="form-group w-100">
														<label for="ticket_subject"
															class="py-2 text-muted">SUBJECT:<span
																class="text-danger">*</span></label>
														<input type="text" class="form-control h-75 w-100"
															id="ticket_subject" value="<?php echo $ticket_subject; ?>"
															name="ticket_subject" readonly>
													</div>
												</div>
												<div class="d-flex gap-2">
													<div class="form-group w-100">
														<label for="ticket_description"
															class="py-2 text-muted">DESCRIPTION:<span
																class="text-danger">*</span></label>
														<textarea type="text" class="form-control h-100 w-100"
															id="ticket_description"
															placeholder="The network connectivity issues started at approximately 10:00 AM today. I have tried restarting my modem and router, but this has not resolved the problem. I have also tried connecting to different networks, but I am still unable to connect. I am able to connect to other devices on my local network, but I am unable to access the internet."
															name="ticket_description"
															readonly><?php echo $ticket_description; ?></textarea>
													</div>
												</div>

												<div class="d-flex gap-2 mt-5">
													<span class="fs-5 text-muted">
														Rating Details
													</span>
												</div>

												<div class="d-flex flex-column gap-5">
													<div class="form-group w-100">
														<label for="ticket_timeliness"
															class="py-2 text-muted">TIMELINESS<span
																class="text-danger">*</span> <br>
														</label>
														<input type="number" class="form-control h-75 w-100"
															id="ticket_timeliness" name="ticket_timeliness" required
															min="1" max="5"
															placeholder="PLEASE RATE THE SERVICE DONE WITH 5 BEING THE HIGHEST & 1 BEING THE LOWEST.">
													</div>
													<div class="form-group w-100">
														<label for="ticket_effectiveness"
															class="py-2 text-muted">EFFECTIVENESS<span
																class="text-danger">*</span> <br>
														</label>
														<input type="number" class="form-control h-75 w-100"
															id="ticket_effectiveness" name="ticket_effectiveness"
															required min="1" max="5"
															placeholder="PLEASE RATE THE SERVICE DONE WITH 5 BEING THE HIGHEST & 1 BEING THE LOWEST.">
													</div>
													<div class="form-group w-100">
														<label for="ticket_overall_rate" class="py-2 text-muted">OVERALL
															HOW WOULD
															YOU RATE THE QUALITY OF
															SERVICE?<span class="text-danger">*</span> <br>
														</label>
														<input type="number" class="form-control h-75 w-100"
															id="ticket_overall_rate" name="ticket_overall_rate" required
															min="1" max="5"
															placeholder="PLEASE RATE THE SERVICE DONE WITH 5 BEING THE HIGHEST & 1 BEING THE LOWEST.">
													</div>
												</div>
												<div class="d-flex gap-2">
													<div class="form-group w-100">
														<label for="ticket_feedback" class="py-2 text-muted">FEEDBACK
															& SUGGESTIONS:<span class="text-danger">*</span></label>
														<textarea type="text" class="form-control h-100 w-100"
															id="ticket_feedback"
															placeholder="I am very impressed with the services provided by the City Information Technology and Records Management Unit (CITRMU). They are very efficient, reliable, and responsive to the IT needs of the city government. They handle troubleshooting, repair, maintenance, and evaluation of various IT equipment and systems. They also manage the CCTV footage and records of the city. They are always ready to assist and accommodate the inquiries and requests of their clients. They demonstrate a high level of professionalism, competence, and dedication in their work. Thank you, CITRMU, for your excellent IT support!"
															name="ticket_feedback"></textarea>
													</div>
												</div>

												<div class="text-info py-3">WE APPRECIATE YOUR RATING, THANK YOU.
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary mt-3 py-3 px-5 w-auto"
												name="update_ticket">RATE
												TICKET</button>
											<button type="button" class="btn btn-secondary mt-3 py-3 px-5 w-auto"
												data-bs-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- <div class="row gutters">
						<div class="col-lg-8 col-md-7 col-sm-12">
							<div class="card">
								<div class="card-header">Team Activity</div>
								<div class="card-body">
									<ul class="team-activity">
										<li class="product-list clearfix">
											<div class="product-time">
												<p class="date center-text">02:30 pm</p>
												<span class="badge badge-primary">New</span>
											</div>
											<div class="product-info">
												<div class="row gutter">
													<div class="col-lg-8 col-md-7 col-sm-7">
														<h5>Unify - Admin Dashboard</h5>
														<p>by Luke Etheridge</p>
													</div>
													<div class="col-lg-4 col-md-5 col-sm-5">
														<div class="progress sm no-margin">
															<div class="progress-bar progress-bar-info"
																role="progressbar" aria-valuenow="49" aria-valuemin="0"
																aria-valuemax="100" style="width: 49%">
																<span class="sr-only">49% Complete (success)</span>
															</div>
														</div>
														<p>(225 of 700gb)</p>
													</div>
												</div>
											</div>
										</li>
										<li class="product-list clearfix">
											<div class="product-time">
												<p class="date center-text">11:30 am</p>
												<span class="badge badge-primary">Task</span>
											</div>
											<div class="product-info">
												<div class="row gutter">
													<div class="col-lg-8 col-md-7 col-sm-7">
														<h5>User_Profile.php</h5>
														<p>by Rovane Durso</p>
													</div>
													<div class="col-lg-4 col-md-5 col-sm-5">
														<div class="progress sm no-margin">
															<div class="progress-bar progress-bar-info"
																role="progressbar" aria-valuenow="78" aria-valuemin="0"
																aria-valuemax="100" style="width: 78%">
																<span class="sr-only">78% Complete (success)</span>
															</div>
														</div>
														<p>90% completed</p>
													</div>
												</div>
											</div>
										</li>
										<li class="product-list clearfix">
											<div class="product-time">
												<p class="date center-text">12:50 pm</p>
												<span class="badge badge-primary">Closed</span>
											</div>
											<div class="product-info">
												<div class="row gutter">
													<div class="col-lg-8 col-md-7 col-sm-7 col">
														<h5>Material Design Kit</h5>
														<p>by Cosmin Capitanu</p>
													</div>
													<div class="col-lg-4 col-md-5 col-sm-5 col">
														<div class="chartist custom-one">
															<div class="team-act"></div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-5 col-sm-12">
							<div class="card">
								<div class="card-header">Tasks</div>
								<div class="card-body">
									<div class="chartist custom-one">
										<div class="donut-chart"></div>
									</div>
									<div class="row gutters">
										<div class="col-sm-4 col">
											<div class="info-stats">
												<span class="info-label"></span>
												<h6 class="info-title">Pending</h6>
												<h4 class="info-total">12</h4>
											</div>
										</div>
										<div class="col-sm-4 col">
											<div class="info-stats">
												<span class="info-label red"></span>
												<h6 class="info-title">Completed</h6>
												<h4 class="info-total">7</h4>
											</div>
										</div>
										<div class="col-sm-4 col">
											<div class="info-stats">
												<span class="info-label green"></span>
												<h6 class="info-title">New</h6>
												<h4 class="info-total">4</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row gutters">
						<div class="col-md-6 col-sm-12">
							<div class="card">
								<div class="card-header">Events</div>
								<div class="card-body p-0">
									<div class="events">
										<div class="all-events clearfix">
											<div id="today-date"></div>
											<a href="#" class="btn btn-sm">9 Events</a>
										</div>
										<ul class="event-list">
											<li>
												<a href="#">
													<div class="event-status-icon">
														<img src="../../../frontend\assets\img/checked.svg"
															alt="Best Themes" class="completed" />
													</div>
													<div class="event-info">
														<span class="event-time">8:45</span>
														<p class="event-desc text-truncate">Coffee with Hayashi</p>
													</div>
												</a>
											</li>
											<li>
												<a href="#">
													<div class="event-status-icon">
														<img src="../../../frontend\assets\img/not-checked.svg"
															alt="Best Themes" class="completed" />
													</div>
													<div class="event-info">
														<span class="event-time">10:30</span>
														<p class="event-desc text-truncate">Product meeting with dev
															team</p>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="card">
								<div class="card-header">Income</div>
								<div class="card-body p-0">
									<div class="row gutters">
										<div class="col-lg-4 col-sm-6 col">
											<div class="income-stats">
												<h4 class="total">1465k</h4>
												<p class="income-title"><span class="income-label"></span>Overall
													Income
												</p>
											</div>
										</div>
										<div class="col-sm-6 col">
											<div class="income-stats">
												<h4 class="total">1049k</h4>
												<p class="income-title"><span class="income-label secondary">
													</span>Overall Expenses</p>
											</div>
										</div>
									</div>
									<div class="chartist custom-two">
										<div class="income-area-chart"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row gutters">
						<div class="col-lg-4 col-sm-12">
							<div class="card">
								<div class="card-header">Chat</div>
								<div class="customScroll">
									<div class="card-body">
										<ul class="chats">
											<li class="chats-left">
												<div class="chats-avatar">
													<img src="../../../frontend\assets\img/avatar1.svg"
														alt="Google Dashboards">
													<div class="chats-name">Wincy</div>
												</div>
												<div class="chats-text info">Hello, I'm Wincy.</div>
												<div class="chats-hour">08:55 <span class="icon-done_all"></span>
												</div>
											</li>
											<li class="chats-right">
												<div class="chats-avatar">
													<img src="../../../frontend\assets\img/avatar1.svg"
														alt="Google Dashboards">
													<div class="chats-name">You</div>
												</div>
												<div class="chats-text danger">How can I help you today?</div>
												<div class="chats-hour">08:56 <span class="icon-done_all"></span>
												</div>
											</li>
											<li class="chats-left">
												<div class="chats-avatar">
													<img src="../../../frontend\assets\img/avatar2.svg"
														alt="Google Dashboards">
													<div class="chats-name">James</div>
												</div>
												<div class="chats-text info">I need more information about Developer
													Plan.</div>
												<div class="chats-hour">08:57 <span class="icon-done_all"></span>
												</div>
											</li>
											<li class="chats-right">
												<div class="chats-avatar">
													<img src="../../../frontend\assets\img/avatar2.svg"
														alt="Google Dashboards">

													<div class="chats-name">You</div>
												</div>
												<div class="chats-text danger">Are we meeting today?</div>
												<div class="chats-hour">08:59 <span class="icon-done_all"></span>
												</div>
											</li>
											<li class="chats-left">
												<div class="chats-avatar">
													<img src="../../../frontend\assets\img/avatar1.svg"
														alt="Google Dashboards">
													<div class="chats-name">Wincy</div>
												</div>
												<div class="chats-text info">Maybe in an hour or so?</div>
												<div class="chats-hour">09:00 <span class="icon-done_all"></span>
												</div>
											</li>
											<li class="chats-right">
												<div class="chats-avatar">
													<img src="../../../frontend\assets\img/avatar1.svg"
														alt="Google Dashboards">
													<div class="chats-name">You</div>
												</div>
												<div class="chats-text danger">I need more information about
													Developer
													Plan.</div>
												<div class="chats-hour">09:00 <span class="icon-done_all"></span>
												</div>
											</li>
											<li class="chats-left">
												<div class="chats-avatar">
													<img src="../../../frontend\assets\img/avatar1.svg"
														alt="Google Dashboards">
													<div class="chats-name">Wincy</div>
												</div>
												<div class="chats-text info">Well I am not sure.</div>
												<div class="chats-hour">09:01 <span class="icon-done_all"></span>
												</div>
											</li>
											<li class="chats-right">
												<div class="chats-avatar">
													<img src="../../../frontend\assets\img/avatar2.svg"
														alt="Google Dashboards">
													<div class="chats-name">You</div>
												</div>
												<div class="chats-text danger">The rest of the team is not here yet.
												</div>
												<div class="chats-hour">09:01 <span class="icon-done_all"></span>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="card">
								<div class="card-header">Activity</div>
								<div class="customScroll">
									<div class="card-body pt-0 pb-0">
										<ul class="project-activity">
											<li class="activity-list">
												<div class="detail-info">
													<span class="lbl success">N</span>
													<p class="desc-info"><span class="text-success">Novane
															Durso</span>
														server not found,
														connection problem.</p>
													<a href="#" class="activity-status"><i
															class="icon-done_all"></i>Read</a>
												</div>
											</li>
											<li class="activity-list">
												<div class="detail-info">
													<span class="lbl success">L</span>
													<p class="desc-info"><span class="text-success">Luke
															Etheridge</span> send email
														notifications of subscriptions</p>
													<a href="#" class="activity-status">Mark as read</a>
												</div>
											</li>
											<li class="activity-list">
												<div class="detail-info">
													<span class="lbl danger">C</span>
													<p class="desc-info"><span class="text-danger">Cosmin
															Capitanu</span> required change logs
														activity reports</p>
													<a href="#" class="activity-status"><i
															class="icon-done_all"></i>Read</a>
												</div>
											</li>
											<li class="activity-list">
												<div class="detail-info">
													<span class="lbl success">M</span>
													<p class="desc-info"><span class="text-success">Moneyas
															Olina</span>
														strategic partnership
														plan</p>
													<a href="#" class="activity-status">Mark as read</a>
												</div>
											</li>
											<li class="activity-list">
												<div class="detail-info">
													<span class="lbl danger">A</span>
													<p class="desc-info"><span class="text-danger">Auurso
															Novane</span>
														server not found,
														connection problem.</p>
													<a href="#" class="activity-status"><i
															class="icon-done_all"></i>Read</a>
												</div>
											</li>
											<li class="activity-list">
												<div class="detail-info">
													<span class="lbl success">J</span>
													<p class="desc-info"><span class="text-success">Jovin
															Xamire</span>
														send email notifications
														of subscriptions</p>
													<a href="#" class="activity-status">Mark as read</a>
												</div>
											</li>
											<li class="activity-list">
												<div class="detail-info">
													<span class="lbl danger">C</span>
													<p class="desc-info"><span class="text-danger">Cosmin
															Capitanu</span> required change logs
														activity reports</p>
													<a href="#" class="activity-status"><i
															class="icon-done_all"></i>Read</a>
												</div>
											</li>
											<li class="activity-list">
												<div class="detail-info">
													<span class="lbl success">M</span>
													<p class="desc-info"><span class="text-success">Moneyas
															Olina</span>
														strategic partnership
														plan</p>
													<a href="#" class="activity-status">Mark as read</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="card">
								<div class="card-header">Orders</div>
								<div class="customScroll">
									<div class="card-body">
										<ul class="order-list">
											<li>
												<p class="order-num placed">#45763 <span class="order-date">45
														mins</span></p>
												<p class="order-desc">Jessse <span>placed</span> new order</p>
											</li>
											<li>
												<p class="order-num cancelled">#48239 <span class="order-date">38
														mins</span></p>
												<p class="order-desc">Alex <span>cancelled</span> an order</p>
											</li>
											<li>
												<p class="order-num">#41470 <span class="order-date">24 mins</span>
												</p>
												<p class="order-desc">Sunny <span>processed</span> an order</p>
											</li>
											<li>
												<p class="order-num placed">#46360 <span class="order-date">10
														mins</span></p>
												<p class="order-desc">Thompson <span>placed</span> an order</p>
											</li>
											<li>
												<p class="order-num placed">#55242 <span class="order-date">45
														mins</span></p>
												<p class="order-desc">Jessse <span>placed</span> new order</p>
											</li>
											<li>
												<p class="order-num cancelled">#33561 <span class="order-date">38
														mins</span></p>
												<p class="order-desc">Alex <span>cancelled</span> an order</p>
											</li>
											<li>
												<p class="order-num">#12876 <span class="order-date">24 mins</span>
												</p>
												<p class="order-desc">Sunny <span>processed</span> an order</p>
											</li>
											<li>
												<p class="order-num placed">#22536 <span class="order-date">10
														mins</span></p>
												<p class="order-desc">Thompson <span>placed</span> an order</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- Row end -->
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

	<!-- Data Tables -->
	<script src="../../../frontend\assets\vendor/datatables/dataTables.min.js"></script>
	<script src="../../../frontend\assets\vendor/datatables/dataTables.bootstrap.min.js"></script>

	<!-- Custom Data tables -->
	<script src="../../../frontend\assets\vendor/datatables/custom/custom-datatables.js"></script>
	<script src="../../../frontend\assets\vendor/datatables/custom/fixedHeader.js"></script>
</body>

</html>