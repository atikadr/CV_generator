<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Edit employee
<h2>View/edit/delete anggota</h2>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$chosenemployee = $_GET["chosenemployee"];
	$curemployee = urldecode($chosenemployee);
	$editfield = urldecode($_GET['editfield']);
	$editvalue = urldecode($_GET['editvalue']);

	if (!empty($editfield)){
		mysqli_query($con, "UPDATE employee SET $editfield='$editvalue' WHERE employee_name='$curemployee'");
	}	

	$result = mysqli_query($con,"SELECT * FROM Employee WHERE employee_name = '$curemployee'");
	$educations = mysqli_query($con,"SELECT * FROM Education WHERE employee_name = '$curemployee'");
	$row = mysqli_fetch_array($result);

	$employeename=$row["employee_name"];
	$nationality=$row["nationality"];
	$birthdate=$row["birth_date"];
	$birthplace=$row["birth_place"];
	$address=$row["address"];

	echo "<h2>$employeename</h2>";
	echo "<table border=1 style='border-collapse:collapse;'>";
	echo "<tr><td><b>Kebangsaan</b></td><td>$nationality</td></tr>";
	echo "<tr><td><b>Tanggal lahir (YYYY/MM/DD):</b></td><td>$birthdate</td></tr>";
	echo "<tr><td><b>Tempat lahir</b></td><td>$birthplace</td></tr>";
	echo "<tr><td style='width:200px'><b>Alamat</b></td><td style='width:350px'>$address</td></tr>";
	echo "<tr><td><b>Pendidikan</b></td>";
	while ($row = mysqli_fetch_array($educations)){
		$title = $row['title'];
		$university = $row['university'];
		$start_year = $row['start_year'];
		$end_year = $row['end_year'];
		$yearstring = "";
		if (!empty($start_year)){
			$yearstring = ", " . $start_year;
			if (!empty($end_year)){
				$yearstring = ", " .  $start_year . " - " . $end_year;
			}
		}
		echo "<td style='width:350px'>$title, $university$yearstring</td></tr>";
		echo "<tr><td></td>";
	}
	echo "</table>";
?>

<br>
<?php
	echo "<b>Edit field</b>";
	echo "<form method='get' action='edit_employee.php'>";
		echo "<select name='editfield'>";
			echo "<option></option>";
			echo "<option>nationality</option>";
			echo "<option>birth_place</option>";
			echo "<option>birth_date</option>";
			echo "<option>address</option>";
		echo "</select>";

		echo "as";
		echo "<input type='text' name='editvalue' id='editvalue'>";

		$newvalue=urlencode($curemployee);
		echo "<input type='hidden' name='chosenemployee' value='$newvalue'>";

		echo "<input type='submit' value='Edit'>";
	echo "</form>";

	echo "<b>Untuk menambah pendidikan: </b><br>";
	echo "<form method='get' action='add_education.php'>";
		echo "<table>";
			echo "<tr><td style='100 px'>Sekolah: </td>";
			echo "<td><input type='text' name='university' id='university'></td></tr>";
			echo "<tr><td>Gelar: </td>";
			echo "<td><input type='text' name='title' id='title'></td></tr>";
			echo "<tr><td>Tahun mulai: </td>";
			echo "<td><input type='text' name='start_year' id='start_year'></td></tr>";
			echo "<tr><td>Tahun lulus: </td>";
			echo "<td><input type='text' name='end_year' id='end_year'></td></tr>";
		echo "</table>";
		echo "<input type='hidden' name='chosenemployee' value='$newvalue'>";
		echo "<input type='submit' value='Add'>";
	echo "</form>";

	echo "Untuk menghapus education";
	echo "<form method='get' action='delete_education.php'>";
	echo "Sekolah <select name='university'>";
	$educations = mysqli_query($con,"SELECT * FROM Education WHERE employee_name = '$curemployee'");
	while ($row = mysqli_fetch_array($educations)){
		$university = $row['university'];
		echo "<option>$university</option>";
	}
	echo "</select>";
	echo "Gelar <select name='title'>";
	$educations = mysqli_query($con,"SELECT * FROM Education WHERE employee_name = '$curemployee'");
	while ($row = mysqli_fetch_array($educations)){
		$title = $row['title'];
		echo "<option>$title</option>";
	}
	echo "</select>";
	echo "<input type='hidden' name='chosenemployee' value='$newvalue'>";
	echo "<input type='submit' value='Delete pendidikan'>";
	echo "</form>";

	echo "WARNING: Button ini menghapus anggota permanen.";
	echo "<form method='get' action='delete_employee.php?'>";
		echo "<input type='hidden' name='employeename' value='$newvalue'>";
		echo "<input type='submit' value='Delete anggota'>";
	echo "</form>";
?>

<br><br>
<h2>Pengalaman Kerja:</h2>

<table border=1 style='border-collapse:collapse'>
	<tr><td style='width:200px'><b>Tahun</b></td><td style='width:200px'><b>Nama Proyek</b></td><td style='width:200px'><b>Posisi</b></td><td style='width:200px'><b>Client</b></td></tr>
<?php
	$positions = mysqli_query($con,"SELECT PT.employee_position_name, P.project_name, P.project_client, P.end_date FROM Employee_position EP, Project P, Employee_position_type PT WHERE EP.employee_name = '$curemployee' AND EP.project_name = P.project_name AND PT.employee_position_type = EP.employee_position_type");
	while($row = mysqli_fetch_array($positions)){
		$year = date("Y", strtotime($row['end_date']));
		$projectname = $row['project_name'];
		$position = $row['employee_position_name'];
		$projectclient = $row['project_client'];
		echo "<tr>";
		echo "<td>$year</td><td>$projectname</td><td>$position</td><td>$projectclient</td>";
		echo "</tr>";
	}
?>
</table><br>

<?php
	echo "<br><b>Tambah pengalaman kerja</b>";
	$position=mysqli_query($con,"SELECT * FROM Employee_position_type");
	$projects=mysqli_query($con,"SELECT * FROM Project");

	echo "<form method='get' action='add_employee_to_project_success.php'>";
		echo "Proyek:<br>";
		echo "<select name='projectname'>";
			while($row = mysqli_fetch_array($projects)){
				$projectname = $row['project_name'];
				echo "<option>$projectname</option>";
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

	echo "<br><b>Delete pengalaman kerja</b>";
	$position=mysqli_query($con,"SELECT * FROM Employee_position_type");
	$projects=mysqli_query($con,"SELECT * FROM Project");

	echo "<form method='get' action='delete_employee_to_project_success.php'>";
		echo "Proyek:<br>";
		echo "<select name='projectname'>";
			while($row = mysqli_fetch_array($projects)){
				$projectname = $row['project_name'];
				echo "<option>$projectname</option>";
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