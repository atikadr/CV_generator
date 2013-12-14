<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
<h2>Search</h2>
<form method="get" action="search_result.php">
	By project name: <input type ="text" name="projectname" id="projectname"><br>
	By code name: <input type ="text" name="codename" id="codename"><br>
	By employee name: <input type ="text" name="employeename" id="employeename"><br>
	<input value = "Search" type="submit">
</form>

<br>

<?php

	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	if (mysqli_connect_errno())
		{echo "Failed to connect";}

	$projects = mysqli_query($con,"SELECT * FROM project");

	echo "<h2>List of projects</h2>";

	while($row = mysqli_fetch_array($projects)){
		$projectname = $row['project_name'];
		$projectenddate = $row['end_time'];
		$pieces = explode(" ", $projectname);
		$newstring = NULL;

		for($i = 0 ; $i < count($pieces) ; $i++){
			$newstring = $newstring . $pieces[$i];
			if ($i != count($pieces) - 1) {$newstring = $newstring . "+";}
		}
		echo "<a href = search_result.php?projectname=$newstring&codename=&employeename=>$projectname</a>";
		echo "<br />";
	}

	$employees = mysqli_query($con,"SELECT * FROM Employee");
?>
<br>

<h2>New/edit/delete</h2>

<a href = new_project.php>Proyek baru</a><br>
<a href = new_employee.php>Anggota baru</a><br>
<a href = edit_project.php>Edit/hapus proyek</a><br>
<a href = edit_employee.php>Edit/hapus anggota</a><br>

</body>
</html>