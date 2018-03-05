<?php
    session_start();
    if(empty($_SESSION['admin'])){
        header('location: ../index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.css">
  <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <link rel="icon" type="image/png" href="../images/logo.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?hal=beranda" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GR </b>SIMPRUG</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="../#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li>
          <a href="index.php?hal=beranda">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="header" style="color: white"><i class="fa fa-database"></i> MASTER</li>
        <li class="treeview">
          <a href="../#">
            <i class="fa fa-user"></i> <span>Nasabah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a data-toggle="modal" href="#" data-target="#entrynasabahModal"><i class="fa fa-plus fa-fw"></i> Tambah Nasabah</a>
            </li>
            <li>
                <a href="index.php?hal=nsb"><i class="fa fa-table fa-fw"></i> Data Nasabah</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="../#">
            <i class="fa fa-users"></i> <span>Pengepul</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a data-toggle="modal" href="#" data-target="#entrycustomerModal"><i class="fa fa-plus fa-fw"></i> Tambah Pengepul</a>
            </li>
            <li>
                <a href="index.php?hal=cst"><i class="fa fa-table fa-fw"></i> Data Pengepul</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="index.php?hal=sph">
            <i class="fa fa-th-large"></i> <span>Data Sampah</span>
          </a>
        </li>
        <li class="header" style="color: white"><i class="fa fa-exchange"></i> TRANSAKSI</li>
        <li class="treeview">
          <a href="../#">
            <i class="fa fa-trash"></i> <span>Nabung Sampah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="index.php?hal=etb"><i class="fa fa-plus fa-fw"></i> Entry </a>
            </li>
            <li>
                <a href="index.php?hal=tb"><i class="fa fa-table fa-fw"></i> Lihat Data </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="../#">
            <i class="fa fa-handshake"></i> <span>Jual Sampah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="index.php?hal=ejs"><i class="fa fa-plus fa-fw"></i> Entry</a>
            </li>
            <li>
                <a href="index.php?hal=js"><i class="fa fa-table fa-fw"></i> Lihat Data</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="../#">
            <i class="fa fa-user"></i> <span>Pencairan Tabungan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="index.php?hal=ept"><i class="fa fa-plus fa-fw"></i> Entry </a>
            </li>
            <li>
                <a href="index.php?hal=dps"><i class="fa fa-table fa-fw"></i> Data Pencairan Tabungan</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="../#">
            <i class="fa fa-money"></i> <span>Penerimaan Kas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="index.php?hal=etk"><i class="fa fa-plus fa-fw"></i> Entry </a>
            </li>
            <li>
                <a href="index.php?hal=dtk"><i class="fa fa-table fa-fw"></i> Lihat Data </a>
            </li>
            <li>
                <a data-toggle="modal" href="#" data-target="#tambahkettransaksiModal"><i class="fa fa-plus fa-fw"></i> Tambah Keterangan Transaksi</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="../#">
            <i class="fa fa-trash"></i> <span>Pengeluaran Kas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="index.php?hal=ekk"><i class="fa fa-plus fa-fw"></i> Entry </a>
            </li>
            <li>
                <a href="index.php?hal=dpk"><i class="fa fa-table fa-fw"></i> Lihat Data </a>
            </li>
            <li>
                <a data-toggle="modal" href="#" data-target="#tambahtransaksikeluarModal"><i class="fa fa-plus fa-fw"></i> Tambah Keterangan Transaksi</a>
            </li>
          </ul>
        </li>
        <li class="header" style="color: white"><i class="fa fa-user"></i> USER</li>
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../images/admin-pic.png" class="img-circle" alt="User Image" style="background: white">
          </div>
          <div class="pull-left info">
            <p class="text-capitalize"><br>
              <?php
                  include('../connection/connection.php');
                  $id = $_SESSION['admin'];
                  $stmt = $db->query("select * from tb_petugas where id_petugas='$id'");
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  echo $row['nm_petugas'];
              ?>            
            </p>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <li>
          <a href="../session/logout.php">
            <i class="fa fa-power-off"></i> <span>LOGOUT</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" style="padding-top:2px; padding-bottom: 5px; padding-right: 30px ">
      
    
