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
                        <h4 class="card-title mb-0 flex-grow-1 text-center">Directors Information</h4>
                        <div class="flex-shrink-0">
                            <!-- Any additional content you want to include -->
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted"></p>
                        <div class="live-preview">
                            <form id="businessForm" action="classes/direct.php" enctype="multipart/form-data" method="post">
                            <div id="director-fields" class="row mb-3">
                                <div class="row mb-3">
                                    <div class="col-lg-3">
                                        <label for="fname" class="form-label">Name</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter your name">
                                    </div>
                                </div>

                                <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Surname</label>
    </div>
    <div class="col-lg-6">
        <input type="text" name="surname" class="form-control" id="ckNumberInput" placeholder="Please enter surname">
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">ID</label>
    </div>
    <div class="col-lg-3">
        <input type="text" name="identity" class="form-control" id="ckNumberInput" placeholder="Please enter id number">
    </div>
    <div class="col-lg-3">
        <input type="file" name="id_doc" class="form-control" id="bankStatementInput" placeholder="Choose file">
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Curriculum Vitae</label>
    </div>
    <div class="col-lg-6">
        <input type="file" name="curv" class="form-control" id="bankStatementInput" placeholder="Choose file">
    </div>
</div>
       <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Qualifications</label>
    </div>
    <div class="col-lg-3">
        <input type="text" name="qualification" class="form-control" id="ckNumberInput" placeholder="Please enter highest qualification">
    </div>
    <div class="col-lg-3">
        <input type="file" name="qualification_doc" class="form-control" id="bankStatementInput" placeholder="Choose file">
    </div>
</div>

                                     <div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Other Cirtification </label>
    </div>
    <div class="col-lg-3">
        <input type="text" name="other_cirt" class="form-control" id="ckNumberInput" placeholder="Please enter other qualification">
    </div>
    <div class="col-lg-3">
        <input type="file" name="other_cirt_doc" class="form-control" id="bankStatementInput" placeholder="Choose file">
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Affirmation </label>
    </div>
    <div class="col-lg-3">
        <input type="text" name="affirmation" class="form-control" id="ckNumberInput" placeholder="Please enter other qualification">
    </div>
    <div class="col-lg-3">
        <input type="file" name="affirmation_doc" class="form-control" id="bankStatementInput" placeholder="Choose file">
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-3">
        <label for="ckNumberInput" class="form-label">Share Percentage</label>
    </div>
    <div class="col-lg-3">
        <input type="text" name="share_percent" class="form-control" id="ckNumberInput" placeholder="Please enter Share Percentage">
    </div>
    <div class="col-lg-3">
        <input type="file" name="share_percent_id" class="form-control" id="bankStatementInput" placeholder="Choose file">
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="row mt-3">
            <div class="col d-flex justify-content-end">
                <div class="col text-left">
                    <button type="button" name="submit" class="btn btn-primary" id="addDirector">Add Another Director</button>
                </div>
                <div class="col text-end">
                    <button type="submit" name="submit" id="nextButton" class="btn btn-primary">Next</button>
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
    <script>
document.getElementById('addDirector').addEventListener('click', function() {
    var container = document.getElementById('director-fields');
    var clone = container.cloneNode(true);
    container.parentNode.appendChild(clone);
});
</script>
</body>

</html>
