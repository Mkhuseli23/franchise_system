<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID'] == 0)) {
    header('location:logout.php');
} else {
    $d_id = $_SESSION['ID'];
    $date = date('Y-m-d H:i:s');
    $c_id = $_GET['id'];
    include('includes/header.php');
    include('includes/sidebar.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <style>
        /* Add this CSS */
        .page-content {
            padding-top: 0;
            margin-top: 0rem;
            /* Adjust this value to match the height of the header */
        }
        /* The rest of your CSS */
        body,
        .main-content {
            margin: 1;
            padding: 0;
        }
        /* Additional adjustments if needed */
        .error {
            border-color: red !important;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Capital Requirements</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <p class="text-muted"> </p>
                        <div class="live-preview">
                            <form id="capitalForm" action="classes/capital.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="nameInput" class="form-label">Requirement Amount</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="required_amount" class="form-control" id="nameInput" placeholder="Requirement Amount" readonly value="11500000">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="websiteUrl" class="form-label">20% unencumbered cash</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="unencumbered_cash" class="form-control" id="unencumberedCashInput" placeholder="Requirement Amount" readonly value="2300000">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="websiteUrl" class="form-label">80% funding Amount</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="financial_institution" class="form-control" id="websiteUrl" placeholder="Enter amount" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="financial_funding" class="form-control" id="financialRequirement">
                                            <option value="">Select Financial Funding</option>
                                            <option value="Bank Loan">Bank Loan</option>
                                            <option value="NEF">NEF</option>
                                            <option value="SEFA">SEFA</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="dateInput" class="form-label">Letter of Intent for Land Use</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" name="letter_intent" class="form-control" id="bankStatementInput" placeholder="Choose file" required>
                                    </div>
                                </div>

                                <div class="row mb-3 income-source-row">
                                    <div class="col-lg-3">
                                        <label class="form-label">Income Source</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="income_source_amount" class="form-control income-source-amount" placeholder="Enter amount">
                                    </div>

                                    
                                    <div class="col-lg-3">
                                        <select name="income_source" class="form-control income-source">
                                            <option value="">Select Income Source</option>
                                            <option value="business account">business account 1</option>
                                            <option value="Pension fund">Pension fund 2</option>
                                            <option value="Investment">Investment 3</option>
                                            <option value="Sales">Sales 4</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="nameInput" class="form-label">Attach Proof</label>
                                    </div>
                                    <div class="col-lg-6">
                                    <input type="file" name="income_sourcr_doc" class="form-control" id="proofInput" placeholder="Upload proof document" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-primary btn-add-income-source">Add Income Source</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-end">
                                        <div class="mb-3">
                                            <button type="submit" id="nextButton" name="submit" class="btn btn-primary">Next</button>
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
    <script>
    $(document).ready(function() {
        $('.btn-add-income-source').click(function() {
            // Clone and append the required fields
            var fundingAmountRow = $('.row.mb-3:eq(2)').clone();
            var letterOfIntentRow = $('.row.mb-3:eq(3)').clone();
            var incomeSourceRow = $('.income-source-row').first().clone();

            // Insert cloned rows before the button row
            $(this).closest('.row.mb-3').before(fundingAmountRow);
            $(this).closest('.row.mb-3').before(letterOfIntentRow);
            $(this).closest('.row.mb-3').before(incomeSourceRow);
        });
    });
</script>

    <script>
        // Function to create and display an error message
        function displayErrorMessage(message) {
            // Create a div element for the error message
            var errorDiv = document.createElement('div');
            errorDiv.className = 'alert alert-danger';
            errorDiv.innerHTML = message;

            // Prepend the error message div to the body of the document
            document.body.prepend(errorDiv);

            // Automatically remove the error message after a certain time (e.g., 5 seconds)
            setTimeout(function() {
                errorDiv.remove();
            }, 5000); // 5000 milliseconds = 5 seconds
        }

        // Check if there is an error message in the URL (e.g., if redirected from capital.php)
        var urlParams = new URLSearchParams(window.location.search);
        var errorMessage = urlParams.get('error');
        if (errorMessage) {
            // Display the error message at the top of the screen
            displayErrorMessage(errorMessage);
        }
    </script>
    <?php
    // Check if there is an error message in the URL parameters
    if (isset($_GET['error'])) {
        $errorMessage = $_GET['error'];
        echo '<script>alert("' . $errorMessage . '");</script>';
    }
    ?>
</body>
</html>
<?php }?>