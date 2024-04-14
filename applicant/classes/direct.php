<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

$fname = $_POST['fname'];
$surname = $_POST['surname'];
$identity = $_POST['identity'];
$qualification = $_POST['qualification'];
$other_cirt = $_POST['other_cirt'];
$affirmation = $_POST['affirmation'];
$share_percent = $_POST['share_percent'];


if (isset($_POST['submit'])) {
    if (isset($_FILES["id_doc"]) && isset($_FILES["curv"]) && isset($_FILES["qualification_doc"]) && isset($_FILES["other_cirt_doc"]) && isset($_FILES["affirmation_doc"]) && isset($_FILES["share_percent_id"])) {
        $id_doc = handleUpload($_FILES["id_doc"]);
        $curv = handleUpload($_FILES["curv"]);
        $qualification_doc = handleUpload($_FILES["qualification_doc"]);
        $other_cirt_doc = handleUpload($_FILES["other_cirt_doc"]);
        $affirmation_doc = handleUpload($_FILES["affirmation_doc"]); 
        $share_percent_id = handleUpload($_FILES["share_percent_id"]); 

        if ($id_doc && $curv && $qualification_doc && $other_cirt_doc && $affirmation_doc) {
            $query = mysqli_prepare($con, "INSERT INTO directors (fname, surname, identity, id_doc, curv, qualification, qualification_doc, other_cirt, other_cirt_doc, affirmation, affirmation_doc, share_percent, share_percent_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($query) {
                mysqli_stmt_bind_param($query, "sssssssssssss", $fname, $surname, $identity, $id_doc, $curv, $qualification, $qualification_doc, $other_cirt, $other_cirt_doc, $affirmation, $affirmation_doc, $share_percent, $share_percent_id);

                if (mysqli_stmt_execute($query)) {
                    header('location: ../add_directors.php');
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
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $max_size = 5 * 1024 * 1024; // 5 MB

    if (!in_array($extension, $allowed_extensions)) {
        echo "Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.";
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