<?php 
session_start();
$a_id=$_SESSION['ID'];
error_reporting(0);
if (strlen($_SESSION['ID']==0)) {
  header('location:../logout.php');
  } else{

   include('includes/header.php');?>
    <?php include('includes/sidebar.php');?>
         
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
        html, body {
            background-image: url('../assets/applicant.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                  
                    <!-- end page title -->

                    <div class="row project-wrapper">
                        <div class="col-xxl-8">
        <?php $query = mysqli_query($conn, "SELECT * FROM business_details   WHERE id = $a_id");
            $rowcount = mysqli_num_rows($query);
echo $rowcount;
            If ($rowcount<1)
            { echo "show your applications"; ?>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                                        <i data-feather="briefcase" class="text-primary"></i>
                                                    </span>
                                                </div>
                                               <a href="application.php" class="flex-grow-1 overflow-hidden ms-3">
    <p class="text-uppercase fw-medium text-muted text-truncate mb-3"><b>Click Here To APPLY For</b></p>
    <p class="text-muted text-truncate mb-0"><b>New Establishment</b></p>
    <div class="d-flex align-items-center mb-3">
        <h4 class="fs-4 flex-grow-1 mb-3"><span class="counter-value" data-target="825">0</span></h4>
    </div>
</a>

                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                                        <i data-feather="briefcase" class="text-primary"></i>
                                                    </span>
                                                </div>
                                               <a href="#" class="flex-grow-1 overflow-hidden ms-3">
    <p class="text-uppercase fw-medium text-muted text-truncate mb-3"><b>Click Here To APPLY For</b></p>
    <p class="text-muted text-truncate mb-0"><b>Existing Establishment</b></p>
    <div class="d-flex align-items-center mb-3">
        <h4 class="fs-4 flex-grow-1 mb-3"><span class="counter-value" data-target="825">0</span></h4>
    </div>
</a>

                                            </div>
                                        </div><!-- end card body -->
                                    </div>
</div><!-- end col -->

<?php }else {  echo "get started, apply for franchise";?>
                                <div class="col-xl-4">
                                <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                                        <i data-feather="briefcase" class="text-primary"></i>
                                                    </span>
                                                </div>
                                               <a href="check.php" class="flex-grow-1 overflow-hidden ms-3">
    <p class="text-uppercase fw-medium text-muted text-truncate mb-3"><b>CHECK</b></p>
    <p class="text-muted text-truncate mb-0"><b>STATUS</b></p>
    <div class="d-flex align-items-center mb-3">
        <h4 class="fs-4 flex-grow-1 mb-3"><span class="counter-value" data-target="825">0</span></h4>
    </div>
</a>

                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div><!-- end col -->
                            <?php } ?>
                            </div><!-- end row -->

                        </div><!-- end col -->

                    </div><!-- end row -->
                          
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
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 21:18:45 GMT -->
</html>

<?php } ?>