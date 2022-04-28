<?php
	session_start();
	if (session_destroy()) {
		unset($_SESSION[$uname]);
		header("location:/project/skytravel.php");
	}
?>