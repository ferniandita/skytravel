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
<h1 id="title">Daftar Promo</h1>
</center>
  <div id="container">
    <?php
        include 'database.php';
        $query = "select * from promo";
        $hasil = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($hasil)) {
          $kodepromo = $data['kodepromo'];
          $diskon = $data['diskon'];
          $gambar = $data['gambar'];
          print("<div id=promo>
      <table>
        <tr>
          <td width=220><center><img id=gambarpromo src=/project/img/$gambar.jpg width=220></center></td>
        </tr>
        <tr>
          <td id=text width=220><center>Diskon: $diskon</center></td>
        </tr>
        <tr>
          <td id=text width=220><center>Gunakan Kode:</center></td>
        </tr>
        <tr>
          <td id=text3 width=220><center>$kodepromo</center></td>
        </tr>
      </table>
    </div>");
        }
      ?>    
  </div>
</div>
</body>
</html>
