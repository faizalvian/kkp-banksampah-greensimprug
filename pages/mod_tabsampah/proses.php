<?php
	include('../../connection/connection.php');
	$nasabah = $_POST['nasabah'];
	$notransaksi = $_POST['notransaksi'];
	$sampah = $_POST['sampah'];
	$qty = $_POST['qty'];

	$record = $db->query("SELECT hargabeli FROM tb_sampah where id_sampah = '$sampah'");
	$row = $record->fetch(PDO::FETCH_ASSOC);
	$hargabeli = $row['hargabeli'];

	$total = $qty*$hargabeli;

	if(isset($_POST['entrytb'])){
		$db->beginTransaction();

		$db->exec("REPLACE into tb_tabungan(tgl_transaksi, no_transaksi, id_nasabah)
				   values (CURDATE(), '$notransaksi', '$nasabah')");
		

		$db->exec("INSERT into tb_detiltabungan(no_transaksi, id_nasabah, id_sampah, jumlah, total)
				   values ('$notransaksi', '$nasabah', '$sampah', '$qty', '$total')");

		$db->commit();
		header('location: ../index.php?hal=etbdtl&&no_tb='.$notransaksi.'&&id_nasabah='.$nasabah);
	}else{
		$id_sampah   = $_GET['sphdetil'];
		// query SQL untuk delete data
		$db->exec("DELETE from tb_detiltabungan where id_sampah='$id_sampah'");
		// mengalihkan ke halaman datatables
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
?>