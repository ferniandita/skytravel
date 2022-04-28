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
  <h1 id="title">Data Promo</h1>
  <form action="kelolapromo.php" method="post">
    <?php
      include 'database.php';
      $sql = "select * from promo";
      $hasil = mysqli_query($koneksi, $sql);
      print("<table border=2>
      <tr>
      <th></th>
      <th id=text>Kode Promo</th>
      <th id=text>Diskon</th>
      <th id=text>Gambar</th>
      </tr>");
      while ($data = mysqli_fetch_array($hasil)) {
        $kodepromo = $data['kodepromo'];
        $diskon = $data['diskon'];
        $gambar = $data['gambar'];
        echo "<tr><td><input type=radio name=pilih value=$kodepromo></td>
        <td id=text>$kodepromo</td>
        <td id=text>$diskon</td>
        <td id=text><img src=/project/img/$gambar.jpg width=220></td>
        </tr>";
      }
      print("</table><br><br>");
    ?>
    <input type="submit" name="action" value="Tambah" id="submit">
    <input type="submit" name="action" value="Ubah" id="submit">
    <input type="submit" name="action" value="Hapus" id="submit">
  </form>
</center>
</div>
</body>
</html>
