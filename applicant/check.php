<?php 
session_start();
$a_id=$_SESSION['ID'];
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ID']==0)) {
  header('location:../logout.php');
  } else{

?>
<!doctype html>
<html lang="en">

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
    <style>
        /* Add this CSS */
        .page-content {
            padding-top: 0;
            margin-top: -5rem; /* Adjust this value to match the height of the header */
        }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include('includes/header.php');?>
        <?php include('includes/sidebar.php');?>
        <!-- Start right Content here -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <!-- end page title -->
                    <?php 
    // Fetch data for the logged-in user only
    $query = mysqli_query($conn, "SELECT * FROM business_details WHERE id = '$a_id'");
    $rowcount = mysqli_num_rows($query);

    if ($rowcount == 0) {
        echo "<h3 style='color:red'>No record found</h3>";
    } else {
        $row = mysqli_fetch_array($query);
    }
    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Status Of The Application</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="d-flex justify-content-sm-end">
                                                    <div class="search-box ms-2">
                                                        <input type="text" class="form-control search" placeholder="Search...">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive table-card mt-3 mb-1">
    <table class="table align-middle table-nowrap" id="customerTable">
        <thead class="table-light">
            <tr>
                <th scope="col" style="width: 50px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                    </div>
                </th>
                <th class="sort" data-sort="customer_name">Company Name</th>
                <th class="sort" data-sort="customer_name">Status</th>
                <th class="sort" data-sort="customer_name">Action</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            <tr>
                <td scope="row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                    </div>
                </td>
                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>
                <td class="customer_name"><?php echo htmlentities($row['entity_name']); ?></td>
                <td class="customer_name"><?php echo htmlentities($row['status']); ?></td>
                <td>
    <?php if ($row['status'] == 'Pending'): ?>
        <a href="myapplications.php?id=<?php echo $row['business_details_id'];?>">
            <button class="btn btn-sm btn-success view-btn" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
        </a>
    <?php endif; ?>
</td>

            </tr>
        </tbody>
    </table>
</div>

                                        <!-- end table-responsive -->
                                    </div>
                                    <!-- end #customerList -->
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <br>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © PetroSA.
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
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>
    <!-- prismjs plugin -->
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/list.js/list.min.js"></script>
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- listjs init -->
    <script src="assets/js/pages/listjs.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>
<?php }?>