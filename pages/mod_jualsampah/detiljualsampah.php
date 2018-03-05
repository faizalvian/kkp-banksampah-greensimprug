        <?php
          include('../connection/connection.php'); 
          
          $query = $db->query("SELECT tb_penjualan.*, tb_customer.nm_customer as customers from tb_penjualan, tb_customer 
                               where tb_penjualan.id_customer = tb_customer.id_customer");
          
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
        ?>
 
        <div <?php echo 'id="detiljsModal'.$row['no_transaksi'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detil Transaksi</h3>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group"><label>No. Transaksi</label><input required class="form-control required text-uppercase" data-placement="top" data-trigger="manual" type="text" name="notransaksi" maxlength="8" readonly value="<?php echo $row['no_transaksi']; ?>"></div>
                  <div class="form-group"><label>Tanggal Transaksi</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="tgltransaksi" value="<?php echo $row['tgl_transaksi']; ?>" readonly></div>
                  <div class="form-group"><label>Customer</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="idcustomer" value="<?php echo $row['customers']; ?>" readonly></div>

              <!-- table detil -->
                <?php
                  
                  $query2 = $db->query("SELECT tb_detilpenjualan.id_sampah as sphdetil, tb_sampah.id_sampah, jenis_sampah, jumlah, hargajual, total from tb_penjualan, tb_detilpenjualan, tb_sampah 
                    where tb_penjualan.no_transaksi=tb_detilpenjualan.no_transaksi and tb_sampah.id_sampah=tb_detilpenjualan.id_sampah and tb_detilpenjualan.no_transaksi = '".$row['no_transaksi']."'
                                         ORDER by tb_sampah.jenis_sampah desc");
                  echo'<table class="table table-striped table-bordered table-hover">';
                      echo '<thead>';
                          echo '<tr>';
                              echo '<th>Jenis</th>';
                              echo '<th>Qty (kg)</th>';
                              echo '<th>Harga</th>';
                              echo '<th>Jumlah</th>';
                          echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                      while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
                          if($row2['jumlah']>'0'){
                              echo "<tr'>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row2['jenis_sampah'];"</td>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row2['jumlah'];"</td>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row2['hargajual'];"</td>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row2['total'];"</td>";
                              echo '</tr>';
                          }
                      }
                      echo '</tbody>';
                  $query3 = $db->query("SELECT SUM(total) as totalsaldo from tb_detilpenjualan where no_transaksi='".$row['no_transaksi']."'");
                  $row3 = $query3->fetch(PDO::FETCH_ASSOC);
                  echo "<tr bgcolor='#CCCCCC'>
                          <td colspan='3' align='center'>TOTAL</td>
                          <td>Rp".$row3['totalsaldo']."</td>
                        </tr>";
                  echo '</table>';
                ?>
                <!-- end table detil -->
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php
          }
        ?>