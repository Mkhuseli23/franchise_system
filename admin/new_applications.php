<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


$date = date('Y-m-d H:i:s');
include('../includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');
?>


<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>PetroSA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
  /* Add this CSS */
  .page-content {
    padding-top: 0;
    margin-top: 1rem; /* Adjust this value to match the height of the header */
  }


</style> 
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Modal -->
      
    </div>
</div>
        <!-- other content here -->

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">New Applications</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="customerTable">
                                            <thead>
                                                <tr>
                                                    <th>Legal Entity Type</th>
                                                    <th>Legal Entity Name</th>
                                                    <th>Legal Entity Number</th>
                                                    <th>Trading Name</th>
                                                    <th>Nature Of the Business</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM business_details WHERE status IS NULL");

    $rowcount = mysqli_num_rows($query);

    if ($rowcount == 0) {
        ?>
        <tr>
            <td colspan="6" align="center">
                <h3 style="color:red">No record found</h3>
            </td>
        </tr>
        <?php
    } else {
        while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?= htmlentities($row['entity_type']) . $row['business_details_id'] ?></td>
                <td><?= htmlentities($row['entity_name']) . $row['business_details_id'] ?></td>
                <td><?= htmlentities($row['entity_number']) . $row['business_details_id'] ?></td>
                <td><?= htmlentities($row['trading_name']) . $row['business_details_id'] ?></td>
                <td><?= htmlentities($row['nature_business']) . $row['business_details_id'] ?></td>
                <td>
                    <a href="viewapplication.php?id=<?php echo $row['business_details_id']; ?>">
                        <button class="btn btn-sm btn-success view-btn" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
                    </a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © PetroSA.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by IS Department
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- END layout-wrapper -->

    <!-- JavaScript -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/libs/prismjs/pr
