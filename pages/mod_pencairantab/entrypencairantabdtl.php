        <img src="../images/logo.png" height="100" width="100">
        <br><h3><i class="fa fa-clipboard"> Entry Pencairan Tabungan</i></h3><hr>
        <div class="row">    
            <!-- FORM ENTRY PENCAIRAN TABUNGAN -->
            <div class="col-md-6">
              <form method="POST" action="mod_pencairantab/proses.php">
                <div class="form-group"><label>No Transaksi</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="notransaksi" readonly
                value="<?php
                    $notransaksi = $_GET['no_tb'];
                echo $notransaksi;
                ?>">
                </div>

                <div class="form-group"><label>Tanggal </label><input required class="form-control required" data-placement="top" data-trigger="manual" type="date" name="tanggal" readonly
                value="<?php
                    $tanggal = $_GET['tgl_transaksi'];
                echo $tanggal;
                ?>"></div>

                <div class="form-group">
                    <label>Nama Nasabah</label>
                    <input required class="form-control required text-uppercase" type="text" readonly name="idnasabah" value='<?php 
                                $nmnasabah = $_GET['nm_nasabah'];

                                echo $nmnasabah;
                            ?>'>
                </div>
                
                <div class="form-group has-feedback"><label>Jumlah Pencairan</label>
                  <span class="form-control-feedback">IDR</span><input required class="form-control required text-capitalize" placeholder=".00" data-placement="top" data-trigger="manual" type="number" name="jumlahcair"></div>
                
                <button type="submit" class="btn btn-default" name="entrypt"><i class="fa fa-plus"> Tambah </i></button>
              </form><br><hr>
              <!-- END FORM ENTRY transaksi -->
            </div>


            <div class="col-md-6">
              <!-- DETIL transaksi -->
                <?php
                include('../connection/connection.php');
                if(!empty($_GET['no_tb'])){
                $query = $db->query("SELECT no_transaksi, tgl_transaksi, nm_nasabah, jumlah_cair
                                     FROM tb_pencairantab pt, tb_nasabah n, tb_detilpencairantab dp
                                     WHERE n.id_nasabah=pt.id_nasabah");
                echo'<table class="table table-striped table-bordered table-hover">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>No.Transaksi</th>';
                            echo '<th>Tanggal(kg)</th>';
                            echo '<th>Nama Nasabah</th>';
                            echo '<th>Jumlah</th>';
                            echo '<th>Hapus</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        if($row['jumlah']>'0'){
                            echo "<tr'>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['no_transaksi'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['tgl_transaksi'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['nm_nasabah'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row['jumlah_cair'];"</td>";
                                echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'><a class='btn btn-danger' aria-label='Delete' href='mod_pencairantab/proses.php?notransaksi=$row[no_transaksi]'><i class='fa fa-close'></i></a></td>";
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>';
                $query2 = $db->query("SELECT MIN(total) as sisasaldo from tb_detiltabungan where no_transaksi='$_GET[no_tb]'");
                $row2 = $query2->fetch(PDO::FETCH_ASSOC);
                echo "<tr bgcolor='#CCCCCC'>
                          <td colspan='3' align='center'>TOTAL</td>
                          <td>Rp".$row2['sisasaldo']."</td>
                      </tr>";
                echo '</table>';
                //echo "<a class='btn btn-primary' href='report/transaksi.php?no_transaksi=$notransaksi'><i class='fa fa-print'></i> Cetak Kwitansi</a><br><br>";
                echo "<a class='btn btn-danger' href='index.php?hal=tb'> Selesai <i class='fa fa-check'></i></a>";
                }
                ?>
              <!-- END DETIL transaksi -->
            </div>
        </div>