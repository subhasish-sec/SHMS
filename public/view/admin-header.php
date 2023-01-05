<?php
    session_start();
    // if user not login then all pages can not access except login page
    is_not_login($_SESSION['action'],'index.php');

//    echo "<pre>";
//    print_r($_SERVER);
    // echo $_SERVER['REQUEST_URI'];
    // $dirs = explode('/', $_SERVER['REQUEST_URI']);
    // echo $dirs[3];
// Var_dump($dirs[3]);
    
    // die();
    $page = pageTitle($_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title><?php  echo $page;  ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo assetsUrl('admin/assets/img/favicon.png')?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/bootstrap.min.css')?>" />

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/font-awesome.min.css')?>" />

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/feathericon.min.css')?>" />

    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/plugins/morris/morris.css')?>" />
    <!-- toastr css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo assetsUrl('admin/assets/css/style.css')?>" />

    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        <div class="header">
            <!-- Logo -->
            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="<?php echo assetsUrl('admin/assets/img/logo.png')?>" alt="Logo" />
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="<?php echo assetsUrl('admin/assets/img/logo-small.png')?>" alt="Logo" width="30"
                        height="30" />
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here" />
                    <button class="btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">
                <!-- Notifications -->
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="<?php echo assetsUrl('admin/assets/img/doctors/doctor-thumb-01.jpg')?>" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Dr. Ruby Perrin</span>
                                                    Schedule
                                                    <span class="noti-title">her appointment</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="<?php echo assetsUrl('admin/assets/img/patients/patient1.jpg')?>" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Charlene Reed</span> has
                                                    booked her appointment to
                                                    <span class="noti-title">Dr. Ruby Perrin</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="<?php echo assetsUrl('admin/assets/img/patients/patient2.jpg')?>" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Travis Trimble</span> sent
                                                    a amount of $210 for his
                                                    <span class="noti-title">appointment</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="<?php echo assetsUrl('admin/assets/img/patients/patient3.jpg')?>" />
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details">
                                                    <span class="noti-title">Carl Kelly</span> send a
                                                    message
                                                    <span class="noti-title"> to his doctor</span>
                                                </p>
                                                <p class="noti-time">
                                                    <span class="notification-time">12 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle"
                                src="<?php echo assetsUrl('admin/assets/img/profiles/avatar-01.jpg')?>" width="31"
                                alt="Ryan Taylor" /></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="<?php echo assetsUrl('admin/assets/img/profiles/avatar-02.jpg')?>"
                                    alt="User Image" class="user-img" />
                            </div>
                            <div class="user-text">
                                <h6><?php echo ucfirst($_SESSION['username']); ?></h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <a class="dropdown-item" href="logout.php?req=logout">Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->
            </ul>
            <!-- /Header Right Menu -->
        </div>
        <!-- /Header -->