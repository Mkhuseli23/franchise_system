<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

try {
    if (isset($_POST['submit'])) {

        $d_id = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';

    $industry = isset($_POST['industry']) ? trim($_POST['industry']) : '';
        $qualification_name = isset($_POST['qualification_name']) ? trim($_POST['qualification_name']) : '';
        $nqf_level = isset($_POST['nqf_level']) ? trim($_POST['nqf_level']) : '';
        $attach_qual = '';
        $year_obtained = isset($_POST['year_obtained']) ? trim($_POST['year_obtained']) : '';
        $buttonClicked = $_POST['submit']; // Initialize $buttonClicked
        
        if (isset($_FILES["attach_qual"])) {
            $attach_qual = handleUpload($_FILES["attach_qual"]);

            if ($attach_qual) {
                $query = mysqli_prepare($con, "INSERT INTO qualifications (industry, qualification_name, nqf_level, attach_qual, year_obtained, directorsPerson_id) VALUES (?, ?, ?, ?, ?, ?)");
                if ($query) {
                    mysqli_stmt_bind_param($query, "ssssss", $industry, $qualification_name, $nqf_level, $attach_qual, $year_obtained, $d_id);

                    if (mysqli_stmt_execute($query)) {
                        if ($buttonClicked == 'addDirector') {
                            header('location: ../qualifications.php');
                            exit;
                        } elseif ($buttonClicked == 'nextButton') {
                            header('location: ../cirtificates.php');
                            exit;
                        } else {
                            throw new Exception('Invalid button clicked.');
                        }
                    } else {
                        throw new Exception("Error executing query: " . mysqli_stmt_error($query));
                    }
                    mysqli_stmt_close($query);
                } else {
                    throw new Exception("Error preparing query: " . mysqli_error($con));
                }
            } else {
                throw new Exception("Error uploading files.");
            }
        } else {
            throw new Exception("Required file fields are missing.");
        }
    } else {
        throw new Exception("Invalid form submission.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

function handleUpload($file)
{
    if ($file["error"] != UPLOAD_ERR_OK) {
        return null; // Return null on failure
    }

    $extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png", "gif", "pdf"); // Add PDF to the allowed extensions
    $max_size = 5 * 1024 * 1024; // 5 MB

    if (!in_array($extension, $allowed_extensions)) {
        return null; // Return null on invalid file format
    }

    if ($file["size"] > $max_size) {
        return null; // Return null on file size exceeded
    }

    $new_file_name = md5(uniqid()) . '.' . $extension;
    $upload_path = "../directorsInfo/" . $new_file_name;

    if (move_uploaded_file($file["tmp_name"], $upload_path)) {
        return $new_file_name; // Return the new file name on success
    } else {
        return null; // Return null on move_uploaded_file failure
    }
}
?>
