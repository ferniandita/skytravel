<?php
  include 'database.php';
  session_start(); //memulai session
  if(!isset($_SESSION)) session_start();
    
  if (empty($_SESSION['uname'])) {
    echo "<script> alert('Anda Harus Login!')</script>";
    echo "<meta http-equiv=refresh content=0;url=login.php>";
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sky Travel</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div class="akun">
  <ul>
    <li id="hello">Hello, <?php echo $_SESSION['uname'];?></li>
    <li>Hello, <a href="logout.php" id="loginprofil">Logout</a></li>
  </ul>
</div>
<div class="menu">
  <div class="nav">
    <ul>
      <li><a href="beranda.php">Beranda</a></li>
      <li><a href="datamember.php">Member</a></li>
      <li><a href="datajadwal.php">Jadwal</a></li>
      <li><a href="datapromo.php">Promo</a></li>
      <li><a href="datapesan.php">Pemesanan</a></li>
    </ul>
  </div>
</div>
<div class="isi">
<center>
  <h1 id="title">Data Pemesanan</h1>
  <?php
      include 'database.php';
      $sql = "select p.*, j.*, b.*, r.* from pemesanan p join jadwal j ON p.idjadwal = j.idjadwal join pembayaran b ON p.idpesan = b.idpesan join promo r ON b.kodepromo = r.kodepromo";
      $hasil = mysqli_query($koneksi, $sql);

      print("<table border=2>
    <tr>
      <th id=text>ID Pesan</th>
      <th id=text>Nama</th>
      <th id=text>No KTP</th>
      <th id=text>Alamat</th>
      <th id=text>No. HP</th>
      <th id=text>Nama Maskapai</th>
      <th id=text>Asal</th>
      <th id=text>Tujuan</th>
      <th id=text>Tanggal</th>
      <th id=text>Berangkat</th>
      <th id=text>Tiba</th>
      <th id=text>Kelas</th>
      <th id=text>Harga</th>
      <th id=text>Jumlah</th>
      <th id=text>Kode Promo</th>
      <th id=text>Diskon</th>
      <th id=text>Total Harga</th>
    </tr>");
      while ($data = mysqli_fetch_array($hasil)) {
        $idpesan = $data['idpesan'];
        $nama = $data['nama'];
        $noktp = $data['noktp'];
        $alamat = $data['alamat'];
        $nohp = $data['nohp'];
        $jmlpesan = $data['jmlpesan'];
        $maskapai = $data['maskapai'];
        $asal = $data['asal'];
        $tujuan = $data['tujuan'];
        $tanggal = $data['tanggal'];
        $berangkat = $data['berangkat'];
        $tiba = $data['tiba'];
        $kelas = $data['kelas'];
        $harga = $data['harga'];
        $kodepromo = $data['kodepromo'];
        $diskon = $data['diskon'];
        $totalharga = $data['totalharga'];
        echo "<tr>
        <td id=text>$idpesan</td>
        <td id=text>$nama</td>
        <td id=text>$noktp</td>
        <td id=text>$alamat</td>
        <td id=text>$nohp</td>
        <td id=text>$maskapai</td>
        <td id=text>$asal</td>
        <td id=text>$tujuan</td>
        <td id=text>$tanggal</td>
        <td id=text>$berangkat</td>
        <td id=text>$tiba</td>
        <td id=text>$kelas</td>
        <td id=text>$harga</td>
        <td id=text>$jmlpesan</td>
        <td id=text>$kodepromo</td>
        <td id=text>$diskon</td>
        <td id=text>$totalharga</td>
        </tr>
      ";
    }
    print("</table> <br><br>");
  ?>
</center>
</div>
</body>
</html>
