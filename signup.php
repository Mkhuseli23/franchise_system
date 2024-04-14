<?php
include('includes/config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
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
        background-position: center center;
    }
</style>

</head>
<body>
<!-- 
<?php
$tbluser_id = $_GET['tbluser_id'];
echo "access here: " . $tbluser_id;
?> -->

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles" style="background-image: url('assets1/images/png');">
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
                <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                               <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets1/images/PetroSa Logo traced rec white.png" alt="" height="40">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium text-white" style="font-size: 220pt;">Please use your credentials</p>


                        </div>
                    <!-- Your existing content here -->
                </div>
                <!-- Registration form -->
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-12 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">New User Account</h5>
                                    <p class="text-muted"></p>
                                </div>
                                <div class="p-2 mt-4">
                                <?php
$pid=0;
?>
                                    <form id="registrationForm" action="endpoint/add-user.php" method="POST" onsubmit="return validateForm()">
                                    <div class="row">
    <div class="col-md-6 mb-3">
        <label for="useremail" class="form-label">Name<span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" id="useremail" placeholder="Enter name" required>
        <div class="invalid-feedback">
            Please enter name
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <label for="userfname" class="form-label">Surname<span class="text-danger">*</span></label>
        <input type="text" name="surname" class="form-control" id="userfname" placeholder="Enter surname" required>
        <div class="invalid-feedback">
            Please enter surname
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="AdminEmailId" class="form-control" id="useremail" placeholder="Enter email" required>
            <div class="invalid-feedback">
                Please enter a valid email
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="contactno" class="form-label">Contact No <span class="text-danger">*</span></label>
            <input type="text" name="contact_no" class="form-control" id="contactno" placeholder="Enter contact number" required>
            <div class="invalid-feedback">
                Please enter contact number
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="useremail" class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" name="AdminUserName" class="form-control" placeholder="Username" required>
            <div class="invalid-feedback">
                Please enter a valid username
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label" for="password-input">Password <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="password" name="AdminPassword" class="form-control" id="password-input" placeholder="Enter password" required>
                <button class="btn btn-outline-secondary" type="button" id="toggle-password">Show</button>
            </div>
            <div id="password-strength" class="form-text"></div>
            <div class="invalid-feedback">
                Please enter a password
            </div>
        </div>
    </div>
</div>



                                        <!-- Add other form fields here -->
                                        <input type="checkbox" id="captcha_checkbox" name="captcha_checkbox" required>
                                        <label for="captcha_checkbox">I'm not a robot</label><br>
                                        <div class="mb-3 text-end">
                                            <button type="submit" name="submit" class="btn btn-primary" id="nextButton" disabled>Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                        <p class="mb-0" style="color: white;">Already have an account ? <a href="login.php" class="fw-semibold .text-primary text-decoration-underline" style="color: yellow;"> Sign in </a> </p>
</div>
                    </div>
                </div>
            </div>
        </div>

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
    <script src="assets1/libs/particles.js/particles.js"></script>
    <script src="assets1/js/pages/particles.app.js"></script>
    <script src="assets1/js/pages/form-validation.init.js"></script>
    <script src="assets1/js/pages/passowrd-create.init.js"></script>
    <script>
        // JavaScript function to validate the form submission
        function validateForm() {
            var userInput = document.getElementById("userInput").value;
            // Check if the user input matches a specific value (e.g., "human")
            if (userInput.toLowerCase() === "human") {
                // Allow the form submission
                return true;
            } else {
                // Display an alert and prevent form submission
                alert("Please prove that you're human by typing 'human' in the box.");
                return false;
            }
        }

        // Disable "Next" button until checkbox is checked
        document.getElementById("captcha_checkbox").addEventListener("change", function() {
            document.getElementById("nextButton").disabled = !this.checked;
        });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var passwordInput = document.getElementById('password-input');
    var passwordStrength = document.getElementById('password-strength');
    
    passwordInput.addEventListener('input', function() {
        var password = passwordInput.value;
        var strength = 0;
        
        // Check the length of the password
        if (password.length >= 8) {
            strength += 1;
        }
        
        // Check if the password contains both upper and lower case characters
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) {
            strength += 1;
        }
        
        // Check if the password contains at least one number
        if (/\d/.test(password)) {
            strength += 1;
        }
        
        // Check if the password contains at least one special character
        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            strength += 1;
        }
        
        // Display the password strength
        if (strength === 0) {
            passwordStrength.innerHTML = 'Password Strength: Weak';
        } else if (strength === 1) {
            passwordStrength.innerHTML = 'Password Strength: Fair';
        } else if (strength === 2) {
            passwordStrength.innerHTML = 'Password Strength: Medium';
        } else if (strength === 3) {
            passwordStrength.innerHTML = 'Password Strength: Strong';
        } else {
            passwordStrength.innerHTML = 'Password Strength: Very Strong';
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var passwordInput = document.getElementById('password-input');
    var toggleButton = document.getElementById('toggle-password');
    
    toggleButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.textContent = 'Hide';
        } else {
            passwordInput.type = 'password';
            toggleButton.textContent = 'Show';
        }
    });
});
</script>

</body>
</html>
