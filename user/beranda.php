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
<div class="beranda">
  <center>
  <div class="banner">
    <img class="slide" src="/project/img/banner1.png" width="810px">
    <img class="slide" src="/project/img/banner2.png" width="810px">
    <img class="slide" src="/project/img/banner3.png" width="810px">
    <img class="slide" src="/project/img/banner4.png" width="810px">
    <img class="slide" src="/project/img/banner5.png" width="810px">
    <script type="text/javascript" src="travel.js"></script>
  </div>
  </center>
    <center>
    <table style="margin-top: 450px">
    <tr>
      <td><img src="/project/img/facebook.png"></td>
      <td id="text">Sky Travel</td>
      <td><img src="/project/img/instgrm.png"></td>
      <td id="text">@skytravel</td>
      <td><img src="/project/img/whatsapp.png"></td>
      <td id="text">+6285655000200</td>
      <td><img src="/project/img/email.png"></td>
      <td id="text">skytravel@gmail.com</td>
      <td><img src="/project/img/twitter.png"></td>
      <td id="text">@skytravel</td>
      <td><img src="/project/img/line.png"></td>
      <td id="text">@skytravel</td>
    </tr>
  </table>
  </center>
</div>
</body>
</html>
