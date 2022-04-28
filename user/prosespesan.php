<?php
	include 'database.php';
	$idjadwal = $_POST['idjadwal'];
	$jml = $_POST['jml'];
	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$noktp = $_POST['noktp'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['nohp'];

	$insert = "insert into pemesanan value('','$username','$idjadwal','$nama','$noktp','$alamat','$nohp','$jml' )";
	$hasil = mysqli_query($koneksi, $insert);
		$sql = "select * from jadwal j join pemesanan p on j.idjadwal = p.idjadwal";
	$hasil2 = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_array($hasil2);
	$totalkursi = $data['totalkursi'];
	$dipesan = $data['dipesan'];
	$pesan = $dipesan+$jml;
	$sisakursi = $totalkursi - $pesan;
	$update = "update jadwal set dipesan='$pesan',sisakursi=$sisakursi where idjadwal=$idjadwal";
	$hasil3 = mysqli_query($koneksi, $update);
	header('location:review.php');
?> 