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
  <h1 id="title">Cek Pesanan</h1>
  <form action="cekpesanan.php" method="post">
    <table>
      <tr>
        <td><input id="input" type="text" name="kodebooking" placeholder="Masukkan Kode Booking"></td>
      </tr>
      <tr>
        <td colspan="2"><br><center><input id="submit" type="submit" name="cek" value="Cek Pesanan"></center></td>
      </tr>
    </table>
  </form>
  <br><br>

  <form action="prosescancel.php" method="post">
  <div id="card">
  <table border="2"><br><br>
  <center>
  <?php
    include 'database.php';
    if (isset($_POST['cek'])) {
      $kodebooking = $_POST['kodebooking'];
      $cari = "select p.*, j.*, b.* from pemesanan p join jadwal j on p.idjadwal = j.idjadwal join pembayaran b on b.idpesan = p.idpesan where p.idpesan = '$kodebooking'";
      $hasil = mysqli_query($koneksi, $cari);
      echo "
      <tr>
        <th></th>
        <th id=text width=150px>Kode Booking</th>
        <th id=text width=150px>Nama Maskapai</th>
        <th id=text width=115px>Asal</th>
        <th id=text width=115px>Tujuan</th>
        <th id=text width=115px>Tanggal</th>
        <th id=text width=115px>Berangkat</th>
        <th id=text width=115px>Tiba</th>
        <th id=text width=115px>Kelas</th>
        <th id=text width=115px>Jumlah</th>
        <th id=text width=115px>Total Harga</th>
      </tr>";
        $data = mysqli_fetch_array($hasil);
        $idpesan = $data['idpesan'];
        $idjadwal = $data['idjadwal'];
        $maskapai = $data['maskapai'];
        $asal = $data['asal'];
        $tujuan = $data['tujuan'];
        $tanggal = $data['tanggal'];
        $berangkat = $data['berangkat'];
        $tiba = $data['tiba'];
        $kelas = $data['kelas'];
        $totalharga = $data['totalharga'];
        $jmlpesan = $data['jmlpesan'];

        echo "<tr>
        <td><input type=radio name=pilih value=$idpesan></td>
        <td id=text>$idpesan</td>
        <td id=text width=150px>$maskapai</td>
        <td id=text width=115px>$asal</td>
        <td id=text width=115px>$tujuan</td>
        <td id=text width=115px>$tanggal</td>
        <td id=text width=115px>$berangkat</td>
        <td id=text width=115px>$tiba</td>
        <td id=text width=115px>$kelas</td>
        <td id=text>$jmlpesan</td>
        <td id=text width=115px>$totalharga</td>
        </tr>";
    }
  ?>    
      </table><br><br>
      </div>
      <input id="submit" type="submit" name="pesan" value="Cancel Pesanan">
      </center>
    </form>
</center>
</div>
</body>
</html>
