<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['ID']==0)) {
  header('location:logout.php');
  } else{
    $bk_id=$_SESSION['ID'];
$date = date('Y-m-d H:i:s');
$d_id=$_GET['id'];
include('includes/header.php');?>
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
    <style>.primary-btn {
    background-color: #007bff; /* Primary color */
    color: #fff; /* Text color */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.left-btn {
    float: left;
    margin-right: 10px; /* Adjust as needed */
}

.right-btn {
    float: right;
}
</style>
<style>
  /* Add this CSS */
  .page-content {
    padding-top: 0;
    margin-top: 0rem; /* Adjust this value to match the height of the header */
  }

  /* The rest of your CSS */
  body,
  .main-content {
    margin: 1;
    padding: 0;
  }

  /* Additional adjustments if needed */
  .error {
    border-color: red !important;
  }
</style>
</head>

<body>
    <div class="main-content">
        <div class="page-content">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-center">
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Qualifications</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                            <form id="directorForm" action="classes/qualific.php" enctype="multipart/form-data" method="post">
                            <div class="container">
                            <div class="row mb-3">
    <div class="col-lg-3">
        <label for="nqfLevelSelect" class="form-label">Industry</label>
    </div>
    <div class="col-lg-6">
    <select name="industry" class="form-select" id="industrySelect">
    <option value="">Please select</option>
        <option value="Agriculture and Related Trades">Agriculture and Related Trades</option>
        <option value="Arts, Culture and Entertainment">Arts, Culture and Entertainment</option>
        <option value="usiness, Commerce and Management Studies">Business, Commerce and Management Studies</option>
        <option value="Education, Training and Development">Education, Training and Development</option>
        <option value="Hospitality, Tourism and Recreation">Hospitality, Tourism and Recreation</option>
        <option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
        <option value="Manufacturing, Engineering and Technology">Manufacturing, Engineering and Technology</option>
        <option value="Natural Sciences, Mathematics and Computer Science">Natural Sciences, Mathematics and Computer Science</option>
    </select>
</div>

</div>


    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="qualificationName" class="form-label">Qualification Name</label>
        </div>
        <div class="col-lg-6">
            <input type="text" name="qualification_name" class="form-control" id="qualificationName" placeholder="Enter your qualification name">
        </div>
    </div>

    <div class="row mb-3">
    <div class="col-lg-3">
        <label for="nqfLevelSelect" class="form-label">NQF Level</label>
    </div>
    <div class="col-lg-6">
        <select name="nqf_level" class="form-select" id="nqfLevelSelect">
            <option value="">Please select</option>
            <option value="GNQF Level 1: General Education and Training Certificate">NQF Level 1: General Education and Training Certificate</option>
            <option value="NQF Level 2: Further Education and Training Certificate">NQF Level 2: Further Education and Training Certificate</option>
            <option value="NQF Level 3: National Certificate (Vocational)">NQF Level 3: National Certificate (Vocational)</option>
            <option value="NQF Level 4: National Senior Certificate">NQF Level 4: National Senior Certificate</option>
            <option value="NQF Level 5: Higher Certificat">NQF Level 5: Higher Certificate</option>
            <option value="NQF Level 6: National Diploma">NQF Level 6: National Diploma</option>
            <option value="NQF Level 7: Bachelor's Degree">NQF Level 7: Bachelor's Degree</option>
            <option value="NQF Level 8: Honours Degree, Postgraduate Diploma">NQF Level 8: Honours Degree, Postgraduate Diploma</option>
        </select>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="yearSelect" class="form-label">Year Obtained</label>
    </div>
    <div class="col-lg-6">
        <select name="year_obtained" class="form-select" id="yearSelect">
            <option value="" selected>Select year</option>
            <?php
            // Assuming you want to populate the dropdown with years from 2000 to 2050
            for ($year = 1980; $year <= 2024; $year++) {
                echo '<option value="' . $year . '">' . $year . '</option>';
            }
            ?>
        </select>
    </div>
</div>


    <div class="row mb-3">
        <div class="col-lg-3">
            <label for="ckNumberInput" class="form-label">Attach Qualification</label>
        </div>
        <div class="col-lg-6">
            <input type="file" name="attach_qual" class="form-control" id="bankStatementInput" placeholder="Choose file">
        </div>
    </div>
</div>

<!-- <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Your Qualification</label>
    </div>
    <div class="col-lg-6">
    <textarea class="form-control summernote" name="address" required><?php echo isset($your_qualification) ? htmlspecialchars($your_qualification) : ''; ?></textarea>
</div> -->



<div class="card-body">
    <div class="row">
        <div class="row mt-3">
            <div class="col d-flex justify-content-end">
                <div class="col text-left">
                <button type="submit" name="submit" value="addDirector" class="primary-btn left-btn">Add Qualification</button>
                </div>
                <div class="col text-end">
                <button type="submit" name="submit" value="nextButton" class="primary-btn right-btn">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>


                            </form>
                        </div>
                        <div class="d-none code-view">
                            <pre class="language-markup" style="height: 375px;"></pre>
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
    <!-- <script>
document.getElementById('addDirector').addEventListener('click', function() {
    var container = document.getElementById('director-fields');
    var clone = container.cloneNode(true);
    container.parentNode.appendChild(clone);
});
</script> -->
</body>

</html>
<?php } ?>