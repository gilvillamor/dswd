<?php session_start(); ?>
<?php
///this is the database connection
include ("connections.php");
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper">

<form action="#" method="post">
<h3>Login here</h3>

<div class="form-item">
<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
</div>

<div class="form-item">
<input type="password" name="pass" required="required" placeholder="Password" required></input>
</div>

<div class="button-panel">
<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
</div>
</form>
<?php
if (isset($_POST['login']))
{
$username = mysqli_real_escape_string($connections, $_POST['user']);
$password = mysqli_real_escape_string($connections, $_POST['pass']);

$query 		= mysqli_query($connections, "SELECT * FROM users WHERE  password='$password' and username='$username'");
$row		= mysqli_fetch_array($query);
$num_row 	= mysqli_num_rows($query);

//kahuman check if user is available ma log in na tapos after makadto ha home na page tapos ig shshow it name ht naka log in
//tapos kun incorrect kay ma show it else
if ($num_row > 0) 
{			
$_SESSION['user_id']=$row['user_id'];
header('location:home.php');

}
else
{
echo 'Invalid Username and Password Combination';
}
}


?>


</div>

</body>
</html>