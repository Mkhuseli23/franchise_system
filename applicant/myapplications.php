<?php
session_start();
error_reporting(0);
$date = date('Y-m-d H:i:s');
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');
$b_id=$_GET['id'];
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
    .custom-text {
        color: #2A3989; /* Set the text color */
        text-align: left; /* Align text to the left */
    }
</style>
    <style>
        /* Add this CSS */
        .page-content {
            padding-top: 0;
            margin-top: 0.8rem; /* Adjust this value to match the height of the header */
        }
    </style>
         <style>
    #consent-panel {
        margin-left: 380px;
        display: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    #consent-panel .panel-body {
        text-align: left;
        color: #2A3989;
        margin-left: 15px;
        margin-top: 18px; /* Adjust this value as needed */
    }
</style>
    <style>
        /* Custom CSS */
        .sidebar {
            width: 350px;
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        }

        .info-list {
            list-style-type: none;
            padding: 0;
            margin: 8px;
        }

        .info-list li {
            color: blue;
            cursor: pointer;
            padding-left: 15px;
            margin-bottom: 10px;
            position: relative;
        }

        .info-list li::before {
  content: ""; /* Empty content */
  margin-right: 7px;
  position: absolute;
  right: 0;
  width: 20px; /* Adjust width as needed */
  height: 20px; /* Adjust height as needed */
  background-size: contain; /* Ensure the image fits within the specified dimensions */
}

        

        .info-list a {
            display: block;
            width: 100%;
            text-decoration: none;
        }

        #infoCard {
            display: none;
            width: 550px;
            height: 580px;
            margin-top: 10px;
            position: absolute;
            top: 0;
            left: calc(100% + 10px);
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        .card-body {
            padding: 20px;
        }

        .info-list li {
            font-size: 14px;
        }

        .white-panel {
            background-color: #fff;
            width: 790px;
            height: 569px;
            margin: 2px;
        }

        .float-left {
            float: right;
        }

        .panel {
            margin-top: -360px;
        }

        .document-link {
            display: flex;
            align-items: center;
        }

        .document-icon {
            width: 30px;
            height: auto;
        }
    </style>
    </style>
    <style>
    .hover-rectangle {
        display: inline-block;
        position: relative;
    }

    .hover-rectangle:hover::after {
        content: "";
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border: 1px solid blue; /* Adjust border color as needed */
        pointer-events: none; /* Ensures the hover area doesn't affect mouse interaction */
    }
</style>
    <style>
  .custom-button {
    background-color: #2A3989;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    float: right; /* Aligns the button to the right */
}

.custom-button:hover {
    background-color: #1e2b66;
}


        </style>
        <style>
    label:hover {
        border-color: #2A3989;
    }
</style>
<style>
    .shift-right {
        display: flex;
        justify-content: flex-left;
    }
</style>
<style>
    #site-and-land-panel {
        margin-left: 380px;
        display: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    #site-and-land-panel .panel-body-center {
        text-align: left;
        color: #2A3989;
        margin-left: 15px;
    }
</style>
<style>
    table {
  border-collapse: collapse;
  width: 95%;
  margin-left: 20px;
}

th,
td {
  border: 1px solid black;
  padding: 4px;
  text-align: left;
}

th {
  background-color: #c1c1c1;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
  
        

        <script>
function showInfo(info) {
    var panels = document.getElementsByClassName('white-panel');
    for (var i = 0; i < panels.length; i++) {
        panels[i].style.display = 'none';
    }
    var panel = document.getElementById(info);
    if (panel.style.display === 'none') {
        panel.style.display = 'block';
    } else {
        panel.style.display = 'none';
    }
}
</script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
          <div class="sidebar">
    <ul class="info-list">
    <li onclick="showInfo('business-entity-details-panel')" style="background-image: url('path_to_image_1'); color: #81859c; background-repeat: no-repeat; background-position: right center; padding-right: 20px;">
    <b>Business Entity Details</b>
    <img src="../assets1/images/card-list.svg" alt="Bank Icon" style="margin-left: 56px; width: 20px; height: auto;">
</li>
<br>
<li onclick="showInfo('bank-account-details-panel')" style="background-image: url('path_to_image_2'); color: gray; background-repeat: no-repeat; background-position: right center; padding-right: 20px;">
    <b>Bank Account Details</b>
    <img src="../assets1/images/bank.svg" alt="Bank Icon" style="margin-left: 63px; width: 20px; height: auto;">
</li>
<br>
<li onclick="showInfo('director-information-panel')" style="background-image: url('path_to_image_3'); color: gray; background-repeat: no-repeat; background-position: right center; padding-right: 20px;">
    <b>Director Information</b>
    <img src="../assets1/images/person-lines-fill.svg" alt="Bank Icon" style="margin-left: 70px; width: 20px; height: auto;">
</li>
<br>
<li onclick="showInfo('capital-requirements-panel')" style="background-image: url('path_to_image_4'); color: gray; background-repeat: no-repeat; background-position: right center; padding-right: 20px;">
    <b>Capital Requirements</b>
    <img src="../assets1/images/cash-coin.svg" alt="Bank Icon" style="margin-left: 57px; width: 20px; height: auto;">
</li>
        <br>
        <li onclick="showInfo('site-and-land-panel')" style="background-image: url('path_to_image_5'); color: gray; background-repeat: no-repeat; background-position: right center; padding-right: 20px;">
    <b>Site And Land Information</b>
    <img src="../assets1/images/cash-coin.svg" alt="Bank Icon" style="margin-left: 28px; width: 20px; height: auto;">
</li>
        <br>
        <li onclick="showInfo('consent-panel')" style="background-image: url('path_to_image_6'); color: gray; background-repeat: no-repeat; background-position: right center; padding-right: 20px;">
    <b>Consent</b>
    <img src="../assets1/images/door-open.svg" alt="Bank Icon" style="margin-left: 150px; width: 20px; height: auto;">
</li>
    </ul>
</div>

            <?php 
$query = mysqli_query($conn, "SELECT * FROM business_details 
    WHERE business_details_id = $b_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>
<style>
    .adjustable-text {
    margin-top: 20px; /* Adjust this value to change the top margin */
}
</style>
<div class="panel panel-default white-panel float-left" id="business-entity-details-panel" style="margin-left: 380px; display: none; border-radius: 10px; position: relative; top: 12px;">
    <div class="panel-header" style="background-color: #017143; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
    <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 25px; font-size: 15px;">
    <b><?php echo $b_id;?>Business Entity Details</b>
</div>

        <!-- Edit Icon (Clickable) -->
        <a href="editApplication.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-40%);">
            <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
        </a>
    </div> <br><br>


    <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Legal Entity Type:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['entity_type']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Legal Entity Name:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['entity_name']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Legal Entity Number:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['entity_number']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Trading Name:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['trading_name']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Nature Of Business:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['nature_business']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Physical Address:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['physical_address']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Phone No:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['phone']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Tax Number:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['tax_number']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">CSD Number:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['csd_number']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">CK Number::</label>
            <p style="margin: 0;"><?php echo htmlentities($row['ck_number']); ?>.</p>
        </div>
</div>

</div>
<br>                
<!-- <hr style="border-top: 12px solid #ccc;"> -->
<div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px;; border-radius: 0px;">
    <b>Attachments</b>
    <a href="editApplicationDoc.php" style="float: right; margin-bottom: 110px;">
    <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
</a>


</div>
<br>


      <div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Tax Document:</label>            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $taxDoc = $row['tax_doc'];
                $filePath = 'upload/' . $taxDoc;

                // Check if the tax document exists
                if (!empty($taxDoc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['tax_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>


    <!-- Second section -->
    <div class="col-md-6 shift-right">
    <style>
    .hover-rectangle {
        display: inline-block;
        position: relative;
    }

    .hover-rectangle:hover::after {
        content: "";
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        background-color: #2A3989; /* Change background color on hover */
        pointer-events: none; /* Ensures the hover area doesn't affect mouse interaction */
    }
</style>

<div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">CSD Document:</label>
            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $csd_doc = $row['tax_doc'];
                $filePath = 'upload/' . $csd_doc;

                // Check if the tax document exists
                if (!empty($csd_doc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['tax_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    ?>
                        <a href="<?php echo $filePath; ?>" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon"><?php echo $summary; ?></a>
                    <?php
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>

<style>
    .hover-rectangle:hover {
        border-color: #2A3989;
    }
</style>



</div>

</div>
<br>
<div class="row">
    <!-- First section -->
    <div class="col-md-6 shift-right">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
        <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; color: border-radius: 10px; display: flex; justify-content: center; align-items: center; border: none;">CK Document:</label>
            <p style="margin: 0;">
                <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $ck_doc = $row['ck_doc'];
                $filePath = 'upload/' . $ck_doc;

                // Check if the tax document exists
                if (!empty($taxDoc) && file_exists($filePath)) {
                    $fileName = htmlentities($row['tax_doc']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
                ?>
            </p>
        </div>
    </div>
</div>

</div>

</div>

<?php 
$query = mysqli_query($conn, "SELECT * FROM bank_details WHERE bank_details_id = $b_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>

            <div class="panel panel-default white-panel float-left" id="bank-account-details-panel" style="margin-left: 380px; display: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
    <div class="panel-header" style="background-color: #017143; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
        <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 15px; position: relative; top: 2px; font-size: 15px;">
            <b>Bank Account Details</b>
        </div>
        <!-- Edit Icon (Clickable) -->
        <a href="editBank.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%);">
            <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
        </a>
    </div>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Account Name:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['account_name']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Bank Institution:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['bank_institution']); ?>.</p>
        </div>
    </div>
</div>
<br>
<style>
    .shift-right {
        display: flex;
        justify-content: flex-left;
    }
</style>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Account Number:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['account_number']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Branch Name:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['branch_name']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Branch Number:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['branch_number']); ?>.</p>
            </div>
        </div>
    </div>   
</div>
<br>
<!-- <hr style="border-top: 12px solid #ccc;"> -->
<div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px;">
    <b>Attachments</b>
    <a href="editBankDoc.php" style="float: right;">
        <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
    </a>
</div>
<br>
<div class="row">
<div class="col-md-6 shift-left">
    <div class="city" style="display: flex; align-items: baseline;">
        <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 20px; width: 115px; height: 35px; margin-left: 20px; background-color: transparent; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Bank Statement:</label>
            <p style="margin: 0;"> 
            <?php
                // Assuming $row['tax_doc'] contains the name of the uploaded file
                $upload_statement = $row['upload_statement'];
                $filePath = 'bankstatements/' . $upload_statement;

                // Check if the tax document exists
                if (!empty($upload_statement) && file_exists($filePath)) {
                    $fileName = htmlentities($row['upload_statement']);
                    $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                    echo '<a href="' . $filePath . '" target="_blank" class="document-link" style="margin-left: 10px;"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                } else {
                    echo '<p>No file uploaded</p>';
                }
            ?></p>
        </div>
    </div>
</div>
 
   
    
</div>
<br>
<br>
            </div>

       
<div class="panel panel-default white-panel float-left" id="director-information-panel" style="margin-left: 380px; display: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">    <div class="panel-header" style="background-color: #017143; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
        <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 15px; position: relative; top: 2px; font-size: 15px;">
            <b>Directors Information</b>
        </div>
        <a href="directorPerson.php?id=<?php echo $b_id;?>" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%);">
            <i class="ri-add-line" style="color: #FFFFFF; font-size: 20px;"></i>
        </a>
        <a href="editDirector.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%);">
            <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
        </a>
    </div>
    <br>
    <table>
    <thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Identity</th>
    <th>Gender</th>
    <th>Disability</th>
    <th>Address</th>
    <th>Share Percentage</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php 
  // Assuming $_SESSION['ID'] holds the login user's ID
  $user_id = $_SESSION['ID'];
  $query1 = mysqli_query($conn, "SELECT * FROM directorsperson WHERE bank_details_id = '$user_id'");
  while ($row1 = mysqli_fetch_array($query1)) {
?>
  <tr>
    <td><?php echo htmlentities($row1['directorsPerson_id']); ?></td>
    <td><?php echo htmlentities($row1['fname']); ?></td>
    <td><?php echo htmlentities($row1['surname']); ?></td>
    <td><?php echo htmlentities($row1['identity']); ?></td>
    <td><?php echo htmlentities($row1['gender']); ?></td>
    <td><?php echo htmlentities($row1['disability']); ?></td>
    <td><?php echo htmlentities($row1['address']); ?></td>
    <td><?php echo htmlentities($row1['share_percent']); ?></td>
    <td>
      <!-- Action button(s) for this row -->
      <button class="view-button" onclick="togglePanel('director-information-panel1', <?php echo $row1['directorsPerson_id']; ?>, 'director-information-panel', <?php echo json_encode($row1); ?>)">View</button>
    </td>
  </tr>
<?php 
  } 
?> 
</tbody>

</table>

</div> 
<?php 
$queryd = mysqli_query($conn, "SELECT * FROM directorsperson WHERE directorsPerson_id = $b_id");
$rowcount = mysqli_num_rows($queryd);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    while ($rowd = mysqli_fetch_array($queryd)) {
        // HTML structure for displaying director information
        // Make sure this HTML is within the loop
?>
<div class="panel panel-default white-panel float-left" id="director-information-panel1" style="margin-left: 380px; display: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
<div class="panel-header" style="background-color: #017143; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
        <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 15px; position: relative; top: 2px; font-size: 15px;">
            <b>Director Information</b>
        </div>
        <a href="directorPerson.php?id=<?php echo $b_id;?>" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%);">
            <i class="ri-add-line" style="color: #FFFFFF; font-size: 20px;"></i>
        </a>
        <a href="editDirector.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%);">
            <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
        </a>
    </div>
    <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Name:</label>
                <p style="margin: 0;"><?php echo htmlentities($rowd['fname']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Surname:</label>
            <p style="margin: 0;"><?php echo htmlentities($rowd['surname']); ?>.</p>
        </div>
    </div>
</div>
<br>


<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">ID Number:</label>
                <p style="margin: 0;"><?php echo htmlentities($rowd['identity']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Gender:</label>
            <p style="margin: 0;"><?php echo htmlentities($rowd['gender']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Disability:</label>
                <p style="margin: 0;"><?php echo htmlentities($rowd['disability']); ?>.</p>
            </div>
        </div>
    </div> 
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Address:</label>
            <p style="margin: 0;"><?php echo htmlentities($rowd['address']); ?>.</p>
        </div>
    </div>  
</div>
<br> <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Share Percentage:</label>
                <p style="margin: 0;"><?php echo htmlentities($rowd['share_percent']); ?>.</p>
            </div>
        </div>
    </div> 
     
</div>
<br>
<!-- <hr style="border-top: 12px solid #ccc;"> -->
<div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px;">
    <b>Attachments</b>
    <a href="editDirectorDoc.php" style="float: right;">
        <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
    </a>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 115px; height: 35px; margin-left: 15px; background-color: transparent; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Attached ID:</label>                <p style="margin: 0;"> 
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $id_doc = $rowd['id_doc'];
                    $filePath = 'directorsInfo/' . $id_doc;

                    // Check if the tax document exists
                    if (!empty($id_doc) && file_exists($filePath)) {
                        $fileName = htmlentities($rowd['id_doc']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 118px; height: 30px; margin-left: 15px; background-color: transparent; color: black; border-radius: 5px; display: flex; justify-content: center; align-items: center;">Curriculum Vitae:</label>                <p style="margin: 0;">
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $cvitae = $rowd['cvitae'];
                    $filePath = 'directorsInfo/' . $cvitae;

                    // Check if the tax document exists
                    if (!empty($cvitae) && file_exists($filePath)) {
                        $fileName = htmlentities($rowd['cvitae']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<br>
<div style="display: flex; justify-content: space-between;">
<button class="custom-button" onclick="backToDirectorPanel()">Back</button>

    <button class="custom-button" onclick="showQualificationPanel()">Next</button>
</div>



</div>

            
            </div>
            <?php }
}?>
            <script>
function togglePanel(panelId) {
    var panel = document.getElementById(panelId);
    if (panel.style.display === "none" || panel.style.display === "") {
        panel.style.display = "block";
    } else {
        panel.style.display = "none";
    }
}
</script>
    <?php 
$queryd = mysqli_query($conn, "SELECT * FROM capital_requirements 
    WHERE capital_requirents_id = $b_id");
$rowcount = mysqli_num_rows($queryd);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $rowd = mysqli_fetch_array($queryd);
}
?>


           <div class="panel panel-default white-panel float-left" id="capital-requirements-panel" style="margin-left: 380px; display: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
    <div class="panel-header" style="background-color: #017143; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
        <!-- Edit Icon (Clickable) -->
        <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 15px; position: relative; top: 2px;font-size: 15px;">
            <b>Capital Requirements</b>
        </div>
        <!-- Edit Icon (Clickable) -->
        <a href="editFinance.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%);">
            <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
        </a>
    </div>


    <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Requirement Amount:</label>
                <p style="margin: 0;"><?php echo htmlentities($rowd['required_amount']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">20% unencumbered cash:</label>
            <p style="margin: 0;"><?php echo htmlentities($rowd['unencumbered_cash']); ?>.</p>
        </div>
    </div>
</div>
<br>
<style>
    .shift-right {
        display: flex;
        justify-content: flex-left;
    }
</style>

<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">80% funding Amount:</label>
                <p style="margin: 0;"><?php echo htmlentities($rowd['financial_institution']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Financial Funding:</label>
            <p style="margin: 0;"><?php echo htmlentities($rowd['financial_funding']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Income Source:</label>
                <p style="margin: 0;"><?php echo htmlentities($rowd['income_source']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Income Source Amount:</label>
            <p style="margin: 0;"><?php echo htmlentities($rowd['income_source_amount']); ?>.</p>
        </div>
    </div>
</div>
<br>
<!-- <hr style="border-top: 12px solid #ccc;"> -->
<div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px;">
    <b>Attachments</b>
    <a href="editFinanceDoc.php" style="float: right;">
        <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
    </a>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 20px; width: 120px; height: 40px; margin-left: 45px; background-color: transparent; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Income Source Proof :</label>                <p style="margin: 0;"> 
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $income_sourcr_doc = $rowd['income_sourcr_doc'];
                    $filePath = 'capitalFinc/' . $income_sourcr_doc;

                    // Check if the tax document exists
                    if (!empty($income_sourcr_doc) && file_exists($filePath)) {
                        $fileName = htmlentities($rowd['income_sourcr_doc']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 118px; height: 30px; margin-left: 15px; background-color: transparent; color: black;  border-radius: 5px; display: flex; justify-content: center; align-items: center;">Letter OF Intent:</label>                <p style="margin: 0;">
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $letter_intent = $rowd['letter_intent'];
                    $filePath = 'capitalFinc/' . $letter_intent;

                    // Check if the tax document exists
                    if (!empty($letter_intent) && file_exists($filePath)) {
                        $fileName = htmlentities($rowd['letter_intent']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div style="display: flex; justify-content: flex-end;">
    <button class="custom-button">Next</button>
</div>

            </div>
     
            <?php 
$query = mysqli_query($conn, "SELECT * FROM site_information
    WHERE site_information_id = $b_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>
<div class="panel panel-default white-panel float-left" id="site-and-land-panel" style="margin-left: 380px; display: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
    <div class="panel-header" style="background-color: #017143; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
        <!-- Edit Icon (Clickable) -->
        <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 15px; position: relative; top: 2px;font-size: 15px;">
            <b>Site And Land Information</b>
        </div>
        <!-- Edit Icon (Clickable) -->
        <a href="editLand.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%);">
            <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
        </a>
    </div>
    <div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Location:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['location']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Business Address:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['business_address']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Latitude:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['attitude_longitude']); ?>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Longitude:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['attitude_longitude']); ?>.</p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Size Of Land:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['size_land']); ?>.</p>
            </div>
        </div>
    </div>
</div>
<br>
<!-- <hr style="border-top: 12px solid #ccc;"> -->
<div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px;">
    <b>Attachments</b>
    <a href="editLandDoc.php" style="float: right;">
        <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
    </a>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 132px; height: 37px; margin-left: 15px; background-color: transparent; color: black; border-radius: 5px; display: flex; justify-content: center; align-items: center;">Proof Of Ownership:</label>                <p style="margin: 0;"> 
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $proof_ownership = $row['proof_ownership'];
                    $filePath = 'siteInfo/' . $proof_ownership;

                    // Check if the tax document exists
                    if (!empty($proof_ownership) && file_exists($filePath)) {
                        $fileName = htmlentities($row['proof_ownership']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 118px; height: 37px; margin-left: 15px; background-color: transparent; color: black; border-radius: 5px; display: flex; justify-content: center; align-items: center;">Title Deed:</label>                <p style="margin: 0;">
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $title_deed = $row['title_deed'];
                    $filePath = 'siteInfo/' . $title_deed;

                    // Check if the tax document exists
                    if (!empty($title_deed) && file_exists($filePath)) {
                        $fileName = htmlentities($row['title_deed']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6 shift-right" style="position: relative;">
        <div class="city" style="display: flex; align-items: baseline;">
            <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 140px; height: 37px; margin-left: 15px; background-color: transparent; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">Letter Of Occupation:</label>                <p style="margin: 0;"> 
                    <?php
                    // Assuming $row['tax_doc'] contains the name of the uploaded file
                    $letter_occupation = $row['letter_occupation'];
                    $filePath = 'siteInfo/' . $letter_occupation;

                    // Check if the tax document exists
                    if (!empty($letter_occupation) && file_exists($filePath)) {
                        $fileName = htmlentities($row['letter_occupation']);
                        $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                        echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                    } else {
                        echo '<p>No file uploaded</p>';
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>

</div>


</div>

                
            </div>
       





<?php 
$query = mysqli_query($conn, "SELECT * FROM consent
    WHERE consent_id = $b_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>
<div class="panel panel-default white-panel float-left custom-panel" id="consent-panel" style="margin-left: 380px; margin-top: -410px; display: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
       <div class="panel-header" style="background-color: #017143; padding: 10px 19px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
        <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 15px; position: relative; top: 2px;font-size: 15px;">
            <b>Consent</b>
        </div>
        <!-- Edit Icon (Clickable) -->
        <a href="editConsent.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%);">
            <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
        </a>
    </div>
    <br> 
    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <div style="display: flex; align-items: center; margin-right: 20px;">
                    <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Name:</label>
                    <p style="margin: 0;"><?php echo htmlentities($row['fname']); ?>.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 shift-right">
            <div style="display: flex; align-items: center;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Surname:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['surname']); ?>.</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <div style="display: flex; align-items: center; margin-right: 20px;">
                    <label style="margin-right: 10px; width: 110px; margin-left: 15px;">ID Number:</label>
                    <p style="margin: 0;"><?php echo htmlentities($row['identity']); ?>.</p>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!-- <hr style="border-top: 12px solid #ccc;"> -->
<div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px;">
    <b>Attachments</b>
    <a href="editConsentDoc.php" style="float: right;">
        <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
    </a>
</div>
<br>
    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <div style="display: flex; align-items: center; margin-right: 20px;">
                    <label style="margin-right: 10px; width: 110px; height: 37px;margin-left: 15px; color: black; border-radius: 10px; display: flex; justify-content: center; align-items: center;">ID Document:</label>
                    <p style="margin: 0;">
                        <?php
                        $id_doc = $row['id_doc'];
                        $filePath = 'consentd/' . $id_doc;

                        if (!empty($id_doc) && file_exists($filePath)) {
                            $fileName = htmlentities($row['id_doc']);
                            $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                            echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                        } else {
                            echo '<p>No file uploaded</p>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <div style="display: flex; align-items: center; margin-right: 20px;">
                    <label style="margin-right: 10px; width: 155px; height: 37px; margin-left: 15px; color: black; border-radius: 10px; display: flex; align-items: center;">Financial Statements:</label>
                    <p style="margin: 0;">
                        <?php
                        $financial_doc = $row['financial_doc'];
                        $filePath = 'consentd/' . $financial_doc;

                        if (!empty($financial_doc) && file_exists($filePath)) {
                            $fileName = htmlentities($row['financial_doc']);
                            $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                            echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                        } else {
                            echo '<p>No file uploaded</p>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <div style="display: flex; align-items: center; margin-right: 20px;">
                    <label style="margin-right: 10px; width: 110px; height: 37px; margin-left: 15px; color: black; border-radius: 10px; display: flex; align-items: flex-start;">6 Months Bank Statement:</label>
                    <p style="margin: 0;">
                        <?php
                        $bank_statment = $row['bank_statment'];
                        $filePath = 'consentd/' . $bank_statment;

                        if (!empty($bank_statment) && file_exists($filePath)) {
                            $fileName = htmlentities($row['bank_statment']);
                            $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                            echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                        } else {
                            echo '<p>No file uploaded</p>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

<?php 
$query = mysqli_query($conn, "SELECT * FROM qualifications WHERE qualifications_id = $b_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>
<div class="panel panel-default white-panel float-left" id="qualification-information-panel" style="margin-left: 380px; margin-top: -400px; display: block; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">  <div class="panel-header" style="background-color: #017143; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
    <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 15px; position: relative; top: 2px; font-size: 15px;">
      <b>Qualification Information</b>
    </div>
    <a href="qualifications.php?id=<?php echo $b_id;?>" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%);">
      <i class="ri-add-line" style="color: #FFFFFF; font-size: 20px;"></i>
    </a>
    <a href="editQualification.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%);">
      <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
    </a>
  </div>
  <br>
  <div class="panel-body">
    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Industry:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['industry']); ?>.</p>
            </div>
        </div>
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Qualification Name:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['qualification_name']); ?>.</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">NQF Level:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['nqf_level']); ?>.</p>
            </div>
        </div>
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Year Obtained:</label>
                <p style="margin: 0;"><?php echo htmlentities($row['year_obtained']); ?>.</p>
            </div>
        </div>
    </div>
</div>



<div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px;">
    <b>Attachments</b>
    <a href="editQualificationDoc.php" style="float: right;">
        <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
    </a>
</div><br>

    <div class="row">
        <div class="col-md-6 shift-right">
            <div class="city" style="display: flex; align-items: baseline;">
                <div style="display: flex; align-items: center; margin-right: 20px;">
                    <label style="margin-right: 10px; width: 110px; height: 37px; margin-left: 15px; color: black; border-radius: 10px; display: flex; align-items: flex-start;">Attach Qualification:</label>
                    <p style="margin: 0;">
                        <?php
                        $attach_qual = $row['attach_qual'];
                        $filePath = 'directorsInfo/' . $attach_qual;

                        if (!empty($attach_qual) && file_exists($filePath)) {
                            $fileName = htmlentities($row['attach_qual']);
                            $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                            echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
                        } else {
                            echo '<p>No file uploaded</p>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div style="display: flex; justify-content: space-between;">
  <div style="display: flex;">
  <button id="showdirector" class="custom-button" onclick="togglePanel('director-information-panel1')">Back</button>
  </div>
  <div style="display: flex;">
    <button id="showCertificatePanel" class="custom-button">Next</button>
  </div>
</div>

    </div>
    <br>
  </div>
</div>
<?php 
$query = mysqli_query($conn, "SELECT * FROM certificates WHERE certificate_id = $b_id");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>
<div class="panel panel-default white-panel float-left" id="certificate-information-panel" style="margin-left: 380px; margin-top: -410px; display: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
  <div class="panel-header" style="background-color: #017143; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative;">
    <div class="panel-body-center adjustable-text" style="text-align: left; color: #FFFFFF; margin-left: 15px; position: relative; top: 2px; font-size: 15px;">
      <b>Certificate Information</b>
    </div>
    <!-- Add Link for Adding New Certificate -->
    <a href="cirtificates.php?id=<?php echo $b_id;?>" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%);">
      <i class="ri-add-line" style="color: #FFFFFF; font-size: 20px;"></i>
    </a>
    <!-- Add Link for Editing Certificates -->
    <a href="editCertificate.php" style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%);">
      <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
    </a>
  </div>
  <br>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
          <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Certificate Name:</label>
            <p style="margin: 0;"><?php echo htmlentities($row['certificate_name']); ?>.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 shift-right">
        <div style="display: flex; align-items: center;">
          <label style="margin-right: 10px; width: 110px; margin-left: 15px;">Year Obtained: </label>
          <p style="margin: 0;"><?php echo htmlentities($row['year_obtained']); ?>.</p>
        </div>
      </div>
    </div>
    <br>
    <div class="panel-body-center" style="text-align: left; color: #ffffff; margin-left: 0px; background-color: #017143; padding: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); border-radius: 0px;">
      <b>Attachments</b>
      <a href="editCertificateDoc.php" style="float: right;">
        <i class="ri-edit-line" style="color: #FFFFFF; font-size: 25px;"></i>
      </a>
    </div>
    <br>
    <div class="row">
      <div class="col-md-6 shift-right">
        <div class="city" style="display: flex; align-items: baseline;">
          <div style="display: flex; align-items: center; margin-right: 20px;">
            <label style="margin-right: 10px; width: 110px; height: 37px; margin-left: 15px; color: black; border-radius: 10px; display: flex; align-items: flex-start;">Attach Certificate:</label>
            <p style="margin: 0;">
              <?php
              $attach_cert = $row['attach_cert'];
              $filePath = 'directorsInfo/' . $attach_cert;
              if (!empty($attach_cert) && file_exists($filePath)) {
                $fileName = htmlentities($row['attach_cert']);
                $summary = strlen($fileName) > 20 ? substr($fileName, 0, 20) . '...' : $fileName;
                echo '<a href="' . $filePath . '" target="_blank" class="document-link"><img src="../assets1/images/OIP.jpg" alt="Document Icon" class="document-icon">' . $summary . '</a>';
              } else {
                echo '<p>No file uploaded</p>';
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div style="display: flex; justify-content: space-between; padding: 10px;">
  <button id="showQualificationPanel" class="custom-button" onclick="togglePanel('qualification-information-panel')">Back</button>
</div>
</div>




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
            </div><!-- end main content-->
        </div><!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script>
document.getElementById("showCertificatePanel").addEventListener("click", function() {
  document.getElementById("qualification-information-panel").style.display = "none";
  document.getElementById("certificate-information-panel").style.display = "block";
});
</script>
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
        <script id="custom-script">
    function showInfo(panelId) {
        // Hide all panels
        const panels = document.getElementsByClassName('panel-default');
        for (let i = 0; i < panels.length; i++) {
            panels[i].style.display = 'none';
        }

        // Show the selected panel
        const selectedPanel = document.getElementById(panelId);
        if (selectedPanel) {
            selectedPanel.style.display = 'block';
        }

        // Add active class to the selected list item
        const listItems = document.getElementsByTagName('li');
        for (let i = 0; i < listItems.length; i++) {
            listItems[i].style.color = 'gray';
            listItems[i].style.backgroundColor = 'transparent';
        }
        const selectedListItem = document.querySelector('li[onclick*="' + panelId + '"]');
        if (selectedListItem) {
            selectedListItem.style.color = 'black';
            selectedListItem.style.backgroundColor = '#F5F5F5';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        showInfo('business-entity-details-panel');
    });
</script>
<script>
function showQualificationPanel() {
    var directorPanel = document.getElementById("director-information-panel");
    var qualificationPanel = document.getElementById("qualification-information-panel");
    
    directorPanel.style.display = "none";
    qualificationPanel.style.display = "block";
}
</script>
<script>
    $(document).ready(function() {
        $('.view-button').click(function() {
            // Get the director ID from the button's data attribute
            var directorId = $(this).data('director-id');
            
            // Show the director information panel
            $('#director-information-panel').show();
            
            // You can perform any additional actions here, such as loading data for the selected director
        });
    });
</script>
<script>
    // Function to toggle the panel's display
    function showDirectorPanel() {
        var panel = document.getElementById('director-information-panel');
        if (panel.style.display === 'none') {
            panel.style.display = 'block';
        } else {
            panel.style.display = 'none';
        }
    }

    // Add event listener to the view button
    document.addEventListener("DOMContentLoaded", function() {
        var button = document.querySelector('.view-button');
        button.addEventListener('click', showDirectorPanel);
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".view-button").click(function(){
        $("#director-information-panel").hide();
        $("#director-information-panel1").show();
    });
});
</script>
<script>
function showQualificationPanel() {
    document.getElementById('director-information-panel1').style.display = 'none';
    document.getElementById('qualification-information-panel').style.display = 'block';
}
</script>
<script>
function showQualificationPanel() {
    document.getElementById('director-information-panel1').style.display = 'none';
    document.getElementById('qualification-information-panel').style.display = 'block';
}

function backToDirectorPanel() {
    document.getElementById('qualification-information-panel').style.display = 'none';
    document.getElementById('director-information-panel1').style.display = 'block';
}
</script>
<script>
  function togglePanel(panelId) {
    // Hide both panels
    document.getElementById("qualification-information-panel").style.display = "none";
    document.getElementById("certificate-information-panel").style.display = "none";

    // Show the selected panel
    document.getElementById(panelId).style.display = "block";
  }
</script>
<script>
    function togglePanel(panelId, bId, baseId) {
        var panel = document.getElementById(panelId);
        if (panel.style.display === 'none' || panel.style.display === '') {
            panel.style.display = 'block';
            // Perform any additional actions you want when showing the panel
        } else {
            panel.style.display = 'none';
            // Perform any additional actions you want when hiding the panel
        }
    }
</script>
<script>
  function togglePanel(panelId) {
    var panels = document.querySelectorAll('.panel'); // Assuming all panels have a class 'panel'
    for (var i = 0; i < panels.length; i++) {
      panels[i].style.display = 'none'; // Hide all panels
    }
    document.getElementById(panelId).style.display = 'block'; // Show the specified panel
  }
</script>

<script>
function togglePanel(panelId, rowId, panelClass, rowData) {
  var panels = document.querySelectorAll('.' + panelClass);
  for (var i = 0; i < panels.length; i++) {
    panels[i].style.display = 'none';
  }
  var panel = document.getElementById(panelId);
  panel.style.display = 'block';

  // Populate the fields in the panel with data from the row
  panel.querySelector('.fname').textContent = rowData.fname;
  panel.querySelector('.surname').textContent = rowData.surname;
  panel.querySelector('.identity').textContent = rowData.identity;
  panel.querySelector('.gender').textContent = rowData.gender;
  panel.querySelector('.disability').textContent = rowData.disability;
  panel.querySelector('.address').textContent = rowData.address;
  panel.querySelector('.share_percent').textContent = rowData.share_percent;
}
</script>
<script>
function togglePanel(panelId) {
    // Hide all panels
    var panels = document.querySelectorAll('.panel');
    panels.forEach(function(panel) {
        panel.style.display = 'none';
    });

    // Show the specified panel
    var panel = document.getElementById(panelId);
    if (panel) {
        panel.style.display = 'block';
    }
}
</script>


    </div>
</body>

</html>
