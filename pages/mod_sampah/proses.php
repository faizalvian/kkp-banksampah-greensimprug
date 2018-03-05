<?php
	include('../../connection/connection.php');

	$idsampah = $_POST['idsampah'];
	$hargabeli = $_POST['hargabeli'];

	$db->exec("UPDATE tb_sampah SET hargabeli = '$hargabeli' where id_sampah = '$idsampah'");

	header('location: ../index.php?hal=sph');
?>