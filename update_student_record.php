<!-- Ine na form amu ine hea it ma execute hit akon updating tikang ha update_student form na user interface ngan student_masterlist -->
<?php

include("connections.php");

$user_id = $_POST["user_id"];
$new_household_id = $_POST["new_household_id"];
$new_fname = $_POST["new_fname"];
$new_lname = $_POST["new_lname"];
$new_sex = $_POST["new_sex"];
$new_recorded_grade_level = $_POST["new_recorded_grade_level"];
$new_school_name = $_POST["new_school_name"];
$new_municipality = $_POST["new_municipality"];
$new_barangay = $_POST["new_barangay"];

mysqli_query($connections, "UPDATE tbl_students_beneficiary_profile SET household_id='$new_household_id', fname='$new_fname', lname='$new_lname', sex='$new_sex', recorded_grade_level='$new_recorded_grade_level', school_name='$new_school_name', municipality='$new_municipality', barangay='$new_barangay' WHERE id='$user_id'");

echo "<script language='javascript'>alert('Record was succesfully updated!')</script>";
echo "<script>window.location.href='student_masterlist.php';</script>";

?>