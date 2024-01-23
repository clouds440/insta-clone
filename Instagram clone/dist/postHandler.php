<?php
    require_once "dbConnection.php";

    if (isset($_FILES['postUpload'])) {
        // Handle file upload
        $imgName = $_FILES['postUpload']['name'];
        $imgTmpName = $_FILES['postUpload']['tmp_name'];
        $error = $_FILES['postUpload']['error'];
    
        // Check for upload errors
        if ($error !== UPLOAD_ERR_OK) {
            die("Upload failed with error code " . $error);
        }

        $imgExtension = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $newImgName = uniqid("IMG-", true) . '.' . $imgExtension;
    
        $imgUploadPath = 'uploads/' . $newImgName;
    
        move_uploaded_file($imgTmpName, $imgUploadPath);
    }
    session_start();
    $userId = $_SESSION['userId'];
    $description = $_POST['postDescription'];
    // Write the SQL query to insert the data into the users table
    $stmt = $conn->prepare("INSERT INTO posts (userId, picture, description) VALUES (?, ?, ?)");

    // Bind the variables to the placeholders
    $stmt->bind_param("iss", $userId, $newImgName, $description);
    $sqlPostCount = "UPDATE `profile_details` SET `postsCount` = `postsCount` + 1 WHERE `userId` = $userId";

    // Execute the query using the mysqli_query function
    if ($stmt->execute() && mysqli_query($conn, $sqlPostCount)) {
        $_SESSION['postsCount'] += 1;
        $stmt->close();

    header('Location: index.php');
    exit();
    }

    else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>