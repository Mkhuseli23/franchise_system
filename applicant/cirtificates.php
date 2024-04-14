<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID']==0)) {
  header('location:logout.php');
  } else{
    $d_id=$_SESSION['ID'];
$date = date('Y-m-d H:i:s');
$q_id=$_GET['id'];
include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
           
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Projects | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <style>
    .primary-btn {
        background-color: #007bff;
        /* Primary color */
        color: #fff;
        /* Text color */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .left-btn {
        float: left;
        margin: -6px 10px 0 0;
        /* Adjust as needed */
    }

    .right-btn {
        float: right;
        margin: -6px 0 0 10px;
        /* Adjust as needed */
    }
    .page-content {
    padding-top: 0;
    margin-top: 1rem; /* Adjust this value to match the height of the header */
  }
</style>

    
</head>

<body>
    <div class="main-content">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Certificates</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                            <form id="directorForm" action="classes/certificate.php" enctype="multipart/form-data" method="post">
                                <div class="container">
                                    <div class="row mb-3">
                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="qualificationName" class="form-label">Certificate Name</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" name="certificate_name" class="form-control" id="qualificationName" placeholder="Enter your qualification name">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-3">
                                                <label for="yearSelect" class="form-label">Year Obtained</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <select name="year_obtained" class="form-select" id="yearSelect">
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

                                        <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Attach Certificate</label>
    </div>
    <div class="col-lg-6">
        <input type="file" name="attach_cert" class="form-control" id="bankStatementInput" placeholder="Choose file">
    </div>
</div>
</div>

<div class="card-body">
    <div class="row">
        <div class="row mt-3">
            <div class="col d-flex justify-content-end">
                <div class="col text-left">
                <button type="submit" name="submit" value="addCertificate" class="primary-btn left-btn" id="addCertificateButton">Attach Another Qualification</button>                </div>
                <div class="col text-end">
                    <button type="button" name="submit" value="nextButton" id="nextButton" class="primary-btn right-btn">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

</form> <!-- End of form -->


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

    <!-- Modal markup -->
    <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to proceed with the application or add another director?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href='directorPerson.php';">Add Another Director</button>
                    <button type="button" class="btn btn-primary" id="proceedButton" onclick="window.location.href='finance.php';">Proceed with Application</button>
                </div>
            </div>
        </div>
    </div>

    <script>
   $(document).ready(function() {
    // Function to submit the form via AJAX
    function submitForm(buttonValue) {
        $.ajax({
            type: 'POST',
            url: 'classes/certificate.php',
            data: new FormData($('#directorForm')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                // If buttonValue is 'nextButton', show the confirmation modal
                if (buttonValue === 'nextButton') {
                    $('#confirmationModal').modal('show');
                } else {
                    // Clear the form fields if 'addCertificate' button is clicked
                    $('#directorForm')[0].reset();
                    // Show the success message
                    alert('Form submitted');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Click event for "Next" button
    $('#nextButton').click(function() {
        // Set a hidden input value to determine the button clicked
        $('#directorForm input[name="submit"]').val('nextButton');
        // Submit the form and provide the button value
        submitForm('nextButton');
    });

    // Click event for "Attach Another Qualification" button
    $('#addCertificateButton').click(function() {
        // Set a hidden input value to determine the button clicked
        $('#directorForm input[name="submit"]').val('addCertificate');
        // Submit the form and provide the button value
        submitForm('addCertificate');
    });
});


    </script>
</body>

</html>
<?php }?>