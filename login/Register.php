<?php
session_start();
$connection=mysqli_connect("localhost","root","","furrify") or die("Database connection failed");
$db = mysqli_select_db($connection,'furrify');


if (isset($_POST['submit']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confpass = $_POST['confpass'];
    $roles = $_POST['roles'];

    
    $sql="SELECT * from register Where Email='$email'";
    $result=mysqli_query($connection, $sql);
    $present=mysqli_num_rows($result) ;

    if($present>0)
    {
        $_SESSION['email_alert']=='1';
        header("Location:Register.php");
    }

    else
    {
        if($password ==  $confpass)
    {
        $encrypted_password=hash('md5',$password);
        $query = "INSERT INTO `register` (firstname, lastname, email, username, password, roles) VALUES ('$firstname', '$lastname', '$email', '$username','$roles','$encrypted_password')";
    $query_run = mysqli_query($connection,$query);

    header("Location:login.php");

    if($query_run)
    {
        echo '<script> type="text/javascript"> alert("You have been Successfully Registered as User.") </script>';
    }

    else 
    {
        echo '<script> type="text/javascript"> alert("Data not Saved, please try again.") </script>';

    }
    }
    else{
        echo '<script> type="text/javascript"> alert("Please Reconfirm the password") </script>';
    }

    }

}
 
$message='';
if(isset($_SESSION['email_alert'])){
    $message='email ID Already Exist';
}

?>


<html>
    <title>Register</title>
  <!-- If you ever use this tell me and show me ! @kryze :) -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <body>
    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v18/vendor/bootstrap/css/bootstrap.min.css">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    
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
                              <h4><?php echo $message; ?></h4>
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

                                  <p class="text-center">Don’t have an account? <a href="sign-up.php">Create One</a></p>
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
