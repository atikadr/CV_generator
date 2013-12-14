<html>
<body>
<form method="get" action="search_result.php">
	By project name: <input type ="text" name="projectname" id="projectname"><br>
	By code name: <input type ="text" name="codename" id="codename"><br>
	By employee name: <input type ="text" name="employeename" id="employeename"><br>
	<input value = "Search" type="submit">
</form>

<?php

	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	if (mysqli_connect_errno())
		{echo "Failed to connect";}

	$projects = mysqli_query($con,"SELECT * FROM project");

	echo "List of projects<br />";

	while($row = mysqli_fetch_array($projects)){
		$projectname = $row['project_name'];
		$projectenddate = $row['end_time'];
		$pieces = explode(" ", $projectname);
		$newstring = NULL;

		//echo $pieces[0];
		//echo $pieces[1];

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
<a href = new_project.php>New project</a><br>
<a href = new_employee.php>New employee</a>

</body>
</html>