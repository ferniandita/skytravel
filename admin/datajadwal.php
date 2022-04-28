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
  <h1 id="title">Data Jadwal</h1>
  <form action="kelolajadwal.php" method="post">
    <?php
      include 'database.php';
      $sql = "select * from jadwal";
      $hasil = mysqli_query($koneksi, $sql);

      print("<table border=2>
    <tr>
      <th></th>
      <th id=text>ID Jadwal</th>
      <th id=text>Nama Maskapai</th>
      <th id=text>Asal</th>
      <th id=text>Tujuan</th>
      <th id=text>Tanggal</th>
      <th id=text>Berangkat</th>
      <th id=text>Tiba</th>
      <th id=text>Kelas</th>
      <th id=text>Harga</th>
      <th id=text>Total Kursi</th>
      <th id=text>Dipesan</th>
      <th id=text>Sisa Kursi</th>
    </tr>");
      while ($data = mysqli_fetch_array($hasil)) {
      $idjadwal = $data['idjadwal'];
      $maskapai = $data['maskapai'];
      $asal = $data['asal'];
      $tujuan = $data['tujuan'];
      $tanggal = $data['tanggal'];
      $berangkat = $data['berangkat'];
      $tiba = $data['tiba'];
      $kelas = $data['kelas'];
      $harga = $data['harga'];
      $totalkursi = $data['totalkursi'];
      $dipesan = $data['dipesan'];
      $sisakursi = $data['sisakursi'];
      echo "<tr><td><input type=radio name=pilih value=$idjadwal></td>
      <td id=text>$idjadwal</td>
      <td id=text>$maskapai</td>
      <td id=text>$asal</td>
      <td id=text>$tujuan</td>
      <td id=text>$tanggal</td>
      <td id=text>$berangkat</td>
      <td id=text>$tiba</td>
      <td id=text>$kelas</td>
      <td id=text>$harga</td>
      <td id=text>$totalkursi</td>
      <td id=text>$dipesan</td>
      <td id=text>$sisakursi</td></tr>
      ";
    }
    print("</table> <br><br>");
    ?>
    <input type="submit" name="action" value="Tambah" id="submit">
    <input type="submit" name="action" value="Ubah" id="submit">
    <input type="submit" name="action" value="Hapus" id="submit">
  </form>
</center>
</div>
</body>
</html>