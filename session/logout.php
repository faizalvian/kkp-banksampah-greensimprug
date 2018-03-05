<?php
	session_start();
	session_unset('admin');
	session_destroy();
	header('location:../index.php');
?>