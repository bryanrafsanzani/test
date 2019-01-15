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

	<title>Input Penghuni</title>
</head>
<body>
<center>
	<h1>Tambah Daftar Penghuni</h1>
	<form method="POST" enctype="multipart/form-data">
		<div class="container">
		<table>
			<tr>
				<td>Nama Lengap</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="nama"></td>
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
				<td>Masukkan foto</td>
				<td>:</td>
				<td><input class="form-control" type="file" name="gambar"></td>
			</tr>
		</table>
		</div><br>
		<input type="button" class="btn btn-default" onclick="location.href='admin.php';"value="Kembali">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit" class="btn btn-primary" name="submit" value="Simpan"><br>
	</form><br>
	<table class="table table-striped" border="2">
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Lengkap</th>
			<th>Unit</th>
			<th>No. KTP</th>
			<th>Masukkan foto</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
			$data2 = "SELECT * FROM tbl_penghuni";
			$query = mysqli_query($conn, $data2);

			while($temp=mysqli_fetch_array($query)){
				echo "<tr>";

				echo "<td>".$no."</td>";
				echo "<td>".$temp['nama']."</td>";
				echo "<td>".$temp['unit']."</td>";
				echo "<td>".$temp['no_ktp']."</td>";
				echo "<td><img src='gambar/".$temp['gambar']."' width='100' height='100'></td>";

				$no++;

				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</center>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
	$nama = $_POST['nama'];
	$unit = $_POST['unit'];
	$no_ktp = $_POST['no_ktp'];

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
   	$query = "INSERT INTO tbl_penghuni (nama, unit, no_ktp, gambar) VALUES('".$nama."', '".$unit."', '".$no_ktp."', '".$gambar."')";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

    if ($sql) {
    		header( "location:t_penghuni.php");
    }
   }
	
	//gambar

	
}
?>