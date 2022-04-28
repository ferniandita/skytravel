<?php
	include 'database.php';
	$idpesan = $_POST['idpesan'];
	$harga = $_POST['harga'];
	$jmlpesan = $_POST['jmlpesan'];
	$kode = $_POST['kode'];
	$diskon = $_POST['diskon'];
	$totalharga = $_POST['totalharga'];

	$query = "select * from promo where kodepromo = '$kode'";
    $result = mysqli_query($koneksi, $query);
    $tampil = mysqli_fetch_array($result);
    $kodepromo = $tampil['kodepromo'];
    if ($kodepromo==$kode){
    	$promo = $kode;
    } else {
    	$promo = "";
    }

	$insert = "insert into pembayaran value('','$idpesan','$harga','$jmlpesan','$promo','$diskon','$totalharga')";
    $hasil = mysqli_query($koneksi, $insert);
    header('location:selesai.php');
?>