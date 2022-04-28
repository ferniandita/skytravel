<?php
include 'database.php';
session_start(); //memulai session
  if(!isset($_SESSION)) session_start();
    
  if (empty($_SESSION['uname'])) {
    echo "<script> alert('Anda Harus Login!')</script>";
    echo "<meta http-equiv=refresh content=0;url=login.php>";
    exit();
  }
  	$query = "select * from promo";
    $hasil_sql = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($hasil_sql);
	$action=$_POST['action'];
	$kodepromo = $_POST['kodepromo'];
    $diskon = $_POST['diskon'];
    $gambar = $_POST['gambar'];

	switch($action)
	{
		case "Tambah":
		 $dipesan = 0;
			$sql	= "insert into promo values ('$kodepromo',$diskon,'$gambar')";
			$hasil = mysqli_query($koneksi, $sql);
		break;

		case "Ubah":
			$sql	= "update promo set kodepromo='$kodepromo', diskon=$diskon, gambar='$gambar'";
			$hasil = mysqli_query($koneksi, $sql);
		break;

		case "Hapus":
			$sql	= "delete from promo where kodepromo like '$kodepromo'";
		break;

	}
	header('location:datapromo.php');
	?>