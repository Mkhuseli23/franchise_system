<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID']) == 0) {
    header('location:logout.php');
} else {
    $a_id = $_SESSION['ID'];
    $date = date('Y-m-d H:i:s');
    $bk_id = $_GET['id'];
    include('includes/config.php');

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        // Update user information in the database
        $sql = "UPDATE tbladmin SET name = '$firstname', surname = '$lastname', AdminUserName = '$username', AdminEmailId = '$email', contact_no = '$contact', address = '$address' WHERE id = '$_SESSION[ID]'";

        if (mysqli_query($conn, $sql)) {
            // Redirect to profile page after successful update
            header("Location: profile.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
?>
