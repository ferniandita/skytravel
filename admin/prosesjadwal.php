<?php
include 'database.php';
session_start(); //memulai session
  if(!isset($_SESSION)) session_start();
    
  if (empty($_SESSION['uname'])) {
    echo "<script> alert('Anda Harus Login!')</script>";
    echo "<meta http-equiv=refresh content=0;url=login.php>";
    exit();
  }
    $query2="select * from pemesanan p join jadwal j ON p.idjadwal = j.idjadwal";
    $hasil2 = mysqli_query($koneksi, $query2);
    $data2 = mysqli_fetch_array($hasil2);

	$action=$_POST['action'];
	$idjadwal = $_POST['idjadwal'];
    $maskapai = $_POST['maskapai'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $tanggal = $_POST['tanggal'];
    $berangkat = $_POST['berangkat'];
    $tiba = $_POST['tiba'];
    $kelas = $_POST['kelas'];
    $harga = $_POST['harga'];
    $totalkursi = $_POST['totalkursi'];
  	$kursi = $data2['totalkursi'];
  	$jadwal = $data2['idjadwal'];
  	$dipesan = $data2['dipesan'];
  	$jmlpesan = $data2['jmlpesan'];
	switch($action)
	{
		case "Tambah":
			$jml = 0;
			$sisakursi = $totalkursi - $jml;
			$sql	= "insert into jadwal values ('','$maskapai','$asal','$tujuan', '$tanggal', '$berangkat', '$tiba', '$kelas', '$harga','$totalkursi','$jml','$sisakursi')";
			$hasil = mysqli_query($koneksi, $sql);
		break;

		case "Ubah":
			if ($jadwal==$idjadwal) {
  				$jml = $jmlpesan;
  			} else{
  				$jml=0;
  			}
  			$sisakursi = $totalkursi - $jml;
			$sql	= "update jadwal set maskapai='$maskapai', asal='$asal', tujuan='$tujuan', tanggal='$tanggal', berangkat='$berangkat', tiba='$tiba',kelas='$kelas', harga='$harga', totalkursi='$totalkursi', dipesan='$jml', sisakursi='$sisakursi' where idjadwal = '$idjadwal'";
			$hasil = mysqli_query($koneksi, $sql);
		break;

		case "Hapus":
			$sql	= "delete from jadwal where idjadwal like $idjadwal";
			$hasil = mysqli_query($koneksi, $sql);
		break;

	}
	header('location:datajadwal.php');
	?>