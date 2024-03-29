<?php

include ("connections.php");
//this is for the header and body
include ("header.php");
//declare han variables pati ha declare han error message
$school_name = $barangay_name = $municipality_name = $province_name = "";
$school_nameErr = $barangay_nameErr = $municipality_nameErr = $province_nameErr =  "";
///pag check kun blank it textbox
if ($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST["school_name"])) {
$school_nameErr="School name is required!";
}else{
$school_name=$_POST["school_name"];
}

if(empty($_POST["barangay_name"])) {
$barangay_nameErr="School ID is required!";
}else{
$barangay_name=$_POST["barangay_name"];
}

if(empty($_POST["municipality_name"])) {
$municipality_nameErr="School ID is required!";
}else{
$municipality_name=$_POST["municipality_name"];
}

if(empty($_POST["province_name"])) {
$province_nameErr="School ID is required!";
}else{
$province_name=$_POST["province_name"];
}


}


$user_id=$_REQUEST["id"];

$user_id;

include ("connections.php");

$get_record=mysqli_query ($connections, "SELECT * FROM tbl_schools WHERE id='$user_id'");

while($row_edit=mysqli_fetch_assoc($get_record)) {


$db_school_name=$row_edit["school_name"];
$db_barangay_name=$row_edit["barangay_name"];
$db_municipality_name=$row_edit["municipality_name"];
$db_province_name=$row_edit["province_name"];
}

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
	<h5 class="over-title margin-bottom-15">SCHOOL <span class="text-bold">PROFILE</span></h5><hr>
	
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

<form method="POST" action="update_school_record.php">
<!-- ine na code gin hide ko an bali id ito hea na ada database -->
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">


<label>School Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="school_name" value="<?php echo $db_school_name; ?>"><br>
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


<a href="schools.php"><button type="button" class="btn btn-primary btn-wide pull-left">
<i class="fa fa-arrow-circle-left"></i> Back 
</button></a>
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
