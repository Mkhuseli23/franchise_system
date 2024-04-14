<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID']==0)) {
  header('location:logout.php');
  } else{
    $a_id=$_SESSION['ID'];
$date = date('Y-m-d H:i:s');
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');
?>

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title></title>
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
            margin-top: 4rem; /* Adjust this value to match the height of the header */
        }
    </style>
    <style>
        .document-link {
            display: flex;
            align-items: center;
        }

        .document-icon {
            margin-left: 5px;
            width: 30px;
            height: auto;
        }
    </style>
    <style>
        /* Optional CSS styling */
        .bordered-content {
            border: 1px solid #000; /* Change color and style as needed */
            padding: 10px; /* Adjust padding as needed */
        }
    </style>
</head>
<?php 
$query = mysqli_query($conn, "SELECT * FROM companylogo WHERE company_id = '$id'");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Your modal header content here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="main-content">
        <div class="w3-container w3-white" style="background-color: white; width: 200px; height: 200px; margin-left: 50px; margin-top: 20px;">
    <?php
    // Assuming $row['logo'] contains the name of the uploaded image file
    $logo = $row['logo'];
    $filePath = 'logos/' . $logo;

    // Check if the logo exists
    if (!empty($logo) && file_exists($filePath)) {
        echo '<a href="' . $filePath . '" target="_blank" class="document-link">';
        echo '<img src="' . $filePath . '" alt="Company Logo" style="width: 200px; height: 200px;">';
        echo '</a>';
    } else {
        echo '<p>No file uploaded</p>';
    }
    ?>
    <a href="companylog.php">Company Logo</a>
    <p><label>Company Name:<?php echo htmlentities($row['company_name']); ?></label></p>
</div> -->



            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">My Application</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="customerTable">
    <thead>
        <tr>
            <th>ID</th>
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
        // Start the session to access session variables
        session_start();

        // Assuming $conn is your database connection

        // Check if the session variable 'ID' is set
        if (isset($_SESSION['ID'])) {
            // Retrieve the user ID from the session variable
            $userID = $_SESSION['ID'];

            // Query to select data from the database based on the user's ID
            $query = mysqli_query($conn, "SELECT * FROM business_details 
            JOIN tbladmin ON business_details.id = tbladmin.id
            WHERE business_details.id = '$userID'");


            // Check for errors during the query execution
            if (!$query) {
                die("Query failed: " . mysqli_error($conn));
            }

            // Count the number of rows returned by the query
            $rowcount = mysqli_num_rows($query);

            // Check if any records are found
            if ($rowcount == 0) {
                // Display a message if no records are found
                echo '<tr><td colspan="7" align="center"><h3 style="color:red">No record found</h3></td></tr>';
            } else {
                // Loop through the query result to display each row of data
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo htmlentities($row['business_details_id']); ?></td>
                        <!-- Display data from the database -->
                        <td><?php echo htmlentities($row['entity_type']); ?></td>
                        <td><?php echo htmlentities($row['entity_name']); ?></td>
                        <td><?php echo htmlentities($row['entity_number']); ?></td>
                        <td><?php echo htmlentities($row['trading_name']); ?></td>
                        <td><?php echo htmlentities($row['nature_business']); ?></td>
                        <td>
                            <a class="btn btn-sm btn-success view-btn" href="myapplications.php?id=<?php echo $row['business_details_id']; ?>">View</a>
                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Delete</button>
                        </td>
                    </tr>
        <?php
                }
            }
        } else {
            // Handle the case when the session variable 'ID' is not set
            echo "Session ID not set.";
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
<?php } ?>