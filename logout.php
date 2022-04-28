<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['full_name']);
	session_destroy();
	header("Location:login.php");
?>