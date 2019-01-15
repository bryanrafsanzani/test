
<?php 
session_start();

if($_SESSION['status']!="login"){
		header("location:../login.php?pesan=belum_login");
	}

?>
<!DOCTYPE html>
<html>
<head>
		<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

	<title>admin</title>
</head>
<body>
	<center>
		<h2>Hai, <?php echo $_SESSION['namaUser']; ?>
		<a href="logout.php">Klik disini untuk logout </a></h2>
		<h1>Pilih button di bawah ini</h1>
		<table>
			<tr>
				<td>
					<input type="button" class="btn btn-primary" name="p_masuk" value="Paket Masuk" onclick="window.location.href='p_masuk.php'">
				</td>
				<td>
					<input type="button" class="btn btn-primary" name="p_keluar" value="Paket Keluar" onclick="window.location.href='p_keluar.php'">
				</td>
				<td>
					<input type="button" class="btn btn-primary" name="t_penghuni" value="Tambah Penghuni" onclick="window.location.href='t_penghuni.php'">
				</td>
				<td>
					<input type="button" class="btn btn-primary" name="register_admin" value="Tambah Admin" onclick="window.location.href='register_admin.php'">
				</td>
			</tr>
		</table>
	</center>
</body>
</html>
