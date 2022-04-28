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
  <?php
    $action = $_POST['action']; 
  ?>
  <h1 id="title"><?php print("$action");?> Data Promo</h1>
  <form action="prosespromo.php" method="post">
    <?php
    include 'database.php';
    if($action == "Tambah")
    {
      $kodepromo = "";
      $diskon = "";
      $gambar = "";
    }
    else
    {
      $pilih = $_POST['pilih'];
      $sql = "select * from promo where kodepromo = '$pilih'";
      $hasil = mysqli_query($koneksi,$sql);
      $data = mysqli_fetch_array($hasil);
      $kodepromo = $data['kodepromo'];
      $diskon = $data['diskon'];
      $gambar = $data['gambar'];
  }
  print("<input type = hidden name = action value = $action>");

  ?>
    <table>
      <tr>
        <td id="text">Kode Promo</td>
        <td id="text">:</td>
        <td><input id="input" type="text" name="kodepromo" value="<?php print("$kodepromo");?>"></td>
      </tr>
      <tr>
        <td id="text">Diskon</td>
        <td id="text">:</td>
        <td><input id="input" type="number" name="diskon" value="<?php print("$diskon");?>"></td>
      </tr>
      <tr>
        <td id="text">Nama Gambar</td>
        <td id="text">:</td>
        <td><input id="input" type="text" name="gambar" value="<?php print("$gambar");?>"></td>
      </tr>
      <tr>
        <td colspan="3"><br><center><input id="submit" type="submit" name="simpan" value="Proses"></center></td>
      </tr>
    </table>
  </form>
</center>
</div>
</body>
</html>