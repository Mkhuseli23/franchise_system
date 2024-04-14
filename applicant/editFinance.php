<?php
ob_start(); // Start output buffering

include('includes/header.php');
include('includes/sidebar.php');

include('includes/config.php'); 

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $financial_institution = $_POST['financial_institution'];
    $financial_funding = $_POST['financial_funding'];
    $financial_institution = $_POST['financial_institution'];
    $income_source_amount = $_POST['income_source_amount'];
    
    // Prepare update query
    $update_query = "UPDATE capital_requirements SET financial_institution='$financial_institution', financial_funding='$financial_funding', financial_institution='$financial_institution' WHERE capital_requirents_id =capital_requirents_id  ";
    
    // Perform update query
    if(mysqli_query($con, $update_query)) {
        header("Location: myapplications.php?id=1");
        exit; // Ensure that script execution stops after redirection
    } else {
        echo "<script>alert('Error updating bank account details');</script>";
    }
}
?>
<!doctype html>
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
            margin-top: 0rem; /* Adjust this value to match the height of the header */
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
    <?php
    $query = mysqli_query($conn, "SELECT * FROM capital_requirements WHERE capital_requirents_id = capital_requirents_id");
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
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Update Capital Requirements</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <p class="text-muted"> </p>
                        <div class="live-preview">
                        <form id="finance" method="post">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="nameInput" class="form-label">Requirement Amount</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="financial_institution" class="form-control" id="nameInput" placeholder="Requirement Amount" readonly value="11500000">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="websiteUrl" class="form-label">20% unencumbered cash</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="financial_funding" class="form-control" id="nameInput" placeholder="Requirement Amount" readonly value="2300000">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="websiteUrl" class="form-label">80% funding Amount</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="financial_institution" class="form-control" id="websiteUrl" placeholder="Enter financial institution" value="<?php echo isset($row['financial_institution']) ? htmlentities($row['financial_institution']) : ''; ?>">
                                    </div>
                                    <div class="col-lg-3">
    <select name="financial_funding" class="form-control" id="financialRequirement">
        <option value="">Select Financial Funding</option>
        <option value="Bank Loan" <?php echo (isset($row['financial_funding']) && $row['financial_funding'] == 'Bank Loan') ? 'selected' : ''; ?>>Bank Loan</option>
        <option value="NEF" <?php echo (isset($row['financial_funding']) && $row['financial_funding'] == 'NEF') ? 'selected' : ''; ?>>NEF</option>
        <option value="SEFA" <?php echo (isset($row['financial_funding']) && $row['financial_funding'] == 'SEFA') ? 'selected' : ''; ?>>SEFA</option>
        <!-- Add more options as needed -->
    </select>
</div>

                                </div>

                                <div class="row mb-3 income-source-row">
                                    <div class="col-lg-3">
                                        <label class="form-label">Income Source</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="income_source_amount" class="form-control income-source-amount" placeholder="Enter amount" value="<?php echo isset($row['income_source_amount']) ? htmlentities($row['income_source_amount']) : ''; ?>">
                                    </div>
                                    <div class="col-lg-3">
    <select name="income_source" class="form-control income-source">
        <option value="">Select Income Source</option>
        <option value="business account" <?php echo (isset($row['income_source']) && $row['income_source'] == 'business account') ? 'selected' : ''; ?>>Business Account</option>
        <option value="pension fund" <?php echo (isset($row['income_source']) && $row['income_source'] == 'pension fund') ? 'selected' : ''; ?>>Pension Fund</option>
        <option value="investment" <?php echo (isset($row['income_source']) && $row['income_source'] == 'investment') ? 'selected' : ''; ?>>Investment</option>
        <option value="sales" <?php echo (isset($row['income_source']) && $row['income_source'] == 'sales') ? 'selected' : ''; ?>>Sales</option>
    </select>
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
                                            <button type="submit" id="nextButton" name="submit" class="btn btn-primary">Update</button>
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
        $(document).ready(function(){
            $('.btn-add-income-source').click(function(){
                var row = $('.income-source-row').first();
                var clone = row.clone();
                clone.find('input[type="text"], select').val('');
                row.before(clone);
                // Add the "Attach Proof" field below the cloned "Income Source" field
                var proofRow = '<div class="row mb-3">' +
                                    '<div class="col-lg-3">' +
                                        '<label for="nameInput" class="form-label">Attach Proof</label>' +
                                    '</div>' +
                                    '<div class="col-lg-6">' +
                                        '<input type="file" name="income_sourcr_doc[]" class="form-control" id="proofInput" placeholder="Upload proof document">' +
                                    '</div>' +
                                '</div>';
                clone.after(proofRow);
            });
        });
    </script>
    <script>
$(document).ready(function(){
    $('.btn-add-income-source').click(function(){
        // Get the current total of income source amounts
        var totalIncomeSourceAmount = 0;
        $('.income-source-amount').each(function() {
            totalIncomeSourceAmount += parseFloat($(this).val()) || 0;
        });

        // Calculate the remaining unencumbered cash
        var unencumberedCash = parseFloat($('#nameInput').val()) || 0;
        var remainingUnencumberedCash = unencumberedCash - totalIncomeSourceAmount;

        // Check if the remaining unencumbered cash is greater than 0
        if (remainingUnencumberedCash > 0) {
            // Allow adding an income source
            var row = $('.income-source-row').first();
            var clone = row.clone();
            clone.find('input[type="text"], select').val('');
            row.before(clone);
            // Add the "Attach Proof" field below the cloned "Income Source" field
            var proofRow = '<div class="row mb-3">' +
                                '<div class="col-lg-3">' +
                                    '<label for="nameInput" class="form-label">Attach Proof</label>' +
                                '</div>' +
                                '<div class="col-lg-6">' +
                                    '<input type="file" name="income_sourcr_doc[]" class="form-control" id="proofInput" placeholder="Upload proof document">' +
                                '</div>' +
                            '</div>';
            clone.after(proofRow);
        } else {
            // Display an error message or take appropriate action
            alert("Cannot add more income sources. The total exceeds 20% unencumbered cash.");
        }
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
