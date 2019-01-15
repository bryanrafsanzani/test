<?php
include 'conn.php';
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

	<title>Register Penghuni</title>
</head>
<body>
<center>
	<h1>Register Penghuni</h1>
	<form method="POST" enctype="multipart/form-data">
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
				<td>Unit</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="unit"></td>
			</tr>
			<tr>
				<td>No. KTP</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="no_ktp"></td>
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
				<td>Masukkan foto</td>
				<td>:</td>
				<td><input class="form-control" type="file" name="gambar"></td>
			</tr>
			<tr>
				<td>Pertanyaan</td>
				<td>:</td>
				<td>
					<select class="form-control" name="pertanyaan">
						<option value="Apa warna favorite anda?" name="1">Apa warna favorite anda?</option>
						<option value="Tanggal lahir anda?" name="2">Tanggal lahir anda?</option>
						<option value="Nama hewan peliharaan anda?" name="3">Nama hewan peliharaan anda?</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jawaban</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="jawaban"></td>
			</tr>
		</table><br>
		<input type="button" class="btn" onclick="location.href='login.php';"value="Kembali">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" class="btn btn-primary"name="submit" value="Simpan"><br>
	</form><br>
</center>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = md5(hash('sh512',$_POST['password']));
	$unit = $_POST['unit'];
	$no_ktp = $_POST['no_ktp'];
	$no_hp = $_POST['no_hp'];
	$email = $_POST['email'];
	$pertanyaan = $_POST['pertanyaan'];
	$jawaban = $_POST['jawaban'];

	//gambar
	$gambar = $_FILES['gambar']['name'];   //get nama foto yg diupload
  	$temp = $_FILES['gambar']['tmp_name']; //get url/path folder tempat penyimpanan gambar, sebelum dipindahkan ke folder /gambar

  $target_dir = "gambar/";
  $target_file = $target_dir.$gambar;  //biar lebih mudah

	if(!file_exists('gambar/')){	
			mkdir('gambar/', 0777, true);
		}

   if(!move_uploaded_file($temp, $target_file)){        
    
   }else{
   	$level = "2";
   	$query1 = "INSERT INTO tbl_login (username, password, level, pertanyaan, jawaban) VALUES('".$username."', '".$password."', '".$level."', '".$pertanyaan."', '".$jawaban."')";
	$query = "INSERT INTO tbl_penghuni (nama, unit, no_ktp, gambar, no_hp, email, username) VALUES('".$nama."', '".$unit."', '".$no_ktp."', '".$gambar."','".$no_hp."', '".$email."', '".$username."')";

   	$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $quer
	    if ($sql1) {
	    	$sql = mysqli_query($conn, $query) or die('koneksi error '.mysqli_errno().' - '.mysqli_error()); // Eksekusi/ Jalankan query dari variabel $query
	    	echo "<script language = 'javascript'>alert('Data telah disimpan');document.location=('login.php');</script>";
   }else{
    echo "<script language = 'javascript'>alert('Data gagal disimpan');document.location=('register.php');</script>";

	    		if(!$sql){
	    			die('koneksi error '.mysqli_errno().' - '.mysqli_error());
	    		}
	//gambar
	    	}


	}
	
}
?>