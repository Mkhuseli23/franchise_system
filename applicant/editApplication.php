<?php
include('includes/config.php');

// Fetch data from the database
$query = mysqli_query($con, "SELECT * FROM business_details");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $entity_type = $_POST['entity_type'];
    $entity_name = $_POST['entity_name'];
    $entity_number = $_POST['entity_number'];
    $trading_name = $_POST['trading_name'];
    $nature_business = $_POST['nature_business'];
    $physical_address = $_POST['physical_address'];
    $tax_number = $_POST['tax_number'];
    $csd_number = $_POST['csd_number'];
    $ck_number = $_POST['ck_number'];
    
    // Update the database
    $update_query = "UPDATE business_details SET 
                    entity_type = ?,
                    entity_name = ?,
                    entity_number = ?,
                    trading_name = ?,
                    nature_business = ?,
                    physical_address = ?,
                    tax_number = ?,
                    csd_number = ?,
                    ck_number = ?
                    WHERE business_details_id = ?";
    
    // Prepare the query
    $stmt = mysqli_prepare($con, $update_query);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssssssssi", 
                           $entity_type, 
                           $entity_name, 
                           $entity_number, 
                           $trading_name, 
                           $nature_business, 
                           $physical_address, 
                           $tax_number, 
                           $csd_number, 
                           $ck_number, 
                           $row['business_details_id']);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Check if the update was successful
    if (mysqli_affected_rows($con) > 0) {
        // Redirect to myapplications.php
        header('Location: myapplications.php?id=1');
        exit; // Ensure that no further code execution happens after the redirection
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>



<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Petrosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    <style>
        /* Add this CSS */
        .page-content {
            padding-top: 0;
            margin-top: -6rem; /* Adjust this value to match the height of the header */
        }

        /* The rest of your CSS */
        body,
        .main-content {
            margin: 0;
            padding: 0;
        }

        /* Additional adjustments if needed */
        .error {
            border-color: red !important;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php');?>
    <?php include('includes/sidebar.php');?>

    <?php
    $query = mysqli_query($con, "SELECT * FROM business_details  
        JOIN tbladmin ON business_details.id = tbladmin.id
        WHERE business_details.id = tbladmin.id");
    $rowcount = mysqli_num_rows($query);

    if ($rowcount == 0) {
        echo "<h3 style='color:red'>No record found</h3>";
    } else {
        $row = mysqli_fetch_array($query);
    }
    ?>
 
    <div class="main-content" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0;">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center"> Update Business Entity Details</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                            <form id="businessForm" action="" enctype="multipart/form-data" method="post">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="websiteUrl" class="form-label">Legal Entity Type</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="entity_type" class="form-control" id="websiteUrl" placeholder="Enter your legal entity type" value="<?php echo htmlentities($row['entity_type']); ?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="dateInput" class="form-label">Legal Entity Name</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="entity_name" class="form-control" id="leaveemails" value="<?php echo htmlentities($row['entity_name']); ?>" placeholder="Enter your legal entity name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="timeInput" class="form-label">Legal Entity Number</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="entity_number" class="form-control" id="leaveemails" value="<?php echo htmlentities($row['entity_number']); ?>" placeholder="Enter your legal entity number">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="leaveemails" class="form-label">Trading Name</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="trading_name" class="form-control" id="leaveemails" value="<?php echo htmlentities($row['trading_name']); ?>" placeholder="Enter your trading name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="contactNumber" class="form-label">Nature Of Business</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="nature_business" class="form-control" id="leaveemails" value="<?php echo htmlentities($row['nature_business']); ?>" placeholder="Enter the nature of your business">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="contactNumber" class="form-label">Physical Address</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="physical_address" class="form-control" id="leaveemails" value="<?php echo htmlentities($row['physical_address']); ?>" placeholder="Enter your physical address">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="contactNumber" class="form-label">Phone No</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="tax_number" class="form-control" id="leaveemails" value="<?php echo htmlentities($row['phone']); ?>" placeholder="Enter your tax number">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="ckNumberInput" class="form-label">Tax Number</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="tax_number" class="form-control" id="ckNumberInput" value="<?php echo htmlentities($row['tax_number']); ?>" placeholder="Please enter Tax Number">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="ckNumberInput" class="form-label">CSD Number</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="csd_number" class="form-control" id="ckNumberInput" value="<?php echo htmlentities($row['csd_number']); ?>" placeholder="Please enter CSD Number">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="ckNumberInput" class="form-label">CK Number</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="ck_number" class="form-control" id="ckNumberInput" value="<?php echo htmlentities($row['ck_number']); ?>" placeholder="Please enter CK Number">
                                    </div>
                                </div>

                                



                                <!-- Add other input fields here -->
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit" name="submit" id="submitButton" value="submit" disabled>Update</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- projects js -->
    <script src="assets/js/pages/dashboard-projects.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script>
        // Check if any required input fields are empty
        function checkFormValidity() {
            var form = document.getElementById('businessForm');
            var submitButton = document.getElementById('submitButton');
            var inputs = form.querySelectorAll('input[required]');

            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];

                if (!input.value.trim()) {
                    input.classList.add('error');
                } else {
                    input.classList.remove('error');
                }
            }

            var invalidInputs = form.querySelectorAll('input.error');

            if (invalidInputs.length === 0) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        // Call the checkFormValidity function on input change
        document.getElementById('businessForm').addEventListener('input', checkFormValidity);
    </script>
</body>

</html>