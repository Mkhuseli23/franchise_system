<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    // Retrieve form data
    $s_id = isset($_SESSION['ID']) ? $_SESSION['ID'] : '';
    $fname = $_POST['fname'];
    $surname = $_POST['surname'];
    $identity = $_POST['identity'];
    $email = $_POST['email'];

    if (
        isset($_FILES["id_doc"]) && $_FILES["id_doc"]["error"] == UPLOAD_ERR_OK &&
        isset($_FILES["financial_doc"]) && $_FILES["financial_doc"]["error"] == UPLOAD_ERR_OK &&
        isset($_FILES["bank_statement"]) && $_FILES["bank_statement"]["error"] == UPLOAD_ERR_OK
    ) {
        // Process files
        $id_doc = handleUpload($_FILES["id_doc"]);
        $financial_doc = handleUpload($_FILES["financial_doc"]);
        $bank_statement = handleUpload($_FILES["bank_statement"]);

        if ($id_doc && $financial_doc && $bank_statement) {
            $query = mysqli_prepare($con, "INSERT INTO consent (`fname`, `surname`, `identity`, `id_doc`, `financial_doc`, `bank_statment`, `site_information_id`,`email`) VALUES (?,?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($query, "ssssssss", $fname, $surname, $identity, $id_doc, $financial_doc, $bank_statement, $email, $s_id);
            mysqli_stmt_execute($query);

            if (mysqli_affected_rows($con) > 0) {
                // Construct email message
                $recipient_email = $email; // Change this to the applicant's email address
                $subject = 'Application Received';
                $message = 'Dear ' . $fname . ' ' . $surname . ',<br><br>

                We are writing to express our gratitude for submitting your application. We are pleased to inform you that your application has been received successfully.<br><br>
                
                Your interest in our organization is highly appreciated, and we assure you that your application will be given due consideration.<br><br>
                
                Should you have any further inquiries or require additional information, please do not hesitate to contact us.<br><br>
                
                Best regards,<br>
                [PetroSA]';
                
                // Send email to applicant
                if (sendEmail($recipient_email, $subject, $message)) {
                    // Send email notification to admin
                    $admin_email = 'coostermkhuseli@gmail.com'; // Change this to the admin's email address
                    $admin_subject = 'New Application Received';
                    $admin_message = 'A new application has been received from ' . $fname . ' ' . $surname . '.';
                    
                    sendEmail($admin_email, $admin_subject, $admin_message);

                    $success_message = json_encode("You have successfully sent the application.");
                    header("Location: ../success.html?message=$success_message");
                    exit();
                } else {
                    echo "<script>alert('Failed to send email notification to applicant.');</script>";
                }
            } else {
                echo "Error inserting record: " . mysqli_error($con);
            }

            // Close statement and connection
            mysqli_stmt_close($query);
            mysqli_close($con);
        } else {
            echo "Error uploading file(s).";
        }
    } else {
        echo "Error uploading file(s).";
    }
}

function handleUpload($file) {
    // Specify target directory
    $targetDir = "../consentd/";

    // Get file name
    $fileName = basename($file["name"]);

    // Specify target file path
    $targetFilePath = $targetDir . $fileName;

    // Check if the target directory exists
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return $fileName;
    } else {
        return null;
    }
}

function sendEmail($recipient_email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Server settings for PHPMailer
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'lorem.ipsum.sample.email@gmail.com'; // Change this to your email address
        $mail->Password   = 'novtycchbrhfyddx'; // Change this to your email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('lorem.ipsum.sample.email@gmail.com', 'Mkhuseli Mditshwa'); // Change this to your name and email address
        $mail->addAddress($recipient_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        // Handle any errors that occur during email sending
        return false;
    }
}
?>
