<?php
	include 'database.php';
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	$_SESSION['username']=$username;
	$query = "select * from admin WHERE username='$username' and password='$password'";
	$hasil = mysqli_query($query);
	$data = mysqli_num_rows($hasil);
	if ($data==1) {
		session_register('username');
		session_register('password');
	} else {
		echo "<script type=text/javascript'> alert('Username or Password Invalid!')</script>";
		echo "<meta http-equiv=refresh content=0;url=login.php>";
	}
	header("location:beranda.php");
?>