<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<div style="background-color:#ffcc66;width:900px;padding-left:10px">
<h2>Proyek/anggota baru</h2>
<a href = new_project.php>Proyek baru</a><br>
<a href = new_employee.php>Anggota baru</a><br>
<br>
</div>

<div style="background-color:#ffcc66;width:900px;padding-left:10px;">
<h2>View/edit/delete existing proyek/anggota</h2>

Untuk generate CV, bisa search anggota atau klik nama anggota di bawah.

<h3>Search</h3>
<form method="get" action="search_result.php">
	<table>
		<tr><td>By project name:</td><td><input type ="text" name="projectname" id="projectname"></td>
		<tr><td>By code name:</td><td><input type ="text" name="codename" id="codename"></td>
		<tr><td>By employee name:</td><td><input type ="text" name="employeename" id="employeename"></td>
	</table>
	<br>
	<input value = "Search" type="submit">
</form>

<br>
<table><tr><td>
<?php

	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	if (mysqli_connect_errno())
		{echo "Failed to connect";}

	$projects = mysqli_query($con,"SELECT * FROM project");

	echo "<h3>Daftar Proyek</h3>";

	while($row = mysqli_fetch_array($projects)){
		$projectname = $row['project_name'];
		$projectenddate = $row['end_time'];
		$newstring = urlencode($projectname);

		echo "<a href = edit_project.php?chosenproject=$newstring&editfield=&editvalue=>$projectname</a>";
		echo "<br />";
	}

	echo "<br>";
?>

</td><td style="width:50px"></td><td>

<?php
	echo "<h3>Daftar anggota dan generate CV</h3>";
	$employees = mysqli_query($con,"SELECT * FROM Employee");
	while($row = mysqli_fetch_array($employees)){
		$employeename = $row['employee_name'];
		$newstring = urlencode($employeename);
		echo "<a href = edit_employee.php?chosenemployee=$newstring&editfield=&editvalue=>$employeename</a>";
		echo "<br />";	
	}

	echo "<br>";
?>
</tr></table>

<br>
</div>


<div style="background-color:#ffcc66;width:900px;padding-left:10px">
	<h2>Add/delete anggota ke/dari proyek</h2>
	<a href = add_employee_to_project.php>Add/delete anggota ke/dari proyek</a><br>
	<br>
</div>


</body>
</html>