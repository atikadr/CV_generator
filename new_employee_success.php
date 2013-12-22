<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Anggota baru

<body>
<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$employeename=urldecode($_GET["employeename"]);
	$nationality=urldecode($_GET['nationality']);
	$birthplace=urldecode($_GET["birthplace"]);
	$birthdate=urldecode($_GET['birthdate']);
	$address=urldecode($_GET['address']);

	mysqli_query($con,"INSERT INTO Employee VALUES ('$employeename','$nationality','$birthplace','$birthdate','$address')");
?>

Anggota baru sudah disimpan. DO NOT CLICK BACK OR REFRESH. <br>

<?php
	$chosenemployee=urlencode($employeename);
	echo "Add pendidikan di <a href=edit_employee.php?chosenemployee=$chosenemployee&editfield=&editvalue=>sini</a>.<br>";
?>

Add anggota ke proyek di <a href=add_employee_to_project.php>sini</a>.
</body>
</html>