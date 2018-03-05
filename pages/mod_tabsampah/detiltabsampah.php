        <?php
          include('../connection/connection.php'); 
          
          $query = $db->query("SELECT tb_tabungan.*, tb_nasabah.nm_nasabah as nasabahs from tb_tabungan, tb_nasabah 
                               where tb_tabungan.id_nasabah = tb_nasabah.id_nasabah");
          
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
        ?>
 
        <div <?php echo 'id="detiltbModal'.$row['no_transaksi'].'"' ?> class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                  <div class="form-group"><label>Nasabah</label><input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="text" name="idnasabah" value="<?php echo $row['nasabahs']; ?>" readonly></div>

              <!-- table detil -->
                <?php
                  
                  $query2 = $db->query("SELECT tb_detiltabungan.id_sampah as sphdetil, tb_sampah.id_sampah, jenis_sampah, jumlah, hargabeli, total from tb_tabungan, tb_detiltabungan, tb_sampah 
                    where tb_tabungan.no_transaksi=tb_detiltabungan.no_transaksi and tb_sampah.id_sampah=tb_detiltabungan.id_sampah and tb_detiltabungan.no_transaksi = '".$row['no_transaksi']."'
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
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row2['hargabeli'];"</td>";
                                  echo "<td style='width:110px;  text-align:left; vertical-align: middle;' class='text-capitalize'>";echo $row2['total'];"</td>";
                              echo '</tr>';
                          }
                      }
                      echo '</tbody>';
                  $query3 = $db->query("SELECT SUM(total) as totalsaldo from tb_detiltabungan where no_transaksi='".$row['no_transaksi']."'");
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