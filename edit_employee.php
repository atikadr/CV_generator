<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Edit employee
<h2>View/edit/delete anggota</h2>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$chosenemployee = $_GET["chosenemployee"];

	$pieces = explode("+", $chosenemployee);
	$newstring = NULL;

	for($i = 0 ; $i < count($pieces) ; $i++){
		$newstring = $newstring . $pieces[$i];
			if ($i != count($pieces) - 1) {$newstring = $newstring . " ";}
	}

	$result = mysqli_query($con,"SELECT * FROM Employee WHERE employee_name = '$newstring'");
	$row = mysqli_fetch_array($result);

	$employeename=$row["employee_name"];
	$birthdate=$row["birth"];
	$birth_place=$row["birth_place"];
	$address=$row["address"];
	$education=$row["education"];
	
	echo "<h2>$employeename</h2>";
	echo "<table border=1 style='border-collapse:collapse;'>";
	echo "<tr><td><b>Tanggal lahir</b></td><td>$birthdate</td></tr>";
	echo "<tr><td><b>Tempat lahir</b></td><td>$birth_place</td></tr>";
	echo "<tr><td><b>Alamat</b></td><td>$address</td></tr>";
	echo "<tr><td style='width:200px'><b>Pendidikan</b></td><td style='width:200px'>$education</td></tr>";
	echo "</table>";
?>

<br>
Pengalaman Kerja:<br>

<?php
	echo "<table>";
	$positions = mysqli_query($con,"SELECT PT.employee_position_name, P.project_name, P.project_client, P.end_time FROM Employee_position EP, Project P, Employee_position_type PT WHERE EP.employee_name = '$newstring' AND EP.project_name = P.project_name AND PT.employee_position_type = EP.employee_position_type ORDER BY P.end_time DESC");
	while($row = mysqli_fetch_array($positions)){
		$year = date("YY", strtodate($row['end_time']));
		$projectname = $row['project_name'];
		$position = $row['employee_position_name'];
		$projectclient = $row['project_client'];
		echo "<tr>";
		echo "<td></td>$year<td></td>$projectname</td><td>$position</td><td>$projectclient</td>"
		echo "</tr>";
	}
	echo "</table>";
?>

<body>

</body>
</html>