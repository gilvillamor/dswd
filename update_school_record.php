<!-- Ine na form amu ine hea it ma execute hit akon updating tikang ha update_student form na user interface ngan student_masterlist -->
<?php

include("connections.php");

$user_id = $_POST["user_id"];
$new_school_id = $_POST["school_id"];
$new_school_name = $_POST["school_name"];


mysqli_query($connections, "UPDATE tbl_schools SET school_id='$new_school_id', school_name='$new_school_name' WHERE id='$user_id'");

echo "<script language='javascript'>alert('Record was succesfully updated!')</script>";
echo "<script>window.location.href='school_list.php';</script>";

?>