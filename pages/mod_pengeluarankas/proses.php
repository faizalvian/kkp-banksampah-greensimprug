<?php
  include('../../connection/connection.php');
    $notransaksi = $_POST['notransaksi'];
    $tanggal = $_POST['tanggal'];
    $nominal = $_POST['nominal'];
    $transaksi = $_POST['transaksi'];
    $status = $_POST['status'];
    $bayarke = $_POST['bayarke'];

  //PROSES TAMBAH DATA
  if(isset($_POST['simpan']))
  {

    $db->exec("INSERT into tb_kas (no_transaksi, tgl_transaksi, nominal, ket_transaksi, status, dest)
    values('$notransaksi', '$tanggal', '$nominal', '$transaksi', '$status', '$bayarke')");
    
    header('location:../index.php?hal=dpk');
  }

?>