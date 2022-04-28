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
	<title>Edit Profile</title>
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
<div id="card3">
  <center>
  <form action="updateprofil.php" method="post">
    <?php
      include 'database.php';
      $username = $_SESSION['username'];
      $query = "select * from member where username='$username'";
      $edit = mysqli_query($koneksi, $query);
      $data = mysqli_fetch_array($edit);
    ?>
    <table>
			<tr>
				<td colspan="2"><center><h1 id="title">EDIT PROFILE</h1></center></td>
			</tr>
    <tr>
      <td id="text">Nama Lengkap</td>
			<td id="text">Alamat E-mail</td>
    </tr>
    <tr>
      <td><center><input id="input3" type="text" name="nama" value="<?php echo $data ['nama']; ?>"></center></td>
			<td><center><input id="input3" type="text" name="email" value="<?php echo $data ['email']; ?>"></center></td>
    </tr>
    <tr>
      <td id="text">Tanggal Lahir</td>
			<td id="text">Username</td>
    </tr>
    <tr>
      <td><center><input id="input3" type="date" name="tgllhr" value="<?php echo $data ['ttl']; ?>"></center></td>
			<td><center><input id="input3" type="text" name="username" value="<?php echo $data ['username']; ?>"></center></td>
    </tr>
    <tr>
			<td id="text">Nomor Handphone</td>
      <td id="text">Password</td>
    </tr>
    <tr>
			<td><center><input id="input3" type="text" name="nohp" value="<?php echo $data ['nohp']; ?>"></center></td>
      <td><center><input id="input3" type="password" name="password" value="<?php echo $data ['password']; ?>"></center></td>
    </tr>
    <tr>
      <td colspan="2"><br><br><center><input id="submit" type="submit" name="simpan" value="Simpan"></center></td>
    </tr>
    </table>
  </form>
</center>
</div>
</center>
</div>
</body>
</html>
