<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Edit employee > Delete education
<br>

<body>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$employeename = urldecode($_GET['chosenemployee']);
	$title=urldecode($_GET['title']);
	$university=urldecode($_GET['university']);

	mysqli_query($con, "DELETE FROM Education WHERE employee_name='$employeename' and university='$university' and title='$title'");

	$chosenemployee = urlencode($employeename);
	echo "Pendidikan sudah dihapus. Klik <a href=edit_employee.php?chosenemployee=$chosenemployee&editfield=&editvalue=>sini</a> untuk kembali mengedit anggota.";	
?>



</body>
</html>