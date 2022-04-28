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
  <h1 id="title"><?php print("$action");?> Data Jadwal</h1>
  <form action="prosesjadwal.php" method="post">
    <?php
    include 'database.php';
    if($action == "Tambah")
    {
      $idjadwal = "";
      $maskapai = "";
      $asal = "";
      $tujuan = "";
      $tanggal = "";
      $berangkat = "";
      $tiba = "";
      $kelas = "";
      $harga = "";
      $totalkursi = "";
    }
    else
    {
      $pilih = $_POST['pilih'];
      $sql = "select * from jadwal where idjadwal = '$pilih'";
      $hasil = mysqli_query($koneksi,$sql);
      $data = mysqli_fetch_array($hasil);
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
  }
  print("<input type = hidden name = idjadwal value = $idjadwal> <input type = hidden name = action value = $action>");

  ?>
    <table>
      <tr>
        <td id="text">Nama Maskapai</td>
        <td id="text">:</td>
        <td><select id="input2" name="maskapai">
          <option value="Garuda Indonesia">Garuda Indonesia</option>
          <option value="Lion Air">Lion Air</option>
          <option value="Air Asia">Air Asia</option>
          <option value="Citilink">Citilink</option>
          <option value="Sriwijaya Air">Sriwijaya Air</option>
        </select></td>
      </tr>
      <tr>
        <td id="text">Asal</td>
        <td id="text">:</td>
        <td><input id="input" type="text" name="asal" value="<?php print("$asal");?>"></td>
      </tr>
      <tr>
        <td id="text">Tujuan</td>
        <td id="text">:</td>
        <td><input id="input" type="text" name="tujuan" value="<?php print("$tujuan");?>"></td>
      </tr>
      <tr>
        <td id="text">Tanggal</td>
        <td id="text">:</td>
        <td><input id="input" type="date" name="tanggal" value="<?php print("$tanggal");?>"></td>
      </tr>
      <tr>
        <td id="text">Berangkat</td>
        <td id="text">:</td>
        <td><input id="input" type="time" name="berangkat" value="<?php print("$berangkat");?>"></td>
      </tr>
      <tr>
        <td id="text">Tiba</td>
        <td id="text">:</td>
        <td><input id="input" type="time" name="tiba" value="<?php print("$tiba");?>"></td>
      </tr>
      <tr>
        <td id="text">Kelas</td>
        <td id="text">:</td>
        <td><select id="input2" name="kelas">
          <option value="Ekonomi">Ekonomi</option>
          <option value="Bisnis">Bisnis</option>
          <option value="Eksekutif">Eksekutif</option>
        </select></td>
      </tr>
      <tr>
        <td id="text">Harga</td>
        <td id="text">:</td>
        <td><input id="input" type="text" name="harga" value="<?php print("$harga");?>"></td>
      </tr>
      <tr>
        <td id="text">Total Kursi</td>
        <td id="text">:</td>
        <td><input id="input" type="text" name="totalkursi" value="<?php print("$totalkursi");?>"></td>
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