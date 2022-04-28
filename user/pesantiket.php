<?php
  include 'database.php';
  session_start(); //memulai session
  if(!isset($_SESSION)) session_start();
    
  if (empty($_SESSION['username'])) {
    echo "<script> alert('Anda Harus Login!')</script>";
    echo "<meta http-equiv=refresh content=0;url=login.php>";
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sky Travel</title>
	<link rel="stylesheet" type="text/css" href="travel.css">
</head>
<body>
<div class="akun">
	<ul>
    <li id="hello">Hello, <a href="editprofil.php?username=<?php echo $_SESSION ['username']; ?>" id="loginprofil"><?php echo $_SESSION['username'];?></a></li>
    <li>Hello, <a href="logout.php" id="loginprofil">Logout</a></li>
  </ul>
</div>
<div class="logo">
</div>
<div class="menu">
<nav role="navigation">
  <div id="menuToggle">
    <input type="checkbox" />
    <span></span>
    <span></span>
    <span></span>
    <ul id="menu">
      <a href="beranda.php"><li>Beranda</li></a>
      <a href="pesantiket.php"><li>Pesan Tiket</li></a>
      <a href="promo.php"><li>Promo</li></a>
      <a href="cekpesanan.php"><li>Cek Pesanan</li></a>
    </ul>
  </div>
</nav>
</div>
<div class="isi">
<center>
  <h1 id="title">Pesan Tiket</h1>
  <form action="pesantiket.php" method="POST">
    <table>
      <tr>
        <td id="text">Asal</td>
        <td id="text">Tujuan</td>
        <td id="text">Tanggal Keberangkatan</td>
        <td id="text">Jumlah Penumpang</td>
      </tr>
      <tr>
        <td><input id="input" type="text" name="asal"></td>
        <td><input id="input" type="text" name="tujuan"></td>
        <td><input id="input" type="date" name="tgl"></td>
        <td><input id="input" type="number" name="jml"></td>
      </tr>
      <tr>
        <td colspan="5"><br><center><input id="submit" type="submit" name="cari" value="Cari Tiket"></center></td>
      </tr>
    </table>
  </form>
  <br><br>
  <form action="pemesanan.php" method="post">
  <?php
  include 'database.php';
    if (isset($_POST['cari'])) {
      $asal = $_POST['asal'];
      $tujuan = $_POST['tujuan'];
      $tgl = $_POST['tgl'];
      $jml = $_POST['jml'];
      $cari = "select * from jadwal where asal = '$asal' and tujuan = '$tujuan' and tanggal = '$tgl'";
      $hasil= mysqli_query($koneksi, $cari);
      echo "
      <div id=card>
      <table border=2><br><br>
      <center>
      <tr>
        <th></th>
        <th id=text width=150px>Nama Maskapai</th>
        <th id=text width=115px>Asal</th>
        <th id=text width=115px>Tujuan</th>
        <th id=text width=115px>Tanggal</th>
        <th id=text width=115px>Berangkat</th>
        <th id=text width=115px>Tiba</th>
        <th id=text width=115px>Kelas</th>
        <th id=text width=115px>Harga</th>
        <th id=text width=115px>Sisa Kursi</th>
      </tr>";
      while($data = mysqli_fetch_array($hasil)) {
        $idjadwal = $data['idjadwal'];
        $maskapai = $data['maskapai'];
        $asal = $data['asal'];
        $tujuan = $data['tujuan'];
        $tanggal = $data['tanggal'];
        $berangkat = $data['berangkat'];
        $tiba = $data['tiba'];
        $kelas = $data['kelas'];
        $harga = $data['harga'];
        $sisakursi = $data['sisakursi'];
        if ($jml <= $sisakursi) {
          echo "
      <tr>
        <td><input type=radio name=pilih value=$idjadwal></td>
        <td id=text width=150px>$maskapai</td>
        <td id=text width=115px>$asal</td>
        <td id=text width=115px>$tujuan</td>
        <td id=text width=115px>$tanggal</td>
        <td id=text width=115px>$berangkat</td>
        <td id=text width=115px>$tiba</td>
        <td id=text width=115px>$kelas</td>
        <td id=text width=115px>$harga</td>
        <td id=text width=115px>$sisakursi</td>
      </tr>";
          } else {
          echo "<tr><td colspan=9 id=text>Data Tidak Ditemukan</td></tr>";
          }
      }
      echo "</table><br><br>
  </div>";
    }
  ?>
    <input type="hidden" name="jml" value="<?php print("$jml");?>">
    <input id="submit" type="submit" name="pesan" value="Pesan">
    </center>    
  </form>
</center>
</div>
</body>
</html>