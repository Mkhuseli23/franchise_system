<?php
session_start();
error_reporting(E_ALL);
$date = date('Y-m-d H:i:s');
include('../includes/config.php');

// Function to validate password based on the specified policy
function validatePassword($password) {
    // Password policy regular expression
    $policy_regex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/';

    // Check if the password matches the policy
    return preg_match($policy_regex, $password);
}

function registerUser($conn, $name, $surname, $AdminEmailId, $AdminUserName, $AdminPassword) {
    // Check if AdminEmailId already exists
    $check_query = "SELECT * FROM tbladmin WHERE BINARY AdminEmailId=?";
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, 's', $AdminEmailId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);

    if($num_rows > 0) {
        // AdminEmailId already exists, show error message
        return "This email is already associated with another account!";
    } else {
        // Check if password meets the policy
        if (!validatePassword($AdminPassword)) {
            // Password does not meet the policy, return error message
            return "Password must have at least one uppercase letter, one lowercase letter, one digit, one special character, and a minimum length of 8 characters.";
        }

        // Hash the password
        $hashed_password = password_hash($AdminPassword, PASSWORD_DEFAULT);

        // Generate a verification code
        $verificationCode = generateVerificationCode();

        // Insert new user data into the database
        $insert_query = "INSERT INTO tbladmin (`name`,`surname`,`AdminEmailId`, `AdminUserName`,`AdminPassword`,`EmailVerificationToken`) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $surname, $AdminEmailId, $AdminUserName, $hashed_password, $verificationCode);
        $insert_result = mysqli_stmt_execute($stmt);

        if($insert_result) {
            // Registration successful
            // Send email verification
            sendVerificationEmail($AdminEmailId, $verificationCode);

            return true;
        } else {
            // Something went wrong with database insertion
            return "Something went wrong. Please try again.";
        }
    }
}

function sendVerificationEmail($email, $token) {
    // Include PHPMailer library
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'your_email@gmail.com'; // Your Gmail email address
        $mail->Password   = 'your_password'; // Your Gmail password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;  
        
        // Sender and recipient settings
        $mail->setFrom('your_email@gmail.com', 'Your Name'); // Your Name and your email address
        $mail->addAddress($email); // Recipient email address
        $mail->addReplyTo('your_email@gmail.com', 'Your Name'); // Your Name and your email address
        
        // Email content
        $mail->isHTML(true);  
        $mail->Subject = 'Email Verification';
        $mail->Body    = 'Please enter the following verification code to verify your email: ' . $token;
        
        // Send email
        $mail->send();
    } catch (Exception $e) {
        // Email sending failed
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to generate a random verification code
function generateVerificationCode($length = 5) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

if(isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $AdminEmailId = $_POST['AdminEmailId'];
    $AdminUserName = $_POST['AdminUserName'];
    $AdminPassword = $_POST['AdminPassword'];

    // Call the registerUser function
    $registration_result = registerUser($conn, $name, $surname, $AdminEmailId, $AdminUserName, $AdminPassword);

    if($registration_result === true) {
        // Display success message and redirect
        echo "<script>alert('You have successfully registered. Please check your email for verification.');</script>";
        echo "<script>window.location = 'login.php';</script>";
        exit;
    } else {
        // Display error message
        echo "<script>alert('$registration_result');</script>";
    }
}
?>
