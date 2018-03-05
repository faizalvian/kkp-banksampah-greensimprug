<?php
	include('../../connection/connection.php');

  $noktp = $_POST['noktp'];
	$namanasabah = $_POST['namanasabah'];
  $jenkel = $_POST['jenkel'];
  $alamat = $_POST['alamat'];
  $rt = $_POST['rt'];
  $rw = $_POST['rw'];
  $notelp = $_POST['notelp'];
  $email = $_POST['email'];
	
	//cari id terbesar
    $stmt = $db->query("SELECT max(id_nasabah) as maxNO FROM tb_nasabah");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $idMax = $row['maxNO'];

   //setelah membaca id terbesar, buat no urut dari karakter ke 8, 2 digit ke kanan
    $NoUrut = (int) substr($idMax, 8, 2);
    $NoUrut++; //nomor urut +1
   	
   	//kode yg akan digunakan menjadi id
   	$kode = date("Ydm");

	if (isset($_POST['tambah'])) 
  {
    $idnasabah = $kode .sprintf('%02s', $NoUrut);
    //.sprintf('%02s', $NoUrut) diformat menjadi 2 digit string

    $db->exec("INSERT into tb_nasabah (id_nasabah, no_ktp, nm_nasabah, jenkel, alamat, RT, RW, no_telp, email, status)
    values('$idnasabah', '$noktp','$namanasabah','$jenkel','$alamat', '$rt', '$rw', '$notelp', '$email', '1')");
    
    header('location:../index.php?hal=nsb');
  }
  else if(isset($_POST['update']))
  {
    $idnasabahe = $_POST['idnasabah'];

    $db->exec("UPDATE tb_nasabah SET no_ktp='$noktp', nm_nasabah='$namanasabah', jenkel='$jenkel', alamat='$alamat', rt='$rt', rw='$rw', no_telp='$notelp', email='$email' where id_nasabah='$idnasabahe'");

    header('location: ../index.php?hal=nsb');
  }else if (isset($_POST['hapus'])) {
    $idnasabahh   = $_POST['id_nasabah'];
    // query SQL untuk delete data
    $db->exec("DELETE from tb_nasabah where id_nasabah='$idnasabahh'");
    // mengalihkan ke halaman datatables
    header('location:../../pages/index.php?hal=nsb');
  }
?>