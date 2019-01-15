<?php
	session_start();

	if($_SESSION['status_lupa']!="login"){
		header("location:lupa.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>update password</title>
</head>
<body>
	<center>
		<h1>Update Password</h1>
	<form method="POST" enctype="multipart/form-data">
	<table>
	<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password"></td>
	</tr>
	<tr>
			<td>Konfirmasi Password</td>
			<td>:</td>
			<td><input type="password" name="konfirm"></td>
		</tr>
</table>
</form>
<br>
	<input type="submit" name="submit" value="Simpan">
</center>
</body>
</html>




