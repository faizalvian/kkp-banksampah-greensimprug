<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="bootstrap-sweetalert-master/dist/sweetalert.js"></script>
<script src="bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>
<?php
	include('../../connection/connection.php');
    $notransaksi = $_POST['notransaksi'];
    $tanggal = $_POST['tanggal'];
    $nominal = $_POST['nominal'];
    $transaksi = $_POST['transaksi'];
    $status = $_POST['status'];
    $terimadari = $_POST['terimadari'];

  //PROSES TAMBAH DATA
  if(isset($_POST['simpan']))
  {
    $db->exec("INSERT into tb_kas (no_transaksi, tgl_transaksi, nominal, ket_transaksi, status, dest)
        values('$notransaksi', '$tanggal', '$nominal', '$transaksi', '$status', '$terimadari')");
    
  	header('location:../index.php?hal=dtk');
  }
?>