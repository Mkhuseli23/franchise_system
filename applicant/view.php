
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/config.php');

?>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>Projects | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script src="assets/js/layout.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="main-content">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Information</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
    <div class="business-details-container">
    <div class="sepp__text-tag">
    <label>Business Entity Details</label>
    <?php
    // Assuming $conn is your database connection
    $query = mysqli_query($conn, "SELECT * FROM business_details WHERE business_details_id = 39");
    $rowcount = mysqli_num_rows($query);

    if ($rowcount == 0) {
        echo '<p>No business data found</p>';
    } else {
        while ($row = mysqli_fetch_array($query)) {
            echo '<div class="sepp__text-tag">';
            echo '<h4 class="sepp__text-tag_title word-wrap">' . htmlentities($row['entity_type']) . '</h4>';
            echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['entity_name']) . '</p>';
            echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['entity_number']) . '</p>';
            echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['trading_name']) . '</p>';
            echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['nature_business']) . '</p>';
            echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['physical_address']) . '</p>';
            echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['tax_number']) . '</p>';
            echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['csd_number']) . '</p>';
            echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['ck_number']) . '</p>';
            
            // Check if the file exists and display either an image or PDF accordingly
            if (!empty($row['PostImage'])) {
                $imagePath = '../upload/' . $row['PostImage'];
                if (file_exists($imagePath)) {
                    echo '<img src="' . $imagePath . '" width="50" height="50" alt="">';
                } else {
                    echo 'Image not found or invalid path.';
                }
            } elseif (!empty($row['pdf_path'])) {
                $pdfPath = '../upload/"/' . $row['pdf_path'];
                if (file_exists($pdfPath)) {
                    echo '<embed src="' . $pdfPath . '" type="application/pdf" width="50" height="50" />';
                } else {
                    echo 'PDF not found or invalid path.';
                }
            } else {
                echo 'No image or PDF available.';
            }
            
            echo '<p class="text-wrap react-text-expander sepp__text-tag_text-small">' . htmlentities($row['trading_name']) . '</p>';
            echo '</div>';
        }
    }
    ?>
</div>


    </div>
    <div class="bank-details-container">
        <label>Bank Details</label>
        <?php
        // Display bank details
        $query = mysqli_query($conn, "SELECT * FROM bank_details WHERE bank_details_id = 23");
        $rowcount = mysqli_num_rows($query);

        if ($rowcount == 0) {
            echo '<p>No bank data found</p>';
        } else {
            while ($row = mysqli_fetch_array($query)) {
                echo '<div class="sepp__text-tag">';
                echo '<h4 class="sepp__text-tag_title word-wrap">' . htmlentities($row['account_name']) . '</h4>';
                echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['bank_institution']) . '</p>';
                echo '<p class="sepp__text-tag_text word-wrap">' . htmlentities($row['account_number']) . '</p>';
                echo '<p class="text-wrap react-text-expander sepp__text-tag_text-small">' . htmlentities($row['branch_name']) . '</p>';
                echo '</div>';
            }
        }
        ?>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showConfirmation() {
            $('#confirmationModal').modal('show');
        }

        $(document).ready(function() {
            $('#proceedButton').click(function() {
                // Handle proceeding with the application
                // For example, submit the form or navigate to the next page
                // You can add your logic here
            });
        });
    </script>
</body>
</html>
