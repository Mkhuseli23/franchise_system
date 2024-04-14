



<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <!-- Head content goes here -->
</head>

<body>
    <!-- Body content goes here -->
</body>

</html>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 21:20:02 GMT -->
<head>

    <meta charset="utf-8" />
    <title>PetroSA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets1/images/PetroSAlogowhite (2).png">

    <!-- Layout config Js -->
    <script src="assets1/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets1/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets1/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets1/css/custom.min.css" rel="stylesheet" type="text/css" />
    <style>
    .auth-page-wrapper {
        position: relative;
        z-index: 0;
        overflow: hidden;
        background-color: transparent !important;
        background-image: url('assets1/images/Frenchise Reg page.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 100% ;
    }
</style>
<style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid black;
      padding: 4px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .fw-semibold {
      font-weight: 600;
    }

    .text-primary {
      color: #007bff;
    }

    .text-decoration-underline {
      text-decoration: underline;
    }
  </style>
  <style>
  a {
    color: white;
  }
</style>
</head>

<body>
<?php
$pid=0;
?>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles" style="background-image: url('assets1/images/.png'); background-size: 100% auto;">
            <!-- <div class="bg-overlay"></div> -->

            <!-- <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div> -->
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                               <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets1/images/PetroSa Logo traced rec white.png" alt="" height="50">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium text-white" style="font-size: 220pt;">Please use your credentials</p>


                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Velzon.</p>
                                </div>
                                <div class="p-2 mt-4">
                                <form action="signin.php" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <input type="email" name="AdminEmailId" class="form-control" id="AdminEmailId" placeholder="Enter email">
        <!-- <input type="email" id="AdminEmailId" name="AdminEmailId"> -->
    </div>
    
    <div class="mb-3">
        <div class="float-end">
            <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
        </div>
        <label class="form-label" for="password-input">Password</label>
        <div class="position-relative auth-pass-inputgroup mb-3">
    <input type="password" name="AdminPassword" class="form-control" id="AdminPassword" placeholder="Enter password">
    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon">
        <i class="ri-eye-fill align-middle"></i>
    </button>
</div>

    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
        <label class="form-check-label" for="auth-remember-check">Remember me</label>
    </div>

    <div class="mt-4">
    <button type="submit" name="login" class="btn btn-success w-100" style="color: white;"><strong>Sign In</strong></button>

    </div>

</form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                        <p class="mb-0" style="color: white;">Don't have an account ? <a href="signup.php" class="fw-semibold .text-primary text-decoration-underline" style="color: yellow;">Signup</a></p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="mb-0">&copy;
                        <script>document.write(new Date().getFullYear())</script> PetroSA. Crafted with <i class="mdi mdi-heart text-danger"></i> by IS department
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets1/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets1/libs/simplebar/simplebar.min.js"></script>
    <script src="assets1/libs/node-waves/waves.min.js"></script>
    <script src="assets1/libs/feather-icons/feather.min.js"></script>
    <script src="assets1/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets1/js/plugins.js"></script>

    <!-- particles js -->
    <script src="assets1/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="assets1/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="assets1/js/pages/password-addon.init.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("AdminPassword");
        const passwordAddon = document.getElementById("password-addon");

        // Toggle password visibility
        passwordAddon.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordAddon.innerHTML = '<i class="ri-eye-off-fill align-middle"></i>';
            } else {
                passwordInput.type = "password";
                passwordAddon.innerHTML = '<i class="ri-eye-fill align-middle"></i>';
            }
        });
    });
</script>

</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 21:20:03 GMT -->
</html>