<?php

///this is the database connection
include ("connections.php");
//declare han variables pati ha declare han error message
$school_id = $school_name = "";
$school_idErr = $school_nameErr = "";
///pag check kun blank it textbox
if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST["school_id"])) {
$school_idErr="School ID is required!";
}else{
$school_id=$_POST["school_id"];
}

if(empty($_POST["school_name"])) {
$school_nameErr="School name is required!";
}else{
$school_name=$_POST["school_name"];

}
}
/////connection pag insert hin data ha tbl_students_beneficiary_profile
if($school_id && $school_name){
$query = mysqli_query($connections, "INSERT into tbl_schools(school_id, school_name)values('$school_id','$school_name')");
echo "<script language='javascript'>alert('New data was inserted')</script>";
echo "<script>window.location.href='school_list.php';</script>";
}

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

<li>
<a href="student_masterlist.php">
<div class="item-content">
<div class="item-media">
<i class="ti-location-pin"></i>
</div>
<div class="item-inner">
<span class="title"> Student Profiling </span>
</div>
</div>
</a>
</li>

<li class="active open">
<a href="school_list.php">
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
<a href="view_students_schools.php">
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
<!-- this is for the user account name -->
<img src="assets/images/avatar-1.png" alt=""> <span class="username"><?php echo $row['name']; ?> <i class="ti-angle-down"></i></i></span>
</a>
<ul class="dropdown-menu dropdown-dark">

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
<div class="main-content" >
<div class="wrap-content container" id="container">

<!-- start: DYNAMIC TABLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">SCHOOL <span class="text-bold">PROFILE</span></h5><hr>

<!-- I will start my codes here for dashboard -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="tabbable">
<ul id="myTab1" class="nav nav-tabs">
<li class="active">
<a href="#myTab1_example1" data-toggle="tab">
School Profiling
</a>
</li>
<li>
<a href="#myTab1_example2" data-toggle="tab">
School List and Updating
</a>
</li>
</ul>
<div class="tab-content">
<!-- I will start my Tab1 here -->

<div class="tab-pane fade in active" id="myTab1_example1">
<fieldset>
<legend>School Details</legend>
<div class="row">
<div class="col-md-6">
<div class="form-group"> <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<label>School ID<span class="symbol required"></span></label>
<input type="text" class="form-control" name="school_id" value="<?php echo $school_id; ?>"><br>
<span class="error"><?php echo $school_idErr; ?></span>
<label>School Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="school_name" value="<?php echo $school_name; ?>"><br>
<span class="error"><?php echo $school_nameErr; ?></span>
<button class="btn btn-primary btn-wide pull-right" type="submit" value="Save">
Register <i class="fa fa-arrow-circle-right"></i>
</button>

</div>
</div>
	
</form>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">

</div>
</div>
</div>
</div>								

<!-- I will end my Tab1 here -->
<div class="tab-pane fade" id="myTab1_example2">
<!--start the code for tab2-->
<!-- Code kun ngain magawas it data han ig uupdate -->
<p>

<!-- Adi hea na codes para na han table kun ngain ka ma search han im ig uupdate -->
<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
<thead>
<tr>
<th>School ID</th>
<th>School Name</th>

<th><b>ACTIONS</b></th>
</tr>
</thead>
<tbody>
<?php
$query = "SELECT id, school_id, school_name FROM tbl_schools ORDER BY school_name";
$result4 = mysqli_query($connections, $query);
while($row = mysqli_fetch_assoc($result4)) {
$user_id = $row["id"];
$school_id = $row["school_id"];
$school_name = $row["school_name"];


echo "<tr>
<td>$school_id</td>
<td>$school_name</td>


<td><a href='update_school_name.php?id=$user_id'>Update</a></td>

</tr>";
}

?>
<!-- end data table -->
</tbody>

</table>


<div class="row">
<div class="col-md-6">
<div class="form-group">

</div>
</div>
</div>


</div>
</div>
</div>
<!-- end: DYNAMIC TABLE -->
</p>

</div>

</div>
</div>
<p>
<a href="#myTab1_example1" class="btn btn-primary btn-o show-tab">
School Profiling
</a>
<a href="#myTab1_example2" class="btn btn-primary btn-o show-tab">
School List and Updating
</a>
</p>
</div>
</div>
</div>
<!-- I will start my codes here for dashboard -->

</div>
</div>
</div>
<!-- end: DYNAMIC TABLE -->

<!-- start: FOOTER -->
<footer>
<div class="footer-inner">
<div class="pull-left">
&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Panatawid Pamilyang Pilipino Program</span>. <span>All rights reserved</span>
</div>
<div class="pull-right">
<span class="go-top"><i class="ti-angle-up"></i></span>
</div>
</div>
</footer>
<!-- end: FOOTER -->

<!-- start: SETTINGS -->
<div class="settings panel panel-default hidden-xs hidden-sm" id="settings">
<button ct-toggle="toggle" data-toggle-class="active" data-toggle-target="#settings" class="btn btn-default">
<i class="fa fa-spin fa-gear"></i>
</button>
<div class="panel-heading">
Style Selector
</div>
<div class="panel-body">
<!-- start: FIXED HEADER -->
<div class="setting-box clearfix">
<span class="setting-title pull-left"> Fixed header</span>
<span class="setting-switch pull-right">
<input type="checkbox" class="js-switch" id="fixed-header" />
</span>
</div>
<!-- end: FIXED HEADER -->
<!-- start: FIXED SIDEBAR -->
<div class="setting-box clearfix">
<span class="setting-title pull-left">Fixed sidebar</span>
<span class="setting-switch pull-right">
<input type="checkbox" class="js-switch" id="fixed-sidebar" />
</span>
</div>
<!-- end: FIXED SIDEBAR -->
<!-- start: CLOSED SIDEBAR -->
<div class="setting-box clearfix">
<span class="setting-title pull-left">Closed sidebar</span>
<span class="setting-switch pull-right">
<input type="checkbox" class="js-switch" id="closed-sidebar" />
</span>
</div>
<!-- end: CLOSED SIDEBAR -->
<!-- start: FIXED FOOTER -->
<div class="setting-box clearfix">
<span class="setting-title pull-left">Fixed footer</span>
<span class="setting-switch pull-right">
<input type="checkbox" class="js-switch" id="fixed-footer" />
</span>
</div>
<!-- end: FIXED FOOTER -->
<!-- start: THEME SWITCHER -->
<div class="colors-row setting-box">
<div class="color-theme theme-1">
<div class="color-layout">
<label>
<input type="radio" name="setting-theme" value="theme-1">
<span class="ti-check"></span>
<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
</label>
</div>
</div>
<div class="color-theme theme-2">
<div class="color-layout">
<label>
<input type="radio" name="setting-theme" value="theme-2">
<span class="ti-check"></span>
<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
</label>
</div>
</div>
</div>
<div class="colors-row setting-box">
<div class="color-theme theme-3">
<div class="color-layout">
<label>
<input type="radio" name="setting-theme" value="theme-3">
<span class="ti-check"></span>
<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
</label>
</div>
</div>
<div class="color-theme theme-4">
<div class="color-layout">
<label>
<input type="radio" name="setting-theme" value="theme-4">
<span class="ti-check"></span>
<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
</label>
</div>
</div>
</div>
<div class="colors-row setting-box">
<div class="color-theme theme-5">
<div class="color-layout">
<label>
<input type="radio" name="setting-theme" value="theme-5">
<span class="ti-check"></span>
<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
</label>
</div>
</div>
<div class="color-theme theme-6">
<div class="color-layout">
<label>
<input type="radio" name="setting-theme" value="theme-6">
<span class="ti-check"></span>
<span class="split header"> <span class="color th-header"></span> <span class="color th-collapse"></span> </span>
<span class="split"> <span class="color th-sidebar"><i class="element"></i></span> <span class="color th-body"></span> </span>
</label>
</div>
</div>
</div>
<!-- end: THEME SWITCHER -->
</div>
</div>
<!-- end: SETTINGS -->
</div>

<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/DataTables/jquery.dataTables.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start:  JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/table-data.js"></script>
<script>
jQuery(document).ready(function() {
Main.init();
TableData.init();
});
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end:  JAVASCRIPTS -->
</body>
</html>
