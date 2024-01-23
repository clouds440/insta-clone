<?php
    require_once "../dbConnection.php";

    $userId = $_SESSION['userId'];
    $pictureArrayUser = array();
    $descriptionArrayUser = array();

    $sqlSelect = "SELECT * FROM posts WHERE userId = '$userId'";
    if($result = mysqli_query($conn, $sqlSelect)) {
        if(mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()) {
                $pictureArrayUser[] = $row['picture'];
                $descriptionArrayUser[] = $row['description'];
              }
        }
    }

    $pictureArrayAll = array();
    $descriptionArrayAll = array();

    $sqlSelectAll = "SELECT * FROM posts";
    if($result = mysqli_query($conn, $sqlSelectAll)) {
        if(mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()) {
                $pictureArrayAll[] = $row['picture'];
                $descriptionArrayAll[] = $row['description'];
              }
        }
    }
    mysqli_close($conn);
?>