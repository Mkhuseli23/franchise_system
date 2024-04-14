<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID']==0)) {
  header('location:logout.php');
  } else{
    $d_id=$_SESSION['ID'];
$date = date('Y-m-d H:i:s');
$f_id=$_GET['id'];

include('includes/header.php');
     include('includes/sidebar.php');
    ?>
           
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 21:18:45 GMT -->
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
    <h4 class="card-title mb-0 flex-grow-1 text-center">Site And Land Information</h4>
    <div class="flex-shrink-0">
        <!-- Any additional content you want to include -->
    </div>
</div>
<!-- end card header -->
                                <div class="card-body">
                                    <p class="text-muted">  </p>
                                    <div class="live-preview">
                                    <form action="classes/site.php" method="post" enctype="multipart/form-data">
                                           

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="nameInput" class="form-label">Location</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="location" class="form-control" id="nameInput" placeholder="Enter your location">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="websiteUrl" class="form-label">Business Address</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" name="business_address" class="form-control" id="websiteUrl" placeholder="Enter Business Address">
                                                </div>
                                               
                                                </div>
                                                </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="dateInput" class="form-label">Latitude</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" name="attitude_longitude" class="form-control" id="websiteUrl" placeholder="Enter Latitude">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="dateInput" class="form-label">Longitude</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" name="attitude_longitude" class="form-control" id="websiteUrl" placeholder="Enter Longitude">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                   <label for="dateInput" class="form-label">Size Of Land </label>
                                                </div>
                                                <div class="col-lg-6">
                                                <input type="text" name="size_land" class="form-control" id="websiteUrl" placeholder="Enter Size Of Land in square metres" onkeypress="return isNumberKey(event)" pattern="\d*" title="Please enter numbers only">

                                                </div>
                                            </div>

                                                 <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="dateInput" class="form-label">Proof Of Ownership Of The Land</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="file" name="proof_ownership" class="form-control" id="bankStatementInput" placeholder="Choose file">
                                                </div>
                                            </div>

                                             <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="dateInput" class="form-label">Title Deed</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="file" name="title_deed" class="form-control" id="bankStatementInput" placeholder="Choose file">
                                                </div>
                                            </div>

                                             <div class="row mb-3">
                                                <div class="col-lg-3">
                                               <label for="dateInput" class="form-label">Letter Of Occupation</label>
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="file" name="letter_occupation" class="form-control" id="bankStatementInput" placeholder="Choose file">
                                                </div>
                                            </div>




<div class="card-body">
    <!-- Form content -->
    <div class="d-flex justify-content-end">
        <!--<div class="mb-3">-->
        <!--    <button type="submit" class="btn btn-primary">Add Bank Statement</button>-->
        <!--</div>-->
        <div class="mb-3">
           <!-- <a href="acknowl.php" class="btn btn-primary">Next</a> -->
           <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Next</button>
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

                 

                                
                                </div><!-- end card header -->

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
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>

</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-projects.html by HTTrack Website Copier/3.x [XR&CO'2014]
</html>
<?php } ?>