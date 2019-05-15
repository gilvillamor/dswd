<!-- Ine na form amu ine hea it ma execute hit akon updating tikang ha update_student form na user interface ngan student_masterlist -->
<?php

include("connections.php");

$user_id = $_POST["user_id"];


$new_period = $_POST["new_period"];
$new_remarks = $_POST["new_remarks"];
$new_school_coordinator_name = $_POST["new_school_coordinator_name"];
$new_school_coordinator_other = $_POST["new_school_coordinator_other"];
$new_swa_name = $_POST["new_swa_name"];
$new_household_id = $_POST["new_household_id"];
$new_fname = $_POST["new_fname"];
$new_lname = $_POST["new_lname"];
$new_sex = $_POST["new_sex"];
$new_recorded_grade_level = $_POST["new_recorded_grade_level"];
$new_school_name = $_POST["new_school_name"];
$new_municipality = $_POST["new_municipality"];
$new_barangay = $_POST["new_barangay"];
$new_school_deworming = $_POST["new_school_deworming"];
$new_year = $_POST["new_year"];

mysqli_query($connections, "INSERT into tbl_cv_school(household_id, fname, lname, sex, recorded_grade_level, period, year, remarks, school_deworming, school_name, barangay, municipality, school_coordinator_name, school_coordinator_other, swa_name)values('$new_household_id','$new_fname','$new_lname','$new_sex','$new_recorded_grade_level','$new_period','$new_year','$new_remarks','$new_school_deworming','$new_school_name','$new_barangay','$new_municipality','$new_school_coordinator_name','$new_school_coordinator_other','$new_swa_name')");

echo "<script language='javascript'>alert('Compliance Verification Was Successfully Done!')</script>";
echo "<script>window.location.href='view_students_schools.php';</script>";

?>