      <h4 style="margin-left: 7px"><i class="fa fa-database fa-fw"></i>MASTER</h3>
      <!-- Small boxes (Stat box) -->
      <div class="row" style="margin-left: 2px">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>
                <?php
                    include('../connection/connection.php');
                    $stmt = $db->query('SELECT COUNT(id_nasabah) as total from tb_nasabah');
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo $row['total'];
                ?>
              </h3>

              <p>NASABAH</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-user"></i>
            </div>
            <a href="index.php?hal=nsb" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php
                    include('../connection/connection.php');
                    
                    $stmt = $db->query('SELECT COUNT(id_customer) as total from tb_customer');
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      
                    echo $row['total'];
                ?>
              </h3>

              <p>PENGEPUL</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-users"></i>
            </div>
            <a href="index.php?hal=cst" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <h4 style="margin-left: 7px"><i class="fa fa-exchange fa-fw"></i>TRANSAKSI</h3>
      <div class="row" style="margin-left: 2px">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>
                <?php
                    include('../connection/connection.php');
                    $stmt = $db->query('SELECT COUNT(no_transaksi) as total from tb_tabungan');
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo $row['total'];
                ?>
              </h3>

              <p>TABUNGAN SAMPAH</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="index.php?hal=tb" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php
                    include('../connection/connection.php');
                    
                    $stmt = $db->query('SELECT COUNT(no_transaksi) as total from tb_penjualan');
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo $row['total'];
                ?>
              </h3>

              <p>PENJUALAN SAMPAH</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-money"></i>
            </div>
            <a href="index.php?hal=js" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php
                    include('../connection/connection.php');
                    
                    $stmt = $db->query('SELECT COUNT(no_transaksi) as total from tb_pencairantab');
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo $row['total'];
                ?>
              </h3>

              <p>PENCAIRAN TABUNGAN</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-money"></i>
            </div>
            <a href="index.php?hal=dps" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>
                <?php
                    include('../connection/connection.php');
                    $stmt = $db->query('SELECT COUNT(no_transaksi) as total from tb_kas where status="masuk"');
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo $row['total'];
                ?>
              </h3>

              <p>PENERIMAAN KAS</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="index.php?hal=dtk" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php
                    include('../connection/connection.php');
                    $stmt = $db->query('SELECT COUNT(no_transaksi) as total from tb_kas where status="keluar"');
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    echo $row['total'];
                ?>
              </h3>

              <p>PENGELUARAN KAS</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-money"></i>
            </div>
            <a href="index.php?hal=dpk" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
      <h4 style="margin-left: 7px"><i class="fa fa-file fa-fw"></i>LAPORAN</h3>
      <div class="row" style="margin-left: 2px">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a class="small-box bg-primary" href="index.php?hal=lptb" target="_blank">
            <div class="inner">
              <h3>
                <i class="fa fa-file-pdf-o"></i>
              </h3>

              <p>LAPORAN TABUNGAN</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-print"></i>
            </div><br>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a class="small-box bg-yellow" href="index.php?hal=lppn" target="_blank">
            <div class="inner">
              <h3>
                <i class="fa fa-file-pdf-o"></i>
              </h3>

              <p>LAPORAN PENJUALAN</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-print"></i>
            </div><br>
          </a>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a class="small-box bg-green" href="mod_report/stok.php" target="_blank">
            <div class="inner">
              <h3>
                <i class="fa fa-file-pdf-o"></i>
              </h3>

              <p>LAPORAN STOK</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-print"></i>
            </div><br>
          </a>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a class="small-box bg-primary" href="mod_report/stok.php" target="_blank">
            <div class="inner">
              <h3>
                <i class="fa fa-file-pdf-o"></i>
              </h3>

              <p>LAPORAN LABA RUGI</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-print"></i>
            </div><br>
          </a>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a class="small-box bg-yellow" href="index.php?hal=lpkas" target="_blank">
            <div class="inner">
              <h3>
                <i class="fa fa-file-pdf-o"></i>
              </h3>

              <p>LAPORAN KAS</p>
            </div>
            <div class="icon" style="color: white">
              <i class="fa fa-print"></i>
            </div><br>
          </a>
        </div>
      </div>
      <!-- /.row -->