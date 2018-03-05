<?php
	include('../../connection/connection.php');
    $namacustomer = $_POST['namacustomer'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    //cari id terbesar
    $stmt = $db->query('SELECT max(id_customer) as maxNO FROM tb_customer');
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $idMax = $row['maxNO']; //0
    //setelah membaca id terbesar, lanjut mencari nomor urut id dari id terbesar
    $NoUrut = (int) substr($idMax, 8, 2);
    $NoUrut++; //nomor urut +1
    $kode = date("Ymd");

  //PROSES TAMBAH DATA
  if(isset($_POST['tambah']))
  {
    $idcustomer = $kode .sprintf('%02s', $NoUrut);
    //.sprintf('%02s', $NoUrut) diformat menjadi 2 digit string

    $db->exec("INSERT into tb_customer (id_customer, nm_customer, alamat, RT, RW, no_telp, email, status)
    values('$idcustomer', '$namacustomer', '$alamat', '$rt', '$rw', '$notelp', '$email', '1')");
  	
  	header('location:../index.php?hal=cst');
  }

  //PROSES UPDATE DATA
  else if (isset($_POST['update'])) 
  {
    $idcustomere = $_POST['idcustomer'];
    
    $db->exec("UPDATE tb_customer SET nm_customer='$namacustomer', alamat='$alamat', RT='$rt', RW='$rw', no_telp='$notelp' where id_customer='$idcustomere'");

    header('location: ../index.php?hal=cst');
  }

  //PROSES DELETE DATA
  else if(isset($_POST['hapus']))
  {
    $id_customerh = $_POST['id_customer'];
    // query SQL untuk delete data
    $db->exec("DELETE from tb_customer where id_customer='$id_customerh'");
    // mengalihkan ke halaman datatables
    header('location:../../pages/index.php?hal=cst');
  }
?>