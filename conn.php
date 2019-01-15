<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "post";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
	echo("Mohon Maaf Koneksi Gagal:(");
}
?>