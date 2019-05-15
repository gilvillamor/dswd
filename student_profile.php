<?php
///this is the database connection
include ("connections.php");
//this is for the header and body
include ("header.php");

//declare han variables pati ha declare han error message
$household_id = $fname = $lname = $sex = $recorded_grade_level = $school_name = $municipality = $barangay = "";
$household_idErr = $fnameErr =$lnameErr = $sexErr = $recorded_grade_levelErr = $school_nameErr = $municipalityErr = $barangayErr = "";
///pag check kun blank it textbox tapos ma gawas error message
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
}
/////connection pag insert hin data ha tbl_students_beneficiary_profile
if($household_id && $fname && $lname && $sex && $recorded_grade_level && $school_name && $municipality && $barangay){
$query = mysqli_query($connections, "INSERT into tbl_students_beneficiary_profile(household_id, fname, lname, sex, recorded_grade_level, school_name, municipality, barangay)values('$household_id','$fname','$lname','$sex','$recorded_grade_level','$school_name','$municipality','$barangay')");
echo "<script language='javascript'>alert('New data was inserted')</script>";
echo "<script>window.location.href='student_masterlist.php';</script>";
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
?>

<div class="main-content" >
<div class="wrap-content container" id="container">

<!-- start: DYNAMIC TABLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">STUDENT <span class="text-bold">PROFILE</span></h5><hr>

<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="tabbable">
<ul id="myTab1" class="nav nav-tabs">
<li class="active">
<a href="#myTab1_example1" data-toggle="tab">
Student Profiling
</a>
</li>
<li>
<a href="#myTab1_example2" data-toggle="tab">
Student List and Updating
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

<label>Household ID<span class="symbol required"></span></label>
<input type="text" class="form-control" name="household_id" value="<?php echo $household_id; ?>"><br>
<span class="error"><?php echo $household_idErr; ?></span>
<label>First Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>"><br>
<span class="error"><?php echo $fnameErr; ?></span>
<label>Last Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>"><br>
<span class="error"><?php echo $lnameErr; ?></span>

<label class="block"> Gender</label>
<div class="clip-radio radio-primary"> 
<input type="radio" id="female" name="sex" value="female"> <label for="female"> Female </label>
<input type="radio" id="male" name="sex" value="male" checked="checked">
<label for="male"> Male</label></div>

</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Grade Level<span class="symbol required"></span></label>
<select class="form-control" name="recorded_grade_level" value="<?php echo $recorded_grade_level; ?>">
<?php while($row1 = mysqli_fetch_array($result1)):;?>
<option><?php echo $row1['grade_level'];?></option>
<?php endwhile;?>
</select><br>

<label>School Name<span class="symbol required"></span></label>
<select class="form-control" name="school_name" value="<?php echo $school_name; ?>">
<?php while($row1 = mysqli_fetch_array($result2)):;?>
<option><?php echo $row1['school_name'];?></option>
<?php endwhile;?>
</select><br>

<label>Municipality<span class="symbol required"></span></label>
<select class="form-control" name="municipality" value="<?php echo $municipality; ?>">
<?php while($row1 = mysqli_fetch_array($result3)):;?>
<option><?php echo $row1['city'];?></option>
<?php endwhile;?>
</select><br>

<label>Barangay<span class="symbol required"></span></label>
<select class="form-control" name="barangay" value="<?php echo $barangay; ?>">
<?php while($row1 = mysqli_fetch_array($result4)):;?>
<option><?php echo $row1['barangay_name'];?></option>
<?php endwhile;?>
</select><br>


<button class="btn btn-primary btn-wide pull-right" type="submit" value="Save">
Register <i class="fa fa-arrow-circle-right"></i>
</button>	
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
<th>Household Member ID</th>
<th>Name</th>
<th>Sex</th>
<th>Grade Level</th>
<th>School</th>
<th>Municipality</th>
<th>Barangay</th>
<th><b>ACTIONS</b></th>
</tr>
</thead>
<tbody>
<?php
$query = "SELECT CONCAT(lname, ', ', fname)AS fullname, id, household_id, sex, recorded_grade_level,school_name, municipality, barangay FROM tbl_students_beneficiary_profile ORDER BY fname";
$result4 = mysqli_query($connections, $query);
while($row = mysqli_fetch_assoc($result4)) {
$user_id = $row["id"];
$household_id = $row["household_id"];
$fullname = $row["fullname"];
$sex = $row["sex"];
$recorded_grade_level = $row["recorded_grade_level"];
$school_name = $row["school_name"];
$municipality = $row["municipality"];
$barangay = $row["barangay"];

echo "<tr>
<td>$household_id</td>
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
<p>
<a href="#myTab1_example1" class="btn btn-primary btn-o show-tab">
Student Profiling
</a>
<a href="#myTab1_example2" class="btn btn-primary btn-o show-tab">
Update Student Profile
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
