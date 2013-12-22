<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Proyek baru
<br>

<body>

<?php

	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$projectname = urldecode($_GET["projectname"]);
	$projectclient = urldecode($_GET["projectclient"]);
	$clientaddress=urldecode($_GET['clientaddress']);
	$codename=urldecode($_GET["codename"]);
	$nomorSPK=urldecode($_GET["nomorSPK"]);
	$location=urldecode($_GET["location"]);
	$startdate=urldecode($_GET["startdate"]);
	$enddate=urldecode($_GET["enddate"]);
	$description=urldecode($_GET["description"]);
	$nilai=urldecode($_GET['nilai']);

	mysqli_query($con,"INSERT INTO Project VALUES('$projectname','$codename','$location','$projectclient','$clientaddress','$nomorSPK','$startdate','$enddate','$description','$nilai')");
?>

Proyek sudah disimpan. DO NOT CLICK BACK/REFRESH. Add anggota di <a href=add_employee_to_project.php>sini</a>.<br>
<a href=index.php>Home</a>



</body>
</html>
