<?php
    require_once "dbConnection.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlSelect = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sqlSelect);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        // handle session variables
        session_start();
        $_SESSION['userId'] = $row["userId"];
        $_SESSION['name'] = $row["fname"] . " " . $row["lname"];
        $_SESSION['imgName'] = $row["profilepic"];
        
        // split the email at "@" to get the username
        $usernameArray = explode("@", $row['email']);
        $_SESSION['username'] = $usernameArray[0];

        // session for profile details
        $userId = $_SESSION['userId'];
        $sqlDetails = "SELECT * FROM profile_details WHERE userId = '$userId'";
        $result = mysqli_query($conn, $sqlDetails);
        $rowDetails = mysqli_fetch_assoc($result);
        $_SESSION['postsCount'] = $rowDetails['postsCount'];
        $_SESSION['followers'] = $rowDetails['followers'];
        $_SESSION['following'] = $rowDetails['following'];
        $_SESSION['bio'] = $rowDetails['bio'];

        // if "Save login info" is checked, create a coockie
        if (isset($_POST["save-login-info"])) {
            setcookie('email', $email, time() + (30 * 24 * 60 * 60), '/', '', false, false);
            setcookie('password', $password, time() + (30 * 24 * 60 * 60), '/', '', false, false);
        }

        else {
            setcookie('email', $email, time() - 3600, '/', '', false, false);
            setcookie('password', $password, time() - 3600, '/', '', false, false);
        }

        // redirect user to the main page, logged in
        header('Location: index.php');
        exit();
    }

    else {
        echo "<script>";
        echo "alert('Invalid username or password')";
        echo "</script>";
        header('refresh:0.1;url=login.php');
        exit();
        }
    mysqli_close($conn);
?>