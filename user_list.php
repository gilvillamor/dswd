<?php

///this is the database connection
include ("connections.php");
//this is for the header and body
include ("header.php");
//declare han variables pati ha declare han error message
$name = $account_type = $password = $username = $employee_position = "";
$nameErr = $account_typeErr = $passwordErr = $usernameErr = $employee_positionErr = "";
///pag check kun blank it textbox
if ($_SERVER["REQUEST_METHOD"] == "POST"){


if(empty($_POST["name"])){
$nameErr="Name is required!";
}else{
$name=$_POST["name"];
}

if(empty($_POST["account_type"])) {
$account_typeErr="Please state the account type!";
}else{
$account_type=$_POST["account_type"];
}

if(empty($_POST["password"])) {
$passwordErr="Password is required!";
}else{
$password=$_POST["password"];
}

if(empty($_POST["username"])) {
$usernameErr="Username is required!";
}else{
$username=$_POST["username"];
}

if(empty($_POST["employee_position"])) {
$employee_positionErr="Please state employee position!";
}else{
$employee_position=$_POST["employee_position"];
}
}
/////connection pag insert hin data ha tbl_user_accounts
if($name && $account_type && $password && $username && $employee_position){
$query = mysqli_query($connections, "INSERT into users(name, account_type, password, username, employee_position)values('$name','$account_type','$password','$username','$employee_position')");
echo "<script language='javascript'>alert('New data was inserted')</script>";
echo "<script>window.location.href='user_list.php';</script>";
}

////Pagpa gawas ht data tikang ha database to combo box
//query para han connection han dropdownlist han kanan tbl_grade_level
$query1 = "SELECT employee_position FROM tbl_employee_position";
$result1 = mysqli_query($connections, $query1);





?>

<div class="main-content" >
<div class="wrap-content container" id="container">

<!-- start: DYNAMIC TABLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15">USER ACCOUNT <span class="text-bold">PROFILE</span></h5><hr>

<!-- I will start my codes here for dashboard -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="tabbable">
<ul id="myTab1" class="nav nav-tabs">
<li class="active">
<a href="#myTab1_example1" data-toggle="tab">
User Account Profiling
</a>
</li>
<li>
<a href="#myTab1_example2" data-toggle="tab">
User Account List and Updating
</a>
</li>
</ul>
<div class="tab-content">
<!-- I will start my Tab1 here -->

<div class="tab-pane fade in active" id="myTab1_example1">
<fieldset>
<legend>Account Details</legend>
<div class="row">
<div class="col-md-6">
<div class="form-group"> <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">

<label>Account Owner's Name<span class="symbol required"></span></label>
<input type="text" class="form-control" name="name" value="<?php echo $name; ?>"><br>
<span class="error"><?php echo $nameErr; ?></span>

<label>Username<span class="symbol required"></span></label>
<input type="text" class="form-control" name="username" value="<?php echo $username; ?>"><br>
<span class="error"><?php echo $usernameErr; ?></span>

<label class="block">Account Type</label>
<div class="clip-radio radio-primary"> 
<input type="radio" id="administrator" name="account_type" value="administrator"> <label for="administrator"> Administrator </label>
<input type="radio" id="user" name="account_type" value="user" checked="checked">
<label for="user"> User </label></div>

</div>
</div>

<div class="col-md-6">
<div class="form-group">

<label>Password<span class="symbol required"></span></label>
<input type="password" class="form-control" name="password" value="<?php echo $password; ?>"><br>
<span class="error"><?php echo $passwordErr; ?></span>

<label>Employee Position<span class="symbol required"></span></label>
<select class="form-control" name="employee_position" value="<?php echo $employee_position; ?>">
<?php while($row1 = mysqli_fetch_array($result1)):;?>
<option><?php echo $row1['employee_position'];?></option>
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

<th>Name</th>
<th>Username</th>
<th>Password</th>
<th>Employee Position</th>
<th>Account Type</th>

<th><b>ACTIONS</b></th>
</tr>
</thead>
<tbody>
<?php
$query = "SELECT  user_id, name, username, password, employee_position, account_type FROM users ORDER BY name";
$result4 = mysqli_query($connections, $query);
while($row = mysqli_fetch_assoc($result4)) {
$user_id = $row["user_id"];

$name = $row["name"];
$username = $row["username"];
$password = $row["password"];
$employee_position = $row["employee_position"];
$account_type = $row["account_type"];



echo "<tr>

<td>$name</td>
<td>$username</td>
<td>$password</td>
<td>$employee_position</td>
<td>$account_type</td>

<td><a href='update_user.php?id=$user_id'>SELECT</a></td>

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
User Account Profiling
</a>
<a href="#myTab1_example2" class="btn btn-primary btn-o show-tab">
User Account List and Updating
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
