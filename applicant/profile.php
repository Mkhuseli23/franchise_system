<?php
session_start();
include('includes/config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if session ID is set and not empty
if (isset($_SESSION['ID']) && strlen($_SESSION['ID']) > 0) {
    $b_id = $_SESSION['ID'];
    $date = date('Y-m-d H:i:s');

    // Update personal details
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updatePersonalDetails'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $AdminUserName = $_POST['AdminUserName'];
        $AdminEmailId = $_POST['AdminEmailId'];
        $contact_no = $_POST['contact_no'];
        $address = $_POST['address'];

        $sql = "UPDATE tbladmin SET name = '$name', surname = '$surname', AdminUserName = '$AdminUserName', AdminEmailId = '$AdminEmailId', contact_no = '$contact_no', address = '$address' WHERE id = '$b_id'";

        if (mysqli_query($con, $sql)) {
            header("Location: profile.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }

    // Update password
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changePassword'])) {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        // Verify old password (You need to fetch the old password from the database and compare it here)
        // For simplicity, I'm omitting this part. You should implement it in your script.

        // Check if new password matches the confirmation
        if ($newPassword === $confirmPassword) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $sql = "UPDATE tbladmin SET AdminPassword = '$hashedPassword' WHERE id = '$b_id'";

            if (mysqli_query($con, $sql)) {
                header("Location: profile.php");
                exit();
            } else {
                echo "Error updating password: " . mysqli_error($con);
            }
        } else {
            echo "Passwords do not match";
        }
    }

    // Retrieve user data from the database
    $query = mysqli_query($con, "SELECT * FROM tbladmin WHERE id = '$b_id'");
    $rowcount = mysqli_num_rows($query);

    if ($rowcount == 0) {
        echo "<h3 style='color:red'>No record found</h3>";
    } else {
        $row = mysqli_fetch_array($query);
    }
} else {
    header('location:logout.php');
    exit();
}
?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>Petrosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets1/images/favicon.ico">

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

<?php   
include('includes/sidebar.php'); 
?>
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Start right Content here -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card mt-n5">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                            <img src="../assets1/images/users/icon-profile-1.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <h5 class="fs-16 mb-1"><?php echo htmlentities($row['surname']); ?> <?php echo htmlentities($row['surname']); ?></h5>
                                        <p class="text-muted mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-xxl-9">
                            <div class="card mt-xxl-n5">
                            <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
    <div class="row">
        <div class="col-sm-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                    <i class="fas fa-home"></i> Personal Details
                </a>
            </li>
        </div>
        <div class="col-sm-6">
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                    <i class="far fa-user"></i>Change Password</a>
            </li>
        </div>
    </div>
</ul>

                                </div>
                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label">First Name</label>
                                                            <input type="text" class="form-control" id="firstnameInput" name="name" placeholder="Enter your firstname" value="<?php echo htmlentities($row['name']); ?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="lastnameInput" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" id="lastnameInput" name="surname" placeholder="Enter your lastname" value="<?php echo htmlentities($row['surname']); ?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="usernameInput" class="form-label">Username</label>
                                                            <input type="text" class="form-control" id="usernameInput" name="AdminUserName" placeholder="Enter your username" value="<?php echo htmlentities($row['AdminUserName']); ?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="emailInput" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" id="emailInput" name="AdminEmailId" placeholder="Enter your email" value="<?php echo htmlentities($row['AdminEmailId']); ?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="contactInput" class="form-label">Contact No</label>
                                                            <input type="text" class="form-control" id="contactInput" name="contact_no" placeholder="Enter your contact number" value="<?php echo htmlentities($row['contact_no']); ?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="addressInput" class="form-label">Physical Address</label>
                                                            <input type="text" class="form-control" id="addressInput" name="address" placeholder="Enter your physical address" value="<?php echo htmlentities($row['address']); ?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
    <div class="hstack gap-2 justify-content-end">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-soft-success" onclick="window.location.href='dashboard.php'">Cancel</button>
    </div>
</div>

                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                          


                                        <div class="tab-pane" id="changePassword" role="tabpanel">
                                        <form action="#" method="post">
    <div class="row g-2">
        <div class="col-lg-4">
            <div>
                <label for="oldpasswordInput" class="form-label">Old Password*</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="oldpasswordInput" name="oldPassword" placeholder="Enter current password">
                    <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword">
                        <i class="ri-eye-line"></i>
                    </button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div>
                <label for="newpasswordInput" class="form-label">New Password*</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="newpasswordInput" name="newPassword" placeholder="Enter new password">
                    <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                        <i class="ri-eye-line"></i>
                    </button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-4">
            <div>
                <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmpasswordInput" name="confirmPassword" placeholder="Confirm password">
                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                        <i class="ri-eye-line"></i>
                    </button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="mb-3">
                <a href="javascript:void(0);" class="link-primary text-decoration-underline">Forgot Password ?</a>
            </div>
        </div>
        <!--end col-->
        <div class="col-lg-12">
            <div class="text-end">
                <button type="submit" class="btn btn-success">Change Password</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</form>

<script>
    const toggleOldPassword = document.getElementById('toggleOldPassword');
    const toggleNewPassword = document.getElementById('toggleNewPassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

    toggleOldPassword.addEventListener('click', togglePasswordVisibility.bind(null, 'oldpasswordInput'));
    toggleNewPassword.addEventListener('click', togglePasswordVisibility.bind(null, 'newpasswordInput'));
    toggleConfirmPassword.addEventListener('click', togglePasswordVisibility.bind(null, 'confirmpasswordInput'));

    function togglePasswordVisibility(inputId) {
        const passwordInput = document.getElementById(inputId);
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.innerHTML = '<i class="ri-eye-off-line"></i>';
        } else {
            passwordInput.type = 'password';
            this.innerHTML = '<i class="ri-eye-line"></i>';
        }
    }
</script>


                                        </div>
                                        <!--end tab-pane-->
                                    </div>
                                    <!--end tab-content-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!-- JAVASCRIPT -->
    <script src="../assets1/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets1/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets1/libs/node-waves/waves.min.js"></script>
    <script src="../assets1/libs/feather-icons/feather.min.js"></script>
    <script src="../assets1/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="../assets1/js/plugins.js"></script>

    <!-- profile-setting init js -->
    <script src="../assets1/js/pages/profile-setting.init.js"></script>

    <!-- App js -->
    <script src="../assets1/js/app.js"></script>
</body>
</html>

