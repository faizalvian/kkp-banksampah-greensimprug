<?php
  include('connection/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link rel="icon" type="image/png" href="images/logo.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" style="background: #ECF0F1">
<div class="container">
  <div class="row" style="margin-top: 100px; padding-right: 70px; padding-left: 70px;">
    <div class="col-md-4" style="padding:0;">
      <!-- /.login-logo -->
      <div class="login-box-body">
        <div class="login-logo">
          FORM LOGIN
        </div>
        <center><img src="images/logo.jpg" alt="User Image" height="100px" width="100px"></center><br>
        <p class="login-box-msg">Masukkan ID dan Password</p>
        <form action="session/login.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Id" name="id" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
            </div><br><br>
            <div class="col-md-12" align="center">
              &copy; 2018
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-box-body -->
    <!-- /.login-box -->
    </div>
    <div class="col-md-8" style="background: url('images/sdu.jpg'); color: white; height: 433px; padding:0;">
      <h1 class="pull-left" style="margin-top: 220px; margin-left: 60px">
        <b>SISTEM BANK SAMPAH</b><br>
      </h1>
    </div>
  </div>
</div>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

</body>
</html>
