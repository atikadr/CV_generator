<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Edit employee > Add education
<br>

<body>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$employeename = urldecode($_GET['chosenemployee']);
	$title=urldecode($_GET['title']);
	$university=urldecode($_GET['university']);
	$start_year=urldecode($_GET['start_year']);
	$end_year=urldecode($_GET['end_year']);

	if (!empty($start_year) & !empty($end_year)){
		mysqli_query($con, "INSERT INTO Education VALUES ('$employeename','$university','$title','$start_year','$end_year')");
	}
	else
		if (!empty($start_year)) {
			mysqli_query($con, "INSERT INTO Education VALUES ('$employeename','$university','$title','$start_year', NULL)");
		}
		else {
			mysqli_query($con, "INSERT INTO Education VALUES ('$employeename','$university','$title',NULL, NULL)");	
		}

	$chosenemployee = urlencode($employeename);
	echo "Pendidikan sudah disimpan. Klik <a href=edit_employee.php?chosenemployee=$chosenemployee&editfield=&editvalue=>sini</a> untuk kembali mengedit anggota.";	
?>



</body>
</html>