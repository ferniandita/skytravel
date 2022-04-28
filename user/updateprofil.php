<?php
include 'database.php';
$nama = $_POST['nama'];
$email = $_POST['email'];
$tgllhr = $_POST['tgllhr'];
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "update member set nama='$nama', email='$email', ttl='$tgllhr', username='$username', nohp='$nohp', password='$password'";
$update = mysqli_query($koneksi, $sql);
if ($update){
	echo "<script>alert('Data Berhasil Diubah')</script>";
	echo "<meta http-equiv='refresh' content='1 url=beranda.php'>";
}else{
	echo "<script>alert('Data Gagal Diubah')</script>";
	echo "<meta http-equiv='refresh' content='1 url=editprofil.php'>";
}
?>