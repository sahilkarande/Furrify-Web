<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["userid"])) {
    header("Location: login.php"); // Redirect to login page if user is not logged in
    exit();
}

// Check if a file was uploaded
if (isset($_FILES["coverphoto"])) {
    $userid = $_SESSION["userid"];
    
$connection = mysqli_connect("localhost", "root", "", "furrify") or die("Database connection failed");
$db = mysqli_select_db($connection, 'furrify');


    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Save the uploaded file to the server
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["coverphoto"]["name"]);
    move_uploaded_file($_FILES["coverphoto"]["tmp_name"], 
    $target_file);

    // Insert the new header image into the database
    $sql = "INSERT INTO user_data (userid, photos, description, coverphoto, profilephoto, created_at)
            VALUES ('$userid', '$target_file', 'coverphoto', '0', '0', NOW())";
    $result = mysqli_query($connection, $sql);

    // Check for errors
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Redirect back to the previous page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
} else {
    // No file was uploaded, redirect back to the previous page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>