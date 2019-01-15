<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<title>login</title>
</head>
<body>
<center>
	<h1>LOGIN</h1>
	<form method="POST">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td> 
					<input class="form-control" type="text" name="username">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td>
					<input class="form-control" type="password" name="password">
				</td>
			</tr>
		</table>
		<br>
		<input type="submit" class="btn btn-primary" name="submit" value="LOGIN"><br>
		<a href="register.php">Register</a><br>
		<a href="lupa.php">Lupa Password</a>
	</form>
</center>
</body>
</html>

<?php
include "conn.php";
session_start();
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5(hash('sh512', $_POST['password']));

	$data = mysqli_query($conn, "SELECT * FROM tbl_login WHERE username='$username' AND password='$password'");
	$cek = mysqli_num_rows($data);

	if($cek>0){
		$query = mysqli_fetch_assoc($data);
		$status = "login";

		if($query['level']=="1"){

			$data_k = mysqli_query($conn, "SELECT * FROM tbl_karyawan WHERE username='$username'");
			$cek = mysqli_fetch_assoc($data_k);

				if($cek >0){
					$_SESSION['namaUser'] = $cek['nama'];
					$_SESSION['nip'] = $cek['nip'];
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['status'] = $status;
					header ("location:admin/admin.php");
				}
			
		}
		else if ($query['level']=="2"){
			$data_k = mysqli_query($conn, "SELECT * FROM tbl_penghuni WHERE username='$username'");
			$cek = mysqli_fetch_assoc($data_k);
				
				if($cek >0){
					$temp = $cek['nama'];
					$ktp = $cek['no_ktp'];
					$_SESSION['namaUser'] = $temp;
					$_SESSION['no_ktp'] = $ktp;
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['status'] = $status;
					header ("location:user/user.php");
				}
   }else if(!$cek){
    echo "<script language = 'javascript'>alert('Gagal login');document.location=('login.php');</script>";
	}
}
}
?>