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

	echo "List of projects\r\n";

	while($row = mysqli_fetch_array($projects)){
		projectname = $row['project_name'];
		echo "projectname";
		//echo "<a href =/projectname>"
	}

?>

</body>
</html>