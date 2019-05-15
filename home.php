<?php

//connection tikadto ha databaseko 
include('connections.php');
include('session.php'); 

//this will show the user log into the system under the users table in my database
$result=mysqli_query($connections, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper"> 
<center><h3>Welcome: <?php echo $row['name']; ?> </h3></center>
<div class="reminder">
<!-- once click makakadto ha dashboard -->
<p><a href="dashboard.php"><b>Click here to continue</b></a></p>


</div>
</div>

</body>
</html>