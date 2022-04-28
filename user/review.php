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
  <h1 id="title">Review Pemesanan</h1>
  <ul class="progressbar">
        <li class="active">Isi Data</li>
        <li class="active">Review</li>
        <li>Pembayaran</li>
        <li>Selesai</li>
      </ul>
  <div id="card">
    <form action="pembayaran.php" method="POST">
      <h1 id="text2"><center>Review Pesanan</center></h1>
    <table border="2">
    <?php
      include 'database.php';
      $query = "select p.*,j.* FROM pemesanan p join jadwal j ON p.idjadwal = j.idjadwal ORDER BY p.idpesan DESC LIMIT 1";
      $hasil = mysqli_query($koneksi,$query);
      print("<tr>
        <th id=text>Nama Maskapai</th>
        <th id=text>Asal</th>
        <th id=text>Tujuan</th>
        <th id=text>Tanggal</th>
        <th id=text>Berangkat</th>
        <th id=text>Tiba</th>
        <th id=text>Kelas</th>
        <th id=text>Nama Lengkap</th>
        <th id=text>No. KTP/Passport</th>
        <th id=text>Alamat</th>
        <th id=text>No. Handphone</th>
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
        $idpesan = $data['idpesan'];
        $nama = $data['nama'];
        $noktp = $data['noktp'];
        $alamat = $data['alamat'];
        $nohp = $data['nohp'];
        print("<tr>
        <td id=text>$maskapai</td>
        <td id=text>$asal</td>
        <td id=text>$tujuan</td>
        <td id=text>$tanggal</td>
        <td id=text>$berangkat</td>
        <td id=text>$tiba</td>
        <td id=text>$kelas</td>
        <td id=text>$nama</td>
        <td id=text>$noktp</td>
        <td id=text>$alamat</td>
        <td id=text>$nohp</td>
      </tr>");
      }
    ?>
    </table><br><br>
  </div>
  <center><input id="submit" type="submit" name="next" value="Selanjutnya"></center>
</form>
</div>
</body>
</html>
