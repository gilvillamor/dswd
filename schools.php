<?php
///this is the database connection
include ("connections.php");
//this is for the header and body
include ("header.php");

//declare han variables pati ha declare han error message
$school_name = $barangay_name = $municipality_name = $province_name = "";
$school_nameErr = $barangay_nameErr = $municipality_nameErr =$province_nameErr = "";
///pag check kun blank it textbox tapos ma gawas error message
if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST["school_name"])) {
$school_nameErr="This data is required!";
}else{
$school_name=$_POST["school_name"];
}

if(empty($_POST["barangay_name"])) {
$barangay_nameErr="This data is required!";
}else{
$barangay_name=$_POST["barangay_name"];
}

if(empty($_POST["municipality_name"])) {
$municipality_nameErr="This data is required!";
}else{
$municipality_name=$_POST["municipality_name"];
}

if(empty($_POST["province_name"])){
$province_nameErr="This data is required!";
}else{
$province_name=$_POST["province_name"];
}
}
/////connection pag insert hin data ha tbl_students_beneficiary_profile
if($school_name && $barangay_name && $municipality_name && $province_name ){
$query = mysqli_query($connections, "INSERT into tbl_schools(school_name, barangay_name, municipality_name, province_name)values('$school_name','$barangay_name','$municipality_name','$province_name')");
echo "<script language='javascript'>alert('New data was inserted')</script>";
echo "<script>window.location.href='schools.php';</script>";
}

////Pagpa gawas ht data tikang ha database to combo box

//query para han connection han dropdownlist han kanan tbl_grade_level
$query2 = "SELECT barangay_name FROM tbl_barangay";
$result2 = mysqli_query($connections, $query2);
//query para han connection han dropdownlist han kanan tbl_municipality
$query3 = "SELECT municipality_name FROM tbl_municipality";
$result3 = mysqli_query($connections, $query3);
//query para han connection han dropdownlist han kanan tbl_school na dapat name la han schools it magawas
$query4 = "SELECT province_name FROM tbl_province";
$result4 = mysqli_query($connections, $query4);
?>

<div class="main-content" >
<div class="wrap-content container" id="container">

<!-- start: DYNAMIC TABLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">SCHOOL <span class="text-bold">DETAILS</span></h5><hr>

<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="tabbable">
<ul id="myTab1" class="nav nav-tabs">
<li class="active">
<a href="#myTab1_example1" data-toggle="tab">
Schools
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
<legend>Student Details</legend>
<div class="row">
<div class="col-md-6">
<div class="form-group"> <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<label>School Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="school_name" value="<?php echo $school_name; ?>"><br>
<span class="error"><?php echo $school_nameErr; ?></span>

<label>Barangay Name<span class="symbol required"></span></label>
<select class="form-control" name="barangay_name" value="<?php echo $barangay_name; ?>">
<?php while($row1 = mysqli_fetch_array($result2)):;?>
<option><?php echo $row1['barangay_name'];?></option>
<?php endwhile;?>
</select><br>

<label>Municipality<span class="symbol required"></span></label>
<select class="form-control" name="municipality_name" value="<?php echo $municipality_name; ?>">
<?php while($row1 = mysqli_fetch_array($result3)):;?>
<option><?php echo $row1['municipality_name'];?></option>
<?php endwhile;?>
</select><br>

<label>Province<span class="symbol required"></span></label>
<select class="form-control" name="province_name" value="<?php echo $province_name; ?>">
<?php while($row1 = mysqli_fetch_array($result4)):;?>
<option><?php echo $row1['province_name'];?></option>
<?php endwhile;?>
</select><br>


<button class="btn btn-primary btn-wide pull-right" type="submit" value="Save">
Register <i class="fa fa-arrow-circle-right"></i>
</button>	

</div>
</div>

<div class="col-md-6">
<div class="form-group">

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
<th>School Name</th>
<th>Barangay</th>
<th>Municipality</th>
<th>Province</th>
<th><b>ACTIONS</b></th>
</tr>
</thead>
<tbody>
<?php
$query = "SELECT id,school_name,barangay_name,municipality_name,province_name FROM tbl_schools ORDER BY school_name";
$result4 = mysqli_query($connections, $query);
while($row = mysqli_fetch_assoc($result4)) {
$user_id = $row["id"];
$school_name = $row["school_name"];
$barangay_name = $row["barangay_name"];
$municipality_name = $row["municipality_name"];
$province_name = $row["province_name"];

echo "<tr>
<td>$school_name</td>
<td>$barangay_name</td>
<td>$municipality_name</td>
<td>$province_name</td>

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
Update School Details
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

<!-- for footer -->
<?php
include ("footer.php");
?>

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
