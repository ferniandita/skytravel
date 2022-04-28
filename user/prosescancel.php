<?php
	include 'database.php';
	$pilih = $_POST['pilih'];
	$query = "select p.*, j.*, b.* from pemesanan p join jadwal j on p.idjadwal = j.idjadwal join pembayaran b on b.idpesan = p.idpesan where p.idpesan = '$pilih'";
	$hasil1 = mysqli_query($koneksi, $query);
	$data = mysqli_fetch_array($hasil1);
	$idjadwal = $data['idjadwal'];
	$idpesan = $data['idpesan'];
	$idbayar = $data['idbayar'];
	$jml = $data['jmlpesan'];
	$totalkursi = $data['totalkursi'];
	$dipesan = $data['dipesan'];
	$pesan = $dipesan-$jml;
	$sisakursi = $totalkursi + $pesan;
	$update = "update jadwal set dipesan=$pesan,sisakursi=$sisakursi where idjadwal='$idjadwal'";
	$hasil2 = mysqli_query($koneksi, $update);

	$delete1 = "delete from pembayaran where idpesan = '$idpesan'";
	$hasil3 = mysqli_query($koneksi, $delete1);

	$delete2 = "delete from pemesanan where idpesan = '$idpesan'";
	$hasil4 = mysqli_query($koneksi, $delete2);
	header('location: cekpesanan.php');
?>