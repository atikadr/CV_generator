<html>
<body>
<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$employeename=$_GET["employeename"];
	$birthplace=$_GET["birthplace"];
	$birthdate=$_GET['birthdate'];
	$address=$_GET['address'];
	$education=$_GET['education'];

	mysqli_query($con,"INSERT INTO Employee VALUES ('$employeename','$birthdate','$birthplace','$address','$education')");
	echo "New Employee creation success";
?>
</body>
</html>