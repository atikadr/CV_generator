<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Proyek baru

<h2>Proyek baru</h2>
<body>

<form method="get" action="new_project_success.php">
	<table border=1 style="border-collapse:collapse">
		<tr><td>Nama Proyek:</td><td><input type ="text" name="projectname" id="projectname" style='width:180px'></td></tr>
		<tr><td>Code name:</td><td><input type="text" name="codename" id="codename" style='width:180px'></td></tr>
		<tr><td>Lokasi:</td><td><input type="text" name="location" id="location" style='width:180px'></td></tr>
		<tr><td>Client:</td><td><input type ="text" name="projectclient" id="projectclient" style='width:180px'></td></tr>
		<tr><td>Alamat client:</td><td><input type="text" name="clientaddress" id="clientaddress" style='width:180px'></td></tr>
		<tr><td>Nomor SPK:</td><td><input type="text" name="nomorSPK" id="nomorSPK" style='width:180px'></td></tr>
		<tr><td>Mulai kerja (YYYY/MM/DD):</td><td><input type="text" name="startdate" id="startdate" style='width:180px'></td></tr>
		<tr><td>Selesai kerja (menurut kontrak) (YYYY/MM/DD):</td><td><input type="text" name="enddate" id="enddate" style='width:180px'></td></tr>
		<tr><td>Nilai:</td><td>Rp <input type="text" name="nilai" id="nilai" style='width:180px'></td></tr>
		<tr><td style='width:200px'>Keterangan/deskripsi:</td><td style='width:200px'><input type="text" name="description" id="description" style='width:180px'></td></tr>
	</table>
	<br>
	<input value="Submit" type="submit">
</form>

</body>
</html>