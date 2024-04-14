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
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex justify-content-center">
                                <h4 class="card-title mb-0 flex-grow-1 text-center">Checklist</h4>
                                <div class="flex-shrink-0">
                                    <!-- Any additional content you want to include -->
                                </div>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <p class="text-muted"> </p>
                                <div class="live-preview">
                                    <form id="businessForm" action="classes/consentF.php" enctype="multipart/form-data" method="post">
        <ul class="checklist-container">
        <li>
                <input type="checkbox" id="task1" name="task1">
                <label for="task1">All</label>
            </li>
            <li>
                <input type="checkbox" id="task2" name="task2">
                <label for="task2">Tax Document</label>
            </li>
            <li>
                <input type="checkbox" id="task3" name="task3">
                <label for="task3">CSD document </label>
            </li>
            <li>
                <input type="checkbox" id="task4" name="task4">
                <label for="task4">CK Document</label>
            </li>
            <li>
                <input type="checkbox" id="task5" name="task5">
                <label for="task5">Bank Statement</label>
            </li>
            <li>
                <input type="checkbox" id="task6" name="task6">
                <label for="task6">ID Documents</label>
            </li>
            <li>
                <input type="checkbox" id="task7" name="task7">
                <label for="task7">Curriculum Vitae</label>
            </li>
            <li>
                <input type="checkbox" id="task8" name="task8">
                <label for="task8">Qualification</label>
            </li>
            <li>
                <input type="checkbox" id="task9" name="task9">
                <label for="task9">Certificates</label>
            </li>
            <li>
                <input type="checkbox" id="task10" name="task10">
                <label for="task10">Letter of Intent for Land Use</label>
            </li>
            <li>
                <input type="checkbox" id="task11" name="task11">
                <label for="task11">Prove of Income</label>
            </li>
            <li>
                <input type="checkbox" id="task12" name="task12">
                <label for="task12">Proof Of Ownership Of The Land</label>
            </li>
            <li>
                <input type="checkbox" id="task13" name="task13">
                <label for="task13">Title Deed</label>
            </li>
            <li>
                <input type="checkbox" id="task14" name="task14">
                <label for="task14">Letter Of Occupation</label>
            </li>
            <li>
                <input type="checkbox" id="task15" name="task15">
                <label for="task15">ComprehensiveBusinessPlanPetroSA</label>
            </li>
           
        </ul>
        <div class="card-body">
    <div class="d-flex justify-content-end">
        <div class="mb-3">
           <div class="mb-3">
           <a id="submitButton" href="consent.php" class="btn btn-primary" disabled>Submit</a>
                </div>

        </div>
    </div>
</div>
                                </div>
                                <div class="d-none code-view">
                                    <pre class="language-markup" style="height: 375px;"></pre>
                                </div>
                            </div>
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

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the "All" checkbox
            var allCheckbox = document.getElementById("task1");
            // Get all the other checkboxes
            var checkboxes = document.querySelectorAll("input[type='checkbox'][id^='task']:not(#task1)");

            // Add an event listener to the "All" checkbox
            allCheckbox.addEventListener("change", function() {
                // If "All" checkbox is checked, check all other checkboxes; otherwise, uncheck them
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = allCheckbox.checked;
                });
            });
        });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var allCheckbox = document.getElementById("task1");
        var checkboxes = document.querySelectorAll("input[type='checkbox'][id^='task']:not(#task1)");
        var submitButton = document.getElementById("submitButton");

        // Add event listener to checkboxes change event
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                // Enable the button if at least one checkbox is checked
                submitButton.disabled = !isAtLeastOneCheckboxChecked(checkboxes);
            });
        });

        // Function to check if at least one checkbox is checked
        function isAtLeastOneCheckboxChecked(checkboxes) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    return true;
                }
            }
            return false;
        }
    });
</script>

</body>

</html>
