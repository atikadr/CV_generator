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