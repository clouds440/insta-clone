<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="graphics/icons/instagram_icon.png">
    <title>Instagram - Sign Up</title>
</head>
<body class="bg-dark">
    <?php
        session_start();

        // Check if session is started and on the register page
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
            <div class="navbar-brand font-weight-bold text-white font-lobster mt-1">
                <h1>Instagram</h1>
              </div>
            <form
            id="registrationForm"
            class="px-2 py-2 rounded border border-primary bg-light"
            action="registerationHandler.php"
            method="post"
            enctype="multipart/form-data">
                <div class="row">

                    <!-- Profile Picture -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fileUpload" name="fileUpload" accept="image/*" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose profile picture...</label>
                        <div class="invalid-feedback">Invalid file</div>
                    </div>
                        <img id="preview" src="#" alt="">
                    </div>

                    <!-- First Name -->
                    <div class="col-lg-6 mb-4">
                        <input
                        id="firstName"
                        type="text"
                        name="fname"
                        placeholder="First Name"
                        class="form-control bg-white border-md"
                        onkeypress="return validateName(event)"
                        onblur="fieldLeftEmpty('firstName')"
                        required>
                    </div>

                    <!-- Last Name -->
                    <div class="col-lg-6 mb-4">
                        <input
                        id="lastName"
                        type="text"
                        name="lname"
                        placeholder="Last Name"
                        class="form-control bg-white border-md"
                        onkeypress="return validateName(event)"
                        onblur="fieldLeftEmpty('lastName')"
                        required>
                    </div>

                    <!-- Email Address -->
                    <div class="col-lg-12 mb-4">
                        <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Email Address"
                        class="form-control bg-white border-md"
                        onblur="fieldLeftEmpty('email')"
                        required>
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <select
                        id="countryCode"
                        name="countryCode"
                        style="max-width: 80px"
                        class="custom-select form-control bg-white border-right-0 border-md h-100 font-weight-bold text-muted">
                            <option value="+92">+92</option>
                            <option value="+10">+10</option>
                            <option value="+15">+15</option>
                            <option value="+18">+18</option>
                            <option value="+12">+12</option>
                        </select>
                        <input
                        id="phoneNumber"
                        type="tel"
                        maxlength="10"
                        onkeypress="return isNumber(event)"
                        name="phone"
                        placeholder="Phone Number"
                        class="form-control bg-white border-md border-left-0 pl-3"
                        onblur="fieldLeftEmpty('phoneNumber')"
                        required>
                    </div>

                    <!-- Password -->
                    <div class="col-lg-12 mb-4">
                        <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="form-control bg-white border-md"
                        onblur="fieldLeftEmpty('password')"
                        required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-lg-12 mb-4">
                        <input
                        id="confirmPassword"
                        type="password"
                        name="confirmPassword"
                        placeholder="Confirm Password"
                        class="form-control bg-white border-md"
                        onblur="fieldLeftEmpty('confirmPassword')"
                        required>
                    </div>

                    <!-- Error Message -->
                    <div class="px-3 w-100 font-weight-bold">
                        <p id="errorMessage" style="color: red;"></p>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" onclick="validateForm()" class="btn btn-primary btn-block py-2">Create your account</button>
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
                        <p class="text-muted font-weight-bold">Already Registered? <a href="login.php" class="text-primary ml-2">Login</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script src="validations.js"></script>
</body>
</html>