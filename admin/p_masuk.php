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

	<title>Input Paket</title>
</head>
<body>
<center>
	<h2>Selamat Datang Sebagai Admin, Hallo <?php  echo $_SESSION['namaUser'];?></h2>
	<form method="POST">
		<table>
			<tr>
				<td>Isi Paket</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="paket"></td>
			</tr>
			<tr>
				<td>Tanggal Datang</td>
				<td>:</td>
				<td><?php echo $tgl_datang; ?></td>
			</tr>
			<tr>
				<td>Penghuni</td>
				<td>:</td>
				<td>
					<select class="form-control" name="nama">
					<?php 
						$sql = mysqli_query($conn, "SELECT * FROM tbl_penghuni");
						while ($row = $sql->fetch_assoc()){
							echo "<option value=". $row['no_ktp'] .">" . $row['p_nama'] . "</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Petugas</td>
				<td>:</td>
				<td><?php echo $_SESSION['namaUser'];?></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" name="submit" value="Masuk"><br>
	</form><br>
	<table class="table table-striped" border="2">
		<thead>
		<tr>
			<th>No</th>
			<th>Isi Paket</th>
			<th>Tanggal Datang</th>
			<th>Penghuni</th>
			<th>Karyawan</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
			$sql = "SELECT * FROM tbl_paket JOIN tbl_penghuni on tbl_paket.no_ktp = tbl_penghuni.no_ktp
			JOIN tbl_karyawan ON tbl_paket.nip= tbl_karyawan.nip";

			$result=mysqli_query($conn, $sql) or die (mysqli_error($conn));
			while($dataa = mysqli_fetch_array($result)){

				echo "<tr>";

				echo "<td>".$no."</td>";
				echo "<td>".$dataa['isi_paket']."</td>";
				echo "<td>".$dataa['k_nama']."</td>";
				echo "<td>".$dataa['p_nama']."</td>";
				// echo "<td>".$temp['tgl_datang']."</td>";
				// echo "<td>".$temp['tbl_karyawan.nama']."</td>";
				// echo "<td>".$temp['penerima']."</td>";

				$no++;

				echo "</tr>";
			}
			?>
		</tbody>
	</table>
	<br><input type="button" class="btn btn-default" onclick="location.href='admin.php';"value="Kembali">
</center>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
	$paket = $_POST['paket'];
	$nama = $_POST['nama'];
	$karyawan = $_SESSION['nip'];
	$ambil = "BELUM DIAMBIL";	
	$data1 = "INSERT INTO tbl_paket(isi_paket, tgl_datang, sasaran, penerima, status) VALUES ('$paket', '$tgl_datang','$nama', '$karyawan', '$ambil')";
	$sql = mysqli_query($conn, $data1);

	if($sql){
		header( "location:p_masuk.php");
	}
}

?>