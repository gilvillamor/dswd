<!-- Ine na form amu ine hea it ma execute hit akon updating tikang ha update_student form na user interface ngan student_masterlist -->
<?php

include("connections.php");

$user_id = $_POST["user_id"];
$new_school_name = $_POST["school_name"];
$new_barangay_name = $_POST["barangay_name"];
$new_municipality_name = $_POST["municipality_name"];
$new_province_name = $_POST["province_name"];




mysqli_query($connections, "UPDATE tbl_schools SET school_name='$new_school_name', barangay_name='$new_barangay_name', municipality_name='$new_municipality_name', province_name='$new_province_name' WHERE id='$user_id'");

echo "<script language='javascript'>alert('Record was succesfully updated!')</script>";
echo "<script>window.location.href='schools.php';</script>";

?>