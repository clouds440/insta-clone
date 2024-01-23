<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="graphics/icons/instagram_icon.png">
    <title>Instagram - Log In</title>
</head>
<body class="bg-dark">
    <?php
        session_start();

        // Check if session is started and on the login page
        if (isset($_SESSION['userId'])) {
            header("Location: index.php");
            exit();
        }
    ?>
<div class="container">
    <div class="row py-5s align-items-center">
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="phone image" class="img-fluid mb-3 d-none d-md-block">
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <div class="navbar-brand font-weight-bold text-white font-lobster mt-5">
                <h1>Instagram</h1>
              </div>
            <form class="mt-2 px-2 py-2 rounded border border-primary bg-light" action="loginHandler.php" method="post">
                <div class="row">

                    <!-- Email Address -->
                    <div class="col-lg-12 mb-4">
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-md" required>
                    </div>

                    <!-- Password -->
                    <div class="col-lg-12 mb-4">
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-md" required>
                    </div>

                    <!-- Stay logged in -->
                    <div class="custom-control custom-checkbox mb-4 mx-auto">
                        <input type="checkbox" class="custom-control-input" id="save-login-info" name="save-login-info" checked>
                        <label class="custom-control-label" for="save-login-info">Save login info</label>
                        <div class="invalid-feedback">Your login info will not be saved</div>
                    </div>

                    <!-- Error Message -->
                    <div class="px-3 w-100 font-weight-bold">
                        <p id="errorMessage" style="color: red;"></p>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <input type="submit" value="Log In" class="btn btn-primary btn-block py-2"/>
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    <!-- Social Login -->
                    <div class="form-group col-lg-12 mx-auto">
                        <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                            <i class="fa fa-facebook-f mr-2"></i>
                            <span class="font-weight-bold">Continue with Facebook</span>
                        </a>
                    </div>

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Don't have an account? <a href="register.php" class="text-primary ml-2">Sign Up</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php
    // check if a user has saved their login info
    if (isset($_COOKIE['email'])) {
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];
        echo "<script>document.addEventListener('DOMContentLoaded', function() { document.getElementById('email').value = '$email'; document.getElementById('password').value = '$password'; });</script>";
    }
?>
</body>
</html>