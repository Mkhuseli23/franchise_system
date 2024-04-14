<?php
    session_start();
    include('includes/config.php');

    // Check if the form is submitted
    if (isset($_POST['AdminEmailId']) && isset($_POST['AdminPassword'])) {
        // Get form data
        $AdminEmailId = $_POST['AdminEmailId'];
        $AdminPassword = $_POST['AdminPassword'];

        // Prepare and execute SQL statement
        $stmt = $conn->prepare("SELECT * FROM tbladmin WHERE BINARY AdminEmailId=?");
        $stmt->bind_param("s", $AdminEmailId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($AdminPassword, $row['AdminPassword'])) {
                // Password is correct, set session variables
                $_SESSION['ID'] = $row['id'];
                $_SESSION['NAME'] = $row['name'];
                $_SESSION['SURNAME'] = $row['surname'];
                $_SESSION['AdminEmailId'] = $row['AdminEmailId'];
                $_SESSION['ROLE'] = $row['role'];

                // Redirect based on role
                if ($row['role'] == 0) {
                    header("Location: applicant/dashboard.php");
                } else {
                    header("Location: admin/dashboard.php");
                }
                exit();
            } else {
                // Incorrect password
                echo "<script>alert('Invalid password');</script>";
            }
        } else {
            // User not found
            echo "<script>alert('User not found');</script>";
        }
    } else {
        echo "Form data is missing.";
    }
?>
