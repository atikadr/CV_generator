<html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>

<a href=index.php>Home</a> > Edit employee > Delete employee

<body>

<?php
	$con = mysqli_connect("localhost","root","bubumint","hr_dian");
	$employeename = urldecode($_GET["employeename"]);

	mysqli_query($con, "DELETE FROM Employee WHERE employee_name='$employeename'");
?>

</body>
</html>