<?php

///this is the database connection
include ("connections.php");
//declare han variables pati ha declare han error message
$household_id = $fname = $lname = $sex = $recorded_grade_level = $school_name = $municipality = $barangay = $school_coordinator_other = $swa_name ="";
$household_idErr = $fnameErr =$lnameErr = $sexErr = $recorded_grade_levelErr = $school_nameErr = $municipalityErr = $barangayErr = $school_coordinator_nameErr = $school_coordinator_otherErr = $swa_nameErr = "";
///pag check kun blank it textbox
if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST["household_id"])) {
$household_idErr="Household ID is required!";
}else{
$household_id=$_POST["household_id"];
}

if(empty($_POST["fname"])) {
$fnameErr="First Name is required!";
}else{
$fname=$_POST["fname"];

}

if(empty($_POST["lname"])){
$lnameErr="Last Name is required!";
}else{
$lname=$_POST["lname"];
}

if(empty($_POST["sex"])) {
$sexErr="Please state the gender!";
}else{
$sex=$_POST["sex"];
}

if(empty($_POST["recorded_grade_level"])) {
$recorded_grade_levelErr="Please state the grade level required!";
}else{
$recorded_grade_level=$_POST["recorded_grade_level"];
}

if(empty($_POST["school_name"])) {
$school_nameErr="Please state the grade level required!";
}else{
$school_name=$_POST["school_name"];
}

if(empty($_POST["municipality"])) {
$municipalityErr="Please state the grade level required!";
}else{
$municipality=$_POST["municipality"];
}

if(empty($_POST["barangay"])) {
$barangayErr="Please state the grade level required!";
}else{
$barangay=$_POST["barangay"];
}

if(empty($_POST["school_coordinator_name"])) {
$school_coordinator_nameErr="Please state School Coordinator's Name!";
}else{
$school_coordinator_name=$_POST["school_coordinator_name"];
}
if(empty($_POST["school_coordinator_other"])) {
$school_coordinator_otherErr="Please state Teacher's Name!";
}else{
$school_coordinator_other=$_POST["school_coordinator_other"];
}
if(empty($_POST["swa_name"])) {
$swa_nameErr="Please state Your DSWD School Representative!";
}else{
$swa_name=$_POST["swa_name"];
}
}

////Pagpa gawas ht data tikang ha database to combo box
//query para han connection han dropdownlist han kanan tbl_grade_level
$query1 = "SELECT grade_level FROM tbl_grade_level";
$result1 = mysqli_query($connections, $query1);
//query para han connection han dropdownlist han kanan tbl_grade_level
$query2 = "SELECT school_name FROM tbl_schools";
$result2 = mysqli_query($connections, $query2);
//query para han connection han dropdownlist han kanan tbl_municipality
$query3 = "SELECT * FROM tbl_municipality";
$result3 = mysqli_query($connections, $query3);
//query para han connection han dropdownlist han kanan tbl_school na dapat name la han schools it magawas
$query4 = "SELECT barangay_name FROM tbl_barangay";
$result4 = mysqli_query($connections, $query4);
//query para han connection han dropdownlist han kanan tbl_reporting_period
$query5 = "SELECT * FROM tbl_reporting_period";
$result5 = mysqli_query($connections, $query5);
//query para han connection han dropdownlist han kanan tbl_remarks
$query6 = "SELECT * FROM tbl_remarks";
$result6 = mysqli_query($connections, $query6);
//query para han connection han dropdownlist han kanan tbl_school_coordinator
$query7 = "SELECT * FROM tbl_school_coordinator group by school_coordinator_name";
$result7 = mysqli_query($connections, $query7);
//query para han connection han dropdownlist han kanan tbl_swa
$query8 = "SELECT * FROM tbl_swa group by swa_name";
$result8 = mysqli_query($connections, $query8);

///name han naka log in ha system na ginkuha ha table han users
include('session.php'); 
$result=mysqli_query($connections, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);


$user_id=$_REQUEST["id"];

$user_id;

include ("connections.php");

$get_record=mysqli_query ($connections, "SELECT * FROM tbl_students_beneficiary_profile WHERE id='$user_id'");

while($row_edit=mysqli_fetch_assoc($get_record)) {


$db_household_id=$row_edit["household_id"];
$db_fname=$row_edit["fname"];
$db_lname=$row_edit["lname"];
$db_sex=$row_edit["sex"];
$db_recorded_grade_level=$row_edit["recorded_grade_level"];
$db_school_name=$row_edit["school_name"];
$db_municipality=$row_edit["municipality"];
$db_barangay=$row_edit["barangay"];
}

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

<li>
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

<li class="active open">
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
<img src="assets/images/avatar-1.png" alt=""> <span class="username"><?php echo $row['name']; ?> <i class="ti-angle-down"></i></i></span>
</a>
<ul class="dropdown-menu dropdown-dark">

<li>
<a href="index.php">
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
<h5 class="over-title margin-bottom-15"><span class="text-bold">COMPLIANCE VERIFICATION</span> FORM</h5><hr>

<!-- I will start my codes here for dashboard -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="tabbable">
<ul id="myTab1" class="nav nav-tabs">
<li class="active">
<a href="#myTab1_example1" data-toggle="tab">

</a>
</li>
</ul>
<div class="tab-content">

<!-- Mytab1 only kay para updating la ine hea -->
<div class="tab-pane fade in active" id="myTab1_example1">
<!--start the code for tab2-->
<!-- Code kun ngain magawas it data han ig uupdate -->
<p>
<fieldset>
<legend>CV Form</legend>
<div class="row">
<div class="col-md-6">
<div class="form-group"> 

<form method="POST" action="cv_recording.php">
<!-- ine na code gin hide ko an bali id ito hea na ada database -->
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" value="<?php echo date('Y');?>" name="new_year">


<label>Select Reporting Period<span class="symbol required"></span></label>  
<select class="form-control" name="new_period" value="<?php echo $db_period; ?>">
<?php while($row1 = mysqli_fetch_array($result5)):;?>
<option><?php echo $row1['period'];?></option>
<?php endwhile;?>
</select><br>

<label>Household ID<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_household_id" value="<?php echo $db_household_id; ?>"readonly><br>

<label>First Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_fname" value="<?php echo $db_fname; ?>"readonly><br>

<label>Last Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_lname" value="<?php echo $db_lname; ?>"readonly><br>

<label>Gender<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_sex" value="<?php echo $db_sex; ?>"readonly><br>

<label>School Coordinator Names<span class="symbol required"></span></label>
<select class="form-control" name="new_school_coordinator_name" value="<?php echo $db_school_coordinator_name; ?>">
<?php while($row1 = mysqli_fetch_array($result7)):;?>
<option><?php echo $row1['school_coordinator_name'];?></option>
<?php endwhile;?>
</select><br>

<label>If coordinator name is not available above please state it below <span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_school_coordinator_other" value="<?php echo $school_coordinator_other; ?>"><br>
<span class="error"><?php echo $school_coordinator_otherErr; ?></span>

</div>
</div>

<!-- Ha akun ine comboboxes na nga codes second row -->
<div class="col-md-6">
<div class="form-group">

<label>Select Student Remarks<span class="symbol required"></span></label>
<select class="form-control" name="new_remarks" value="<?php echo $db_remarks; ?>">
<?php while($row1 = mysqli_fetch_array($result6)):;?>
<option><?php echo $row1['remarks'];?></option>
<?php endwhile;?>
</select><br>

<label>Grade Level<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_recorded_grade_level" value="<?php echo $db_recorded_grade_level; ?>"readonly><br>

<label>School<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_school_name" value="<?php echo $db_school_name; ?>" readonly><br>

<label>Municipality<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_municipality" value="<?php echo $db_municipality; ?>"readonly><br>

<label>Barangay<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_barangay" value="<?php echo $db_barangay; ?>" readonly><br>

<div class="checkbox clip-check check-primary">
<input type="checkbox" name="new_school_deworming" id="checkbox2" value="Yes">
<label for="checkbox2">
Student is compliant in school deworming for this period?
</label>
</div><br>

<label>Select your DSWD School Representative<span class="symbol required"></span></label>
<select class="form-control" name="new_swa_name" value="<?php echo $db_swa_name; ?>">
<?php while($row1 = mysqli_fetch_array($result8)):;?>
<option><?php echo $row1['swa_name'];?></option>
<?php endwhile;?>
</select><br>

<button class="btn btn-primary btn-wide pull-right" type="submit" value="Save">
Save <i class="fa fa-arrow-circle-right"></i>
</button>

<a href="view_students_schools.php"><button type="button" class="btn btn-primary btn-wide pull-left">
<i class="fa fa-arrow-circle-left"></i> Back </button></a>	

</form>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">

</div>
</div>
</div>
</fieldset>						

</div>
</div>
</div>
<!-- end: DYNAMIC TABLE -->
</p>

</div>

</div>
</div>
<p>
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
