<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<?php

	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$projectname = $_POST["projectname"];
	$projectclient = $_POST["projectclient"];
	$codename=$_POST["codename"];
	$nomorSPK=$_POST["nomorSPK"];
	$location=$_POST["location"];
	$starttime=$_POST["starttime"];
	$endtime=$_POST["endtime"];
	$description=$_POST["description"];
	$nomorBAPP=$_POST["nomorBAPP"];
	$tanggalBAPP=$_POST["tanggalBAPP"];

	mysqli_query($con,"INSERT INTO Project VALUES('$projectname','$codename','$nomorSPK','$location','$projectclient','$starttime','$endtime','$description','$nomorBAPP','$tanggalBAPP')");
	$employees = mysqli_query($con,"SELECT * FROM Employee");
	$position = mysqli_query($con,"SELECT * FROM Employee_position_type");
?>

Proyek sudah disimpan. Add employee di <a href=add_employee_to_project.php>sini</a>.<br>
<a href=index.php>Home</a>



</body>
</html>
