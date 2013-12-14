<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Edit project

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$chosenproject = $_GET["chosenproject"];

	$pieces = explode("+", $chosenproject);
	$newstring = NULL;

	for($i = 0 ; $i < count($pieces) ; $i++){
		$newstring = $newstring . $pieces[$i];
			if ($i != count($pieces) - 1) {$newstring = $newstring . " ";}
	}

	$result = mysqli_query($con,"SELECT * FROM project WHERE project_name = '$newstring'");
	$row = mysqli_fetch_array($result);

	$projectname=$row["project_name"];
	$projectclient=$row["project_client"];
	$codename=$row["code_name"];
	$nomorSPK=$row["nomor_SPK"];
	$location=$row["location"];
	$starttime=$row["start_time"];
	$endtime=$row["end_time"];
	$description=$row["description"];
	$nomorBAPP=$row["nomor_BAPP"];
	$tanggalBAPP=$row["tanggal_BAPP"];

	echo "<h2>$projectname</h2>";
	echo "<table border=1 style='border-collapse:collapse;'>";
	echo "<tr><td><b>Client/Alamat</b></td><td>$projectclient</td></tr>";
	echo "<tr><td><b>Lokasi kerja</b></td><td>$location</td></tr>";
	echo "<tr><td><b>Nomor SPK</b></td><td>$nomorSPK</td></tr>";
	echo "<tr><td><b>Code name</b></td><td>$codename</td></tr>";
	echo "<tr><td><b>Mulai kerja</b></td><td>$starttime</td></tr>";
	echo "<tr><td><b>Selesai kerja</b></td><td>$endtime</td></tr>";
	echo "<tr><td><b>Nomor BAPP</b></td><td>$nomorBAPP</td></tr>";
	echo "<tr><td><b>Tanggal BAPP</b></td><td>$tanggalBAPP</td></tr>";
	echo "<tr><td style='width:200px'><b>Keterangan tambahan</b></td><td style='width:200px'>$description</td></tr>";
	echo "</table>";
?>


<body>

</body>
</html>