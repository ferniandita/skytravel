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
  <h1 id="title">Data Member</h1>
  <?php
  include 'database.php';
  $sql = "select * from member";
  $hasil = mysqli_query($koneksi, $sql);
    print("<table border=2>
    <tr>
      <th id=text>Nama</th>
      <th id=text>Email</th>
      <th id=text>Tanggal Lahir</th>
      <th id=text>Nomor Handphone</th>
      <th id=text>Username</th>
    </tr>");
    while ($data = mysqli_fetch_array($hasil)) {
      $nama = $data['nama'];
      $email = $data['email'];
      $ttl = $data['ttl'];
      $nohp = $data['nohp'];
      $username = $data['username'];
      echo "<tr>
      <td id=text>$nama</td>
      <td id=text>$email</td>
      <td id=text>$ttl</td>
      <td id=text>$nohp</td>
      <td id=text>$username</td></tr>";
    }
    print("</table> <br><br>");
  ?>  
</center>
</div>
</body>
</html>
