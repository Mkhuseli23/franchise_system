<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

// Check if the database connection is established
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch business details ID from GET parameter
$business_details_id = isset($_GET['edit']) ? (int)$_GET['edit'] : 0;

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $entity_type = isset($_POST['entity_type']) ? $_POST['entity_type'] : '';

    // Update the database
    $query = "UPDATE business_details SET entity_type = '$entity_type' WHERE business_details_id = $business_details_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error_message = "Error: " . mysqli_error($conn);
    }
}

// Fetch business details from the database
$query = "SELECT * FROM business_details WHERE business_details_id = $business_details_id";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    $error_message = "Error: " . mysqli_error($conn);
    // Initialize $row with empty values to prevent undefined index warning
    $row = array('entity_type' => '');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head section content -->
</head>

<body>
    <?php include('includes/header.php');?>
    <?php include('includes/sidebar.php');?>

    <div class="main-content">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Business Entity Details</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                            <?php if(isset($error_message)): ?>
                                <div class="error-message"><?php echo $error_message; ?></div>
                            <?php endif; ?>
                            <form id="businessForm" action="#" enctype="multipart/form-data" method="post">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="entity_type" class="form-label">Legal Entity Type</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="entity_type" class="form-control" id="entity_type" value="<?php echo isset($row['entity_type']) ? $row['entity_type'] : ''; ?>" placeholder="Enter your legal entity type" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit" name="submit" id="submitButton">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript imports and scripts -->
</body>

</html>
