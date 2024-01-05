<?php
// Start the session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the database
    $connection = mysqli_connect("localhost", "root", "", "furrify") or die("Database connection failed");
    $db = mysqli_select_db($connection, 'furrify');

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query the database for the user
    $query = "SELECT * FROM register WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    // Check if the user was found
    if (mysqli_num_rows($result) == 1) {
        // Save the user data in the session
        $user = mysqli_fetch_assoc($result);
        $_SESSION["userid"] = $user["userid"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["firstname"] = $user["firstname"];
        // Redirect to the dashboard
        header("Location: profile_view_photos.php");
        exit();
    } else {
        // Show an error message
        echo "Invalid username or password";
    }

    if ($email == "email" && $password == "password") {
        header("Location: profile_view_photos.php");
        exit;
    } else {
        echo "Invalid username or password";
    }



    // Close the database connection
    mysqli_close($connection);
}
?>

<html>
<title>Login</title>
<!-- If you ever use this tell me and show me ! @kryze :) -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v18/vendor/bootstrap/css/bootstrap.min.css">
    <link href="login/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login/style.css" />

    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image">
            </div>


            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">LOGIN!</h3>
                                <form action="login.php" method="post">
                                    <div class="form-group mb-3">
                                        <input id="inputEmail" type="email" name="email" placeholder="Email address" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4 ">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="inputPassword" type="password" name="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>

                                    <p class="text-center">Don’t have an account? <a href="Register.php">Create One</a></p>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                    </div>

                                    <form action="process.php" method="post">
                                        <!-- other form fields go here -->
                                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">
                                    </form>
                                    <div class="text-center d-flex justify-content-between mt-4">

                                        <p class="w-100 text-center" style="color:rgb(0, 0, 0);">&mdash; Or Sign In With &mdash;</p>


                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
</body>

</html>


<div class="col-lg-10 col-xl-7 mx-auto">