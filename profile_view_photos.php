<?php
session_start();



// Check if user is logged in
if (!isset($_SESSION["userid"])) {
  header("Location: login.php"); // Redirect to login page if user is not logged in
  exit();
}

$connection = mysqli_connect("localhost", "root", "", "furrify") or die("Database connection failed");
$db = mysqli_select_db($connection, 'furrify');


// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get userid from session
$userid = $_SESSION["userid"];

// Query the database to get the user's first name and last name
$sql = "SELECT firstname, lastname FROM register WHERE userid = '$userid'";
$result = mysqli_query($connection, $sql);

// Check for errors
if (!$result) {
  die("Query failed: " . mysqli_error($connection));
}

// Display the user's first name and last name in HTML
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $full_name = $row["firstname"] . " " . $row["lastname"];
} else {
  echo "<p>No results found for user ID $userid</p>";
}

// Query the database to get the user's cover photo file path
$sql = "SELECT coverphoto FROM user_data WHERE userid = '$userid'";
$result = mysqli_query($connection, $sql);

// Check for errors
if (!$result) {
  die("Query failed: " . mysqli_error($connection));
}

// Retrieve the cover photo file path
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $coverphoto = $row["coverphoto"];

  // Store the cover photo file path in a session variable
  $_SESSION["coverphoto"] = $coverphoto;
} else {
  $_SESSION["coverphoto"] = ""; // Set default cover photo if none found
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Furrify</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <!-- Favicon -->
  <link href="img\logo.png" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css\style.css" rel="stylesheet">
</head>

<body>
  <!-- Spinner Start -->

  <!-- Spinner End -->

  <!-- Navbar & Hero Start -->
  <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
      <a href="" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><img src="img\logo.png" style="padding-left: 60px; padding-right: 30px;">Furrify</h1>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
          <a href="index.html" class="nav-item nav-link ">Home</a>
          <!-- feed section -->
          <!-- <a href="/index.html" class="nav-item nav-link">About</a> -->
          <a href="discussionforum.html" class="nav-item nav-link">Discussion forums</a>
          <a href="marketplace.html" class="nav-item nav-link ">Marketplace</a>
          <!-- <a href="/index.html" class="nav-item nav-link">Content</a> -->
          <a href="eventsx.html" class="nav-item nav-link ">Events</a>
          <!-- <a href="/index.html" class="nav-item nav-link">Resources</a> -->
          <a href="Veterinarymain.html" class="nav-item nav-link active">Veterinary</a>

          <a href="timeline.html" class="nav-item nav-link">SAC</a>
          <a href="Lost&Found.html" class="nav-item nav-link">Lost & Found</a>
          <a href="profile_view_photos.php" class="nav-item nav-link">My Profile</a>

        </div>
      </div>
    </nav>


    <div class="container-fluid bg-primary py-5 mb-5 hero-header" style="background-image: url('<?php echo $_SESSION["coverphoto"]; ?>');">


      <div class="container py-5">
        <div class="row justify-content-center py-5">
          <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
            <div class="wrapper">
              <img src="https://i.pinimg.com/474x/bb/23/85/bb23850fff6159c25e0592de567c355e.jpg" class="image--cover">
            </div>
            <h1 class="display-3 text-white animated slideInDown" style="color: #000;"><?php echo $full_name; ?></h1>
            </h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">MyProfile</li>
              </ol>
            </nav>
            <style>
              @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

              * {
                box-sizing: border-box;
              }
            </style>

            <div class="container2">
              <div class="button-container">
                <div class="dog">
                  <div class="tail"></div>
                  <div class="body"></div>
                  <div class="head">
                    <div class="eyes">
                      <div class="left"></div>
                      <div class="right"></div>
                    </div>
                    <div class="nuzzle">
                      <div class="mouth">
                        <div class="tongue"></div>
                      </div>
                      <div class="nose">
                        <div class="nostrils"></div>
                        <div class="highlight"></div>
                      </div>
                    </div>
                  </div>
                  <div class="ears">
                    <div class="left"></div>
                    <div class="right"></div>
                  </div>
                </div>
                <a href='logout.php'>
                  <button>
                    Log out
                  </button>
                </a>

                <div class="paw"></div>
                <div class="paw top"></div>
              </div>
            </div>
          </div>
          <form method="post" action="update_header_image.php" enctype="multipart/form-data"> <br><br>
            <input type="file" accept="image/*" name="header_image" class="btn btn-primary rounded-pill py-2 px-6 active" onchange="previewFile()" id="headerImageInput"> <br> <br>
            <input type="submit" class="btn btn-primary rounded-pill py-2 px-4 active" value="Update Header Image">
          </form>
        </div>




      </div>
    </div>
  </div>
  <!-- Navbar & Hero End -->

  <!-- Main Body -->
  <div class="text-center mb-5" style="font-size: 20px; word-spacing: 100px; color: black;">
    <a href="index.html">Timeline</a>
    <a href="profile_view_about.html">About</a>
    <a href="C:\XAMPP 2\htdocs\Furrify-Web\profile_view_photos.php">Friends</a>
    <a href="profile_view_photos.html">Photos</a>
    <a href="C:\xampp\htdocs\Furrify-Web\myprofile.html">Setting</a>
  </div>
  <!-- main body end -->

  <style>
    .gallery-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .gallery-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-bottom: 30px;
    }

    .gallery-item {
      width: calc((100% / 3) - 10px);
      margin-bottom: 10px;
      box-sizing: border-box;
      position: relative;
      overflow: hidden;
      cursor: pointer;
      height: 293px;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      display: block;
      border-radius: 5px;
      transition: transform 0.5s ease;
      object-fit: cover;
    }

    .gallery-item:after {
      content: "";
      display: block;
      padding-bottom: 100%;
    }

    .gallery-item .likes {
      position: absolute;
      bottom: 10px;
      left: 10px;
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 14px;
      font-weight: bold;
    }

    .gallery-item .likes i {
      margin-right: 5px;
    }

    /* add this style for the dark overlay */
    .gallery-item.active::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #000;
      opacity: 0.5;
      z-index: 1;
    }
  </style>
  <div class="gallery-container">
    <div class="gallery-row">
      <div class="gallery-item">
        <img src="https://i.pinimg.com/736x/d7/10/16/d71016198180dba7a566f77a31c36ea0.jpg" alt="Photo 1">
      </div>
      <div class="gallery-item">
        <img src="https://static.thehoneycombers.com/wp-content/uploads/sites/2/2021/02/Photo-by-Florencia-Potter-on-Unsplash-900x643.png" alt="Photo 2">
      </div>
      <div class="gallery-item">
        <img src="https://hips.hearstapps.com/hmg-prod/images/lizzie-ally-animals-to-follow-on-instagram-1568303611.jpg" alt="Photo 3">
      </div>
    </div>
    <div class="gallery-row">
      <div class="gallery-item">
        <img src="https://i.pinimg.com/originals/9f/46/e9/9f46e9c585e6eb818bc31c111d7d0cd7.jpg" alt="Photo 4">
      </div>
      <div class="gallery-item">
        <img src="https://hips.hearstapps.com/hmg-prod/images/norbert-animals-to-follow-on-instagram-1568303790.jpg" alt="Photo 5">
      </div>
      <div class="gallery-item">
        <img src="https://i.pinimg.com/originals/27/e9/6c/27e96c5c70e0884229247755b0671be2.jpg" alt="Photo 6">
      </div>
    </div>
  </div>


  <!-- Footer Start -->
  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class="col-lg-12">
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #ffce00">
      <!-- Grid container -->
      <div class="container">

        <hr class="my-5" />

        <!-- Section: Text -->
        <section class="mb-5">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
                <img src="img\logo.png" height="90" alt="" loading="lazy" />
              </div>

              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                distinctio earum repellat quaerat voluptatibus placeat nam,
                commodi optio pariatur est quia magnam eum harum corrupti
                dicta, aliquam sequi voluptate quas.
              </p>
            </div>
          </div>
        </section>
        <!-- Section: Text -->

        <!-- Section: Social -->
        <section class="text-center mb-5">
          <a href="" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-github"></i>
          </a>
        </section>
        <!-- Section: Social -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2023 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">Furrify.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


  <!-- JavaScript Libraries -->



  <!-- Template Javascript -->
  <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
  <script src="myprofile.js"></script>
</body>

</html>