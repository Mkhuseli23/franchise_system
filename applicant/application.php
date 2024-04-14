
<?php 
session_start();
$a_id=$_SESSION['ID'];
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ID']==0)) {
  header('location:../logout.php');
  } else{

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
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>

<body>
    <div class="main-content" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0;">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Business Entity Details</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                            <form id="businessForm" action="classes/business.php" enctype="multipart/form-data" method="post">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="websiteUrl" class="form-label">Legal Entity Type</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="entity_type" class="form-control" id="websiteUrl" placeholder="Enter your legal entity type" required>
                                    </div>
                                </div>

                                                                  <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="dateInput" class="form-label">Legal Entity Name</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" name="entity_name" class="form-control" id="leaveemails" placeholder="Enter your legal entity name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="timeInput" class="form-label">Legal Entity Number</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" name="entity_number" class="form-control" id="leaveemails" placeholder="Enter your legal entity number">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="leaveemails" class="form-label">Trading Name</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="trading_name" class="form-control" id="leaveemails" placeholder="Enter your trading name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="contactNumber" class="form-label">Nature Of Business</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="nature_business" class="form-control" id="leaveemails" placeholder="Enter your legal entity number">
                                                   
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="contactNumber" class="form-label">Physical Address</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    
                                                    <input type="text" name="physical_address" class="form-control" id="leaveemails" placeholder="Enter your legal entity number">

                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="contactNumber" class="form-label">Phone No</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    
                                                    <input type="text" name="physical_address" class="form-control" id="leaveemails" placeholder="Enter your legal entity number">

                                                </div>
                                            </div>

                                          
                                           

                                             <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Tax Number</label>
    </div>
    <div class="col-lg-3">
        <input type="text" name="tax_number" class="form-control" id="ckNumberInput" placeholder="Please enter Tax Number">
    </div>
    <div class="col-lg-3">
       <input type="file" name="tax_doc" class="form-control" id="taxDocuInput">
    </div>
</div>

 <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">CSD Number</label>
    </div>
    <div class="col-lg-3">
        <input type="text" name="csd_number" class="form-control" id="ckNumberInput" placeholder="Please enter CSD Number">
    </div>
    <div class="col-lg-3">
        <input type="file" name="csd_doc" class="form-control" id="bankStatementInput" placeholder="Choose file">
    </div>
</div>

                                         <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">CK Number</label>
    </div>
    <div class="col-lg-3">
    <input type="text" name="ck_number" class="form-control" id="ckNumberInput" placeholder="Please enter CK Number">
    </div>
    <div class="col-lg-3">
        <input type="file" name="ck_doc" class="form-control" id="bankStatementInput" placeholder="Choose ">
    </div>
</div>
                                <!-- Add other input fields here -->
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit" name="submit" id="submitButton" value="submit" disabled>Next</button>
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
<?php } ?>