<?php
include('../includes/config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$error = '';

if (isset($_POST['submit'])) {
    try {
        // Validate if all form fields are set
        if(isset($_POST['name'], $_POST['surname'], $_POST['contact_no'], $_POST['AdminEmailId'], $_POST['AdminUserName'], $_POST['AdminPassword'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $contact_no = $_POST['contact_no'];
            $AdminEmailId = $_POST['AdminEmailId'];
            $AdminUserName = $_POST['AdminUserName'];
            $AdminPassword = $_POST['AdminPassword'];

            // Validate email format
            if (!filter_var($AdminEmailId, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format");
            }

            // Check if user with the same name and surname exists
            $stmt = $conn->prepare("SELECT `name`, `surname` FROM `tbladmin` WHERE `name` = ? AND `surname` = ?");
            $stmt->bind_param("ss", $name, $surname);
            $stmt->execute();
            $result = $stmt->get_result();
            $nameExist = $result->fetch_assoc();

            if (!$nameExist) {
                // Check if the email is already used by another user
                $emailCheckStmt = $conn->prepare("SELECT `id` FROM `tbladmin` WHERE `AdminEmailId` = ?");
                $emailCheckStmt->bind_param("s", $AdminEmailId);
                $emailCheckStmt->execute();
                $emailCheckResult = $emailCheckStmt->get_result()->fetch_assoc();

                if ($emailCheckResult) {
                    echo '
                        <script>
                            alert("Email is already in use by another user.");
                            window.location.href = "http://localhost/land/signup.php";
                        </script>
                    ';
                    exit;
                }

                $verification_code = rand(100000, 999999);
                
                // Hash the password
                $hashedPassword = password_hash($AdminPassword, PASSWORD_DEFAULT);
            
                $insertStmt = $conn->prepare("INSERT INTO `tbladmin` (`id`, `name`, `surname`, `contact_no`, `AdminEmailId`, `AdminUserName`, `AdminPassword`, `verification_code`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
                $insertStmt->bind_param("sssssss", $name, $surname, $contact_no, $AdminEmailId, $AdminUserName, $hashedPassword, $verification_code);
                $insertStmt->execute();
            
                // Server settings for PHPMailer
                $mail->isSMTP(); 
                $mail->Host       = 'smtp.gmail.com'; 
                $mail->SMTPAuth   = true; 
                $mail->Username   = 'lorem.ipsum.sample.email@gmail.com';
                $mail->Password   = 'novtycchbrhfyddx';
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;                                    

                // Recipients
                $mail->setFrom('lorem.ipsum.sample.email@gmail.com', 'Mkhuseli Mditshwa');
                $mail->addAddress($AdminEmailId);   
                $mail->addReplyTo('lorem.ipsum.sample.email@gmail.com', 'Lorem Ipsum'); 

                // Content
                $mail->isHTML(true);  
                $mail->Subject = 'Verification Code';
                $mail->Body = 'Dear ' . $name . ',

                Thank you for signing up with our service. Your verification code is: ' . $verification_code . '. Please use this code to complete the verification process.
                
                If you did not request this code, please ignore this email.
                
                Best regards,
                [PetroSA]';
                                
                // Send email
                $mail->send();

                session_start();

                $userVerificationID = $insertStmt->insert_id;
                $_SESSION['user_verification_id'] = $userVerificationID;

                echo "
                <script>
                    alert('Check your email for verification code.');
                    window.location.href = 'http://localhost/land/verification.php';
                </script>
                ";
            } else {
                throw new Exception("User with the same name and surname already exists");
            }
        } else {
            throw new Exception("One or more form fields are not set");
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

if (isset($_POST['verify'])) {
    try {
        $userVerificationID = $_POST['user_verification_id'];
        $verificationCode = $_POST['verification_code'];

        $stmt = $conn->prepare("SELECT `verification_code` FROM `tbladmin` WHERE `id` = ?");
        $stmt->execute([$userVerificationID]);
        $codeExist = $stmt->get_result()->fetch_assoc();

        if ($codeExist && $codeExist['verification_code'] == $verificationCode) {
            session_destroy();
            echo "
            <script>
                alert('Registered Successfully.');
                window.location.href = 'http://localhost/../../land/login.php';
            </script>
            ";
            exit; // Add exit to prevent execution of remaining code
        } else {
            // Debugging output
            echo "Expected Verification Code: " . $codeExist['verification_code'] . "<br>";
            echo "Entered Verification Code: " . $verificationCode . "<br>";

            $conn->prepare("DELETE FROM `tbladmin` WHERE `id` = ?")->execute([$userVerificationID]);

            echo "
            <script>
                alert('Incorrect Verification Code. Register Again.');
                window.location.href = 'http://localhost/land/signup.php';
            </script>
            ";
            exit; // Add exit to prevent execution of remaining code
        }

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!-- Display error message -->
<?php if ($error) : ?>
    <div>Error: <?php echo $error; ?></div>
<?php endif; ?>
