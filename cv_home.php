<?php
///this is the database connection
include ("connections.php");
//declare han variables pati ha declare han error message
$household_id = $fname = $lname = $sex = $recorded_grade_level = $school_name = $municipality = $barangay = "";
$household_idErr = $fnameErr =$lnameErr = $sexErr = $recorded_grade_levelErr = $school_nameErr = $municipalityErr = $barangayErr = "";
///pag check kun blank it textbox tapos ma gawas error message
if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST["province"])) {
$provinceErr="Province is required!";
}else{
$province=$_POST["province"];
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
}
/////connection pag insert hin data ha tbl_students_beneficiary_profile
if($household_id && $fname && $lname && $sex && $recorded_grade_level && $school_name && $municipality && $barangay){
$query = mysqli_query($connections, "INSERT into tbl_students_beneficiary_profile(household_id, fname, lname, sex, recorded_grade_level, school_name, municipality, barangay)values('$household_id','$fname','$lname','$sex','$recorded_grade_level','$school_name','$municipality','$barangay')");
echo "<script language='javascript'>alert('New data was inserted')</script>";
echo "<script>window.location.href='student_masterlist.php';</script>";
}

////Pagpa gawas ht data tikang ha database to combo box
//query para han connection han dropdownlist han kanan tbl_reporting_period
$query1 = "SELECT period FROM tbl_reporting_period";
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
$query5 = "SELECT year FROM tbl_year";
$result5 = mysqli_query($connections, $query5);

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

<li class="active open">
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
<!-- will show the user account name owner -->
<img src="assets/images/avatar-1.png" alt="Peter"> <span class="username"><?php echo $row['name']; ?> <i class="ti-angle-down"></i></i></span>
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
<div class="main-content" >
<div class="wrap-content container" id="container">

<!-- start: DYNAMIC TABLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"><span class="text-bold">EDUCATION COMPLIANCE VERIFICATION</span> FORM</h5><hr>


<p>

<!-- Adi hea na codes para na han table kun ngain ka ma search han im ig uupdate -->
<fieldset>
<legend>To be filled out by School Head for non-attendance only</legend>
<div class="row">
<div class="col-md-6">
<div class="form-group"> <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<label>Name of School/Preschool/DCC<span class="symbol required"></span></label>
<select class="form-control" name="school_name" value="<?php echo $school_name; ?>">
<?php while($row1 = mysqli_fetch_array($result2)):;?>
<option><?php echo $row1['school_name'];?></option>
<?php endwhile;?>
</select><br>

<label>Barangay<span class="symbol required"></span></label>
<input type="text" class="form-control" name="barangay" value="<?php echo $barangay; ?>"><br>
<span class="error"><?php echo $barangayErr; ?></span>

<label>City/Municipality<span class="symbol required"></span></label>
<input type="text" class="form-control" name="municipality" value="<?php echo $municipality; ?>"><br>
<span class="error"><?php echo $municipalityErr; ?></span>

<label>Province<span class="symbol required"></span></label>
<input type="text" class="form-control" name="province" value="">
<span class="error"><?php echo $municipalityErr; ?></span>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<h1 align="right"><b>CV-F2</b></h1>
<h4 align="right">Education</h4><br>
<h5 align="right">Reporting Period:</h5>

<div class="col-md-6">
<select class="form-control" name="period" value="" align="right">
<?php while($row1 = mysqli_fetch_array($result1)):;?>
<option><?php echo $row1['period'];?></option>
<?php endwhile;?>
</select>
</div>

<div class="col-md-6">
<select class="form-control" name="year" value="" align="right">
<?php while($row1 = mysqli_fetch_array($result5)):;?>
<option><?php echo $row1['year'];?></option>
<?php endwhile;?>
</select>
</div>

<br>
<br>
<br>

<!-- table for non compliant count -->
<br>
<h5 align="center"><b>Total # of Non Compliant</b></h5>
<div class="col-md-6" >
<input type="text" class="form-control" name="" value="" align="">
</div>
<div class="col-md-6" >
<input type="text" class="form-control" name="" value="" align="">
</div>

<br><br>

</form>
</div>
</div>
</div>
<h5>
This form serves as a monitoring tool for the compliance with education. It contains the list of beneficiaries of ages
6-18 and 3-5 years old by school/preschool/day care center. The School Head must fill up this form to indicate the
non-attendance of students for the reporting months in their school. Submit this accomplished form to the Regional
Program Management Office through the City/Municipal Link or Social Welfare Assistant.
</h5>
<h5><b>Note to the School Head:</b></h5>
<h5>
<div class="col-md-6">1. Household ID No.</div> Number assigned to the Household by DSWD<br>
<div class="col-md-6">2. Household Member ID</div> Number assigned to the Household Member by DSWD<br>
<div class="col-md-6">3. Name of Student</div> Sorted by Last Name, First Name then by Recorded Grade Level<br>
<div class="col-md-6">4. Sex</div> Refers to biological make up of the Household Member<br>
<div class="col-md-6">5. Recorded Grade Level</div> Refers to the grade level of the student as recorded in the database<br>
<div class="col-md-6">6. Current Grade Level</div> Column provided for the school head to indicate the current grade level
of the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;student if the recorded grade level is incorrect<br>
<div class="col-md-6">7. Non-Attendance for the 2 month Reporting Period</div> Refers to the months covered by the report. Refer to notes at the end of the list<br>
<div class="col-md-6">8. Remarks</div> Write only the codes: 1, 2 or 3<br>
<div class="col-md-6">9. Non-Compliance with Deworming Requirement</div> Refers to the period covered by the report and applies only to
students at the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;elementary level. Refer to notes at the end of the list

<h5><b>Grade Level Codes:</b></h5>
1 - Grade 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8 - Grade 8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;29 - Highschool Graduate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;51 - Elementary ADM/ALS<br>
2 - Grade 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9 - Grade 9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;31 - 1st year College / Vocational&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;52 - Secondary ADM/ALS<br>
3 - Grade 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10 - Grade 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;32 - 2nd year College / Vocational&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;53 - SpEd Non-graded<br> 
4 - Grade 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11 - Grade 11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;33 - 3rd year College<br> 
5 - Grade 5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12 - Grade 12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;34 - 4th year College<br> 
6 - Grade 6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18 - Day Care&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;39 - College Graduate<br> 
7 - Grade 7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19 - Kinder&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;41 - Graduate Studies

<br><br>

<!-- table for no of schooldays -->
<h6 align="center">
<div class="col-md-6">
<div class="panel panel-white">
<table class="table table-bordered table-hover" id="sample-table-1">
<thead>
<tr>
<th>No. of Schooldays in a month</th>
<th>Maximum Allowance Absences per month**</th>
</tr>
</thead>
<tbody>
<tr>
<td>1-6</td>
<td>1</td>
</tr>
<tr>
<td>7-13</td>
<td>2</td>
</tr>
</tbody>
</table>
</div>
</div>
</h5>


<!-- Checkbox para ha deworming -->
<div class="checkbox clip-check check-primary">
<input type="checkbox" id="checkbox2" value="Yes">
<label for="checkbox2">
<h4><b>Was deworming conducted within these 2 months? (check if yes)</h4></b> 
</label>
</div>


<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">	
<thead>
<tr>
<th>Household ID</th>
<th>Household Member ID</th>
<th>Name of Student</th>
<th>Sex</th>
<th>Recorded Grade Level</th>
<th>School</th>
<th>Municipality</th>
<th>Barangay</th>
<th><b>ACTIONS</b></th>
</tr>
</thead>
<tbody>
<?php
$query = "SELECT CONCAT(lname, ', ', fname)AS fullname, id, household_id, household_member_id, sex, recorded_grade_level,school_name, municipality, barangay FROM tbl_students_beneficiary_profile ORDER BY recorded_grade_level";
$result4 = mysqli_query($connections, $query);
while($row = mysqli_fetch_assoc($result4)) {
$user_id = $row["id"];
$household_id = $row["household_id"];
$household_member_id = $row["household_member_id"];
$fullname = $row["fullname"];
$sex = $row["sex"];
$recorded_grade_level = $row["recorded_grade_level"];
$school_name = $row["school_name"];
$municipality = $row["municipality"];
$barangay = $row["barangay"];

echo "<tr>
<td>$household_id</td>
<td>$household_member_id</td>
<td>$fullname</td>
<td>$sex</td>
<td>$recorded_grade_level</td>
<td>$school_name</td>
<td>$municipality</td>
<td>$barangay</td>

<td><a href='update_student.php?id=$user_id'>Update</a></td>

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
