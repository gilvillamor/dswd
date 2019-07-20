<?php
///name han naka log in ha system na ginkuha ha table han users
include('session.php'); 
$result=mysqli_query($connections, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
<title>DSWD 4P'S</title>
<!-- start: META -->
<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="" name="description" />
<meta content="" name="author" />
<!-- end: META -->
<!-- start: GOOGLE FONTS -->
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
<!-- end: GOOGLE FONTS -->
<!-- start: MAIN CSS -->
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
<!-- end: MAIN CSS -->
<!-- start: CLIP-TWO CSS -->
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/plugins.css">
<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
<!-- end: CLIP-TWO CSS -->
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<link href="vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
</head>
<!-- end: HEAD -->
<body>
<div id="app">
<!-- sidebar -->
<div class="sidebar app-aside" id="sidebar">
<div class="sidebar-container perfect-scrollbar">
<nav>

<!-- start: MAIN NAVIGATION MENU -->
<div class="navbar-title">
<span>Main Navigation</span>
</div>
<ul class="main-navigation-menu">
<li>
<a href="dashboard.php">
<div class="item-content">
<div class="item-media">
<i class="ti-home"></i>
</div>
<div class="item-inner">
<span class="title"> Dashboard </span>
</div>
</div>
</a>
</li>
<li>


<a href="student_profile.php">
<div class="item-content">
<div class="item-media">
<i class="ti-user"></i>
</div>
<div class="item-inner">
<span class="title"> Student Profiling </span>
</div>
</div>
</a>
</li>

<li>
<a href="schools.php">
<div class="item-content">
<div class="item-media">
<i class="ti-location-pin"></i>
</div>
<div class="item-inner">
<span class="title"> Schools </span>
</div>
</div>
</a>
</li>

<li>
<a href="cv_home.php">
<div class="item-content">
<div class="item-media">
<i class="ti-pie-chart"></i>
</div>
<div class="item-inner">
<span class="title"> Compliance Verification Form </span>
</div>
</div>
</a>
</li>
<li>
<a href="user_list.php">
<div class="item-content">
<div class="item-media">
<i class="ti-user"></i>
</div>
<div class="item-inner">
<span class="title"> User Account </span>
</div>
</div>
</a>
</li>
</ul>
<!-- end: MAIN NAVIGATION MENU -->

</nav>
</div>
</div>
<!-- / sidebar -->
<div class="app-content">
<!-- start: TOP NAVBAR -->
<header class="navbar navbar-default navbar-static-top">
<!-- start: NAVBAR HEADER -->
<div class="navbar-header">
<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
<i class="ti-align-justify"></i>
</a>
<a class="" href="#">
<img src="images/dswdlogo.png" width="130" height="62" />
</a>
<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
<i class="ti-align-justify"></i>
</a>
<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<i class="ti-view-grid"></i>
</a>
</div>
<!-- end: NAVBAR HEADER -->
<!-- start: NAVBAR COLLAPSE -->
<div class="navbar-collapse collapse">
<ul class="nav navbar-left">
<br>
<img src="images/dswd_words.png" height="25" />
</ul>
<ul class="nav navbar-right">


<!-- start: USER OPTIONS DROPDOWN -->
<li class="dropdown current-user">
<a href class="dropdown-toggle" data-toggle="dropdown">
<!-- will show the user account name owner -->
<img src="assets/images/avatar-1.png" alt="DSWD"> <span class="username"><?php echo $row['name']; ?> <i class="ti-angle-down"></i></i></span>
</a>
<ul class="dropdown-menu dropdown-dark">
<li>
<li>
<a href="logout.php">
Log Out
</a>
</li>
</ul>
</li>
<!-- end: USER OPTIONS DROPDOWN -->
</ul>
<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
<div class="arrow-left"></div>
<div class="arrow-right"></div>
</div>
<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
</div>
<a class="dropdown-off-sidebar" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">
&nbsp;
</a>
<!-- end: NAVBAR COLLAPSE -->
</header>
<!-- end: TOP NAVBAR -->