<?php
    require_once "dbConnection.php";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['countryCode'] . $_POST['phone'];
    $password = $_POST['password'];

    $sqlSelect = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sqlSelect);
    if ($result->num_rows > 0) {
            echo "This email is already registered";
            return;
    }

    else {
        // Check if the image file is selected, then store it in the uploads directory
        if (isset($_FILES['fileUpload'])) {
            // Handle file upload
            $imgName = $_FILES['fileUpload']['name'];
            $imgTmpName = $_FILES['fileUpload']['tmp_name'];
            $error = $_FILES['fileUpload']['error'];
        
            // Check for upload errors
            if ($error !== UPLOAD_ERR_OK) {
                die("Upload failed with error code " . $error);
            }

            $imgExtension = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
            $newImgName = uniqid("IMG-", true) . '.' . $imgExtension;
        
            $imgUploadPath = 'uploads/' . $newImgName;
        
            move_uploaded_file($imgTmpName, $imgUploadPath);
        }

        // Write the SQL query to insert the data into the users table
        $sqlRegister = "INSERT INTO users (fname, lname, email, phone, password, profilepic) VALUES ('$fname', '$lname', '$email', '$phone', '$password', '$newImgName')";

        // Execute the register query
        if (mysqli_query($conn, $sqlRegister)) {

        // start a session with the user id
        session_start();
        $sqlSession = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sqlSession);
        $row = mysqli_fetch_assoc($result);

        // handle session variables
        $_SESSION['userId'] = $row["userId"];
        $_SESSION['name'] = $row["fname"] . " " . $row["lname"];
        $_SESSION['imgName'] = $row["profilepic"];

        // split the email at "@" to get the username
        $usernameArray = explode("@", $row['email']);
        $_SESSION['username'] = $usernameArray[0];
        
        // generate profile details for the new user
        $userId = $_SESSION['userId'];
        $sqlProfileDetails = "INSERT INTO profile_details (userId) VALUES ('$userId')";
        mysqli_query($conn, $sqlProfileDetails);

        // session for profile details
        $sqlDetails = "SELECT * FROM profile_details WHERE userId = '$userId'";
        $result = mysqli_query($conn, $sqlDetails);
        $rowDetails = mysqli_fetch_assoc($result);
        $_SESSION['postsCount'] = $rowDetails['postsCount'];
        $_SESSION['followers'] = $rowDetails['followers'];
        $_SESSION['following'] = $rowDetails['following'];
        $_SESSION['bio'] = $rowDetails['bio'];

        // redirect user to the main page, logged in
        echo "<script>";
        echo "alert('Registration Complete. Please Log In to continue.')";
        echo "</script>";
        header('Location: index.php');
        exit();
        }

        else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>