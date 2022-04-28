<?php
	$database = "travel";
	$hostname = "localhost";
	$username = "root";
	$password = "";

	$koneksi = mysqli_connect($hostname, $username, $password);
	$db = mysqli_select_db($koneksi, $database);
?>