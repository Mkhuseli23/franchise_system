
<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID']==0)) {
  header('location:logout.php');
  } else{
    $a_id=$_SESSION['ID'];
$date = date('Y-m-d H:i:s');
$bk_id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>PetroSA</title>
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

<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<body>
    <div class="main-content" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0;">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Bank Account Details</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                      <form id="bankAccountForm" action="classes/fbank.php" method="post" enctype="multipart/form-data">
                         <input type="text" name="b_id" class="form-control" id="b_id" value="<?php echo $a_id; ?> " hidden>
        <fieldset>
            
            <div class="row mb-3">
                <label for="account_name" class="col-lg-3 col-form-label">Account Name:</label>
                <div class="col-lg-6">
                    <input type="text" name="account_name" class="form-control" id="account_name" placeholder="Enter your account name" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="account_name" class="col-lg-3 col-form-label">Bank Institution:</label>
                <div class="col-lg-6">
                    <input type="text" name="bank_institution" class="form-control" id="account_name" placeholder="Enter your account name" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="account_name" class="col-lg-3 col-form-label">Account Number:</label>
                <div class="col-lg-6">
                    <input type="text" name="account_number" class="form-control" id="account_name" placeholder="Enter your account name" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="account_name" class="col-lg-3 col-form-label">Branch Name:</label>
                <div class="col-lg-6">
                    <input type="text" name="branch_name" class="form-control" id="account_name" placeholder="Enter your account name" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="account_name" class="col-lg-3 col-form-label">Branch Number:</label>
                <div class="col-lg-6">
                    <input type="text" name="branch_number" class="form-control" id="account_name" placeholder="Enter your account name" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="account_name" class="col-lg-3 col-form-label">Bank Statement :</label>
                <div class="col-lg-6">
                    <input type="file" name="upload_statement" class="form-control" id="account_name" placeholder="Enter your account name" required>
                </div>
            </div>


            <!-- Add the rest of the form fields here, using the same pattern -->
        </fieldset>
        <div class="card-body text-end">
            <button type="submit" name="submit" id="nextButton" class="btn btn-primary">Next</button>
        </div>
    </form>
    <!-- <a href="/bank/edit/1">Edit Account 1</a> -->
                        </div>
                        <div class="d-none code-view">
                            <pre class="language-markup" style="height: 375px;"></pre>
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
        // Function to check if any required fields are empty
        function checkFormValidity() {
            var form = document.getElementById('bankAccountForm');
            var nextButton = document.getElementById('nextButton');
            var inputs = form.querySelectorAll('input[required]');

            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];

                if (!input.value.trim()) {
                    input.classList.add('error');
                } else {
                    input.classList.remove('error');
                }
            }

            // Check if there are any empty required fields
            var emptyFields = form.querySelectorAll('input.error');

            // Disable or enable the next button based on emptyFields
            if (emptyFields.length === 0) {
                nextButton.disabled = false;
            } else {
                nextButton.disabled = true;
            }
        }

        // Add event listeners to check form validity on input change
        var formInputs = document.querySelectorAll('#bankAccountForm input[required]');
        for (var i = 0; i < formInputs.length; i++) {
            formInputs[i].addEventListener('input', checkFormValidity);
        }
    </script>
</body>

</html>
<?php } ?>