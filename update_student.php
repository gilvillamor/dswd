<?php

///this is the database connection
include ("connections.php");
//this is for the header and body
include ("header.php");

//declare han variables pati ha declare han error message
$household_id = $household_member_id = $fname = $lname = $sex = $recorded_grade_level = $school_name = $municipality = $province = "";
$household_idErr = $household_member_idErr = $fnameErr =$lnameErr = $sexErr = $recorded_grade_levelErr = $school_nameErr = $municipalityErr = $provinceErr = "";
///pag check kun blank it textbox
if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST["household_id"])) {
$household_idErr="Household ID is required!";
}else{
$household_id=$_POST["household_id"];
}

if(empty($_POST["household_member_id"])) {
$household_member_idErr="Household ID is required!";
}else{
$household_member_id=$_POST["household_member_id"];
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

if(empty($_POST["province"])) {
$provinceErr="Please state the grade level required!";
}else{
$province=$_POST["province"];
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
$query4 = "SELECT province_name FROM tbl_province";
$result4 = mysqli_query($connections, $query4);

// $query6 = "UPDATE mytbl SET name='$new_name', address='$new_address', email='$new_email' WHERE id='$user_id'";
// $result6 = mysqli_query($connections, $query6);



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
$db_province=$row_edit["province"];
}
?>


<div class="main-content" >
<div class="wrap-content container" id="container">

<!-- start: DYNAMIC TABLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">STUDENT <span class="text-bold">PROFILE UPDATING</span></h5><hr>

<!-- I will start my codes here for dashboard -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="tabbable">
<ul id="myTab1" class="nav nav-tabs">
<li class="active">
<a href="#myTab1_example1" data-toggle="tab">
Update Student Profile
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
<legend>Update Student Details</legend>
<div class="row">
<div class="col-md-6">
<div class="form-group"> 

<form method="POST" action="update_student_record.php">
<!-- ine na code gin hide ko an bali id ito hea na ada database -->
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

<label>Household ID<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_household_id" value="<?php echo $db_household_id; ?>"><br>
<span class="error"><?php echo $household_idErr; ?></span>
<label>Household Member ID<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_household_member_id" value="<?php echo $db_household_member_id; ?>"><br>
<span class="error"><?php echo $household_idErr; ?></span>
<label>First Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_fname" value="<?php echo $db_fname; ?>"><br>
<span class="error"><?php echo $fnameErr; ?></span>
<label>Last Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="new_lname" value="<?php echo $db_lname; ?>"><br>
<span class="error"><?php echo $lnameErr; ?></span>
<label>Gender<span class="symbol required"></span></label>
<select class="form-control" name="new_sex" value="<?php echo $db_sex; ?>">
<option>Female</option>
<option>Male</option>
</select><br>

</div>
</div>

<!-- Ha akun ine comboboxes na nga codes second row -->
<div class="col-md-6">
<div class="form-group">

<label>Grade Level<span class="symbol required"></span></label>
<select class="form-control" name="new_recorded_grade_level" value="<?php echo $db_recorded_grade_level; ?>">
<?php while($row1 = mysqli_fetch_array($result1)):;?>
<option><?php echo $row1['grade_level'];?></option>
<?php endwhile;?>
</select><br>

<label>School Name<span class="symbol required"></span></label>
<select class="form-control" name="new_school_name" value="<?php echo $db_school_name; ?>">
<?php while($row1 = mysqli_fetch_array($result2)):;?>
<option><?php echo $row1['school_name'];?></option>
<?php endwhile;?>
</select><br>

<label>Municipality<span class="symbol required"></span></label>
<select class="form-control" name="new_municipality" value="<?php echo $db_municipality; ?>">
<?php while($row1 = mysqli_fetch_array($result3)):;?>
<option><?php echo $row1['municipality_name'];?></option>
<?php endwhile;?>
</select><br>

<label>Province<span class="symbol required"></span></label>
<select class="form-control" name="new_province" value="<?php echo $db_province; ?>">
<?php while($row1 = mysqli_fetch_array($result4)):;?>
<option><?php echo $row1['province_name'];?></option>
<?php endwhile;?>
</select><br>


<button class="btn btn-primary btn-wide pull-right" type="submit" value="Save">
Update <i class="fa fa-arrow-circle-right"></i>
</button>

<a href="student_profile.php"><button type="button" class="btn btn-primary btn-wide pull-left">
<i class="fa fa-arrow-circle-left"></i> Back 
</button></a>	

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
