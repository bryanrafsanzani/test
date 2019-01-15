<?php
include '../conn.php';

session_start();
if($_SESSION['status']!="login"){
		header("location:../login.php?pesan=belum_login");
	}


$no = $_GET['no'];
$sudahDiambil = "DIKEMBALIKAN";

$data = "SELECT * FROM tbl_paket where no='$no'";
$sql = mysqli_query($conn, $data);
$data3 = mysqli_fetch_array($sql);
$isi_paket = $data3['isi_paket'];
$penghuni = $data3['sasaran'];
$Karyawan = $data3['penerima'];
$tgl_datang = $data3['tgl_datang'];
$tgl_dikembalikan = date("Y/m/d");
$status = $data3['tgl_ambil'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Paket</title>
</head>
<body>
<center>
	<h1>Mengubah Status Paket</h1>
	<form method="POST">
		<table>
			<tr>
				<td>Isi Paket</td>
				<td>:</td>
				<td><?php echo $isi_paket; ?></td>
			</tr>
			<tr>
				<td>Tanggal Datang</td>
				<td>:</td>
				<td><?php echo $tgl_datang; ?></td>
			</tr>
			<tr>
				<td>Penghuni</td>
				<td>:</td>
				<td><?php echo $penghuni ?></td>
			</tr>
			<tr>
				<td>Karyawan</td>
				<td>:</td>
				<td><?php echo $Karyawan;?></td>
			</tr>
			<tr>
				<td>Tanggal Dikembalikan</td>
				<td>:</td>
				<td><?php echo $tgl_dikembalikan;?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td>
					<select name="status">
					<?php echo "<option value=". $row['tgl_ambil'] .">". $status ."</option>"; ?>
					<?php echo "<option value=".$sudahDiambil.">". $sudahDiambil ."</option>"; ?>
					</select></td>
			</tr>
		</table>
		<br><tr>
		<input type="submit"  name="ubah" value="KEMBALIKAN"><br>
	</form><br>
</center>
</body>
</html>

<?php

if(isset($_POST['ubah'])){
	$status = $_POST['status'];

	if($status == "DIKEMBALIKAN"){
		$Status_data=$_POST['status'];

	$data1 = "UPDATE tbl_paket SET tgl_ambil='".$Status_data."' where no='".$no."'";
	$sql = mysqli_query($conn, $data1);
		if($sql){
			header( "location:p_keluar.php");
		}
	}
}
?>