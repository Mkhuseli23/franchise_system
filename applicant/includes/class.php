<?php
session_start();
error_reporting(0);
$date = date('Y-m-d H:i:s'); // Corrected date format
include('includes/config.php');

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Improved password hashing

    // Check if email already exists
    $check_query = "SELECT email FROM tblusers WHERE email = '$email'";
    $check_result = mysqli_query($con, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('This email is already associated with another account!');</script>";
    } else {
        // Insert new user data into the database
        $insert_query = "INSERT INTO tblusers (`name`,`surname`,`email`,`password`) VALUES ('$name','$surname','$email','$password')";
        $insert_result = mysqli_query($con, $insert_query);

        if($insert_result) {
            echo "<script>alert('You have successfully registered.');</script>";
            header('location: login.php');
            exit; // Exit after redirect
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }
}
?>