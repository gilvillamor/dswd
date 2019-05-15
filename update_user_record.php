<!-- Ine na form amu ine hea it ma execute hit akon updating tikang ha update_student form na user interface ngan student_masterlist -->
<?php

include("connections.php");

	$user_id = $_POST["user_id"];
	$new_name=$_POST["new_name"];
	$new_username=$_POST["new_username"];
	$new_password=$_POST["new_password"];
	$new_account_type=$_POST["new_account_type"];
	$new_employee_position=$_POST["new_employee_position"];


mysqli_query($connections, "UPDATE users SET name='$new_name', username='$new_username', password='$new_username', account_type='$new_account_type', employee_position='$new_employee_position' WHERE user_id='$user_id'");

echo "<script language='javascript'>alert('Record was succesfully updated!')</script>";
echo "<script>window.location.href='user_list.php';</script>";

?>