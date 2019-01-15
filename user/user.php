<?php
include '../conn.php';
session_start();
if($_SESSION['status']!="login"){
		header("location:../login.php?pesan=belum_login");
	}
$tgl_datang = date("Y/m/d H:i:s");
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<title>Lihat Paket</title>
</head>
<body>
<center>
	<h2>Selamat Datang Sebagai User, Hallo <?php  echo $_SESSION['namaUser'];?></h2>
	<form method="POST">
		<table>
			<tr>
				<td>Isi Paket yang akan datang</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="paket"></td>
			</tr>
			<tr>
				<td>Perkiraan Tanggal Datang</td>
				<td>:</td>
				<td><input class="form-control" type="date" name="tgl_datang"></td>
			</tr>
			<tr>
				<td>Penghuni</td>
				<td>:</td>
				<td><?php  echo $_SESSION['namaUser'];?></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" name="submit" value="Masuk"><br>
	</form><br>
<h2>Paket yang belum dikembalikan</h2>
	<table class="table table-striped" border="2">
		<thead>
		<tr>
			<th>No</th>
			<th>Isi Paket</th>
			<th>Tanggal Datang</th>
			<th>Penghuni</th>
			<th>Status</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$data2 = "SELECT * FROM tbl_paket";
			$query = mysqli_query($conn, $data2);
			while($temp=mysqli_fetch_array($query)){
				echo "<tr>";
				echo "<td>".$temp['no']."</td>";
				echo "<td>".$temp['tgl_datang']."</td>";
				echo "<td>".$temp['isi_paket']."</td>";
				echo "<td>".$temp['sasaran']."</td>";
				echo "<td>".$temp['status']."</td>"; 
				echo "</tr>";
			}				

				
			?>
		</tbody>
	</table>
	<br><input type="button" class="btn btn-default" onclick="location.href='admin/p_masuk.php';"value="Kembali">
</center>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
	$paket = $_POST['paket'];
	$nama = $_SESSION['namaUser'];
	$no_ktp = $_SESSION['no_ktp'];
	$ambil = "AKAN DATANG";	
	$data1 = "INSERT INTO tbl_paket(tgl_datang, sasaran, isi_paket, status) VALUES ('$tgl_datang', '$nama','$paket','$ambil')";
	$sql = mysqli_query($conn, $data1);

	if($sql){
		echo "<script language = 'javascript'>alert('Data berhasil disimpan');document.location=('user.php');</script>";
	}

}


?>