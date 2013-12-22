<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Add employee to project

<body>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	if (mysqli_connect_errno())
		{echo "Failed to connect";}

	$projectname=urldecode($_GET['projectname']);
	$employeename=urldecode($_GET['employeename']);
	$positiontype=urldecode($_GET['positiontype']);

	$result = mysqli_query($con, "SELECT * FROM Employee_position_type WHERE employee_position_name = '$positiontype'");
	$row = mysqli_fetch_array($result);
	$position_type = $row['employee_position_type'];

	mysqli_query($con, "DELETE FROM Employee_position WHERE employee_name='$employeename' AND employee_position_type=$position_type AND project_name='$projectname'");
	$newstring=urlencode($projectname);
	$newstring2=urlencode($employeename);

	echo "<br>Employee successfully added to the project. DO NOT CLICK BACK OR REFRESH."; 
	echo "<br>Click <a href=edit_project.php?chosenproject=$newstring&editfield=&editvalue=>here</a> untuk menambah atau menghapus anggota ke proyek ini.";
	echo "<br>Click <a href=edit_employee.php?chosenemployee=$newstring2&editfield=&editvalue=>here</a> untuk menambah atau menghapus pengalaman kerja anggota ini.";
?>
</body>
</html>