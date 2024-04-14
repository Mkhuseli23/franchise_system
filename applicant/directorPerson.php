<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID']==0)) {
  header('location:logout.php');
  } else{
    $a_id=$_SESSION['ID'];
$date = date('Y-m-d H:i:s');
$bk_id=$_GET['id'];
include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
           
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
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Director Information</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                            <form id="businessForm" action="classes/directPersonalInfo.php" enctype="multipart/form-data" method="post">
                                 <input type="text" name="b_id" class="form-control" id="b_id" value="<?php echo $b_id; ?> " hidden>
                            <div id="director-fields" class="row mb-3">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="fname" class="form-label">Name</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter your name">
                                    </div>
                                </div>

                                <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Surname</label>
    </div>
    <div class="col-lg-6">
        <input type="text" name="surname" class="form-control" id="ckNumberInput" placeholder="Please enter surname">
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">ID</label>
    </div>
    <div class="col-lg-6">
        <input type="text" name="identity" class="form-control" id="ckNumberInput" placeholder="Please enter id number">
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Attach ID</label>
    </div>
    <div class="col-lg-6">
        <input type="file" name="id_doc" class="form-control" id="ckNumberInput" placeholder="Please enter aid">
    </div>
</div>


<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Gender</label>
    </div>
    <div class="col-lg-6">
    <select name="gender" class="form-select" id="disabilitySelect">
            <option value="">Please select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>


<div class="row mb-3">
    <div class="col-lg-3">
        <label for="disabilitySelect" class="form-label">Disability</label>
    </div>
    <div class="col-lg-6">
        <select name="disability" class="form-select" id="disabilitySelect">
            <option value="">Please select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>
</div>


<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Address</label>
    </div>
    <div class="col-lg-6">
    <!-- Text input for address -->
    <!-- <input type="text" name="address" class="form-control" id="ckNumberInput" placeholder="Please enter address" required> -->

    <!-- Textarea for post description using Summernote -->
    <textarea class="form-control summernote" name="address" required></textarea>
</div>

</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Curriculum Vitae</label>
    </div>
    <div class="col-lg-6">
        <input type="file" name="cvitae" class="form-control" id="ckNumberInput" placeholder="Please enter aid">
    </div>
</div>


<div class="col-lg-3">
                <label for="bankStatementInput" class="form-label">Share Percentage</label>
            </div>
            <div class="col-lg-6">
    <input type="number" name="share_percent" class="form-control" id="bankStatementInput" placeholder="Enter share percentage (0-100)" 
           min="0" max="100" step="0.01" 
           pattern="^(100(?:\.0{1,2})?|[1-9]?\d(?:\.\d{1,2})?)$" 
           oninput="validateInput()">
</div>

        </div>








<div class="card-body">
    <div class="row">
        <div class="row mt-3">
            <div class="col d-flex justify-content-end">
                <!-- <div class="col text-left">
                    <button type="sub,ot" name="submit" class="btn btn-primary" id="addDirector">Add Another Director</button>
                </div> -->
                <div class="col text-end">
                    <button type="submit" name="submit" id="nextButton" class="btn btn-primary">Next</button>
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
<?php } ?>