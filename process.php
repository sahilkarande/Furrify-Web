<?php
session_start();
$connection=mysqli_connect("localhost","root","","furrify") or die("Database connection failed");
$db = mysqli_select_db($connection,'furrify');




// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the values from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the user exists in the database
$sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // User exists, set session variable and redirect to homepage
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    header('Location: profile_view_photos.php');
} else {
    // User does not exist, display error message and redirect to login page
    $_SESSION['error_message'] = "Invalid username or password";
    header('Location: login.php');
}
mysqli_close($conn);
?>
