<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Edit project

<h2>View/edit/delete proyek</h2>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$chosenproject = $_GET["chosenproject"];
	$editfield = urldecode($_GET['editfield']);
	$editvalue = urldecode($_GET['editvalue']);

	$curproject = urldecode($chosenproject);
	if (!empty($editfield)){
		mysqli_query($con, "UPDATE project SET $editfield='$editvalue' WHERE project_name='$curproject'");
	}

	$result = mysqli_query($con,"SELECT * FROM project WHERE project_name = '$curproject'");
	$row = mysqli_fetch_array($result);

	$projectname=$row["project_name"];
	$projectclient=$row["project_client"];
	$clientaddress=$row["client_address"];
	$codename=$row["code_name"];
	$nomorSPK=$row["nomor_SPK"];
	$location=$row["location"];
	$startdate=$row["start_date"];
	$enddate=$row["end_date"];
	$description=$row["description"];
	$nilai=$row["nilai"];

	echo "<h2>$projectname</h2>";
	echo "<table border=1 style='border-collapse:collapse;'>";
	echo "<tr><td><b>Code name</b></td><td>$codename</td></tr>";
	echo "<tr><td><b>Lokasi kerja</b></td><td>$location</td></tr>";
	echo "<tr><td><b>Client</b></td><td>$projectclient</td></tr>";
	echo "<tr><td><b>Alamat client</b></td><td>$clientaddress</td></tr>";
	echo "<tr><td><b>Nomor SPK</b></td><td>$nomorSPK</td></tr>";
	echo "<tr><td><b>Mulai kerja</b></td><td>$startdate</td></tr>";
	echo "<tr><td><b>Selesai kerja</b></td><td>$enddate</td></tr>";
	echo "<tr><td><b>Nilai:</b></td><td>Rp $nilai</td></tr>";
	echo "<tr><td style='width:200px'><b>Keterangan tambahan</b></td><td style='width:200px'>$description</td></tr>";
	echo "</table>";
?>

<br>Edit
<?php
	echo "<form method='get' action='edit_project.php'>";
		echo "<select name='editfield'>";
			echo "<option></option>";
			echo "<option>code_name</option>";
			echo "<option>location</option>";
			echo "<option>project_client</option>";
			echo "<option>client_address</option>";
			echo "<option>nomor_SPK</option>";
			echo "<option>start_date</option>";
			echo "<option>end_date</option>";
			echo "<option>description</option>";
			echo "<option>nilai</option>";
		echo "</select>";

		echo "as";
		echo "<input type='text' name='editvalue' id='editvalue'>";
		

		$newvalue=urlencode($curproject);
		echo "<input type='hidden' name='chosenproject' value='$newvalue'>";

		echo "<input type='submit' value='Edit'>";
	echo "</form>";

	echo "WARNING: Button ini menghapus proyek permanen.";
	echo "<form method='get' action='delete_project.php'>";
		echo "<input type='hidden' name='chosenproject' value='$newvalue'>";
		echo "<input type='submit' value='Delete proyek'>";
	echo "</form>";


	echo "<h2>Anggota proyek</h2>";
	echo "<table><tr><td style='width:200px'><b>Nama</b></td><td style='width:200px'><b>Jabatan</b></td></tr>";
	$positions = mysqli_query($con,"SELECT * FROM Employee_position WHERE project_name='$curproject'");
	while($row = mysqli_fetch_array($positions)){
		$employeename = $row['employee_name'];
		$positiontype = $row['employee_position_type'];
		$position = mysqli_query($con, "SELECT * FROM Employee_position_type WHERE employee_position_type=$positiontype");
		$positionname = mysqli_fetch_array($position);
		$positionname = $positionname['employee_position_name'];
		echo "<tr><td>$employeename</td><td>$positionname</td></tr>";
	}
	echo "</table>";

	echo "<br><b>Add anggota ke proyek</b>";
	$employees=mysqli_query($con, "SELECT * FROM Employee");
	$position=mysqli_query($con,"SELECT * FROM Employee_position_type");
	echo "<form method='get' action='add_employee_to_project_success.php'>";
		echo "Nama:<br>";
		echo "<select name='employeename'>";
		while($row = mysqli_fetch_array($employees)){
			$employeename = $row['employee_name'];
			echo "<option>$employeename</option>";
		}
		echo "</select><br>";
		
		echo "Jabatan:<br>";
		echo "<select name='positiontype'>";
		while($row = mysqli_fetch_array($position)){
			$positiontype = $row['employee_position_name'];
			echo "<option>$positiontype</option>";
		}
		echo "</select><br>";

		echo "<input type='hidden' name='projectname' value='$newvalue'>"; 

		echo "<input value='Add' type='submit'>";
	echo "</form>";

	echo "<br><b>Delete anggota dari proyek</b>";
	$employees=mysqli_query($con, "SELECT * FROM Employee_position WHERE project_name='$curproject'");
	$position=mysqli_query($con,"SELECT * FROM Employee_position_type");
	echo "<form method='get' action='delete_employee_to_project_success.php'>";
		echo "Nama:<br>";
		echo "<select name='employeename'>";
		while($row = mysqli_fetch_array($employees)){
			$employeename = $row['employee_name'];
			echo "<option>$employeename</option>";
		}
		echo "</select><br>";
		
		echo "Jabatan:<br>";
		echo "<select name='positiontype'>";
		while($row = mysqli_fetch_array($position)){
			$positiontype = $row['employee_position_name'];
			echo "<option>$positiontype</option>";
		}
		echo "</select><br>";

		echo "<input type='hidden' name='projectname' value='$newvalue'>"; 

		echo "<input value='Add' type='submit'>";
	echo "</form>";

?>



<body>

</body>
</html>