<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
           
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Projects | Velzon - Admin & Dashboard Template</title>
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
    margin-top: 0rem; /* Adjust this value to match the height of the header */
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
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Update Consent Form</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <p class="text-muted"> </p>
                        <div class="live-preview">
                            <form id="businessForm" action="classes/consentF.php" enctype="multipart/form-data" method="post">

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="nameInput" class="form-label">Name</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="fname" class="form-control" id="nameInput" placeholder="Enter your name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="websiteUrl" class="form-label">Surname</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="surname" class="form-control" id="websiteUrl" placeholder="Enter Business Address">
                                    </div>
                                </div>

                                <div class="row mb-6">
                                    <div class="col-lg-3">
                                        <label for="dateInput" class="form-label">ID Number</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="identity" class="form-control" id="websiteUrl" placeholder="Enter Business Address">
                                    </div>
                                </div>
                                <br>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="dateInput" class="form-label">Attach ID</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" name="id_doc" class="form-control" id="financialDocumentInput" placeholder="Enter Size Of Land in square metres">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="dateInput" class="form-label">Financial Statements</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" name="financial_doc" class="form-control" id="financialDocumentInput" placeholder="Enter Size Of Land in square metres">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="dateInput" class="form-label">6 Months Bank Statement</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" name="bank_statement" class="form-control" id="bankStatementInput" placeholder="Choose file">
                                    </div>
                                </div>

                                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="agreeCheck" required>
                <label class="form-check-label" for="agreeCheck">
                    I agree to terms and conditions
                </label>
            </div>
                                <!-- Other input fields -->

                                <div class="card-body">
                                    <!-- Form content -->
                                    <div class="d-flex justify-content-end">
                                        <div class="mb-3">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
</body>

</html>
