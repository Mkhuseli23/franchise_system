<?php
include('includes/header.php');
include('includes/sidebar.php');

// Function to count records based on status
function countRecords($conn, $status) {
    $query = mysqli_query($conn, "SELECT * FROM business_details WHERE status = '$status'");
    return mysqli_num_rows($query);
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
            background-image: url('../assets/Admin-Background-image.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row project-wrapper">
                    <?php
                    // Define application statuses
                    $statuses = ['pending', 'approve', 'rejected'];

                    // Loop through each status and display count
                    foreach ($statuses as $status) {
                        $count = countRecords($conn, $status);
                        ?>
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
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-3"><b><?php echo ucfirst($status); ?> Applications</b></p>
                                            <p class="text-muted text-truncate mb-0"><b></b></p>
                                            <div class="d-flex align-items-center mb-3">
                                                <h4 class="fs-4 flex-grow-1 mb-3"><span class="counter-value" data-target="825"><?php echo $count; ?></span></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div><!-- end col -->
                    <?php } ?>

                </div><!-- end row -->
<div class="row">
<?php
function countRecord($conn, $role) {
    $query = mysqli_query($conn, "SELECT * FROM tbladmin WHERE role = 0");
    return mysqli_num_rows($query);
}

// Assuming you have already established a database connection $conn
$count = countRecord($conn, 0); // Assuming you want to count records with role 0
?>

                        <div class="col-xl-4">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">STATISTICS</h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                           
                                        </div>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div id="user_device_pie_charts" data-colors='["--vz-primary", "--vz-warning", "--vz-info"]' class="apex-charts" dir="ltr"></div>

                                    <div class="table-responsive mt-3">
                                        <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                                            <tbody class="border-0">
                                                <tr>
                                                    <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Users</h4>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i><?php echo $count; ?></p>
                                                    </td>
                                                    <td class="text-end">
                                                        <!-- <p class="text-success fw-medium fs-12 mb-0"><i class="ri-arrow-up-s-fill fs-5 align-middle"></i>2.08% </p> -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <?php
if (!function_exists('countBusinessRecords')) {
    function countBusinessRecords($conn, $role) {
        $query = mysqli_query($conn, "SELECT * FROM business_details WHERE role = $role");
        return mysqli_num_rows($query);
    }
}

// Assuming you have already established a database connection $conn
$count = countBusinessRecords($conn, 0); // Assuming you want to count records with role 0
?>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Number Of Applications</h4>
                                                    </td>
                                                    <td>
                                                    <p class="text-muted mb-0"><i class="ri-inbox-archive-line me-2 icon-lg" style="font-size: 20px;"></i><?php echo $count; ?></p>
                                                    <td class="text-end">
                                                        <!-- <p class="text-danger fw-medium fs-12 mb-0"><i class="ri-arrow-down-s-fill fs-5 align-middle"></i>10.52% -->
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <!-- <td>
                                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i class="ri-stop-fill align-middle fs-18 text-info me-2"></i>Approved Applications</h4>
                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0"><i data-feather="users" class="me-2 icon-sm"></i>2</p>
                                                    </td> -->
                                                    <td class="text-end">
                                                        <!-- <p class="text-danger fw-medium fs-12 mb-0"><i class="ri-arrow-down-s-fill fs-5 align-middle"></i>7.36% -->
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
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
