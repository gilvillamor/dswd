<?php

$connect = mysqli_connect ("localhost", "root", "","db_sdd");
if (mysqli_connect_errno()) {
	echo "Failed to connect to Database: " . mysqli_connect_error();
}

?>