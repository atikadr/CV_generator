<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

	<form method="get" action="new_project_2.php">
		Nama:<br>
		<select>
			<?php
				while($row = mysqli_fetch_array($employees)){
					$employeename = $row['employee_name'];
					echo "<option value='$employeename'>$employeename</option>";
				}
			?>
		</select>
		<br>
		Jabatan:<br>
		<select>
			<?php
				while($row = mysqli_fetch_array($position)){
					$positiontype = $row['employee_position_name'];
					echo "<option value='$employeeposition'>$positiontype</option>";
				}
			?>
		</select>
		<br>
		<input value="Add" type="submit">
	</form>

</body>
</html>