<?php
session_start();
error_reporting(E_ALL);
$date = date('Y-m-d H:i:s'); // Corrected date format
include('includes/config.php');

function registerUser($conn, $fname, $surname, $email, $password) {
    // Check if email already exists
    $check_query = "SELECT email FROM tblusers WHERE email = ?";
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);

    if($num_rows > 0) {
        // Email already exists, show error message
        echo "<script>alert('This email is already associated with another account!');</script>";
        return false;
    } else {
        // Insert new user data into the database
        $insert_query = "INSERT INTO tblusers (`fname`,`surname`,`email`,`password`) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, 'ssss', $fname, $surname, $email, $password);
        $insert_result = mysqli_stmt_execute($stmt);

        if($insert_result) {
            // Registration successful
            return true;
        } else {
            // Something went wrong with database insertion
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
            return false;
        }
    }
}

if(isset($_POST['submit'])) {
    // Get form data
    $fname = $_POST['fname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Improved password hashing
    
    // Call the registerUser function
    $registration_result = registerUser($conn, $fname, $surname, $email, $password);

    if($registration_result) {
        // Display success message if registration was successful
        echo "<script>alert('You have successfully registered.');</script>";
    }
}
?>