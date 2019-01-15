<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

	<title>Lupa Password?</title>
</head>
<body>
<center>
	<h1>Lupa Password?</h1>
	<form method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Pertanyaan</td>
				<td>:</td>
				<td>
					<select name="pertanyaan">
						<option value="Apa warna favorite anda?" name="1">Apa warna favorite anda?</option>
						<option value="Tanggal lahir anda?" name="2">Tanggal lahir anda?</option>
						<option value="Nama hewan peliharaan anda?" name="3">Nama hewan peliharaan anda?</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jawaban</td>
				<td>:</td>
				<td><input type="text" name="jawaban"></td>
			</tr>
			<tr>
				<input type="submit" class="btn btn-primary" name="submit" value="Lanjut">
			</tr>
	</table>
</form>
<br>
		
</center>
</body>
</html>


<?php 
include 'conn.php';
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$pertanyaan = $_POST['pertanyaan'];
	$jawaban = $_POST['jawaban'];

	$data = mysqli_query($conn, "SELECT * FROM tbl_login WHERE username='$username' AND pertanyaan='$pertanyaan' AND jawaban='$jawaban'");
	$sql = mysqli_num_rows($data); 

	if($sql > 0){
		$_SESSION['username'] = $username;
		$_SESSION['status_lupa'] = "login";

		header("location:updatepass.php");
	}else if(!$sql){
		echo "<script language = 'javascript'>alert('Data gagal disimpan');document.location=('lupa.php');</script>";
	}
	//$data_k = mysqli_query($conn, "SELECT * FROM tbl_karyawan WHERE username='$username'");

}
?>