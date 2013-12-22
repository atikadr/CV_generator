<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Anggota baru

<h2>Anggota baru</h2>
<body>

<form method="get" action="new_employee_success.php">
	<table border=1 style="border-collapse:collapse">
		<tr><td>Nama:</td><td><input type ="text" name="employeename" id="employeename" style='width:180px'></td></tr>
		<tr><td>Kebangsaan:</td><td><input type ="text" name="nationality" id="nationality" style='width:180px'></td></tr>
		<tr><td>Tempat lahir:</td><td><input type ="text" name="birthplace" id="birthplace" style='width:180px'></td></tr>
		<tr><td>Tanggal lahir (YYYY-MM-DD):</td><td><input type ="text" name="birthdate" id="birthdate" style='width:180px'></td></tr>
		<tr><td style='width:200px'>Alamat:</td><td><input type ="text" name="address" id="address" style='width:180px'></td></tr>
	</table>
	<br>
	<input value="Submit" type="submit">
</form>

</body>
</html>
