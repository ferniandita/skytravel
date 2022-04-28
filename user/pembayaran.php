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
  <h1 id="title">Pembayaran</h1>
  <ul class="progressbar">
        <li class="active">Isi Data</li>
        <li class="active">Review</li>
        <li class="active">Pembayaran</li>
        <li>Selesai</li>
      </ul>
  <div id="review">
    <br>
    <form action="pembayaran.php" method="post">
      <table>
        
        <tr>
          <td><input id="input3" type="text" name="kode" placeholder="Kode Kupon"></td>
          <td><input id="submit" type="submit" name="kupon" value="Gunakan Kupon"></td>
        </tr>
      </table>
      <br>
      <table border="2">
        <tr>
          <th id=text width=100px>Harga</th>
          <th id=text width=125px>Jumlah Pesanan</th>
          <th id=text width=100px>Diskon</th>
          <th id=text width=100px>Total Harga</th>
        </tr>
        <?php
          include 'database.php';
          $sql = "select p.*,j.* FROM pemesanan p join jadwal j ON p.idjadwal = j.idjadwal ORDER BY p.idpesan DESC LIMIT 1";
          $result = mysqli_query($koneksi, $sql);
          $data = mysqli_fetch_array($result);
          $idpesan = $data['idpesan'];
          $idjadwal = $data['idjadwal'];
          $jmlpesan = $data['jmlpesan'];
          $harga = $data['harga'];
          if (!isset($_POST['kupon'])) {
          $totalharga = $harga*$jmlpesan;
          print("<td id=text width=100px>$harga</td>
            <td id=text width=125px>$jmlpesan</td>
            <td id=text width=100px>0</td>
            <td id=text width=100px>$totalharga</td>");
          } elseif (isset($_POST['kupon'])) {
            $kode = $_POST['kode'];
          $query = "select * from promo where kodepromo = '$kode'";
          $hasil = mysqli_query($koneksi, $query);
          $tampil = mysqli_fetch_array($hasil);
          $kodepromo = $tampil['kodepromo'];
          $diskon = $tampil['diskon'];
          if ($kodepromo==$kode) {
            $totalharga = ($harga*$jmlpesan)-$diskon;
            print("<tr>
            <td id=text width=100px>$harga</td>
            <td id=text width=125px>$jmlpesan</td>
            <td id=text width=100px>$diskon</td>
            <td id=text width=100px>$totalharga</td> 
            </tr>");
          } else{
            $diskon=0;
            $totalharga = ($harga*$jmlpesan)-$diskon;
            print("<td id=text width=100px>$harga</td>
            <td id=text width=125px>$jmlpesan</td>
            <td id=text width=100px>$diskon</td>
            <td id=text width=100px>$totalharga</td>");
          }
        }
    ?>
    </form> 
    </table>
  </div>
</center>
<form action="prosesbayar.php" method="POST">
  <input type="hidden" name="idpesan" value="<?php print("$idpesan");?>">
  <input type="hidden" name="harga" value="<?php print("$harga");?>">
  <input type="hidden" name="jmlpesan" value="<?php print("$jmlpesan");?>">
  <input type="hidden" name="kode" value="<?php print("$kode");?>">
  <input type="hidden" name="diskon" value="<?php print("$diskon");?>">
  <input type="hidden" name="totalharga" value="<?php print("$totalharga");?>">
  <center><input id="submit" type="submit" name="next" value="Selanjutnya"></center>
</form>
</div>
</body>
</html>
