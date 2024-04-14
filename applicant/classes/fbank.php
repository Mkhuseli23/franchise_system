<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

if (isset($_POST['submit'])) {
    // Retrieve form data
    $a_id = $_SESSION['ID']; // Use session variable directly

    $account_name = $_POST['account_name'];
    $bank_institution = $_POST['bank_institution'];
    $account_number = $_POST['account_number'];
    $branch_name = $_POST['branch_name'];
    $branch_number = $_POST['branch_number'];

    // Check if upload_statement file was uploaded successfully
    if (isset($_FILES["upload_statement"])) {
        // Process upload_statement
        $upload_statement = handleUpload($_FILES["upload_statement"]);

        if ($upload_statement !== false) {
            // Prepare and execute database query
            $query = mysqli_prepare($con, "INSERT INTO bank_details (`account_name`,`bank_institution`,`account_number`,`branch_name`,`branch_number`, `upload_statement`, `business_details_id`) VALUES (?,?,?,?,?,?,?)");

            if ($query) {
                // Bind parameters
                mysqli_stmt_bind_param($query, "sssssss", $account_name, $bank_institution, $account_number, $branch_name, $branch_number, $upload_statement, $a_id);

                // Execute query
                $result = mysqli_stmt_execute($query);

                if ($result) {
                    // Redirect to add_directors.php if data is successfully submitted
                    header('location: ../directorPerson.php');
                    exit;
                } else {
                    echo "Error: " . mysqli_error($con);
                }

                // Close statement
                mysqli_stmt_close($query);
            } else {
                echo "Error preparing query: " . mysqli_error($con);
            }
        } else {
            echo "Error uploading files.";
        }
    } else {
        echo "No file uploaded.";
    }
} else {
    echo "Form not submitted.";
}

// Function to handle file uploads
function handleUpload($file)
{
    $allowed_extensions = array("jpg", "jpeg", "png", "gif", "pdf");
    $max_size = 5 * 1024 * 1024; // 5 MB

    $file_extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        echo "Invalid file format. Only JPG, JPEG, PNG, GIF, and PDF are allowed.";
        return false;
    }

    if ($file["size"] > $max_size) {
        echo "File size exceeds the maximum allowed size (5 MB).";
        return false;
    }

    $new_file_name = md5(uniqid()) . '.' . $file_extension;
    $upload_path = "../bankstatements/" . $new_file_name;

    if (move_uploaded_file($file["tmp_name"], $upload_path)) {
        return $new_file_name;
    } else {
        echo "Error uploading file.";
        return false;
    }
}

?>
