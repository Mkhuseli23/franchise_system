<?php 
include('includes/config.php'); 

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $certificate_name = $_POST['certificate_name'];
    $year_obtained = $_POST['year_obtained'];
    
    // Prepare update query
    $update_query = "UPDATE certificates SET 
                    certificate_name='$certificate_name', 
                    year_obtained='$year_obtained' 
                    WHERE certificate_id =certificate_id ";
    
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
$query = mysqli_query($con, "SELECT * FROM certificates  
    WHERE certificate_id  = certificate_id ");
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
                    <h4 class="card-title mb-0 flex-grow-1 text-center">Update Certificate</h4>
                    <div class="flex-shrink-0">
                        <!-- Any additional content you want to include -->
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted"></p>
                    <div class="live-preview">
                        <form id="siteInformationForm" method="post">
                            <div class="row mb-3">
                                <label for="certificate_name" class="col-lg-3 col-form-label">Certificate Name:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="certificate_name" class="form-control" id="certificate_name" placeholder="Enter certificate_name" value="<?php echo isset($row['certificate_name']) ? htmlentities($row['certificate_name']) : ''; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="yearSelect" class="form-label">Year Obtained</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <select name="year_obtained" class="form-select" id="yearSelect" value="<?php echo isset($row['certificate_name']) ? htmlentities($row['certificate_name']) : ''; ?>>
                                                    <option value="" selected>Select year</option>
                                                    <?php
                                                    // Assuming you want to populate the dropdown with years from 2000 to 2050
                                                    for ($year = 1980; $year <= 2024; $year++) {
                                                        echo '<option value="' . $year . '">' . $year . '</option>';
                                                    }
                                                    ?>
                                                </select>
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