<?php
	include('../../connection/connection.php');
	$notransaksi = $_POST['notransaksi'];
	$tanggal = $_POST['tanggal'];
	$nasabah = $_POST['nasabah'];
	$jumlahtarik = $_POST['jumlahtarik'];

	if(isset($_POST['simpan'])){

		$db->exec("INSERT into tb_pencairantab(no_transaksi, tgl_transaksi, id_nasabah ,jumlah_tarik)
				   values ('$notransaksi', '$tanggal', '$nasabah', '$jumlahtarik')");

		header('location:../index.php?hal=dps');
	}else{
		$notransaksi   = $_GET['no_transaksi'];
		// query SQL untuk delete data
		$db->exec("DELETE from tb_detilpencairantab where no_transaksi='$notransaksi'");
		// mengalihkan ke halaman datatables
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
?>