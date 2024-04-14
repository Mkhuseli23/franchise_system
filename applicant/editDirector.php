<?php 
include('includes/config.php'); 

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data and sanitize
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $disability = mysqli_real_escape_string($con, $_POST['disability']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    
    // Prepare update query
    $update_query = "UPDATE directorsperson SET 
                    fname='$fname', 
                    surname='$surname', 
                    gender='$gender', 
                    disability='$disability', 
                    address='$address' 
                    WHERE directorsPerson_id= directorsPerson_id";
    
    // Perform update query
    if(mysqli_query($con, $update_query)) {
        header("Location: myapplications.php?id=1");
        exit; // Ensure that script execution stops after redirection
    } else {
        echo "<script>alert('Error updating director information');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>PetroSA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script src="assets/js/layout.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <style>
        /* Add this CSS */
        .page-content {
            padding-top: 0;
            margin-top: 0rem; /* Adjust this value to match the height of the header */
        }

        /* The rest of your CSS */
        body,
        .main-content {
            margin: -500;
            padding: 0;
        }

        /* Additional adjustments if needed */
        .error {
            border-color: red !important;
        }
    </style>
</head>
<body>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php
    // Fetch director details
    $query = mysqli_query($con, "SELECT * FROM directorsperson WHERE directorsPerson_id = directorsPerson_id");
    $rowcount = mysqli_num_rows($query);
    if ($rowcount == 0) {
        echo "<h3 style='color:red'>No record found</h3>";
    } else {
        $row = mysqli_fetch_array($query);
    }
?>
    <div class="main-content">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Update Director Information</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                        <form id="directorForm" method="post">
                            <div id="director-fields" class="row mb-3">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="fname" class="form-label">First Name</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter first name" value="<?php echo isset($row['fname']) ? htmlentities($row['fname']) : ''; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="surname" class="form-label">Surname</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="surname" class="form-control" id="surname" placeholder="Enter surname" value="<?php echo isset($row['surname']) ? htmlentities($row['surname']) : ''; ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">ID Number</label>
    </div>
    <div class="col-lg-6">
    <input type="text" name="identity" class="form-control" id="ckNumberInput" placeholder="Please enter id number" value="<?php echo isset($row['identity']) ? htmlentities($row['identity']) : ''; ?>">
    </div>
</div>



<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Gender</label>
    </div>
    <div class="col-lg-6">
        <select name="gender" class="form-select" id="disabilitySelect">
            <option value="">Please select</option>
            <option value="Male" <?php echo (isset($row['gender']) && $row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo (isset($row['gender']) && $row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
        </select>
    </div>
</div>



<div class="row mb-3">
    <div class="col-lg-3">
        <label for="disabilitySelect" class="form-label">Disability</label>
    </div>
    <div class="col-lg-6">
        <select name="disability" class="form-select" id="disabilitySelect" value="<?php echo isset($row['disability']) ? htmlentities($row['disability']) : ''; ?>">
            <option value="">Please select</option>
            <option value="yes" <?php echo (isset($row['disability']) && $row['disability'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
            <option value="no" <?php echo (isset($row['disability']) && $row['disability'] == 'no') ? 'selected' : ''; ?>>No</option>
        </select>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-3">
        <label for="address" class="form-label">Address</label>
    </div>
    <div class="col-lg-6">
        <textarea class="form-control" name="address" id="address" placeholder="Enter address" required><?php echo isset($row['address']) ? htmlentities($row['address']) : ''; ?></textarea>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="bankStatementInput" class="form-label">Share Percentage</label>
    </div>
    <div class="col-lg-6">
        <input type="number" name="share_percent" class="form-control" id="bankStatementInput" placeholder="Enter share percentage (0-100)" value="<?php echo isset($row['share_percent']) ? htmlentities($row['share_percent']) : ''; ?>" min="0" max="100" step="0.01" pattern="^(100(?:\.0{1,2})?|[1-9]?\d(?:\.\d{1,2})?)$" oninput="validateInput()">
    </div>
</div>




                            <div class="card-body">
                                <div class="row">
                                    <div class="row mt-3">
                                        <div class="col d-flex justify-content-end">
                                            <div class="col text-end">
                                                <button type="submit" name="submit" id="nextButton" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <div class="d-none code-view">
                            <pre class="language-markup" style="height: 375px;"></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard-projects.init.js"></script>
    <script src="assets/js/app.js"></script>
  
</body>

</html>
