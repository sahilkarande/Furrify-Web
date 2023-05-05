<?php
$connection=mysqli_connect("localhost","root","","furrify") or die("Database connection failed");
$db = mysqli_select_db($connection,'furrify');
$userid = mysqli_insert_id($connection);
session_start();






if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confpass = $_POST['confpass'];
    $roles = $_POST['roles'];

    // Check if the email already exists
    $sql = "SELECT * FROM register WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $present = mysqli_num_rows($result);

    if ($present > 0) {
        $_SESSION['email_alert'] = '1';
        header("Location: Register.php");
        exit;
    } else {
        // Check if the same email and UserID already exists
        $sql = "SELECT * FROM register WHERE email = '$email' AND userID = '$userid'";
        $result = mysqli_query($connection, $sql);
        $present = mysqli_num_rows($result);

        if ($present > 0) {
            $_SESSION['email_alert'] = '1';
            header("Location: Register.php");
            exit;
        } else {
         
            
            // Insert the new record
            $query = "INSERT INTO `register` (firstname, lastname, email, username, password, confpass, roles) 
                      VALUES ('$firstname', '$lastname', '$email', '$username', '$password','$confpass', '$roles')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                $_SESSION['success'] = 'You have been successfully registered as a user.';
                header("Location: login.php");
                exit;
            } else {
                $_SESSION['error'] = 'Data not saved, please try again.';
                header("Location: Register.php");
                exit;
            }
        }
    }
}

// Show error message if email already exists
if (isset($_SESSION['email_alert'])) {
    $message = 'Email ID already exists.';
    echo "<script type='text/javascript'>alert('$message');</script>";
    unset($_SESSION['email_alert']);
}



?>


<html>
    <title>Register</title>
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
  
            <style>
                h4{
                    color: red;
                    text-align: center;
                }
            </style>


          <!-- The content half -->
          <div class="col-md-6 bg-light">
              <div class="login d-flex align-items-center py-5">
  
                  <!-- Demo content-->
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-10 col-xl-7 mx-auto">
                              <h3 class="display-4">Register</h3>
                              <form role="form" method="post">
                                  <div class="form-group mb-3">
                                      <input required id="inputfirstname" type="firstname" name="firstname" placeholder="Firstname" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4 ">
                                  </div>
                                  <div class="form-group mb-3">
                                      <input required id="inputlastname" type="lastname" name="lastname"  placeholder="Lastname" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                  </div>
                                  <div class="form-group mb-3">
                                      <input required id="inputemail" type="email" name="email" placeholder="Email" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="form-group mb-3">
                                    <input required id="inputusername" type="username" name="username" placeholder="Username" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="form-group mb-3">
                                    <input required id="inputpassword" type="password" name="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="form-group mb-3">
                                    <input required id="inputconfpassword" type="confpass" name="confpass" placeholder="Confirm Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <p id="message"></p>
                                <div class="form-group mb-3">
                                    <select required name="roles" class="text-black/70 bg-white px-3 py-2 transition-all cursor-pointer hover:border-blue-600/30 border border-gray-200 rounded-lg outline-blue-600/50 appearance-none invalid:text-black/30 w-64">
                                        <option value="">Roles</option>
                                        <option value="dog">Dog</option>
                                        <option value="cat">Cat</option>
                                        <option value="rabbit">Rabbit</option>
                                        </select>
                                </div>
  


                                <script src="js\main.js"></script>

                                  <p class="text-center">Have an account?<a href="login.php">Login</a></p>


                                  <div class="custom-control custom-checkbox mb-3">
                                      <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                  </div>
                                  <button type="submit"  onclick="checkPassword()" value="SUBMIT" name="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                  <div class="text-center d-flex justify-content-between mt-4">

                                    <p class="w-100 text-center" style="color:rgb(0, 0, 0);">&mdash; Or Sign In With &mdash;</p>
                                

                              </form>
                          </div>
                          <?php unset($_SESSION['email_alert']); ?>
                      </div>
                  </div><!-- End -->
  
              </div>
          </div><!-- End -->
  
      </div>
  </div>
  </body>

</html>
