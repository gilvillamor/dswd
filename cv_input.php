<?php

///this is the database connection
include ("connections.php");
//this is for the header and body
include ("header.php");

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
//query para han connection han dropdownlist han kanan tbl_grade_level
$query9 = "SELECT * FROM tbl_grade_level group by grade_level";
$result9 = mysqli_query($connections, $query9);




$user_id=$_REQUEST["id"];

$user_id;

include ("connections.php");

$get_record=mysqli_query ($connections, "SELECT * FROM tbl_students_beneficiary_profile WHERE id='$user_id'");

while($row_edit=mysqli_fetch_assoc($get_record)) {


$db_household_id=$row_edit["household_id"];
$db_household_member_id=$row_edit["household_member_id"];
$db_fname=$row_edit["fname"];
$db_lname=$row_edit["lname"];
$db_sex=$row_edit["sex"];
$db_recorded_grade_level=$row_edit["recorded_grade_level"];
$db_school_name=$row_edit["school_name"];
$db_municipality=$row_edit["municipality"];

}

?>

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
<legend>To be filled out by School Head for non-attendance only</legend>
<div class="row">
<div class="col-md-6">
<div class="form-group"> 

<form method="POST" action="cv_recording.php">
<!-- ine na code gin hide ko an bali id ito hea na ada database -->
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<input type="hidden" value="<?php echo date('Y');?>" name="new_year">

<!-- checkbox ine hea para ha compliant ba hea hit usa ka month ngan ha ubos it ika 2 na month  -->
<label><i>Please check the 1st Month box if the child did not reach 85% for the 1st Month and check the 2nd Month box if the student didn't reach 85% for the 2nd Month.</i><span class="symbol required"></span></label>
<div class="checkbox clip-check check-primary">
<input type="checkbox" name="1st_month" id="checkbox1" value="Non-compliant 1st month">
<label for="checkbox1">
1st Month
</label>

<input type="checkbox" name="2nd_month" id="checkbox2" value="Non-compliant 2nd month">
<label for="checkbox2">
2nd Month
</label>
</div><br>

<!-- para deworming -->
<label><i>Please check the box if the student is non-compliant in deworming for 2 months</i><span class="symbol required"></span></label>
<div class="checkbox clip-check check-primary">
<input type="checkbox" name="new_school_deworming" id="checkbox3" value="Non-compliant deworming">
<label for="checkbox3">
Non-Compliance with Deworming Requirement for 2 months
</label>
</div><br>

<label>Select the Current Grade Level</label>
<label><i>Applicable if the grade level recorded is incorrect</i></label>
<select class="form-control" name="new_current_grade_level" value="<?php echo $db_current_grade_level; ?>">
<?php while($row1 = mysqli_fetch_array($result9)):;?>
<option><?php echo $row1['grade_level'];?></option>
<?php endwhile;?>
</select><br>

<label>Select Student Remarks<span class="symbol required"></span></label>
<select class="form-control" name="new_remarks" value="<?php echo $db_remarks; ?>">
<?php while($row1 = mysqli_fetch_array($result6)):;?>
<option><?php echo $row1['remarks'];?></option>
<?php endwhile;?>
</select><br>

<label>School Coordinator Names<span class="symbol required"></span></label>
<select class="form-control" name="new_school_coordinator_name" value="<?php echo $db_school_coordinator_name; ?>">
<?php while($row1 = mysqli_fetch_array($result7)):;?>
<option><?php echo $row1['school_coordinator_name'];?></option>
<?php endwhile;?>
</select><br>

<label>If coordinator name is not available above please state it below <span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_school_coordinator_other" value="<?php echo $school_coordinator_other; ?>"><br>
<span class="error"><?php echo $school_coordinator_otherErr; ?></span>

<label>Select your DSWD School Representative<span class="symbol required"></span></label>
<select class="form-control" name="new_swa_name" value="<?php echo $db_swa_name; ?>">
<?php while($row1 = mysqli_fetch_array($result8)):;?>
<option><?php echo $row1['swa_name'];?></option>
<?php endwhile;?>
</select><br>

</div>
</div>


<!-- Ha akun ine comboboxes na nga codes second row -->
<fieldset><legend>Student Details</legend>
<label>Household ID <span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_household_id" value="<?php echo $db_household_id; ?>"readonly><br>

<label>Household Member ID<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_household_member_id" value="<?php echo $db_household_member_id; ?>"readonly><br>

<label>First Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_fname" value="<?php echo $db_fname; ?>"readonly><br>

<label>Last Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_lname" value="<?php echo $db_lname; ?>"readonly><br>

<label>Recorded Grade Level<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_recorded_grade_level" value="<?php echo $db_recorded_grade_level; ?>"readonly><br>

<label>School<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_school_name" value="<?php echo $db_school_name; ?>" readonly><br>

<label>Municipality<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_municipality" value="<?php echo $db_municipality; ?>"readonly><br>
</fieldset>

<button class="btn btn-primary btn-wide pull-right" type="submit" value="Save">
Save <i class="fa fa-arrow-circle-right"></i>
</button>

<a href="cv_home.php"><button type="button" class="btn btn-primary btn-wide pull-left">
<i class="fa fa-arrow-circle-left"></i> Back </button></a>	

</form>
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

<!-- for footer -->
<?php
include ("footer.php");
?>
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
