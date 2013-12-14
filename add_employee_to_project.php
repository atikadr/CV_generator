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

	$projects=mysqli_query($con,"SELECT * FROM Project");
	$employees=mysqli_query($con, "SELECT * FROM Employee");
	$position=mysqli_query($con,"SELECT * FROM Employee_position_type");

?>

	<form method="post" action="add_employee_to_project_success.php">
		Proyek:<br>
		<select>
			<?php
				while($row = mysqli_fetch_array($projects)){
					$projectname = $row['project_name'];
					echo "<option value='projectname'>$projectname</option>";
				}
			?>
		</select><br>

		Nama:<br>
		<select>
			<?php
				while($row = mysqli_fetch_array($employees)){
					$employeename = $row['employee_name'];
					echo "<option value='employeename'>$employeename</option>";
				}
			?>
		</select><br>
		
		Jabatan:<br>
		<select>
			<?php
				while($row = mysqli_fetch_array($position)){
					$positiontype = $row['employee_position_name'];
					echo "<option value='employeeposition'>$positiontype</option>";
				}
			?>
		</select>
		<br>

		<input value="Add" type="submit">
	</form>

</body>
</html>