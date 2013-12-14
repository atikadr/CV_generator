<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$employeename=$_GET["employeename"];
	$birthplace=$_GET["birthplace"];
	$birthdate=$_GET['birthdate'];
	$address=$_GET['address'];
	$education=$_GET['education'];

	mysqli_query($con,"INSERT INTO Employee VALUES ('$employeename','$birthdate','$birthplace','$address','$education')");
?>

Anggota baru sudah disimpan. DO NOT CLICK BACK. Add anggota ke proyek di <a href=add_employee_to_project.php>sini</a>.
</body>
</html>