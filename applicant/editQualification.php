<?php 
include('includes/config.php'); 

if(isset($_POST['submit'])) {
    $qualification_name = mysqli_real_escape_string($con, $_POST['qualification_name']);
    $nqf_level = mysqli_real_escape_string($con, $_POST['nqf_level']);
    $industry = mysqli_real_escape_string($con, $_POST['industry']);
    $year_obtained = mysqli_real_escape_string($con, $_POST['year_obtained']);
    
    $update_query = "UPDATE qualifications SET 
                    qualification_name='$qualification_name', 
                    nqf_level='$nqf_level',
                    industry='$industry',
                    year_obtained='$year_obtained' 
                    WHERE qualifications_id = qualifications_id ";
    
    if(mysqli_query($con, $update_query)) {
        header("Location: myapplications.php?id=1");
        exit;
    } else {
        echo "<script>alert('Error updating qualification information');</script>";
    }
}

include('includes/header.php');
include('includes/sidebar.php');
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>PetroSA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <script src="assets/js/layout.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <style>
        /* Add this CSS */
        .page-content {
            padding-top: 0;
            margin-top: 0rem; /* Adjust this value to match the height of the header */
        }
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

<?php
$query = mysqli_query($con, "SELECT * FROM qualifications WHERE qualifications_id  = qualifications_id ");
$rowcount = mysqli_num_rows($query);

if ($rowcount == 0) {
    echo "<h3 style='color:red'>No record found</h3>";
} else {
    $row = mysqli_fetch_array($query);
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-center">
                    <h4 class="card-title mb-0 flex-grow-1 text-center">Update Qualification</h4>
                    <div class="flex-shrink-0">
                        <!-- Any additional content you want to include -->
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-muted"> </p>
                    <div class="live-preview">
                    <form id="siteInformationForm" method="post">
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="industrySelect" class="form-label">Industry</label>
                                </div>
                                <div class="col-lg-6">
                                    <select name="industry" class="form-select" id="industrySelect">
                                        <option value="">Please select</option>
                                        <?php
                                        $industries = array(
                                            "Agriculture and Related Trades",
                                            "Arts, Culture and Entertainment",
                                            "Business, Commerce and Management Studies",
                                            "Education, Training and Development",
                                            "Hospitality, Tourism and Recreation",
                                            "Humanities and Social Sciences",
                                            "Manufacturing, Engineering and Technology",
                                            "Natural Sciences, Mathematics and Computer Science"
                                        );
                                        foreach ($industries as $ind) {
                                            echo "<option value='$ind'" . ($row['industry'] == $ind ? ' selected' : '') . ">$ind</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="websiteUrl" class="form-label">Qualification Name:</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="qualification_name" class="form-control" id="websiteUrl" placeholder="Enter Qualification Name" value="<?php echo isset($row['qualification_name']) ? htmlentities($row['qualification_name']) : ''; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="nqfLevelSelect" class="form-label">NQF Level</label>
                                </div>
                                <div class="col-lg-6">
                                    <select name="nqf_level" class="form-select" id="nqfLevelSelect">
                                        <option value="">Please select</option>
                                        <?php
                                        $nqf_levels = array(
                                            "GNQF Level 1: General Education and Training Certificate",
                                            "NQF Level 2: Further Education and Training Certificate",
                                            "NQF Level 3: National Certificate (Vocational)",
                                            "NQF Level 4: National Senior Certificate",
                                            "NQF Level 5: Higher Certificate",
                                            "NQF Level 6: National Diploma",
                                            "NQF Level 7: Bachelor's Degree",
                                            "NQF Level 8: Honours Degree, Postgraduate Diploma"
                                        );
                                        foreach ($nqf_levels as $level) {
                                            echo "<option value='$level'" . ($row['nqf_level'] == $level ? ' selected' : '') . ">$level</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                           
                            <!-- Continuation of the form -->
<div class="row mb-3">
    <div class="col-lg-3">
        <label for="yearSelect" class="form-label">Year Obtained</label>
    </div>
    <div class="col-lg-6">
        <select name="year_obtained" class="form-select" id="yearSelect">
            <option value="" selected>Select year</option>
            <?php
            for ($year = 1980; $year <= 2024; $year++) {
                echo '<option value="' . $year . '"' . (($row['year_obtained'] ?? '') == $year ? ' selected' : '') . '>' . $year . '</option>';
            }
            ?>
        </select>
    </div>
</div>
<!-- Other input fields -->

<div class="card-body">
    <!-- Form content -->
    <div class="d-flex justify-content-end">
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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

