<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Proyek baru

<h2>Proyek baru</h2>
<body>

<form method="post" action="new_project_success.php">
	<table border=1 style="border-collapse:collapse">
		<tr><td>Nama Proyek:</td><td><input type ="text" name="projectname" id="projectname" style='width:180px'></td></tr>
		<tr><td>Client:</td><td><input type ="text" name="projectclient" id="projectclient" style='width:180px'></td></tr>
		<tr><td>Lokasi:</td><td><input type="text" name="location" id="location" style='width:180px'></td></tr>
		<tr><td>Nomor SPK:</td><td><input type="text" name="nomorSPK" id="nomorSPK" style='width:180px'></td></tr>
		<tr><td>Code name:</td><td><input type="text" name="codename" id="codename" style='width:180px'></td></tr>
		<tr><td>Mulai kerja:</td><td><input type="text" name="starttime" id="starttime" style='width:180px'></td></tr>
		<tr><td>Selesai kerja:</td><td><input type="text" name="endtime" id="endtime" style='width:180px'></td></tr>
		<tr><td>Nomor BAPP:</td><td><input type="text" name="nomorBAPP" id="nomorBAPP" style='width:180px'></td></tr>
		<tr><td>Tanggal BAPP:</td><td><input type="text" name="tanggalBAPP" id="tanggalBAPP" style='width:180px'></td></tr>
		<tr><td style='width:200px'>Keterangan tambahan:</td><td style='width:200px'><input type="text" name="description" id="description" style='width:180px'></td></tr>
	</table>
	<br>
	<input value="Submit" type="submit">
</form>

</body>
</html>