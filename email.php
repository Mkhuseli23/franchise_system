<?php
include('includes/config.php');

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $query = mysqli_query($con, "SELECT `id`, `name`, `surname`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `role`, `CreationDate`, `UpdationDate`, `contact_no`, `address` FROM `tbladmin` WHERE `AdminEmailId` = '$AdminUserName' AND `EmailVerificationToken` = '$token' AND `EmailVerified` = 0");

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
?>
