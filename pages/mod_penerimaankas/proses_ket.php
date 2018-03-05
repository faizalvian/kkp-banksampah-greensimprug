<?php
	include('../../connection/connection.php');
  $no = $_POST['no'];
  $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    //PROSES TAMBAH DATA
  if(isset($_POST['tambah']))
  {

    $db->exec("INSERT into tb_ketkas (id_ket, status, keterangan)
    values('$no', '$status', '$keterangan')");
  	
  	header('location:../index.php?hal=etk');
  }
?>