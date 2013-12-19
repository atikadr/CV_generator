<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<a href=index.php>Home</a> > Search result

<h2>Search result</h2>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	if (mysqli_connect_errno())
		{echo "Failed to connect";}


	$projectname = urldecode($_GET["projectname"]);
	$codename = urldecode($_GET["codename"]);
	$employeename = urldecode($_GET["employeename"]);

	if (!empty($projectname)){
		$result = mysqli_query($con,"SELECT * FROM project WHERE UPPER(project_name) LIKE UPPER('%$projectname%')");

		echo "<h3>Daftar proyek berdasarkan search: </h3>";

		while ($row = mysqli_fetch_array($result)){
			$chosenproject = $row['project_name'];
			$newstring = urlencode($chosenproject);
			echo "<a href=edit_project.php?chosenproject=$newstring&editfield=&editvalue=>$chosenproject<br />";
		}
	}
	else
		if(!empty($codename)){
			$result = mysqli_query($con,"SELECT * FROM project WHERE UPPER(code_name) LIKE UPPER('%$codename%')");
			echo "<h3>Daftar proyek berdasarkan search: </h3>";

			while ($row = mysqli_fetch_array($result)){
				$chosenproject = $row['project_name'];
				$newstring = urlencode($chosenproject);
				echo "<a href=edit_project.php?chosenproject=$newstring&editfield=&editvalue=>$chosenproject<br />";
			}
		}
		else
			if(!empty($employeename)){
				$result = mysqli_query($con,"SELECT * FROM employee WHERE UPPER(employee_name) LIKE UPPER('%$employeename%')");
				echo "<h3>Daftar anggota berdasarkan search: <h3>";

				while($row = mysqli_fetch_array($result)){
					$chosenemployee = $row['employee_name'];
					$newstring = urlencode($chosenemployee);
					echo "<a href=edit_employee.php?chosenemployee=$newstring&editfield=&editvalue=>$chosenemployee<br />";
				}
			}

?>

<br>
<a href=index.php>Back</a>

</body>
</html>