<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="travel.css">
</head>
<body>
<div class="akun"></div>
<div class="logo">
</div>
<div class="menu">
</div>
<div class="isi">
<center>
<div id="card3">
  <center>
  <form action="cek_register.php" method="post">
    <table>
			<tr>
				<td colspan="2"><center><h1 id="title">REGISTER</h1></center></td>
			</tr>
    <tr>
      <td id="text">Nama Lengkap</td>
			<td id="text">Alamat E-mail</td>
    </tr>
    <tr>
      <td><center><input id="input3" type="text" name="nama"></center></td>
			<td><center><input id="input3" type="text" name="email"></center></td>
    </tr>
    <tr>
      <td id="text">Tanggal Lahir</td>
			<td id="text">Username</td>
    </tr>
    <tr>
      <td><center><input id="input3" type="date" name="tgllhr"></center></td>
			<td><center><input id="input3" type="text" name="username"></center></td>
    </tr>
    <tr>
			<td id="text">Nomor Handphone</td>
      <td id="text">Password</td>
    </tr>
    <tr>
			<td><center><input id="input3" type="text" name="nohp"></center></td>
      <td><center><input id="input3" type="password" name="password"></center></td>
    </tr>
    <tr>
      <td colspan="2"><br><br><center><input id="submit" type="submit" name="register" value="Daftar"></center></td>
    </tr>
    <tr>
      <td colspan="2" id="text"><center>Sudah Punya Akun? Masuk <a href="login.php" id="link">Disini</a></center></td>
    </tr>
    </table>
  </form>
</center>
</div>
</center>
</div>
</body>
</html>
