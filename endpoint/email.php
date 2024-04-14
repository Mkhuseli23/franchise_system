<?php
include('../includes/config.php');

// Include PHPMailer library
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Function to send email
function sendEmail($recipient_email, $subject, $message) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $status = $_POST['status'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Update the status in the business_details table
    $update_query = "UPDATE business_details SET status = '$status' WHERE business_details_id = business_details_id";

    // Execute the update query and display success or error message
    if (mysqli_query($conn, $update_query)) {
        if (sendEmail($email, $subject, $message)) {
            echo '
                <script>
                    alert("Status updated successfully and email sent.");
                    window.location.href = "../admin/viewapplication.php";
                </script>
            ';
        } else {
            echo '
                <script>
                    alert("Status updated successfully but failed to send email.");
                    window.location.href = "../admin/viewapplication.php";
                </script>
            ';
        }
    } else {
        echo '
            <script>
                alert("Error updating status: ' . mysqli_error($conn) . '");
                window.location.href = "#";
            </script>
        ';
    }
    
}
?>
