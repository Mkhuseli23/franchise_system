<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 21:18:39 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Petrosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets1/images/PetroSAlogowhite (2).png">
    <!-- Layout config Js -->
    <script src="../assets1/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="../assets1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../assets1/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../assets1/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="../assets1/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

       

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="../assets1/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets1/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="../assets1/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="../assets1/images/PetroSa Logo traced rec white.png" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="dashboard.php" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                
                            </div>
                        </li> 
                        <?php
include('../includes/config.php');

function countBusinessRecords($conn, $status = NULL) {
    $whereClause = "";
    if ($status === NULL) { // Check if $status is NULL
        $whereClause = " WHERE status IS NULL"; // Filter records where status is NULL
    }
    $query = mysqli_query($conn, "SELECT * FROM business_details" . $whereClause);
    return mysqli_num_rows($query);
}

// Assuming $conn is your database connection variable
$count = countBusinessRecords($conn); // Count all records
$countNullStatus = countBusinessRecords($conn, NULL); // Count records where status is NULL
?>

<li class="nav-item">
    <a class="nav-link menu-link" href="new_applications.php" aria-expanded="false" aria-controls="sidebarDashboards">
        <i class="las la-arrow-alt-circle-down"></i> <span data-key="t-dashboards">New Applications</span>
        <span class="badge bg-soft-danger text-red" style="font-size: 20px; color: red;"><?php echo $countNullStatus; ?></span>

    </a>
    <div class="collapse menu-dropdown" id="sidebarDashboards">
    </div>
</li>




                         <li class="nav-item">
                            <a class="nav-link menu-link" href="pending.php"aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="bx bxs-hourglass-top"></i> <span data-key="t-dashboards">Pending Applications</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                
                            </div>
                        </li> 
                         <li class="nav-item">
                            <a class="nav-link menu-link" href="approved.php"aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class=" ri-checkbox-multiple-line"></i> <span data-key="t-dashboards">Approved Applications</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                
                            </div>
                        </li> 
                         <li class="nav-item">
                            <a class="nav-link menu-link" href="rejected.php"aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-close-circle-line"></i> <span data-key="t-dashboards">Rejected Applications</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                
                            </div>
                        </li> 

                        <!-- <li class="nav-item">
                            <a class="nav-link menu-link" href="rejected.php"aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class=" ri-user-shared-line"></i> <span data-key="t-dashboards">Users</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards">
                                
                            </div>
                        </li>  -->

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                  

         
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    </div>

    <!-- JAVASCRIPT -->
    <script src="../assets1/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets1/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets1/libs/node-waves/waves.min.js"></script>
    <script src="../assets1/libs/feather-icons/feather.min.js"></script>
    <script src="../assets1/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="../assets1/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="../assets1/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Dashboard init -->
    <script src="../assets1/js/pages/dashboard-crm.init.js"></script>

    <!-- App js -->
    <script src="../assets1/js/app.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/dashboard-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 21:18:40 GMT -->
</html>