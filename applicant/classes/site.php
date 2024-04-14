<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

if (isset($_POST['submit'])) {
    // Retrieve form data
    $f_id = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';

    $location = $_POST['location'];
    $business_address = $_POST['business_address'];
    $attitude_longitude = $_POST['attitude_longitude'];
    $size_land = $_POST['size_land'];

    if (
        isset($_FILES["proof_ownership"]) && $_FILES["proof_ownership"]["error"] == UPLOAD_ERR_OK &&
        isset($_FILES["title_deed"]) && $_FILES["title_deed"]["error"] == UPLOAD_ERR_OK &&
        isset($_FILES["letter_occupation"]) && $_FILES["letter_occupation"]["error"] == UPLOAD_ERR_OK
    ) {
        // Process files
        $proof_ownership = handleUpload($_FILES["proof_ownership"]);
        $title_deed = handleUpload($_FILES['title_deed']);
        $letter_occupation = handleUpload($_FILES['letter_occupation']);

        $query = mysqli_prepare($con, "INSERT INTO site_information (`location`, `business_address`, `attitude_longitude`, `size_land`, `proof_ownership`, `title_deed`, `letter_occupation`, `certificate_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($query, "ssssssss", $location, $business_address, $attitude_longitude, $size_land, $proof_ownership, $title_deed, $letter_occupation, $f_id);
        mysqli_stmt_execute($query);

        // Handle success or failure
        if (mysqli_affected_rows($con) > 0) {
            header("Location: ../consent.php");
            exit();
        } else {
            echo "Error inserting record: " . mysqli_error($con);
        }

        // Close statement and connection
        mysqli_stmt_close($query);
        mysqli_close($con);
    } else {
        echo "Error uploading file.";
    }
}

function handleUpload($file) {
    // Specify target directory
    $targetDir = "../siteInfo/";

    // Get file name
    $fileName = basename($file["name"]);

    // Specify target file path
    $targetFilePath = $targetDir . $fileName;

   
    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $fileName; 
    } else {
        return null; 
    }
}
?>
