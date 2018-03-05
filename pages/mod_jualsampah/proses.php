<?php
	include('../../connection/connection.php');
	$idcustomer = $_POST['idcustomer'];
	$notransaksi = $_POST['notransaksi'];
	$sampah = $_POST['sampah'];
	$qty = $_POST['qty'];
	$hrgjual = $_POST['hrgjual'];
	$idpetugas= $_POST['idpetugas'];

	$total = $qty*$hrgjual;

	if(isset($_POST['entryjs'])){
		$db->beginTransaction();

		$db->exec("REPLACE into tb_penjualan(tgl_transaksi, no_transaksi, id_customer, id_petugas)
				   values (CURDATE(), '$notransaksi', '$idcustomer', '$idpetugas')");
		

		$db->exec("INSERT into tb_detilpenjualan(no_transaksi, id_sampah, jumlah, hargajual, total)
				   values ('$notransaksi', '$sampah', '$qty', '$hrgjual', '$total')");

		$db->commit();
		header('location: ../index.php?hal=ejsdtl&&no_js='.$notransaksi.'&&id_customer='.$idcustomer);
	}else{
		$id_sampah   = $_GET['sphdetil'];
		// query SQL untuk delete data
		$db->exec("DELETE from tb_detilpenjualan where id_sampah='$id_sampah'");
		// mengalihkan ke halaman datatables
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
?>