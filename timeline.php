<?
session_start();
$connection=mysqli_connect("localhost","root","","furrify") or die("Database connection failed");
$db = mysqli_select_db($connection,'furrify');


if($_SERVER['REQUEST_METHOD'] == "POST"){
    print_r($_POST);
}

class Post 
{
    private $error = "";

    public function create_post($data)
    {
        if(empty($data['post']))
        {
            $post = addslashes($data['post']);
        }else
        {
            $this->error .= "Please type something to post!<br>";
        }
        return $this->error;
    }
}



?>

<!-- <?php

if(isset($_SESSION['user_id'])==false){

    header("Location: login.php");
}

?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Furrify</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <style> 

        /* Profile_page */
        body{
        //    background: url("https://static.vecteezy.com/system/resources/previews/002/266/253/original/cute-dog-puppy-head-cartoon-doodle-seamless-pattern-free-vector.jpg") repeat-x;
            background-repeat: repeat-x;
            background-repeat: repeat-y;
            background-position: center;
            background-size:contain;
        }
        .profile-cover {
            position: relative;
            z-index: 0;
        }
        
        .panel {
            margin-bottom: 30px;
            color: #696969;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.08);
        }
        
        .profile-cover__action {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            padding: 120px 30px 10px 153px;
            border-radius: 5px 5px 0 0;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: end;
            -webkit-box-pack: end;
            justify-content: flex-end;
            overflow: hidden;
            background: url(https://bootdey.com/img/Content/bg1.jpg) no-repeat;
            background-size: cover;
        }
        
        .profile-cover__action > .btn {
            margin-left: 10px;
            margin-bottom: 10px;
        }
        
        .profile-cover__img {
            position: absolute;
            top: 120px;
            left: 30px;
            text-align: center;
            z-index: 1;
        }
        
        .profile-cover__img > img {
            max-width: 120px;
            border: 5px solid #fff;
            border-radius: 50%;
        }
        
        .profile-cover__img > .h3 {
            color: #393939;
            font-size: 20px;
            line-height: 30px;
        }
        
        .profile-cover__img > img + .h3 {
            margin-top: 6px;
        }
        
        .profile-cover__info .nav {
            margin-right: 28px;
            padding: 15px 0 10px 170px;
            color: #999;
            font-size: 16px;
            line-height: 26px;
            font-weight: 300;
            text-align: center;
            text-transform: uppercase;
            -ms-flex-pack: end;
            -webkit-box-pack: end;
            justify-content: flex-end;
        }
        
        .profile-cover__info .nav li {
            margin-top: 13px;
            margin-bottom: 13px;
        }
        
        .profile-cover__info .nav li:not(:first-child) {
            margin-left: 30px;
            padding-left: 30px;
            border-left: 1px solid #eee;
        }
        
        .profile-cover__info .nav strong {
            display: block;
            margin-bottom: 10px;
            color: #e16123;
            font-size: 34px;
        }
        
        @media (min-width: 481px) {
            .profile-cover__action > .btn {
                min-width: 125px;
            }
        
            .profile-cover__action > .btn > span {
                display: inline-block;
            }
        }
        
        @media (max-width: 600px) {
            .profile-cover__info .nav {
                display: block;
                margin: 90px auto 0;
                padding-left: 30px;
                padding-right: 30px;
            }
        
            .profile-cover__info .nav li:not(:first-child) {
                margin-top: 8px;
                margin-left: 0;
                padding-top: 18px;
                padding-left: 0;
                border-top: 1px solid #eee;
                border-left-width: 0;
            }
        }
        
        .panel {
            margin-bottom: 30px;
            color: #696969;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.08);
        }
        
        .panel-heading {
            color: #393939;
            padding: 10px 20px;
            border-width: 0;
            border-radius: 0;
        }
        
        .panel-heading:after,
        .panel-heading:before {
            content: " ";
            display: table;
        }
        
        .panel-heading:after {
            clear: both;
        }
        
        .panel-title {
            float: left;
            margin-top: 3px;
            margin-bottom: 3px;
            font-size: 14px;
            line-height: 24px;
            font-weight: 700;
            text-transform: uppercase;
        }
        
        .panel-title select {
            border-width: 0;
            background-color: transparent;
            text-transform: uppercase;
        }
        
        .panel-title select option {
            text-transform: capitalize;
        }
        
        .panel-title .select2 {
            display: block;
            min-width: 200px;
        }
        
        .panel-title .select2-selection {
            height: auto;
            padding: 0;
            background-color: transparent;
            border-width: 0;
            border-radius: 0;
            overflow: hidden;
            white-space: nowrap;
        }
        
        .no-outlines .panel-title .select2-selection {
            outline: 0;
        }
        
        .panel-title .select2-selection .select2-selection__rendered {
            float: left;
            margin-right: 8px;
            padding: 0;
            line-height: inherit;
        }
        
        .panel-title .select2-selection .select2-selection__arrow {
            float: left;
            display: block;
            position: relative;
            top: auto;
            right: auto;
            width: auto;
            height: auto;
        }
        
        .panel-title .select2-selection .select2-selection__arrow:before {
            content: "\f107";
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
        }
        
        .panel-title .select2-container--open .select2-selection__arrow:before {
            content: "\f106";
        }
        
        .panel-heading .dropdown {
            float: right;
        }
        
        .panel-heading .dropdown .dropdown-toggle {
            margin: -10px -20px;
            padding: 10px 20px;
            color: #999;
            border-width: 0;
            font-size: 14px;
            line-height: 30px;
            cursor: pointer;
        }
        
        .panel-heading .dropdown .dropdown-toggle:after,
        .toolbar__nav > li > a > span {
            display: none;
        }
        
        .panel-heading .dropdown-menu {
            top: 30px !important;
            left: auto !important;
            right: -20px;
            margin: 0;
            padding: 10px 0;
            border-width: 0;
            border-radius: 4px 0 0 4px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.08);
            -webkit-transform: none !important;
            transform: none !important;
            z-index: 1001;
        }
        
        .panel-heading .dropdown-menu a {
            padding: 5px 15px;
            color: #999;
            font-size: 13px;
            line-height: 23px;
        }
        
        .panel-heading .dropdown-menu a:hover {
            color: #e16123;
        }
        
        .panel-heading .dropdown-menu i {
            min-width: 15px;
            margin-right: 6px;
            font-size: 11px;
            text-align: center;
        }
        
        .panel-subtitle {
            margin: 20px 0;
        }
        
        .panel-subtitle:first-child {
            margin-top: 0;
        }
        
        .panel-subtitle .h5 {
            color: #999;
            font-weight: 600;
        }
        
        .panel-subtitle .h5 small {
            color: #777;
        }
        
        .panel-body {
            padding: 20px;
        }
        
        .panel-content,
        .panel-social {
            position: relative;
            border-radius: 0 0 4px 4px;
        }
        
        .panel-content {
            border-top: 1px solid #eee;
            padding: 31px 20px 33px;
        }
        
        .panel-about table {
            width: 100%;
            word-break: break-word;
        }
        
        .panel-about table tr + tr td,
        .panel-about table tr + tr th {
            padding-top: 8px;
        }
        
        .panel-about table th {
            min-width: 120px;
            color: #2bb3c0;
            font-weight: 400;
            vertical-align: top;
        }
        
        .panel-about table th > i {
            min-width: 14px;
            margin-right: 8px;
            text-align: center;
        }
        
        .panel-social {
            padding: 0 20px 33px;
            z-index: 0;
        }
        
        .panel-heading + .panel-social {
            padding-top: 21px;
            border-top: 1px solid #eee;
        }
        
        .panel-social > .nav {
            -ms-flex-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
        }
        
        .panel-social > .nav > li:not(:last-child) {
            margin-right: 20px;
        }
        
        .panel-social > .nav > li > a {
            color: #ccc;
        }
        
        .panel-activity__status > .actions {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            padding: 10px 20px;
            background-color: #ebebea;
            border-style: solid;
            border-width: 0 1px 1px;
            border-color: #ccc;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        
        .btn-link {
            display: inline-block;
            color: inherit;
            font-weight: inherit;
            cursor: pointer;
            background-color: transparent;
        }
        
        button.btn-link {
            border-width: 0;
        }
        
        .panel-activity__status > .actions > .btn-group > .btn-link:not(:last-child) {
            margin-right: 25px;
        }
        
        .panel-activity__status > .actions > .btn-group > .btn-link {
            padding-left: 0;
            padding-right: 0;
            color: #9c9c9c;
        }
        
        .btn-info {
            background-color: #2bb3c0;
            border: none;
        }
        
        .btn-group,
        .btn-group-vertical {
            position: relative;
            display: -ms-inline-flexbox;
            display: inline-flex;
            vertical-align: middle;
        }
        
        .panel-activity__status > .actions > .btn-group {
            -ms-flex: 1;
            -webkit-box-flex: 1;
            flex: 1;
            font-size: 16px;
        }
        
        .panel-activity__list {
            margin: 60px 0 0;
            padding: 0;
            list-style: none;
        }
        
        .panel-activity__list,
        .panel-activity__list > li {
            position: relative;
            z-index: 0;
        }
        
        .panel-activity__list:before {
            content: " ";
            display: none;
            position: absolute;
            top: 20px;
            left: 35px;
            bottom: 0;
            border-left: 2px solid #ebebea;
        }
        
        .activity_list_icon {
            display: none;
            position: absolute;
            top: 2px;
            left: 0;
            min-width: 30px;
            color: #fff;
            background-color: #2bb3c0;
            border-radius: 50%;
            line-height: 30px;
            text-align: center;
        }
        
        .panel-activity__list,
        .panel-activity__list > li {
            position: relative;
            z-index: 0;
        }
        
        .activity_list_header {
            position: relative;
            min-height: 35px;
            padding-top: 4px;
            padding-left: 45px;
            color: #999;
            z-index: 0;
        }
        
        .activity_list_body {
            padding-top: 13px;
            padding-left: 43px;
        }
        
        .entry-content .gallery {
            margin: 0;
            list-style: none;
            padding: 0;
        }
        
        .entry-content .gallery,
        .m-error {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        
        .entry-content .gallery > li {
            padding-right: 20px;
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%;
        }
        
        .gallery > li img {
            max-width: 100%;
            height: auto;
        }
        
        .entry-content blockquote:last-child,
        p:last-child,
        table:last-child,
        ul:last-child {
            margin-bottom: 0;
        }
        
        .entry-content blockquote:last-child,
        p:last-child,
        table:last-child,
        ul:last-child {
            margin-bottom: 0;
        }
        
        .entry-content blockquote p:before {
            content: "\f10d";
            color: #999;
            margin-right: 12px;
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
            font-weight: 900;
        }
        
        .activity_list_header img {
            position: absolute;
            top: 0;
            left: 0;
            max-width: 35px;
            border-radius: 50%;
        }
        
        .activity_list_header a {
            color: #222;
            font-weight: 600;
        }
        
        .activity_list_footer {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            margin-top: 23px;
            margin-left: 43px;
            padding: 13px 8px 0;
            color: #999;
            border-top: 1px dotted #ccc;
        }
        
        .activity_list_footer a {
            color: inherit;
        }
        
        .activity_list_footer a + a {
            margin-left: 15px;
        }
        
        .activity_list_footer i {
            margin-right: 8px;
        }
        
        .activity_list_footer a:hover {
            color: #222;
        }
        
        .activity_list_footer span {
            margin-left: auto;
        }
        
        .panel-activity__list > li + li {
            margin-top: 51px;
        }
        
        .weather--panel {
            padding: 24px 20px 36px;
            border-radius: 5px;
            text-align: center;
        }
        
        .weather--title {
            font-size: 18px;
            line-height: 28px;
            font-weight: 600;
        }
        
        .weather--title .fa {
            margin-right: 5px;
            font-size: 30px;
            line-height: 40px;
        }
        
        .weather--info {
            margin-top: 14px;
            font-size: 46px;
            line-height: 56px;
        }
        
        .weather--info .wi {
            margin-right: 10px;
        }
        
        .bg-blue {
            background-color: #2bb3c0;
        }
        
        .bg-orange {
            background-color: #e16123;
        }
        
        .todo--panel .list-group,
        .user--list > li,
        .user--list > li > a {
            position: relative;
            z-index: 0;
        }
        
        .hero-height {
            max-height: 314px;
        }
        
        .hero-height .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
            background: rgb(233, 236, 238);
        }
        
        .todo--panel .list-group {
            margin-bottom: 0;
            padding-top: 23px;
            padding-bottom: 25px;
        }
        
        .todo--panel .list-group:before {
            content: " ";
            position: absolute;
            top: 0;
            left: 20px;
            right: 20px;
            border-top: 1px solid #eee;
        }
        
        .todo--panel .list-group-item {
            margin-top: 27px;
            padding: 0;
            border-width: 0;
        }
        
        li.list-group-item:first-child {
            margin-top: 0;
        }
        
        .todo--label {
            padding-left: 20px;
            padding-right: 30px;
            color: #696969;
            font-weight: 400;
        }
        
        .todo--input {
            display: none;
        }
        
        .todo--text {
            display: block;
            position: relative;
            padding-left: 39px;
            -webkit-transition: color 0.25s;
            transition: color 0.25s;
            cursor: pointer;
            z-index: 0;
        }
        
        .todo--input:checked + .todo--text {
            color: #999;
            text-decoration: line-through;
        }
        
        .todo--text:after,
        .todo--text:before {
            position: absolute;
            top: 50%;
            left: 0;
            margin-top: -10px;
            width: 20px;
            height: 20px;
            border-radius: 2px;
        }
        
        .todo--text:before {
            border: 1px solid #ccc;
            content: " ";
        }
        
        .todo--text:after {
            content: "\f00c";
            color: #fff;
            background-color: #009378;
            font-family: 'Nunito', sans-serif;
            font-size: 11px;
            line-height: 21px;
            font-weight: 700;
            text-align: center;
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            -webkit-transform: scale(0.3);
            transform: scale(0.3);
            -webkit-transition: opacity 0.25s linear, -webkit-transform 0.25s linear;
            transition: opacity 0.25s linear, transform 0.25s linear;
            transition: opacity 0.25s linear, transform 0.25s linear, -webkit-transform 0.25s linear;
        }
        
        .todo--input:checked + .todo--text:after {
            opacity: 1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
            -webkit-transform: scale(1);
            transform: scale(1);
        }
        
        .todo--remove {
            position: absolute;
            top: 50%;
            right: 20px;
            margin-top: -15px;
            color: #999;
            font-size: 18px;
            line-height: 28px;
        }
        
        .todo--panel .input-group {
            border-top: 1px solid #eee;
        }
        
        .todo--panel .form-control {
            height: auto;
            padding: 13px 20px 14px;
            border-width: 0;
        }
        
        .todo--panel .btn-link {
            padding: 12px 16px;
            color: #ccc;
            font-size: 28px;
            border-width: 0;
            text-decoration: none;
        }
        
        .feeds-panel {
            margin: 20px 20px 0;
            padding-top: 17px;
            padding-bottom: 23px;
            border-top: 1px solid #ebebea;
        }
        
        .feeds-panel li {
            position: relative;
            width: 100%;
            min-height: 20px;
            padding-left: 40px;
            z-index: 0;
        }
        
        .feeds-panel li a {
            color: #e16123;
        }
        
        .feeds-panel li + li {
            margin-top: 12px;
        }
        
        .bg-red {
            background-color: #ff4040;
        }
        
        .bg-green {
            background-color: #009378;
        }
        
        .comments-panel > ul > li:after,
        .comments-panel > ul > li:before,
        .feeds-panel li:after,
        .feeds-panel li:before {
            content: " ";
            display: table;
        }
        
        .comments-panel > ul > li:after,
        .feeds-panel li:after {
            clear: both;
        }
        
        .feeds-panel .time {
            float: right;
            margin-left: 5px;
            color: #ccc;
            font-style: italic;
        }
        
        .feeds-panel .fa {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 30px;
            border-radius: 2px;
            font-size: 12px;
            line-height: 30px;
            text-align: center;
        }
        
        .feeds-panel .text {
            color: #696969;
            line-height: 26px;
        }</style>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-1 px-lg-1 py-1 py-lg-0" >
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><img src="img\logo.png" style="padding-left: 60px; padding-right: 30px;">Furrify</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
               <a href="timeline.html" class="nav-item nav-link active ">Home</a> 
               <!-- feed section -->
               <!-- <a href="/index.html" class="nav-item nav-link">About</a> -->
               <a href="discussionforum.html" class="nav-item nav-link ">Discussion forums</a>
               <a href="timeline.html" class="nav-item nav-link">Meetups</a>
               <a href="marketplace.html" class="nav-item nav-link ">Marketplace</a>
               <!-- <a href="/index.html" class="nav-item nav-link">Content</a> -->
               <a href="eventsx.html" class="nav-item nav-link ">Events</a>
               <!-- <a href="/index.html" class="nav-item nav-link">Resources</a> -->
               <a href="Veterinarymain.html" class="nav-item nav-link ">Veterinary</a>

               <a href="timeline.html" class="nav-item nav-link">SAC</a>
               <a href="Lost&Found.html" class="nav-item nav-link">Lost & Found</a>
               <a href="profile_view_photos.php" class="nav-item nav-link">My Profile</a>

           </div>
               
            </div >
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">A Community Website for<br>Domestic pets</h1>
                        <!-- <div class="position-relative w-75 mx-auto animated slideInDown">
                            <button type="button" href="#section1" class="btn btn-primary rounded-pill py-2 px-4 " style="margin-top: 7px;">Go to Feed</button>
                        </div> -->
                        <style>
                            @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
        * {
        box-sizing: border-box;
        }
        
        
        
        .container2 {
        
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
       
        }
        
        .button-container {
        position: relative;
        }
        .button-container button {
        color: rgb(255, 255, 255) ;
        padding: 16px 35px;
        font-family: 'Nunito', sans-serif;
        font-size: 20px;
        background-color:  rgba(17, 158, 194 ); 
        border-color:  rgba(17, 158, 194 ) ;
        border-radius: 20px;
        cursor: pointer;
        position: relative;
        box-sizing: border-box;
        }
        .button-container:hover .dog {
        transform: translate(20px, -55px) rotate(15deg);
        transition-delay: 0.6s;
        }
        .button-container:hover .paw {
        transition-delay: 0.3s;
        right: -5px;
        }
        .button-container:hover .paw::after {
        transition-delay: 0s;
        left: 0;
        }
        .button-container:hover .paw.top {
        transition-delay: 0.4s;
        right: 40px;
        top: -8px;
        }
        .button-container:hover .tail {
        opacity: 1;
        transition-delay: 0.6s;
        }
        
        .dog {
        position: absolute;
        width: 55px;
        height: 55px;
        top: -2px;
        right: 1px;
        transform: translate(0, 0) rotate(0);
        transition: 0.3s transform cubic-bezier(0.33, 1, 0.68, 1);
        }
        .dog div {
        position: absolute;
        }
        .dog .tail {
        width: 10%;
        height: 35%;
        left: -50%;
        bottom: -34%;
        transform: rotate(-25deg);
        transition: 0.1s opacity;
        transition-delay: 0s;
        opacity: 0;
        }
        .dog .tail::after {
        content: "";
        position: absolute;
        transform-origin: bottom center;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50% 50% 0 0;
        background-color: #e1a46e;
        animation: infinite alternate tailSkew 0.3s cubic-bezier(0.65, 0, 0.35, 1);
        }
        @keyframes tailSkew {
        from {
        transform: skewX(15deg);
        }
        to {
        transform: skewX(-15deg);
        }
        }
        .dog .body {
        width: 70%;
        height: 50%;
        bottom: -20%;
        left: 50%;
        transform: translateX(-50%);
        background-color: #9f6a43;
        border-radius: 50% 50% 0 0;
        }
        .dog .head {
        width: 65%;
        height: 70%;
        bottom: 5%;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 80% 80% 60% 60%;
        background-color: #e1a46e;
        }
        .dog .nuzzle {
        width: 70%;
        height: 40%;
        bottom: 0%;
        left: 50%;
        transform: translateX(-50%);
        }
        .dog .nuzzle::before, .dog .nuzzle::after {
        content: "";
        width: 50%;
        height: 100%;
        display: inline-block;
        position: absolute;
        top: 0;
        left: 0;
        background-color: #c28e5f;
        border-radius: 70% 30% 50% 20%;
        z-index: 1;
        }
        .dog .nuzzle::after {
        left: auto;
        right: 0;
        transform: scaleX(-1);
        }
        .dog .mouth {
        width: 50%;
        height: 90%;
        border-radius: 100%;
        background-color: #111827;
        left: 50%;
        bottom: -20%;
        transform: translateX(-50%);
        }
        .dog .tongue {
        width: 50%;
        height: 50%;
        background-color: #ef4444;
        left: 50%;
        transform: translateX(-50%);
        bottom: 5%;
        border-radius: 50%;
        animation: 0.3s alternate tongueBounce infinite cubic-bezier(0.45, 0, 0.55, 1);
        }
        @keyframes tongueBounce {
        from {
        bottom: 20%;
        }
        to {
        bottom: 15%;
        }
        }
        .dog .nose {
        width: 30%;
        height: 20%;
        left: 50%;
        top: 0;
        transform: translateX(-50%);
        z-index: 10;
        }
        .dog .nose::before {
        content: "";
        width: 100%;
        height: 60%;
        top: -50%;
        left: 0;
        position: absolute;
        display: inline-block;
        background-color: #1f2937;
        border-radius: 1000px 1000px 0 0;
        }
        .dog .nose::after {
        content: "";
        width: 100%;
        height: 100%;
        top: 10%;
        left: 0;
        position: absolute;
        display: inline-block;
        background-color: #1f2937;
        border-radius: 0 0 1000px 1000px;
        }
        .dog .nose .nostrils {
        width: 90%;
        height: 100%;
        top: 0;
        z-index: 1;
        left: 50%;
        transform: translateX(-50%);
        }
        .dog .nose .nostrils::before {
        content: "";
        display: inline-block;
        width: 30%;
        left: 10%;
        height: 100%;
        position: absolute;
        background-color: #000;
        border-radius: 100%;
        }
        .dog .nose .nostrils::after {
        content: "";
        display: inline-block;
        width: 30%;
        right: 10%;
        height: 100%;
        position: absolute;
        background-color: #000;
        border-radius: 100%;
        }
        .dog .nose .highlight {
        top: -50%;
        left: 50%;
        width: 80%;
        height: 30%;
        transform: translateX(-50%);
        background-color: rgba(17, 158, 194 ) ;
        border-radius: 1000px 1000px 0 0;
        background: linear-gradient(rgba(17, 158, 194 ) , rgba(255, 255, 255, 0));
        opacity: 0.3;
        }
        .dog .eyes {
        width: 80%;
        height: 35%;
        top: 25%;
        transform: translateX(-50%);
        left: 50%;
        }
        .dog .eyes .left,
        .dog .eyes .right {
        border-radius: 1000px;
        background-color: #111;
        width: 25%;
        height: 52%;
        top: 50%;
        transform: translateY(-50%);
        }
        .dog .eyes .left::after,
        .dog .eyes .right::after {
        content: "";
        display: inline-block;
        position: absolute;
        width: 30%;
        height: 30%;
        background-color: #fff;
        opacity: 0.7;
        border-radius: 1000px;
        left: 15%;
        top: 15%;
        }
        .dog .eyes .left {
        left: 15%;
        }
        .dog .eyes .right {
        right: 15%;
        }
        .dog .ears {
        width: 90%;
        height: 90%;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        }
        .dog .ears div {
        width: 30%;
        height: 50%;
        left: 0;
        top: 0;
        background-color: #9f6a43;
        transform: rotate(15deg);
        border-radius: 60% 20% 80% 10%;
        z-index: 1;
        }
        .dog .ears div.right {
        transform: rotate(-15deg) scaleX(-1);
        left: auto;
        right: 0;
        }
        
        .paw {
        position: absolute;
        right: -20px;
        top: 15px;
        overflow: hidden;
        width: 20px;
        height: 20px;
        transition: 0.3s right cubic-bezier(0.33, 1, 0.68, 1);
        }
        .paw::after {
        content: "";
        position: absolute;
        left: -100%;
        top: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #e1a46e;
        transition: 0.3s left cubic-bezier(0.33, 1, 0.68, 1);
        transition-delay: 0.3s;
        }
        .paw.top {
        transform: rotate(-90deg);
        top: -20px;
        right: 40px;
        transition: 0.3s top cubic-bezier(0.33, 1, 0.68, 1);
        }
                        </style>
        <br><br>
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
                              <a href='profile_view_photos.php'>
                              <button>
                               My Profile
                              </button>
                            </a>
                              
                              <div class="paw"></div>
                              <div class="paw top"></div>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container" name="section1">
        <div class="col-lg-13">
            <div class="search-box center">
                <button class="btn-search"><i class="fas fa-search"></i></button>
                <input type="text" class="input-search" placeholder="Search People">
              </div>
            
            <style>
                *{
  box-sizing: border-box;
}

.search-box{
  width: fit-content;
  height: fit-content;
  position:relative;

}
.input-search{
  height: 50px;
  width: 50px;
  border-style: none;
  padding: 10px;
  font-size: 18px;
  letter-spacing: 2px;
  outline: none;
  border-radius: 25px;
  transition: all .5s ease-in-out;
  background-color: #119EC2;
  padding-right: 40px;
  color:black;
}
.input-search::placeholder{
  color:rgba(255,255,255,.5);
  font-size: 18px;
  letter-spacing: 2px;
  font-weight: 100;
}
.btn-search{
  width: 50px;
  height: 50px;
  border-style: none;
  font-size: 20px;
  font-weight: bold;
  outline: none;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  right: 0px;
  color:BLACK ;
  background-color:transparent;
  pointer-events: painted;  
}
.btn-search:focus ~ .input-search{
  width: 300px;
  border-radius: 50px;
  background-color: #119EC2;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
.input-search:focus{
  width: 300px;
  border-radius: 50px;
  background-color: #119EC2;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}



            </style>
            <br><br>
           
            <div class="panel">
                
                <div class="panel-content panel-activity">
                    <form method="post" action="#" class="panel-activity__status">
                    
                        <textarea name="user_activity" placeholder="Share what you've been up to..." class="form-control"></textarea>
                        
                        <div class="actions">
                            <div class="btn-group">
                                <button type="button" class="btn-link" title="" data-toggle="tooltip" data-original-title="Post an Image">
                                    <i class="fa fa-image"></i>
                                </button>
                                <button type="button" class="btn-link" title="" data-toggle="tooltip" data-original-title="Post an Video">
                                    <i class="fa fa-video-camera"></i>
                                </button>
                                <button type="button" class="btn-link" title="" data-toggle="tooltip" data-original-title="Post an Idea">
                                    <i class="fa fa-lightbulb-o"></i>
                                </button>
                                <button type="button" class="btn-link" title="" data-toggle="tooltip" data-original-title="Post an Question">
                                    <i class="fa fa-question-circle-o"></i>
                                </button>
                            </div>
                            <input id="post_button" type="submit" value="Post" class="btn btn-sm btn-rounded btn-info">
                            
                            <?php 

                            session_start();
                            include("Furrify-Web/index.php");
                        ?>
                            </button>
                        </div>
                    </form>
                    <ul class="panel-activity__list">
                        <li>
                            <i class="activity_list_icon fa fa-question-circle-o"></i>
                            <div class="activity_list_header">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                <a href="#">John Doe</a> Posted the question: <a href="#">How can I change my annual reports for the better effect?</a>
                            </div>
                            <div class="activity_list_body entry-content">
                                <p>
                                    <strong>Lorem ipsum dolor sit amet</strong>, consectetur adipisicing elit. Voluptatibus ab a nostrum repudiandae dolorem ut quaerat veniam asperiores, rerum voluptatem magni dolores corporis!
                                    <em>Molestiae commodi nesciunt a, repudiandae repellendus ea.</em>
                                </p>
                            </div>
                            <div class="activity_list_footer">
                                <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                                <a href="#"> <i class="fa fa-comments"></i>23</a>
                                <span> <i class="fa fa-clock"></i>2 hours ago</span>
                            </div>
                        </li>
                        <li>
                            <i class="activity_list_icon fa fa-question-circle-o"></i>
                            <div class="activity_list_header">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                <a href="#">John Doe</a> Posted the question: <a href="#">How can I change my annual reports for the better effect?</a>
                            </div>
                            <div class="activity_list_body entry-content">
                                <blockquote>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus ab a nostrum repudiandae dolorem ut quaerat veniam asperiores, rerum voluptatem magni dolores corporis! Molestiae commodi nesciunt a,
                                        repudiandae repellendus ea.
                                    </p>
                                </blockquote>
                            </div>
                            <div class="activity_list_footer">
                                <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                                <a href="#"> <i class="fa fa-comments"></i>23</a>
                                <span> <i class="fa fa-clock"></i>2 hours ago</span>
                            </div>
                        </li>
                        <li>
                            <i class="activity_list_icon fa fa-image"></i>
                            <div class="activity_list_header">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                <a href="#">John Doe</a> Uploaded 4 Image: <a href="#">Office Working Time</a>
                            </div>
                            <div class="activity_list_body entry-content">
                                <ul class="gallery">
                                    <li>
                                        <img src="img\s1.jpg" alt="" />
                                    </li>
                                    <li>
                                        <img src="img\s2.jpg" alt="" />
                                    </li>
                                    <li>
                                        <img src="img\s3.jpg" alt="" />                                    </li>
                                    <li>
                                        <img src="img\s4.jpg" alt="" />                                    </li>
                                </ul>
                            </div>
                            <div class="activity_list_footer">
                                <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                                <a href="#"> <i class="fa fa-comments"></i>23</a>
                                <span> <i class="fa fa-clock"></i>2 hours ago</span>
                            </div>
                        </li>
                        <li>
                            <i class="activity_list_icon fa fa-question-circle-o"></i>
                            <div class="activity_list_header">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                <a href="#">John Doe</a> Posted the question: <a href="#">How can I change my annual reports for the better effect?</a>
                            </div>
                            <div class="activity_list_body entry-content">
                                <blockquote>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus ab a nostrum repudiandae dolorem ut quaerat veniam asperiores, rerum voluptatem magni dolores corporis! Molestiae commodi nesciunt a,
                                        repudiandae repellendus ea.
                                    </p>
                                </blockquote>
                            </div>
                            <div class="activity_list_footer">
                                <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                                <a href="#"> <i class="fa fa-comments"></i>23</a>
                                <span> <i class="fa fa-clock"></i>2 hours ago</span>
                            </div>
                        </li>
                        <li>
                            <i class="activity_list_icon fa fa-lightbulb-o"></i>
                            <div class="activity_list_header">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                <a href="#">John Doe</a> bookmarked a page: <a href="#">Awesome Idea</a>
                            </div>
                            <div class="activity_list_footer">
                                <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                                <a href="#"> <i class="fa fa-comments"></i>23</a>
                                <span> <i class="fa fa-clock"></i>2 hours ago</span>
                            </div>
                        </li>
                    </ul>
                </div>
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
                    <img src="img\logo.png" height="90" alt=""
                         loading="lazy" />
                  </div>
            
              <p>
                Lorem ipsryrtyyum dolor sit amet consectetur adipisicing elit. Sunt
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
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        © 2023 Copyright:
        <a class="text-white" href="#"
           >Furrify.com</a
          >
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>