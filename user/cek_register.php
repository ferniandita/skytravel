<?php
	include 'database.php';
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$tgllhr = $_POST['tgllhr'];
	$nohp = $_POST['nohp'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "insert into member value('$nama','$email','$tgllhr','$nohp', '$username','$password')";
	$daftar = mysqli_query($koneksi, $query);
?>