<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

$bk_id = $_SESSION['ID'];
$fname = $_POST['fname'] ?? '';
$surname = $_POST['surname'] ?? '';
$identity = $_POST['identity'] ?? '';
$gender = $_POST['gender'] ?? '';
$disability = $_POST['disability'] ?? '';
$address = $_POST['address'] ?? '';
$share_percent = $_POST['share_percent'] ?? '';

if (isset($_POST['submit'])) {
    if (isset($_FILES["id_doc"]) && isset($_FILES["cvitae"])) { // Check if both files are set
        $id_doc = handleUpload($_FILES["id_doc"]);
        $cvitae = handleUpload($_FILES["cvitae"]);

        if ($id_doc && $cvitae) { // Check if both files were uploaded successfully
            $query = mysqli_prepare($con, "INSERT INTO directorsperson (fname, surname, identity, gender, id_doc, disability, address, cvitae, share_percent, bank_details_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if ($query) {
                mysqli_stmt_bind_param($query, "ssssssssss", $fname, $surname, $identity, $gender, $id_doc, $disability, $address, $cvitae, $share_percent, $bk_id);

                if (mysqli_stmt_execute($query)) {
                    header('location: ../qualifications.php');
                    exit;
                } else {
                    echo "Error: " . mysqli_error($con);
                }

                mysqli_stmt_close($query);
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Error uploading files.";
        }
    } else {
        echo "Error: Required file fields are missing.";
    }
}

function handleUpload($file)
{
    if ($file["error"] != UPLOAD_ERR_OK) {
        echo "Error uploading file.";
        return null;
    }

    $extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png", "gif", "pdf"); // Add PDF to the allowed extensions
    $max_size = 5 * 1024 * 1024; // 5 MB

    if (!in_array($extension, $allowed_extensions)) {
        echo "Invalid file format. Only JPG, JPEG, PNG, GIF, and PDF are allowed.";
        return null;
    }

    if ($file["size"] > $max_size) {
        echo "File size exceeds the maximum allowed size.";
        return null;
    }

    $new_file_name = md5(uniqid()) . '.' . $extension;
    $upload_path = "../directorsInfo/" . $new_file_name;

    if (move_uploaded_file($file["tmp_name"], $upload_path)) {
        return $new_file_name;
    } else {
        echo "Error uploading file.";
        return null;
    }
}

?>
