<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<h2>Search result</h2>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	if (mysqli_connect_errno())
		{echo "Failed to connect";}


	$projectname = trim($_GET["projectname"]);
	$codename = trim($_GET["codename"]);
	$employeename = trim($_GET["employeename"]);

	if (!empty($projectname)){
		$result = mysqli_query($con,"SELECT * FROM project WHERE UPPER(project_name) LIKE UPPER('%$projectname%')");

		echo "<h3>Daftar proyek berdasarkan search: </h3>";

		while ($row = mysqli_fetch_array($result)){
			$chosenproject = $row['project_name'];
			$pieces = explode(" ", $chosenproject);
			$newstring = NULL;

			for($i = 0 ; $i < count($pieces) ; $i++){
				$newstring = $newstring . $pieces[$i];
				if ($i != count($pieces) - 1) {$newstring = $newstring . "+";}
			}
			echo "<a href=edit_project.php?chosenproject=$newstring>$chosenproject<br />";
		}
	}
	else
		if(!empty($codename)){
			$result = mysqli_query($con,"SELECT * FROM project WHERE UPPER(code_name) LIKE UPPER('%$codename%')");
			echo "<h3>Daftar proyek berdasarkan search: </h3>";

			while ($row = mysqli_fetch_array($result)){
				$chosenproject = $row['project_name'];
				$pieces = explode(" ", $chosenproject);
				$newstring = NULL;

				for($i = 0 ; $i < count($pieces) ; $i++){
					$newstring = $newstring . $pieces[$i];
					if ($i != count($pieces) - 1) {$newstring = $newstring . "+";}
				}
				echo "<a href=edit_project.php?chosenproject=$newstring>$chosenproject<br />";
			}
		}
		else
			if(!empty($employeename)){
				$result = mysqli_query($con,"SELECT * FROM employee WHERE UPPER(employee_name) LIKE UPPER('%$employeename%')");
				echo "<h3>Daftar anggota berdasarkan search: <h3>";

				while($row = mysqli_fetch_array($result)){
					$chosenemployee = $row['employee_name'];
					$pieces = explode(" ", $chosenemployee);
					$newstring = NULL;

					for($i = 0 ; $i < count($pieces) ; $i++){
						$newstring = $newstring . $pieces[$i];
						if ($i != count($pieces) - 1) {$newstring = $newstring . "+";}
					}
					echo "<a href=edit_employee.php?chosenemployee=$newstring>$chosenemployee<br />";
				}
			}

?>

<br>
<a href=index.php>Back</a>

</body>
</html>