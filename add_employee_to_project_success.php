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

	$projectname=$_GET['projectname'];
	$employeename=$_GET['employeename'];
	$positiontype=$_GET['positiontype'];

	$pieces1 = explode("+", $projectname);
	$newstring1 = NULL;

	for($i = 0 ; $i < count($pieces1) ; $i++){
		$newstring1 = $newstring1 . $pieces1[$i];
			if ($i != count($pieces1) - 1) {$newstring1 = $newstring1 . " ";}
	}

	$pieces2 = explode("+", $employeename);
	$newstring2 = NULL;

	for($i = 0 ; $i < count($pieces2) ; $i++){
		$newstring2 = $newstring2 . $pieces2[$i];
			if ($i != count($pieces2) - 1) {$newstring2 = $newstring2 . " ";}
	}

	$pieces3 = explode("+", $positiontype);
	$newstring3 = NULL;

	for($i = 0 ; $i < count($pieces3) ; $i++){
		$newstring3 = $newstring3 . $pieces3[$i];
			if ($i != count($pieces3) - 1) {$newstring3 = $newstring3 . " ";}
	}

	$result = mysqli_query($con, "SELECT * FROM Employee_position_type WHERE employee_position_name = '$newstring3'");
	$row = mysqli_fetch_array($result);
	$position_type = $row['employee_position_type'];

	mysqli_query($con, "INSERT INTO Employee_position VALUES ('$newstring2',$position_type,'$newstring1')");
?>

<br>
Employee successfully added to the project. DO NOT CLICK BACK OR REFRESH. Click <a href=add_employee_to_project.php>here</a> to continue adding more employees to the project.

</body>
</html>