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
  <h1 id="title">Selesai</h1>
  <ul class="progressbar">
        <li class="active">Isi Data</li>
        <li class="active">Review</li>
        <li class="active">Pembayaran</li>
        <li class="active">Selesai</li>
      </ul>
  <div id="review">
    <br>
    <h1 id="text">Selamat Pemesanan Berhasil Dilakukan</h1>
    <h2 id="text">Kode Booking Anda Adalah</h2>
    <?php
      include 'database.php';
      $query = "select * FROM pemesanan ORDER BY idpesan DESC LIMIT 1";
      $hasil = mysqli_query($koneksi, $query);
      $data = mysqli_fetch_array($hasil);
      $idpesan = $data['idpesan'];
      echo "<h3 id=text3>$idpesan</h3>";
    ?>
  </div>
</center>
<form action="beranda.php" method="POST">
  <center><input id="submit" type="submit" name="next" value="Selesai"></center>
</form>
</div>
</body>
</html>
