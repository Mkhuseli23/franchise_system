<?php
session_start();
$a_id=$_SESSION['ID'];
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

if (isset($_POST['submit'])) {
    $entity_type = $_POST['entity_type'];
    $entity_name = $_POST['entity_name'];
    $entity_number = $_POST['entity_number'];
    $nature_business = $_POST['nature_business'];
    $trading_name = $_POST['trading_name'];
    $physical_address = $_POST['physical_address'];
    $tax_number = $_POST['tax_number'];
    $csd_number = $_POST['csd_number'];
    $ck_number = $_POST['ck_number'];

    

    if (
        isset($_FILES["tax_doc"], $_FILES["csd_doc"], $_FILES["ck_doc"]) &&
        $_FILES["tax_doc"]["error"] == UPLOAD_ERR_OK &&
        $_FILES["csd_doc"]["error"] == UPLOAD_ERR_OK &&
        $_FILES["ck_doc"]["error"] == UPLOAD_ERR_OK
    ) {
        $tax_doc = handleUpload($_FILES["tax_doc"]);
        $csd_doc = handleUpload($_FILES["csd_doc"]);
        $ck_doc = handleUpload($_FILES["ck_doc"]);

        // Disable foreign key checks
        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");

        $query = mysqli_prepare($con, "INSERT INTO business_details (`entity_type`,`entity_name`,`entity_number`,`nature_business`,`trading_name`,`physical_address`,`tax_number`,`csd_number`, `ck_number`,`tax_doc`, `csd_doc`, `ck_doc`,`id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $ck_number = $_POST['ck_number'];
        mysqli_stmt_bind_param($query, "sssssssssssss", $entity_type, $entity_name, $entity_number, $nature_business, $trading_name, $physical_address, $tax_number, $csd_number, $ck_number, $tax_doc, $csd_doc, $ck_doc,$a_id);

        $result = mysqli_stmt_execute($query);

        // Enable foreign key checks
        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1");

        if ($result) {
            header('location: ../bank.php');
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_stmt_close($query);
    } else {
        echo "Error uploading files.";
    }
}

function handleUpload($file)
{
    $allowed_extensions = array("jpg", "jpeg", "png", "gif", "pdf");
    $max_size = 5 * 1024 * 1024; // 5MB

    $file_extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        echo "Invalid file format. Only JPG, JPEG, PNG, GIF, and PDF are allowed.";
        return null;
    }

    if ($file["size"] > $max_size) {
        echo "File size exceeds the maximum allowed size (5MB).";
        return null;
    }

    $new_file_name = md5(uniqid()) . '.' . $file_extension;
    $upload_path = "../upload/" . $new_file_name;

    if (move_uploaded_file($file["tmp_name"], $upload_path)) {
        return $new_file_name;
    } else {
        echo "Error uploading file.";
        return null;
    }
}

?>
