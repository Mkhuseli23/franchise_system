<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Petrosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets1/images/PetroSa Logo traced rec white.png">

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
    <style>
       .nav-item {
    position: relative;
    display: inline-block;
    width: 100%; /* Ensure navigation items span the full width */
}

.nav-link.menu-link:hover {
    background-color: #81859c;
}

.nav-link.menu-link.active {
    background-color: #81859c;
}

.nav-link.menu-link.active:hover {
    background-color: #81859c;
}

.nav-link.menu-link.active::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%; /* Make the pseudo-element span the full width */
    height: 100%;
    background-color: #2A3989; /* Adjust background color as needed */
    z-index: -1; /* Ensure the pseudo-element stays below the text */
}


    </style>
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
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="../assets1/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg" style="margin-right: 0px;">
                        <img src="../assets1/images/PetroSa Logo traced rec white.png" alt="" height="40">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            <hr>
            <br>
            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu"></div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="dashboard.php" aria-controls="sidebarDashboards">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards" style="color: #ffffff;"><b>Dashboard</b></span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards"></div>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link menu-link" href="application.php" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-file-list-3-line"></i> <!-- New icon added here -->
                            <span data-key="t-dashboards" style="color: #ffffff;"><b>Apply For Franchise</b></span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDashboards"></div>
                    </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="table.php" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-contacts-book-line"></i> <span data-key="t-dashboards" style="color: #ffffff;"><b>My Applications</b></span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="check.php" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-checkbox-multiple-line"></i> <span data-key="t-dashboards" style="color: #ffffff;"><b>Check Status</b></span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="profile.php" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-account-circle-line"></i> <!-- Icon added here -->
                                <span data-key="t-dashboards" style="color: #ffffff;"><b>Update Profile</b></span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDashboards"></div>
                        </li>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".nav-link.menu-link").click(function() {
                $(".nav-link.menu-link").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
</body>
</html>
