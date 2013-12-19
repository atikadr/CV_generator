<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

	<a href=index.php>Home</a> > Edit project > Delete project

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$projectname = urldecode($_GET["projectname"]);

	mysqli_query($con, "DELETE FROM Project WHERE project_name='$projectname'");
?>

<br>Project deleted.
</body>
</html>