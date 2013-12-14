<html>
<h1>New Project (2)</h1>
<body>

<?php

	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$projectname = $_POST["projectname"];
	$projectclient = $_POST["projectclient"];
	$codename=$_POST["codename"];
	$nomorSPK=$_POST["nomorSPK"];
	$location=$_POST["location"];
	$starttime=$_POST["starttime"];
	$endtime=$_POST["endtime"];
	$description=$_POST["description"];
	$nomorBAPP=$_POST["nomorBAPP"];
	$tanggalBAPP=$_POST["tanggalBAPP"];

	mysqli_query($con,"INSERT INTO Project VALUES('$projectname','$codename','$nomorSPK','$location','$projectclient','$starttime','$endtime','$description','$nomorBAPP','$tanggalBAPP')");
	$employees = mysqli_query($con,"SELECT * FROM Employee");
	$position = mysqli_query($con,"SELECT * FROM Employee_position_type");
?>

Proyek sudah disimpan. Add employee di sini:<br>

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

	<input value="Done" type="submit" action="new_project_success.php">

</body>
</html>
