<html>
<body>


<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	if (mysqli_connect_errno())
		{echo "Failed to connect";}


	$projectname = trim($_GET["projectname"]);
	$codename = trim($_GET["codename"]);
	$employeename = trim($_GET["employeename"]);

	if (!empty($projectname)){
		$result = mysqli_query($con,"SELECT * FROM project WHERE UPPER(project_name) LIKE UPPER('%$projectname%')");

		while ($row = mysqli_fetch_array($result)){
			echo "Project name: ", $row['project_name'], "<br />";
			echo "Project client: ", $row['project_client'], "<br />";
			echo "Code name: ", $row['code_name'];
		}
	}
	else
		if(!empty($codename)){
			$result = mysqli_query($con,"SELECT * FROM project WHERE UPPER(code_name) LIKE UPPER('%$codename%')");

			while ($row = mysqli_fetch_array($result)){
				echo $row['project_name'], " ";
				echo $row['project_client'], " ";
				echo $row['code_name'];
			}
		}
		else
			if(!empty($employeename)){
				$result = mysqli_query($con,"SELECT * FROM employee WHERE UPPER(employee_name) LIKE UPPER('%$employeename%')");

				while($row = mysqli_fetch_array($result)){
					echo $row['employee_name'];
				}
			}

?>

</body>
</html>