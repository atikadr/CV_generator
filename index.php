<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<h2>Buat proyek atau anggota baru</h2>

<a href = new_project.php>Proyek baru</a><br>
<a href = new_employee.php>Anggota baru</a><br>
<br>

<h2>View/edit/delete existing proyek atau anggota</h2>

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

<div id="container" style="width:900px">

<br>
<div style="background-color:#cccc33;width:200px;float:left;padding-left:10px">
<?php

	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	if (mysqli_connect_errno())
		{echo "Failed to connect";}

	$projects = mysqli_query($con,"SELECT * FROM project");

	echo "<h2>Daftar Proyek</h2>";

	while($row = mysqli_fetch_array($projects)){
		$projectname = $row['project_name'];
		$projectenddate = $row['end_time'];
		$pieces = explode(" ", $projectname);
		$newstring = NULL;

		for($i = 0 ; $i < count($pieces) ; $i++){
			$newstring = $newstring . $pieces[$i];
			if ($i != count($pieces) - 1) {$newstring = $newstring . "+";}
		}
		echo "<a href = edit_project.php?chosenproject=$newstring>$projectname</a>";
		echo "<br />";
	}

	echo "<br>";
?>
</div>

<div style="background-color:#ffffff;width:50px;float:left;"><font color="white">Gap here</font></div>

<div style="background-color:#ffcc66;width:200px;float:left;padding-left:10px">

</div>

</div>

</body>
</html>