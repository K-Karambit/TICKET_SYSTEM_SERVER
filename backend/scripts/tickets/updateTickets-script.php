<?php
session_start();
include_once '../../../backend/config/config.php';
include_once '../../../backend/controllers/tickets/ticketsController.php';

// Retrieve and sanitize form data
$unique_id = ConfigClass::sanitizeInput($_POST['unique_id']);
$requestor_username = ConfigClass::sanitizeInput($_POST['requestor_username']);
$requestor_unique_id = ConfigClass::sanitizeInput($_POST['requestor_unique_id']);
$requestor_department = ConfigClass::sanitizeInput($_POST['requestor_department']);
$service_request = ConfigClass::sanitizeInput($_POST['service_request']);
$ticket_subject = ConfigClass::sanitizeInput($_POST['ticket_subject']);
$ticket_description = ConfigClass::sanitizeInput($_POST['ticket_description']);
$ticket_timeliness = ConfigClass::sanitizeInput($_POST['ticket_timeliness']);
$ticket_effectiveness = ConfigClass::sanitizeInput($_POST['ticket_effectiveness']);
$ticket_overall_rate = ConfigClass::sanitizeInput($_POST['ticket_overall_rate']);
$ticket_feedback = ConfigClass::sanitizeInput($_POST['ticket_feedback']);
$is_assigned_to = ConfigClass::sanitizeInput($_POST['is_assigned_to']);

$sql = "SELECT unique_id FROM tbl_users WHERE username = :is_assigned_to";
$stmt_technician_assigned_id = ConfigClass::prepareAndExecute($sql, [':is_assigned_to' => $is_assigned_to]);
$technician_assigned_id = $stmt_technician_assigned_id->fetchColumn();

if ($_SESSION['user_role'] === 'MANAGER') {
    $is_done = 0;
} elseif ($_SESSION['user_role'] === 'REQUESTOR') {
    $is_done = 1;
}


// Update the database record
$sql = "UPDATE tbl_tickets SET
    requestor_username = :requestor_username,
    requestor_unique_id = :requestor_unique_id,
    requestor_department = :requestor_department,
    service_request = :service_request,
    ticket_subject = :ticket_subject,
    ticket_description = :ticket_description,
    ticket_timeliness = :ticket_timeliness,
    ticket_effectiveness = :ticket_effectiveness,
    ticket_overall_rate = :ticket_overall_rate,
    ticket_feedback = :ticket_feedback,
    is_assigned_to = :is_assigned_to,
    technician_assigned_id = :technician_assigned_id,
    is_done = :is_done
    WHERE unique_id = :unique_id";

$stmt = ConfigClass::prepareAndExecute($sql, [
    ':requestor_username' => $requestor_username,
    ':requestor_unique_id' => $requestor_unique_id,
    ':requestor_department' => $requestor_department,
    ':service_request' => $service_request,
    ':ticket_subject' => $ticket_subject,
    ':ticket_description' => $ticket_description,
    ':ticket_timeliness' => $ticket_timeliness,
    ':ticket_effectiveness' => $ticket_effectiveness,
    ':ticket_overall_rate' => $ticket_overall_rate,
    ':ticket_feedback' => $ticket_feedback,
    ':is_assigned_to' => $is_assigned_to,
    ':technician_assigned_id' => $technician_assigned_id,
    ':is_done' => $is_done,
    ':unique_id' => $unique_id
]);

// Redirect to the desired page
header('Location: ../../../frontend/views/tickets/index.php?alert=ticket_completed');
exit();
