<?php 
include('includes/config.php'); 

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $location = $_POST['location'];
    $business_address = $_POST['business_address'];
    $attitude_longitude = $_POST['attitude_longitude'];
    $size_land = $_POST['size_land'];
    
    // Prepare update query
    $update_query = "UPDATE site_information SET 
                    location='$location', 
                    business_address='$business_address', 
                    attitude_longitude='$attitude_longitude', 
                    size_land='$size_land' 
                    WHERE site_information_id=site_information_id ";
    
    // Perform update query
    if(mysqli_query($con, $update_query)) {
        header("Location: myapplications.php?id=1");
        exit; // Ensure that script execution stops after redirection
    } else {
        echo "<script>alert('Error updating site and land information');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>PetroSA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom Css-->
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

<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<?php
$query = mysqli_query($con, "SELECT * FROM site_information  
    WHERE site_information_id  = site_information_id ");
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
                    <h4 class="card-title mb-0 flex-grow-1 text-center">Update Site And Land Information</h4>
                    <div class="flex-shrink-0">
                        <!-- Any additional content you want to include -->
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted"></p>
                    <div class="live-preview">
                        <form id="siteInformationForm" method="post">
                            <div class="row mb-3">
                                <label for="location" class="col-lg-3 col-form-label">Location:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="location" class="form-control" id="location" placeholder="Enter location" value="<?php echo isset($row['location']) ? htmlentities($row['location']) : ''; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="business_address" class="col-lg-3 col-form-label">Business Address:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="business_address" class="form-control" id="business_address" placeholder="Enter business address" value="<?php echo isset($row['business_address']) ? htmlentities($row['business_address']) : ''; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="attitude_longitude" class="col-lg-3 col-form-label">Latitude:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="attitude_longitude" class="form-control" id="attitude_longitude" placeholder="Enter latitude" value="<?php echo isset($row['attitude_longitude']) ? htmlentities($row['attitude_longitude']) : ''; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="size_land" class="col-lg-3 col-form-label">Size Of Land:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="size_land" class="form-control" id="size_land" placeholder="Enter size of land" value="<?php echo isset($row['size_land']) ? htmlentities($row['size_land']) : ''; ?>">
                                </div>
                            </div>

                            <div class="card-body text-end">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>