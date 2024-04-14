<?php
session_start();
error_reporting(E_ALL);
$date = date('Y-m-d H:i:s');
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');
$b_id = $_GET['id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the status value from the form
    $status = $_POST['status'];

    // Update the business_details table with the new status value
    $update_query = "UPDATE business_details SET status = '$status' WHERE business_details_id = business_details_id";

    if (mysqli_query($conn, $update_query)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>
