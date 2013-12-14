<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<h1>New Project</h1>
<body>

<form method="post" action="new_project_success.php">
	<table border=1 style="border-collapse:collapse">
	Nama Proyek: <input type ="text" name="projectname" id="projectname">
	Client: <input type ="text" name="projectclient" id="projectclient">
	Lokasi: <input type="text" name="location" id="location">
	Nomor SPK: <input type="text" name="nomorSPK" id="nomorSPK">
	Code name: <input type="text" name="codename" id="codename">
	Mulai kerja: <input type="text" name="starttime" id="starttime">
	Selesai kerja: <input type="text" name="endtime" id="endtime">
	Nomor BAPP: <input type="text" name="nomorBAPP" id="nomorBAPP">
	Tanggal BAPP: <input type="text" name="tanggalBAPP" id="tanggalBAPP">
	Keterangan tambahan: <input type="text" name="description" id="description">
	<input value="Submit" type="submit">
</form>

<a href=index.php>Home</a>

</body>
</html>