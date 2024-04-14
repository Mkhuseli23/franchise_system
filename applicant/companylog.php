<?php
error_reporting(E_ALL); // Enable error reporting

session_start();
if (strlen($_SESSION['ID']) == 0) {
    header('location: logout.php');
    exit(); // Stop script execution after redirect
}

include('includes/config.php'); // Include database configuration

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $company_name = $_POST['company_name'];

    // File upload configuration
    $targetDir = "logos/"; // Directory where uploaded files will be stored
    $fileName = basename($_FILES["logo"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath)) {
            // Insert company information into the database using prepared statement
            $insertQuery = "INSERT INTO companylogo (company_name, logo, id) VALUES (?, ?, ?)";
            $stmt = $con->prepare($insertQuery);
            $stmt->bind_param("ssi", $company_name, $fileName, $_SESSION['ID']); // Use session ID directly
            $stmt->execute();
            $stmt->close();

            echo "The file " . $fileName . " has been uploaded.";

            // Redirect to table.php after successful upload
            header("Location: table.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
}
?>

<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
<div class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="shift-right" onsubmit="return validateForm()">
        <label for="company_name">Company Name:</label><br>
        <input type="text" id="company_name" name="company_name" required><br>
        <label for="logo">Company Logo:</label><br>
        <input type="file" id="logo" name="logo" accept="image/*" required><br> <!-- Add accept attribute for file type validation -->
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<script>
    function validateForm() {
        var companyName = document.getElementById("company_name").value;
        var logo = document.getElementById("logo").value;
        
        if (companyName.trim() == "") {
            alert("Company name must be filled out");
            return false;
        }
        
        // File type validation
        var validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        var fileExtension = logo.split('.').pop().toLowerCase();
        if (validExtensions.indexOf(fileExtension) == -1) {
            alert("Invalid file type. Please upload a valid image file.");
            return false;
        }

        return true;
    }
</script>

<style>
    .form-container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 150px; /* Adjust as needed */
    }

    form {
        width: 70%; /* Adjust the width of the form */
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    input[type="file"] {
        margin-bottom: 20px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .shift-right {
        margin-left: 60px; /* Shifts the form to the right */
    }
</style>
