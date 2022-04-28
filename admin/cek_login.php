<?php
	include 'database.php';
	session_start();
	$uname=$_POST['uname'];
	$pword=$_POST['pword'];
	$_SESSION['uname']=$uname;
	$query = "select * from admin WHERE username='$uname' and password='$pword'";
	$hasil = mysqli_query($query);
	$data = mysqli_num_rows($hasil);
	if ($data==1) {
		session_register('uname');
		session_register('pword');
	} else {
		echo "<script type=text/javascript'> alert('Username or Password Invalid!')</script>";
		echo "<meta http-equiv=refresh content=0;url=login.php>";
	}
	header("location:beranda.php");
?>