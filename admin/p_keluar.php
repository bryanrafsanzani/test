<?php
include '../conn.php';
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

	<title>p_masuk</title>
</head>
<body>
<center>
	<h1>Daftar Barang Penerimaan Paket POS</h1>
			<h2>Admin, <?php  echo $_SESSION['namaUser'];?></h2>

	<h2>Paket yang belum dikembalikan</h2>
	<table class="table table-striped" border="2">
		<thead>
		<tr>
			<th>No</th>
			<th>Isi Paket</th>
			<th>Tanggal Datang</th>
			<th>Penghuni</th>
			<th>Karyawan</th>
			<th>Status</th>
			<th>Ubah</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$data2 = "SELECT * FROM tbl_paket where status!='DIKEMBALIKAN'";
			$query = mysqli_query($conn, $data2);
			while($temp=mysqli_fetch_array($query)){
				echo "<tr>";
				echo "<td>".$temp['no']."</td>";
				echo "<td>".$temp['isi_paket']."</td>";
				echo "<td>".$temp['tgl_datang']."</td>";
				echo "<td>".$temp['sasaran']."</td>";
				echo "<td>".$temp['penerima']."</td>";
				echo "<td>".$temp['status']."</td>";
				echo "<td><a href='p_ubah.php?no=".$temp['no']."'>UBAH</a></td>";
				echo "</tr>";
			}				

				
			?>
		</tbody>
	</table>

	<br><br>
	<h2>Paket yang sudah dikembalikan</h2>
	<table class="table table-striped" border="2">
		<thead>
		<tr>
			<th>No</th>
			<th>Isi Paket</th>
			<th>Tanggal Datang</th>
			<th>Penghuni</th>
			<th>Karyawan</th>
			<th>Status</th>
		</tr>
		</thead>
		<tbody>
			<?php
			$data4 = "SELECT * FROM tbl_paket where tgl_ambil='DIKEMBALIKAN'";
			$query1 = mysqli_query($conn, $data4);
			while($temp=mysqli_fetch_array($query1)){
				echo "<tr>";

				echo "<td>".$temp['no']."</td>";
				echo "<td>".$temp['tgl_datang']."</td>";
				echo "<td>".$temp['isi_paket']."</td>";
				echo "<td>".$temp['sasaran']."</td>";
				echo "<td>".$temp['penerima']."</td>";
				echo "<td>".$temp['tgl_ambil']."</td>"; 
				echo "</tr>";
			}				

				
			?>
		</tbody>
	</table>
	<br><input type="button" class="btn btn-default" onclick="location.href='admin.php';"value="Kembali">
</center>
</body>
</html>

