<?php
    session_start();
    include('../includes/config.php');

    // Check if the user is logged in
    if (isset($_SESSION['ID'])) {
        // Fetch user data
        $id = $_SESSION['ID'];
        $query = "SELECT * FROM tbladmin WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            // Assign session variables
            $_SESSION['NAME'] = $row['name'];
            $_SESSION['SURNAME'] = $row['surname'];
            $_SESSION['AdminEmailId'] = $row['AdminEmailId'];
            $_SESSION['ROLE'] = $row['role'];
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // User is not logged in, handle accordingly
        echo "User not logged in.";
    }
?>

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Petrosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets1/images/PetroSAlogowhite (2).png">
    <!-- plugin css -->
    <link href="../assets1/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
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

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="../assets1/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="../assets1/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>
                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="../assets1/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="../assets1/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                    <div class="ms-1 header-item d-none d-sm-flex">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen" title="Toggle Fullscreen">
        <i class='bx bx-fullscreen fs-22'></i>
    </button>
</div>
<div class="ms-1 header-item d-none d-sm-flex">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode" title="Toggle Light/Dark Mode">
        <i class='bx bx-moon fs-22'></i>
    </button>
</div>


                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="../assets1/images/users/icon-profile-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $_SESSION['SURNAME']; ?></span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?php echo $_SESSION['NAME']; ?></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome <?php echo $_SESSION['ROLE']; ?> <?php echo $_SESSION['NAME']; ?>!</h6>
                                <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="../login.php"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </div>

    <!-- JAVASCRIPT -->
    <script src="assets1/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets1/libs/simplebar/simplebar.min.js"></script>
    <script src="assets1/libs/node-waves/waves.min.js"></script>
    <script src="assets1/libs/feather-icons/feather.min.js"></script>
    <script src="assets1/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets1/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="assets1/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="assets1/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets1/libs/jsvectormap/maps/world-merc.js"></script>

    <!-- Dashboard init -->
    <script src="assets1/js/pages/dashboard-analytics.init.js"></script>

    <!-- App js -->
    <script src="assets1/js/app.js"></script>
</body>

</html>
