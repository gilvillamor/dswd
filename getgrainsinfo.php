<?php
$q=$_GET["q"];

$connections = mysqli_connect('localhost', 'root', '');
if (!$connections)
{
die('Could not connect: ' . mysqli_error());
}
else
{
mysqli_select_db($connections, "db_dswd");


$sql="SELECT barangay_name, municipality_name, province_name FROM tbl_schools  WHERE school_name = '".$q."'";

$result1 = mysqli_query($connections, $sql);




while($row = mysqli_fetch_array( $result1))
{
?>
<form name='grains_info'>


<label>Barangay<span class="symbol required"></span></label>
<input type="text" class="form-control" name="barangay_name" value="<?php echo( htmlspecialchars( $row['barangay_name'] ) ); ?>"readonly><br>


<label>City/Municipality<span class="symbol required"></span></label>
<input type="text" class="form-control" name="municipality_name" value="<?php echo( htmlspecialchars( $row['municipality_name'] ) ); ?>"readonly><br>


<label>Province<span class="symbol required"></span></label>
<input type="text" class="form-control" name="province_name" value="<?php echo( htmlspecialchars( $row['province_name'] ) ); ?>"readonly>

</div>
</div>

</form>
<?php
}
}
?>


