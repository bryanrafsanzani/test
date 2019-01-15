<?php
include '../conn.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<title>Register Karyawan</title>
</head>
<body>
<center>
	<h1>Register Karyawan</h1>
	<form method="POST">
		<table>
			<tr>
				<td>Nama Lengap</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="form-control" type="password" name="password"></td>
			</tr>
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="nip"></td>
			</tr>
			<tr>
				<td>No. HP</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="no_hp"></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="email"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="alamat"></td>
			</tr>
		</table><br>
		<input type="button" class="btn btn-default" onclick="location.href='login.php';"value="Kembali">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" class="btn btn-primary" name="submit" value="Simpan"><br>
	</form><br>
</center>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5(hash('sh512',$_POST['password']));
	$nip = $_POST['nip'];
	$no_hp = $_POST['no_hp'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	

   	$level = "1";
   	$query1 = "INSERT INTO tbl_login (username, password, level) VALUES('".$username."', '".$password."', '".$level."')";
	$query = "INSERT INTO tbl_karyawan (nip, nama, alamat, email, no_hp, username) VALUES('".$nip."', '".$nama."', '".$alamat."', '".$email."','".$no_hp."','".$username."')";

   	$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $quer
	    if ($sql1) {
	    	$sql = mysqli_query($conn, $query) or die('koneksi error '.mysqli_errno().' - '.mysqli_error()); // Eksekusi/ Jalankan query dari variabel $query
	    	echo "<script language = 'javascript'>alert('Data telah disimpan');document.location=('login.php');</script>";
   }else{
    echo "<script language = 'javascript'>alert('Data gagal disimpan');document.location=('register_admin.php');</script>";

	    		if(!$sql){
	    			die('koneksi error '.mysqli_errno().' - '.mysqli_error());
	    		}
	  
   	
	
	//gambar
	    	}


	}
?>