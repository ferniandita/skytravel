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
  <h1 id="title">Isi Data</h1>
  <ul class="progressbar">
        <li class="active">Isi Data</li>
        <li>Review</li>
        <li>Pembayaran</li>
        <li>Selesai</li>
  </ul>
  <div id="review">
  <form action="prosespesan.php" method="POST">
  <center>
    <?php
      include 'database.php';
      $pilih = $_POST['pilih'];
      $jml = $_POST['jml'];
      $sql = "select * from jadwal where idjadwal='$pilih'";
      $hasil = mysqli_query($koneksi, $sql);
      $data = mysqli_fetch_array($hasil);
      $idjadwal = $data['idjadwal'];
      $username = $_SESSION['username'];
    ?>
    <table>
    <tr>
    <td colspan="4"><center><h1 id="text2">Data Pemesan</h1></center></td>
    </tr>
    <tr>
      <td><input type="hidden" name="idjadwal" value="<?php print("$idjadwal");?>"></td>
      <input type="hidden" name="username" value="<?php print("$username");?>"></td>
      <td><input type="hidden" name="jml" value="<?php print("$jml");?>"></td>
    </tr>
      <tr>
        <td id="text">Nama Lengkap</td>
        <td><input id="input3" type="text" name="nama"></td>
      </tr>
      <tr>
        <td id="text">Nomor KTP/Passport</td>
        <td><input id="input3" type="text" name="noktp"></td>
      </tr>
      <tr>
        <td id="text">Alamat</td>
        <td><input id="input3" type="text" name="alamat"></td>
      </tr>
      <tr>
        <td id="text">Nomor Handphone</td>
        <td><input id="input3" type="text" name="nohp"></td>
      </tr>
    </table>
    <br>
  </div>
  <br>
<input id="submit" type="submit" name="next" value="Selanjutnya">
</center>
</form>
</center>
</div>
</body>
</html>
