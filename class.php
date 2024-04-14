<?php
session_start();
error_reporting(E_ALL);
$date = date('Y-m-d H:i:s');
include('includes/config.php');

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

        // Insert new user data into the database
        $insert_query = "INSERT INTO tbladmin (`name`,`surname`,`AdminEmailId`, `AdminUserName`,`AdminPassword`) VALUES (?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, 'sssss', $name, $surname, $AdminEmailId, $AdminUserName, $hashed_password);
        $insert_result = mysqli_stmt_execute($stmt);

        if($insert_result) {
            // Registration successful
            // Send email to the user
            $to = $AdminEmailId;
            $subject = "Registration Successful";
            $message = "Dear $name $surname, \n\nYou have successfully registered with us.";
            $headers = "From: coostermkhuseli@gmail.com";

            mail($to, $subject, $message, $headers);

            return true;
        } else {
            // Something went wrong with database insertion
            return "Something went wrong. Please try again.";
        }
    }
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
    if (isset($_GET['email']) && isset($_GET['token'])) {
        $email = $_GET['email'];
        $token = $_GET['token'];
    
        $query = mysqli_query($con, "SELECT `id`, `name`, `surname`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `role`, `CreationDate`, `UpdationDate`, `contact_no`, `address` FROM `tbladmin` WHERE `AdminEmailId` = '$email' AND `EmailVerificationToken` = '$token' AND `EmailVerified` = 0");
    
        if (mysqli_num_rows($query) > 0) {
            // Update EmailVerified to 1 and clear the verification token
            mysqli_query($con, "UPDATE `tbladmin` SET `EmailVerified` = 1, `EmailVerificationToken` = '' WHERE `AdminEmailId` = '$email'");
            echo "Email verified successfully!";
        } else {
            echo "Invalid verification link. Please try again.";
        }
    } else {
        echo "Invalid request.";
    }
    if($registration_result === true) {
        // Display success message and redirect
        echo "<script>alert('You have successfully registered.');</script>";
        echo "<script>window.location = 'login.php';</script>";
        exit;
    } else {
        // Display error message
        echo "<script>alert('$registration_result');</script>";
    }
}
?>
